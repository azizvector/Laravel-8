@extends('layouts.app')

@section('content')
    <div class="card card-custom">
        <div class="card-header border-0 pt-2 pb-0">
            <div class="card-title">
                Tambah Kategori
            </div>
        </div>
        <div class="card-body pb-4">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class=" d-flex justify-content-center mt-4">
                    <a class="btn btn-outline-secondary btn-sm me-2 px-4" href="{{ route('kategori.index') }}"> Batal</a>
                    <button class="btn btn-primary btn-sm px-4" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection