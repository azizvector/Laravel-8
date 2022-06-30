@extends('layouts.app')

@section('content')
    <div class="card card-custom">
        <div class="card-header border-0 pt-2 pb-0">
            <div class="card-title">
                Detail Kategori
            </div>
            <div class="card-toolbar">
                <a class="btn btn-outline-secondary btn-sm" href="{{ route('kategori.index') }}"> Kembali</a>
            </div>
        </div>
        <div class="card-body pb-4">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="text-muted">Nama Kategori</div>
                    <div class="fs-5 fw-bold">{{ $kategori->nama }}</div>
                </div>
            </form>
        </div>
    </div>
@endsection