@extends('layout/main')

@section('content')

{{-- alert --}}
@if (session()->has('success'))   
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card shadow">
    <div class="container">
        <div class="card-header">
            <h3><b>Data Ruangan</b></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <a href="/ruang/create" class="btn btn-primary mb-3">Tambah Ruang</a>
                <div class="table-responsive">
                    <table id="datatable" class="table table-resposive">
                        <thead>
                            <tr>
                                <td class="p-sm-0">#</td>
                                <td>Nama Ruangan</td>
                                <td class="text-center">Lantai</td>
                                <td class="text-center">Kapasitas</td>
                                <td class="text-center">Foto Ruang</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruangs as $ruang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ruang->nama }}</td>
                                    <td class="text-center">{{ $ruang->lantai }}</td>
                                    <td class="text-center">{{ $ruang->kapasitas }}</td>
                                    @if ( $ruang->foto_ruang)
                                        <td>
                                            <img src="{{ asset('storage/' . $ruang->foto_ruang) }}" width="150" length="30">
                                        </td>
                                    @else
                                        <td>
                                            <img src="{{ asset('storage/ruang-images/default.jpg') }}" width="150" length="30">
                                        </td>
                                    @endif
                                    <td class="">
                                        <a href="" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat"><i class="far fa-eye"></i></a>
                                        <a href="/ruang/{{ $ruang->id }}/edit" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="far fa-edit"></i></a>
                                        <form action="/ruang/{{ $ruang->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
</div>
    
@endsection
