@extends('layouts.app')

@section('content')
    <div class="card card-custom">
        <div class="card-header border-0 pt-2 pb-0">
            <div class="card-title">
                Detail Mahasiswa
            </div>
            <div class="card-toolbar">
                <a class="btn btn-outline-secondary btn-sm" href="{{ route('mahasiswa.index') }}"> Kembali</a>
            </div>
        </div>
        <div class="card-body pb-4">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="text-muted">Foto</div>
                    @if($mahasiswa->foto)
                        <img class="foto foto-large" src="{{ Storage::url($mahasiswa->foto) }}" alt="foto"/>
                    @else
                        <div class="symbol symbol-large">{{ $mahasiswa->nama[0] }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <div class="text-muted">NIM</div>
                    <div class="fw-bold">{{ $mahasiswa->nim }}</div>
                </div>
                <div class="mb-3">
                    <div class="text-muted">Nama</div>
                    <div class="fw-bold">{{ $mahasiswa->nama }}</div>
                </div>
                <div class="mb-3">
                    <div class="text-muted">Jenis Kelamin</div>
                    <div class="fw-bold">{{ $mahasiswa->jenkel }}</div>
                </div>
                <div class="mb-3">
                    <div class="text-muted">Email</div>
                    <div class="fw-bold">{{ $mahasiswa->user->email }}</div>
                </div>
                <div class="mb-3">
                    <div class="text-muted">Username</div>
                    <div class="fw-bold">{{ $mahasiswa->user->username }}</div>
                </div>
                <div class="mb-3">
                    <div class="text-muted">Alamat</div>
                    <div class="fw-bold">{{ $mahasiswa->alamat }}</div>
                </div>
            </form>
        </div>
    </div>
@endsection
