@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body pt-5">
                    <div class="text-center mb-4">
                        <a href="{{ url('login') }}">
                            <span class="logo-compact"><img src="{{ asset('template/images/differ-2.png')}}" alt=""></span>
                            <p class="text-primary">Diagnosis Of A Fever</p>
                        </a>
                    </div>
                    <br>
                    <form id="klasifikasi" method="POST" action="{{ route('proses-klasifikasi') }}">
                        @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label>Nama Pasien</label>
                                <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Masukan Nama Pasien">
                                <span id="nameError" class="text-danger error-messages"></span>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select id="inputState jenis_kelamin" name="jenis_kelamin" class="form-control">
                                    <option selected="selected" disabled>Pilih Jenis Kelamin</option>
                                    <option value="1">Laki-Laki</option>
                                    <option value="0">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="text" name="umur" id="umur" class="form-control" placeholder="Masukan Umur">
                            </div>
                            <h5 class="text-muted">Gejala yang diderita:</h5>
                            <div class="form-group">
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[1]"  id="g1" value="1">Demam intermittent</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[2]" id="g2" value="1">Demam terutama malam hari</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[3]" id="g3" value="1">Demam terutama sepanjang hari</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[4]" id="g4" value="1">Demam menggigil</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[5]" id="g5" value="1">Berkeringat</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[6]" id="g6" value="1">Lama demam 2-7 hari</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[7]" id="g7" value="1">Lama demam 10-14 hari</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[8]" id="g8" value="1">Lama demam > 14 hari</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[9]" id="g9" value="1">Sakit kepala</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[10]"  id="g10" value="1">Nyeri perut</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[11]"  id="g11" value="1">Diare atau susah BAB</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[12]"  id="g12" value="1">Mual dan muntah</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[13]"  id="g13" value="1">Anoreksia</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[14]"  id="g14" value="1">Malaise</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[15]"  id="g15" value="1">Nyeri otot dan sendi</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[16]"  id="g16" value="1">Petechie</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[17]"  id="g17" value="1">Syok</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[18]"  id="g18" value="1">Melena</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[19]"  id="g19" value="1">Hematuria</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[20]"  id="g20" value="1">Nyeri punggung</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[21]"  id="g21" value="1">Riwayat berpergian ke daerah malaria</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[22]"  id="g22" value="1">Pucat</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[23]"  id="g23" value="1">Lidah kotor</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[24]"  id="g24" value="1">Perut kembung</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[25]"  id="g25" value="1">Letargi</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[26]"  id="g26" value="1">Delirium</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[27]"  id="g27" value="1">Pembesaran hati</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[28]"  id="g28" value="1">Pembesaran limpa</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[29]"  id="g29" value="1">Ikterus</label>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-light btn-outline-success" id="klasifikasiButton"><i class="icon-refresh menu-icon before:text-success"> Klasifikasi</i></button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





