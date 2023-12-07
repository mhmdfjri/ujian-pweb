@extends('master')
@section('title', 'Edit Mahasiswa')
@section('content')
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Edit Student</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="npm" class="form-label">NPM</label>
                            <input type="text" name="npm" class="form-control" placeholder="NPM" required
                                value="{{ old('npm', $student->npm) }}">
                            @if ($errors->has('npm'))
                                <div class="text-danger">
                                    <small class="mt-2">{{ $errors->first('npm') }}</small>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" required
                                value="{{ old('nama', $student->nama) }}">
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-control" placeholder="Kelas" required
                                value="{{ old('kelas', $student->kelas) }}">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" required
                                value="{{ old('jurusan', $student->jurusan) }}">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Handphone</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="No.Hp" required
                                value="{{ old('no_hp', $student->no_hp) }}">
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a href="{{ route('students.index') }}" class="btn btn-danger mx-2">Cancel</a>
                                <a class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#myModal{{ $student->id }}">Submit</a>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal" tabindex="-1" id="myModal{{ $student->id }}" data-bs-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Mahasiswa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Kamu yakin ingin Mengubah user <b>{{ $student->nama }}</b></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('students.update', $student->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary">Iya</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
