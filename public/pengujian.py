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


# In[72]: untuk mengambil data di data_uji
query = db.cursor()
query.execute("SELECT g1,g2,g3,g4,g5,g6,g7,g8,g9,g10,g11,g12,g13,g14,g15,g16,g17,g18,g19,g20,g21,g22,g23,g24,g25,g26,g27,g28,g29,diagnosa_id FROM data_uji JOIN dataset ON data_uji.dataset_id = dataset.id ORDER BY data_uji.id")

data_uji = query.fetchall()
data_uji = np.array(data_uji)

data_tanpa_target = np.delete(data_uji, -1, axis=1) 
target = data_uji[:,-1]

# In[113]:
query = db.cursor()
# query.execute("SELECT dataset.id,g1,g2,g3,g4,g5,g6,g7,g8,g9,g10,g11,g12,g13,g14,g15,g16,g17,g18,g19,g20,g21,g22,g23,g24,g25,g26,g27,g28,g29,diagnosa_id FROM data_model JOIN dataset ON data_model.dataset_id = dataset.id ORDER BY data_model.id")
query.execute("SELECT g1,g2,g3,g4,g5,g6,g7,g8,g9,g10,g11,g12,g13,g14,g15,g16,g17,g18,g19,g20,g21,g22,g23,g24,g25,g26,g27,g28,g29,diagnosa_id FROM data_model JOIN dataset ON data_model.dataset_id = dataset.id ORDER BY data_model.id")

data_model = query.fetchall()
data_model = np.array(data_model)

x = np.delete(data_model, -1, axis=1) #x = data tanpa target
y = data_model[:,-1] #ngambil kolom terakhir &&  y=target

ypred = np.array([])

for i in data_tanpa_target:
    predict = nwknn(x, y, i, int(sys.argv[1]), int(sys.argv[2]))
    ypred = np.append(ypred, predict)
        
hasil_akurasi = (metrics.accuracy_score(target,ypred))
print(hasil_akurasi * 100)