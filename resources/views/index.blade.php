@extends('master')
@section('title', 'Daftar Mahasiswa')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="mb-0 text-gray-800">Daftar Mahasiswa</h3>
            <a href="{{ route('students.create') }}" class="btn btn-sm btn-primary mt-4"><i class="fa-solid fa-user-plus"
                    style="margin-right: 5px"></i>Tambah Data Mahasiswa</a>
        </div>
        <hr>
        @if (Session::has('success-create'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success-create') }}
            </div>
        @endif
        @if (Session::has('success-update'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success-update') }}
            </div>
        @endif
        @if (Session::has('success-delete'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success-delete') }}
            </div>
        @endif
        <table id="example" class="table table-hover" style="width: 100%">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th class="text-center">NPM</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($students->count() > 0)
                    @foreach ($students as $student)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $student->npm }}</td>
                            <td class="align-middle">{{ $student->nama }}</td>
                            <td class="align-middle">{{ $student->kelas }}</td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-success mx-1 rounded-circle"
                                        href="{{ route('students.show', $student->id) }}" data-toggle="tooltip"
                                        title="View">
                                        <i class="fa fa-user fa-lg" style="color: white"></i>
                                    </a>
                                    <a href="{{ route('students.edit', $student->id) }}" data-toggle="tooltip"
                                        title="Edit" class="btn btn-primary btn-just-icon mx-1 rounded-circle">
                                        <i class="fa fa-pen-to-square fa-lg" style="color: white"></i>
                                    </a>
                                    <a class="btn btn-danger rounded-circle" data-bs-toggle="modal"
                                        data-bs-target="#myModal{{ $student->id }}" data-toggle="tooltip" title="Delete">
                                        <i class="fa fa-trash-can fa-lg" style="color: white"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">Mahasiswa Tidak Ada</td>
                    </tr>
                @endif
            </tbody>
        </table>

        {{-- modal --}}
        @foreach ($students as $student)
            <div class="modal" tabindex="-1" id="myModal{{ $student->id }}" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Data Mahasiswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Kamu yakin ingin menghapus user
                                <b>{{ $student->nama }}</b>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Iya</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    @endsection
