

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@extends('layouts.main')
    <title>Tambah Data</title>

    @section('konten')
    <h1 class="text-center">Tambah Data</h1>
    
    <div class="container mt-3">

        <div class="row justify-content-center">
          <div class="col-lg-8">
            <a href="/pegawai"><button type="button" class="btn btn-success mb-3"><- back to data pegawai</button></a>
            <div class="card">
              <div class="card-body">
                <form action="/insertdata" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control @error ('nama') is-invalid @enderror" id="nama" aria-describedby="emailHelp">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select @error ('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" aria-label="Default select example">
                      @error('jenis_kelamin')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                      <option selected value="laki-laki">laki-laki</option>
                      <option value="perempuan">perempuan</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" >No Hp</label>
                    <input type="number" name="no_hp" class="form-control @error ('no_hp') is-invalid @enderror" id="no_hp" aria-describedby="emailHelp">
                    @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label" >Masukkan Foto</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input type="file" name="image" class="form-control @error ('image') is-invalid @enderror" id="image" onchange="previewImage()" required>
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    @endsection

    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
      function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
     }
    </script>
