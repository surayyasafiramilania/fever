@extends('layouts.template')

@section('content')
@if (auth()->user()->role == "1")
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Dataset</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $dataset }}</h2>
                            <a href="{{ url('dataset') }}"><p class="text-white mb-0">Detail Info</p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-folder"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Latih</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $datalatih }}</h2>
                            <a href="{{ url('data-latih') }}"><p class="text-white mb-0">Detail Info</p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-folder"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Model</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $datamodel }}</h2>
                            <a href="{{ url('data-model') }}"><p class="text-white mb-0">Detail Info</p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-folder"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Uji</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $datauji }}</h2>
                            <a href="{{ url('data-uji') }}"><p class="text-white mb-0">Detail Info</p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-folder"></i></span>
                    </div>
                </div>
            </div>
        </div>
</div>
@endif
<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
