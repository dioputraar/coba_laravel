@extends('layout/main')

@section('content')
    <div class="card card-primary">
        <div class="container">
            <div class="card-header">
                <h3><b>Ubah Jabatan</b></h3>
            </div>
            <div class="card-body">
                <div class="container row">
                    <form action="/jabatan/{{ $jabatan->id }}" method="post" class="col-lg-10">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="jabatan">Nama Ruang</label>
                            <input name="jabatan" id="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror"
                            value="{{ old('jabatan', $jabatan->jabatan) }}">
                            @error('jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <tr>
                            <td>
                                <a href="/jabatan" class="btn btn-secondary ">Kembali</a>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary ">Simpan</button>
                            </td>
                        </tr>
                        
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection