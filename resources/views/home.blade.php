@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-custom card-total" onClick="window.location='{{ url("mahasiswa") }}'">
                <div class="card-header border-0 pt-4 pb-0 justify-content-center">
                    <div class="card-title text-center m-0">
                        <h4 class="fw-bold">Total Mahasiswa</h4 class="card-title">
                    </div>
                </div>
                <div class="card-body pb-4 text-center">
                    <h1>{{ $mahasiswa }}</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-custom card-total" onClick="window.location='{{ url("kategori") }}'">
                <div class="card-header border-0 pt-4 pb-0 justify-content-center">
                    <div class="card-title text-center m-0">
                        <h4 class="fw-bold">Total Kategori</h4 class="card-title">
                    </div>
                </div>
                <div class="card-body pb-4 text-center">
                    <h1>{{ $kategori }}</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-custom card-total" onClick="window.location='{{ url("postingan") }}'">
                <div class="card-header border-0 pt-4 pb-0 justify-content-center">
                    <div class="card-title text-center m-0">
                        <h4 class="fw-bold">Total Postingan</h4 class="card-title">
                    </div>
                </div>
                <div class="card-body pb-4 text-center">
                    <h1>{{ $postingan }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
