@extends('master')
@section('title','Info Mahasiswa')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Detail Student</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>NPM</th>
                                <td>{{ $student->npm }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $student->nama }}</td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>{{ $student->kelas }}</td>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td>{{ $student->jurusan }}</td>
                            </tr>
                            <tr>
                                <th>No Handphone</th>
                                <td>{{ $student->no_hp }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mb-3">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a href="{{ route('students.index') }}" class="btn btn-danger mx-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
