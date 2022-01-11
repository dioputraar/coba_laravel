@extends('layout/main')

@section('content')
    <div class="card card-primary">
        <div class="container">
            <div class="card-header">
                <h3><b>Tambah Ruang</b></h3>
            </div>
            <div class="card-body">
                <div class="container row">
                    <form action="/ruang/{{ $ruang->id }}" method="post" class="col-lg-10" enctype="multipart/form-data">
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

                        <div class="form-group">
                            <label for="foto_ruang">Foto Ruangan</label>
                            <input name="oldImage" type="hidden" value="{{ $ruang->foto_ruang }}">
                            @if ($ruang->foto_ruang)
                                <img src="{{ asset('storage/' . $ruang->foto_ruang) }}" class="img-preview img-fluid mb-3 col-sm-2 d-block" >  
                            @else
                                <img src="{{ asset('storage/ruang-images/default.jpg') }}" class="img-preview img-fluid mb-3 col-sm-2 d-block" >
                            @endif
                            
                            <input name="foto_ruang" id="foto_ruang" type="file" class="form-control  @error('foto_ruang') is-invalid @enderror"
                            onchange="previewImage()">
                            @error('foto_ruang')
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
<script>
    function previewImage() {
            const image = document.querySelector('#foto_ruang');
            const imgPreview = document.querySelector('.img-preview');
    
            imgPreview.style.display = 'block';
            
            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto_ruang.files[0]);
    
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection