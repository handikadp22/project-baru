@extends('layouts.main')



@section('konten')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
                Welcome back {{ auth()->user()->name }}
              <!-- /.d-flex -->
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-person"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pegawai Laki-Laki</span>
              <span class="info-box-number">
                {{ $pegawailaki }}
                <small>Orang</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-person-dress"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pegawai Perempuan</span>
              <span class="info-box-number">
                {{ $pegawaiperempuan }}
                <small>Orang</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Pegawai</span>
              <span class="info-box-number">
                {{ $jumlahpegawai}}
                <small>Orang</small>
              </span>
            </div>
  </section>
@endsection




