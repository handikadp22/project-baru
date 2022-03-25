@extends('layouts.main')

   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Edit Data</title>
    
    
   @section('konten')
   <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <a href="/pegawai"><button type="button" class="btn btn-success mb-3"><- back to data pegawai</button></a>
        <div class="card">
          <div class="card-body">
            <h1 class="text-center">Edit Data</h1>
            <form action="/editpegawai/{{ $data->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" value="{{old('nama', $data->nama) }} " name="nama" class="form-control @error ('nama') is-invalid @enderror" id="nama" aria-describedby="emailHelp">
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror  
            </div>
              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                <select class="form-select" name="jenis_kelamin">
                  <option selected >{{ old('jenis_kelamin', $data->jenis_kelamin)}}</option>
                  <option value="laki-laki">laki-laki</option>
                  <option value="perempuan">perempuan</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">No Hp</label>
                <input value="{{ old('no_hp', $data->no_hp)}}" type="number" name="no_hp" class="form-control @error ('no_hp') is-invalid @enderror" id="no_hp" aria-describedby="emailHelp">
                @error('no_hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror  
            </div>
              <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="hidden" name="oldImage" value="{{ $data->image }}">
                    @if ($data->image)
                    <img src="{{ asset('fotopegawai/'.$data->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @endif
                <input value="{{ old('image', $data->image)}}" type="file" name="image" class="form-control @error ('image') is-invalid @enderror" id="image" aria-describedby="emailHelp" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror  
            </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
   @endsection    