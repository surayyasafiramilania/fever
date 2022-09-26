@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <a href="{{ url('login') }}">
                            <span class="logo-compact"><img src="{{ asset('template/images/differ-2.png')}}" alt=""></span>
                            <p class="text-primary">Diagnosis Of A Fever</p>
                        </a>
                    </div>
                    <br>
                    <h4 class="card-title"> Hasil Klasifikasi Demam</h4>
                    <br>
                    <div class="default-tab">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#diagnosa">Diagnosa</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pengobatan">Pengobatan</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pencegahan">Pencegahan</a>
                            </li>
                        </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="diagnosa" role="tabpanel">
                            <div class="p-t-15">
                                <h4>Gejala yang diderita:</h4>
                                <ul class="list-icons">
                                    @if($klasifikasi->g1)<li><i class="fa fa-check text-info"></i> Demam intermittent</li>@endif
                                    @if($klasifikasi->g2)<li><i class="fa fa-check text-info"></i> Demam terutama pada malam hari</li>@endif
                                    @if($klasifikasi->g3)<li><i class="fa fa-check text-info"></i> Demam sepanjang hari</li>@endif
                                    @if($klasifikasi->g4)<li><i class="fa fa-check text-info"></i> Demam Menggigil</li>@endif
                                    @if($klasifikasi->g5)<li><i class="fa fa-check text-info"></i> Berkeringat</li>@endif
                                    @if($klasifikasi->g6)<li><i class="fa fa-check text-info"></i> Lama demam 2-7 hari</li>@endif
                                    @if($klasifikasi->g7)<li><i class="fa fa-check text-info"></i> Lama demam 10-14 hari</li>@endif
                                    @if($klasifikasi->g8)<li><i class="fa fa-check text-info"></i> Lama demam < 14 hari</li>@endif
                                    @if($klasifikasi->g9)<li><i class="fa fa-check text-info"></i> Sakit Kepala</li>@endif
                                    @if($klasifikasi->g10)<li><i class="fa fa-check text-info"></i> Nyeri Perut</li>@endif
                                    @if($klasifikasi->g11)<li><i class="fa fa-check text-info"></i> Diare atau susah BAB</li>@endif
                                    @if($klasifikasi->g12)<li><i class="fa fa-check text-info"></i> Mual dan Muntah</li>@endif
                                    @if($klasifikasi->g13)<li><i class="fa fa-check text-info"></i> Anoreksia</li>@endif
                                    @if($klasifikasi->g14)<li><i class="fa fa-check text-info"></i> Malaise</li>@endif
                                    @if($klasifikasi->g15)<li><i class="fa fa-check text-info"></i> Nyeri otot dan sendi</li>@endif
                                    @if($klasifikasi->g16)<li><i class="fa fa-check text-info"></i> Petechie</li>@endif
                                    @if($klasifikasi->g17)<li><i class="fa fa-check text-info"></i> Syok</li>@endif
                                    @if($klasifikasi->g18)<li><i class="fa fa-check text-info"></i> Melena</li>@endif
                                    @if($klasifikasi->g19)<li><i class="fa fa-check text-info"></i> Hematuria</li>@endif
                                    @if($klasifikasi->g20)<li><i class="fa fa-check text-info"></i> Nyeri punggung</li>@endif
                                    @if($klasifikasi->g21)<li><i class="fa fa-check text-info"></i> Riwayat berpergian ke daerah malaria</li>@endif
                                    @if($klasifikasi->g22)<li><i class="fa fa-check text-info"></i> Pucat</li>@endif
                                    @if($klasifikasi->g23)<li><i class="fa fa-check text-info"></i> Lidah kotor</li>@endif
                                    @if($klasifikasi->g24)<li><i class="fa fa-check text-info"></i> Perut Kembung</li>@endif
                                    @if($klasifikasi->g25)<li><i class="fa fa-check text-info"></i> Letargi</li>@endif
                                    @if($klasifikasi->g26)<li><i class="fa fa-check text-info"></i> Delirium</li>@endif
                                    @if($klasifikasi->g27)<li><i class="fa fa-check text-info"></i> Pembesaran hati</li>@endif
                                    @if($klasifikasi->g28)<li><i class="fa fa-check text-info"></i> Pembesaran limpa</li>@endif
                                    @if($klasifikasi->g29)<li><i class="fa fa-check text-info"></i> Ikterus</li>@endif
                                </ul>
                                <p>Berdasarkan gejala yang diderita, pasien atas nama <b>{{ $klasifikasi-> nama_pasien}}</b> terdiagnosa penyakit <b>{{ $diagnosa->nama_diagnosa}}</b>.</p>
                                <p></p>
                                <p>{!! $diagnosa->deskripsi!!}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pengobatan">
                            <div class="p-t-15">
                                <h4>Pengobatan {{ $diagnosa->nama_diagnosa}}</h4>
                                <p>{!! $diagnosa->pengobatan!!}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pencegahan">
                            <div class="p-t-15">
                                <h4>Pencegahan {{ $diagnosa->nama_diagnosa}}</h4>
                                <p>{!! $diagnosa->pencegahan!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div>
                    <center><a href="{{ url("klasifikasi-demam") }}" class="btn btn-light btn-outline-primary" ><i class="icon-arrow-left-circle menu-icon before:text-primary"> Back</i></a></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





