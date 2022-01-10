@extends('layout/main')

@section('content')
    <div class="card card-primary">
        <div class="container">
            <div class="card-header">
                <h3><b>Tambah Ruang</b></h3>
            </div>
            <div class="card-body">
                <div class="container row">
                    <form action="/ruang/{{ $ruang->id }}" method="post" class="col-lg-10">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Ruang</label>
                            <input name="nama" id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama', $ruang->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lantai">Lantai</label>
                            <select name="lantai" id="lantai" class="form-control @error('lantai') is-ivalid @enderror">
                                <option value="">-pilih lantai-</option>
                                <option value="1" @if (old('lantai', $ruang->lantai)==1) selected @endif>1</option>
                                <option value="2" @if (old('lantai', $ruang->lantai)==2) selected @endif>2</option>
                                <option value="3" @if (old('lantai', $ruang->lantai)==3) selected @endif>3</option>
                            </select>
                            @error('lantai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kapasitas">Kapasitas</label>
                            <input name="kapasitas" id="kapasitas" type="number" class="form-control @error('kapasitas') is-invalid @enderror"
                            value="{{ old('kapasitas', $ruang->kapasitas) }}">
                            @error('kapasitas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <tr>
                            <td>
                                <a href="/ruang" class="btn btn-secondary ">Kembali</a>
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