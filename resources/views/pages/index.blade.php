@extends('template.main')
@section('container')
    {{-- @dd($user) --}}
    <h1>Data User</h1>
    @if (session()->has('success'))
        <div class="alert alert-succes alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('LoginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('LoginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <button type="button" class="btn btn-primary tombolTambahData mt-2" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data
    </button>
    @csrf
    <h1>Daftar User</h1>
    <div class="d-flex flex-wrap">
        @foreach ($user as $usr)
            <div class="card m-3 bg-warning" style="width: 40rem;">
                {{-- <img src="img/{{ $car->gambar }}" class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">Username : {{ $usr->name }}</h5>
                    <p class="card-text">Email : {{ $usr->email }}</p>
                    {{-- <p class="card-text">Password : {{ $usr->password }}</p> --}}
                    <a href="{{ route('pages.edit', $usr->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('pages.destroy', $usr->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                            onclick="confirm('Anda yakin akan meenghapus data ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    {{ $user->links() }}
@endsection
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pages.store') }}" method="post" enctype="multipart/form-data">
                    {{-- @method('put') --}}
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" placeholder="Username" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" id="password" placeholder="password"
                            name="password">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah data</button>
            </div>
            </form>
        </div>
    </div>
</div>
