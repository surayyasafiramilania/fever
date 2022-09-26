#!/usr/bin/env python
# coding: utf-8

# In[59]:


import mysql.connector
import numpy as np
import sys
from sklearn.model_selection import train_test_split
from sklearn.model_selection import KFold
from sklearn.metrics import multilabel_confusion_matrix
from sklearn.metrics import classification_report
from sklearn import metrics

###  Function Perhitungan Nilai Kedekatan dengan CosSim
def cosSim(x_train, x_test):
    similarity = np.array([])
    for i in x_train:
        a = np.sum(np.multiply(i, x_test))
        b = np.sqrt(np.multiply(np.sum(np.power(i, 2)), np.sum(np.power(x_test, 2))))
        c= a/b
        similarity = np.append(similarity, c)
    return similarity


###  Function Perhitungan Bobot
def Perhitungan_bobot(kategori,min_kategori, exp):
    hasil_bobot = np.array([])
    for i in range(0, len(kategori[0])):
        bobot = (1/((kategori[1][i] / min_kategori) * 1/exp))
        hasil_bobot = np.append(hasil_bobot, bobot)
    return hasil_bobot


### Function Perhitungan Skor
def Perhitungan_skor(k, get_kdata, kategori, hasil_bobot):
    hasil_score = np.array([])
    data_target = np.delete(get_kdata, 1, 1) #1 = ngambil kolom ke - 0 , 1 ujung = axis --> 0 tuh ngehapus baris, 1 ngehapus kolom
    hasil_kedekatan = np.delete(get_kdata, 0, 1).flatten()
    for i in range(0, len(kategori[0])):
        kondisi = np.array([])
        for j in range(0, len(data_target)):
            if (kategori[0][i] == data_target[j][0]):
                kondisi = np.append(kondisi, 1)
            else: 
                kondisi = np.append(kondisi, 0)
        hasil = np.sum(np.multiply(hasil_kedekatan, kondisi))
        score = hasil_bobot[i] * hasil
        hasil_score = np.append(hasil_score, score) 
    return hasil_score


### Function Metode NWKNN
def nwknn(x_train, y_train, x_test, exp, k):
    similarity = cosSim(x_train, x_test) #memanggil function cosSim
    similarity_sort = np.flip([(similarity[i],y_train[i]) for i in  np.argsort(similarity)]) #mengurutkan dari besar ke kecil
    kategori = np.unique(y_train, return_counts=True) #membuat unique dari data target
    min_kategori = np.amin(kategori[1]) #mencari minimum kategori
    get_kdata = similarity_sort[:k] #motong nilai kedekatan ketetanggaan berdasarkan nilai K

    hasil_bobot = Perhitungan_bobot(kategori, min_kategori, exp) #memanggil function bobot
    
    hasil_score = Perhitungan_skor(k, get_kdata, kategori, hasil_bobot) #memanggil function skor
    
    max_result = np.flip([(hasil_score[i],kategori[0][i]) for i in np.argsort(hasil_score)])[:1] 
    return max_result[0][0] #mengambil kategori yg nilai hasil score nya paling pertama

##connect database
db = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="fever"
)


# In[72]:
query = db.cursor()
query.execute("SELECT id,g1,g2,g3,g4,g5,g6,g7,g8,g9,g10,g11,g12,g13,g14,g15,g16,g17,g18,g19,g20,g21,g22,g23,g24,g25,g26,g27,g28,g29,diagnosa_id FROM dataset order by id asc")

dataset = query.fetchall()
dataset = np.array(dataset)

data_tanpa_target = np.delete(dataset, -1, axis=1) 
target = dataset[:,-1]

#pembagian data latih (yang akan dibagi menjadi data latih dan data uji (untuk kfold)) dan data uji (untuk akurasi)
data_latih, data_uji, target_latih, target_uji = train_test_split(data_tanpa_target, target, test_size=0.3, random_state=42)

id_data_latih = data_latih[:, 0]

query.execute("TRUNCATE TABLE data_latih")

for i in id_data_latih:
    query.execute("INSERT INTO data_latih VALUES(NULL, %s, NULL, NULL)", (str(i), ))
db.commit()


query.execute("TRUNCATE TABLE data_uji")

id_data_uji = data_uji[:, 0]
for i in id_data_uji:
    query.execute("INSERT INTO data_uji VALUES(NULL, %s, NULL, NULL)", (str(i), ))
db.commit()


# In[95]:


data_latih = np.delete(data_latih, 0, axis=1)
data_uji = np.delete(data_uji, 0, axis=1)


# In[97]:


kf = KFold(n_splits=10, shuffle=True, random_state=42)
kf.get_n_splits(data_latih)

data_model = []
accuracy = np.array([])

for train_index, test_index in kf.split(data_latih):
    x_train, x_test = data_latih[train_index], data_latih[test_index]
    y_train, y_test = target_latih[train_index], target_latih[test_index]
    
    ypred = np.array([])
    
    for i in test_index:
        predict = nwknn(x_train, y_train, data_latih[i] , int(sys.argv[1]), int(sys.argv[2]))
        ypred = np.append(ypred, predict)
        
    hasil_akurasi = (metrics.accuracy_score(y_test,ypred))
    accuracy = np.append(accuracy, hasil_akurasi)
    data_model.append(train_index)



# In[112]:


index_akurasi_tertinggi = accuracy.argmax()

query.execute("SELECT dataset_id FROM data_latih order by id asc")
id_data_latih = query.fetchall()
id_data_model = np.array(id_data_latih)

id_data_model = id_data_model[data_model[index_akurasi_tertinggi]].flatten()



# In[113]:


query.execute("TRUNCATE TABLE data_model")

for i in id_data_model:
    query.execute("INSERT INTO data_model VALUES(NULL, %s, NULL, NULL)", (str(i), ))
db.commit()

print(accuracy[index_akurasi_tertinggi] * 100)