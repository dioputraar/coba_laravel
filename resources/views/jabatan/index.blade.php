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
            <h3><b>Data Jabatan</b></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <a href="/jabatan/create" class="btn btn-primary mb-3">Tambah Jabatan</a>
                <div class="table-responsive">
                    <table id="datatable" class="table table-resposive">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Jabatan</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatans as $jabatan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jabatan->jabatan }}</td>
                                    <td class="">
                                        <a href="" class="btn btn-info"><i class="far fa-eye"></i></a>
                                        <a href="/jabatan/{{ $jabatan->id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                        <form action="/jabatan/{{ $jabatan->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
