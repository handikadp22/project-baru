@extends('layouts.main')
@section('konten')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>


<div class="container mt-1 col-lg-11 ml-5">
    @if ($message = Session::get('success'))  
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @else
    @if ($message = Session::get('danger'))
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @else
    @if ($message = Session::get('update'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif  
    @endif
    @endif
    
    <div class="card"> 
        <div class="card-body"> 
            <h2 class="text-center">Daftar Data Pegawai</h2>         
    <a href="/tambahpegawai"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
    
    <div class="row g-3 ">
        <div class="col-auto"> 
                <form action="/pegawai" method="GET">
                    @csrf
                <input type="search" id="search" name="search" class="form-control mb-3">                  
            </form>                                
        </div>
        <div class="col-auto">
            <a href="/exportpdf"><button type="button" class="btn btn-info mb-3">Export PDF</button></a>              
        </div>
    </div>
    
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No Hp</th>
                <th scope="col">Foto</th>
                <th scope="col">Tanggal dibuat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $index=>$dt)
                <tr>
                  <th scope="row">{{ $index + $data->firstItem()}}</th>
                  <td>{{ $dt->nama }}</td>
                  <td>{{ $dt->jenis_kelamin }}</td>
                  <td>0{{ $dt->no_hp }}</td>
                  <td>
                      <img src="{{ asset('fotopegawai/'.$dt->image) }}" alt="" style="width: 50px;">
                  </td>
                  <td>{{ $dt->created_at->format('D N Y') }}</td>
                  <td>
                      <a href="/tampildata/{{$dt->id}}"><button type="button" class="btn btn-success"><i class="fa-solid fa-pen"></i></button></a>
                      <a href="#" class="btn btn-danger delete" data-nama="{{ $dt->nama }}" data-id="{{ $dt->id }}" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>  
                @endforeach
            </tbody>
          </table>
          {{ $data->links() }}
    </div>
</div>  
</div> 
</div>
<script>
    $('.delete').click(function(){     
        var pegawaiid=$(this).attr('data-id') 
        var pegawainame=$(this).attr('data-nama') 
        Swal.fire({
        title: 'Are you sure?',
        text: "you will delete data with name "+pegawainame+"",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location="/hapusdata/"+pegawaiid+""
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })
    })
</script>
@endsection

