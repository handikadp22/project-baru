
<!-- Main Sidebar Container -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('template/dist/img/pabrik.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Pegawai</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template/dist/img/handika.jpg') }}" width="80px" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header" style="font-size: 20px">Dashboard</li>
            <li class="nav-item ">
                <a href="{{'/' }}" class="nav-link {{ Request::path() == ('/') ? 'bg-primary' : '' }}">  
                    <i class="fa-solid fa-gauge"></i>  
                    <p>&nbsp welcome</p>
                </a>
            </li>
        <li class="nav-header" style="font-size: 20px">Data</li>
            <li class="nav-item">
                <a href="{{ route('pegawai') }}" class="nav-link {{ Request::path() == 'pegawai' ? 'bg-primary' : '' }}">
                    <i class="fa-solid fa-file"></i>
                    <p>&nbsp Data Pegawai</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('barang') }}" class="nav-link {{ Request::path() == 'barang' ? 'bg-primary' : '' }}">
                    <i class="fa-solid fa-cube"></i>
                    <p>&nbsp Data barang</p>
                </a>
                <hr color="#74959A">
            </li>
            <li class="nav-item">
                <a href="{{route('logout') }}" class="nav-link button" name="logout" id="logout">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <p>&nbsp logout</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <script>
      $('#logout').on("click",function(){

    
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })
    })
      </script>
  </aside>

