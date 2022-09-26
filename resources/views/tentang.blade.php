@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tentang Aplikasi</h4>
                    <ul class="nav nav-pills mb-3">
                        <li class="nav-item"><a href="#klasifikasi-demam" class="nav-link active" data-toggle="tab" aria-expanded="false">Klasifikasi Demam</a>
                        </li>
                        <li class="nav-item"><a href="#dbd" class="nav-link" data-toggle="tab" aria-expanded="false">Demam Berdarah Dengue</a>
                        </li>
                        <li class="nav-item"><a href="#malaria" class="nav-link" data-toggle="tab" aria-expanded="true">Malaria</a>
                        </li>
                        <li class="nav-item"><a href="#tifoid" class="nav-link" data-toggle="tab" aria-expanded="true">Demam Tifoid</a>
                        </li>
                    </ul>
                    <div class="tab-content br-n pn">
                        <div id="klasifikasi-demam" class="tab-pane active">
                            <div class="row align-items-center">
                                <div class="col-sm-6 col-md-4">
                                    <img src="{{ asset('template/images/fever.png')}}" alt="" class="img-fluid thumbnail m-r-15">
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <p class="text-justify">Aplikasi klasifikasi demam ini bertujuan untuk membantu tenaga kesehatan yang melakukan pelayanan kesehatan primer dalam mengklasifikasikan penyakit <b>Demam Berdarah <i>Dengue</i> (DBD), Malaria, dan Demam <i>Tifoid</i></b> dengan menggunakan parameter seperti <b>hasil anamnesis dan pemeriksaan fisik</b> pasien agar mendapatkan diagnosa awal yang tepat sehingga dapat memberikan penanganan yang tepat pula.</p>
                                </div>
                            </div>
                        </div>
                        <div id="dbd" class="tab-pane">
                            <div class="row align-items-center">
                                <div class="col-sm-6 col-md-4">
                                    <img src="{{ asset('template/images/dbd.jpg')}}" alt="" class="img-fluid thumbnail m-r-15">
                                    <p>sumber: <a href="https://www.sehatq.com/artikel/waspadai-perubahan-gejala-dbd-ini-berdasarkan-derajatnya">https://www.sehatq.com/artikel/waspadai-perubahan-gejala-dbd-ini-berdasarkan-derajatnya</a></p>
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <p class="text-justify">Demam Berdarah Dengue (DBD) merupakan penyakit infeksi yang disebabkan oleh virus Dengue dari famili flaviviridae, genus flavivirus yang dapat hidup dan berkembang biak di dalam tubuh nyamuk dan manusia. Dengan kata lain, demam berdarah Dengue ditularkan melalui gigitan nyamuk yang terinfeksi virus Dengue sehingga tubuh manusia yang terkena gigitan nyamuk akan terinfeksi virus dengue (Frida, 2019).</p>
                                    <p>Sumber:</p>
                                    <p>Frida, N. (2019). Mengenal Demam Berdarah Dengue (Sulistiono (ed.)). Jawa Tengah : Alprin.</p>
                                </div>
                            </div>
                        </div>
                        <div id="malaria" class="tab-pane">
                            <div class="row align-items-center">
                                <div class="col-sm-6 col-md-4">
                                    <img src="{{ asset('template/images/malaria.jpeg')}}" alt="" class="img-fluid thumbnail m-r-15">
                                    <p>sumber: <a href="https://dinkes.sumselprov.go.id/2021/08/saat-hujan-nyamuk-datang-kenali-gejala-dbd-malaria-vs-covid-samakah/">https://dinkes.sumselprov.go.id/2021/08/saat-hujan-nyamuk-datang-kenali-gejala-dbd-malaria-vs-covid-samakah/</a></p>
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <p class="text-justify">Malaria merupakan penyakit infeksi yang disebabkan oleh parasit plasmodium yang ditularkan melalui gigitan nyamuk anopheles betina. Demam merupakan gejala utama pada Malaria. Pada periode awal sakit ditandai dengan kondisi tubuh menggigil dan diikuti dengan demam tinggi kemudian berkeringat. Selain gejala diatas, gejala lainnya pada penyakit Malaria yaitu nyeri kepala, mual, muntah, diare, nyeri otot dan sendi (Kementerian Kesehatan RI, 2020). </p>
                                    <p>Sumber: </p>
                                    <p>Kementerian Kesehatan RI. (2020). Buku Saku Tatalaksana Kasus Malaria. Direktorat Jenderal Pencegahan dan Pengendalian Penyakit Kementerian Kesehatan Republik Indonesia.</p>
                                </div>
                            </div>
                        </div>
                        <div id="tifoid" class="tab-pane">
                            <div class="row align-items-center">
                                <div class="col-sm-6 col-md-4">
                                    <img src="{{ asset('template/images/tipes.jpg')}}" alt="" class="img-fluid m-r-100">
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <p class="text-justify">Demam tifoid merupakan penyakit infeksi akut saluran pencernaan yang disebabkan oleh bakteri salmonella typhi atau salmonella paratyphi. Demam tifoid biasanya ditandai dengan gejala demam lebih dari satu minggu (purnama, 2016).</p>
                                    <p>Sumber:</p>
                                    <p>Purnama, S. G. (2016). Buku Ajar Penyakit Berbasis Lingkungan. Ministry of Health of the Republic of Indonesia, 112.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection