@extends('layouts.app')

@section('content')
    <div class="card card-custom">
        <div class="card-header border-0 pt-2 pb-0">
            <div class="card-title">
                Mahasiswa
            </div>
            <div class="card-toolbar">
                <a class="btn btn-primary btn-sm" href="{{ route('mahasiswa.create') }}"> Tambah Mahasiswa</a>
            </div>
        </div>
        <div class="card-body pb-4">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="fw-normal text-center" width="20px">No</th>
                        <th class="fw-normal">Foto</th>
                        <th class="fw-normal">NIM</th>
                        <th class="fw-normal">Nama</th>
                        <th class="fw-normal">Jenis Kelamin</th>
                        <th class="fw-normal">Email</th>
                        <th class="fw-normal">Username</th>
                        <th class="fw-normal text-center" width="130px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($mahasiswa) < 1)
                        <tr>
                            <td colspan="8" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @else
                        @foreach ($mahasiswa as $mahasiswa)
                            <tr>
                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                <td class="align-middle d-flex justify-content-center align-items-center">
                                    @if($mahasiswa->foto)
                                        <img class="foto" src="{{ Storage::url($mahasiswa->foto) }}" alt="foto"/>
                                    @else
                                        <div class="symbol">{{ $mahasiswa->nama[0] }}</div>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $mahasiswa->nim }}</td>
                                <td class="align-middle">{{ $mahasiswa->nama }}</td>
                                <td class="align-middle">{{ $mahasiswa->jenkel }}</td>
                                <td class="align-middle">{{ $mahasiswa->user->email }}</td>
                                <td class="align-middle">{{ $mahasiswa->user->username }}</td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                                        <a class="btn btn-outline-success btn-sm" href="{{ route('mahasiswa.show', $mahasiswa->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirmatinModal({{ $mahasiswa->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var modalWrap = null;
        const confirmatinModal = (id) => {
            if (modalWrap !== null) {
                modalWrap.remove();
            }
            var url = '{{ route('mahasiswa.destroy',':id') }}';
            url = url.replace(':id',id);

            modalWrap = document.createElement('div');
            modalWrap.innerHTML = `
            <div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="confirmLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body text-center pt-4">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                            </div>
                            Apakah Anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer justify-content-center border-0 pb-4">
                            <form action=${url} method="POST">
                                <button type="button" class="btn btn-outline-secondary btn-sm me-2 px-4" data-bs-dismiss="modal">Tidak</button>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary btn-sm px-4" type="submit">Ya</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>`;

            document.body.append(modalWrap);

            var modal = new bootstrap.Modal(modalWrap.querySelector('.modal'));
            modal.show();
        }
    </script>
@endsection