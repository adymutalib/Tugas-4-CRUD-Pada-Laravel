@extends('template.main')
@section('container')
    {{-- @dd($car) --}}
    <div class="content">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="judulModal">Edit Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('home.update', $car->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="plat" class="form-label">Kode Wadai</label>
                            <input type="text" class="form-control" id="plat" placeholder="Kode Wadai"
                                name="plat" value="{{ $car->plat }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama_motor" class="form-label">Nama Wadai</label>
                            <input type="text" class="form-control" id="nama_motor" placeholder="Nama Wadai"
                                name="nama_motor" value="{{ $car->nama_motor }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Pembeli</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Pembeli" name="alamat"
                                value="{{ $car->alamat }}">
                        </div>

                </div>
                <div class="modal-footer">
                    <a href="{{ route('home.index') }}" class="btn btn-danger">Close</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
