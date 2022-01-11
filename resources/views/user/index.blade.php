@extends('layout/main')

@section('content')
    
    
<div class="card shadow">
    <div class="container">
        <div class="card-header">
            <h3><b>Data Pengguna</b></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="table-responsive">
                    <table id="datatable" class="table table-resposive">
                        <thead>
                            <tr>
                                <td class="p-sm-0">No</td>
                                <td>Username</td>
                                <td>Nama</td>
                                <td>Jabatan</td>
                                <td>Email</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->jabatan->jabatan }}</td>
                                    <td>{{ $user->email }}</td>
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