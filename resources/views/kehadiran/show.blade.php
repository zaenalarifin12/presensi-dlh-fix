@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset("assets/daterangepicker.css")}}">

    <style>
      .img-prev{
          width: 500px;
        }
      @media only screen and (max-width: 800px) {
        /* For mobile phones: */
        .img-prev{
          width: 200px;
        }
      }
    </style>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Kehadiran</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item">kehadiran</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Kehadiran </h4>
            </div>
            <div class="card-body">


              <div class="d-flex justify-content-center">
                <a href="{{ url("/kehadiran/terkini") }}" class="btn btn-block btn-outline-success btn-sm">Kembali ke daftar</a>
              </div>

              <div class="d-flex justify-content-between mt-2">
                @if ($next == null)
                  <a href="{{ url("/kehadiran/terkini/$previous") }}" class="btn btn-outline-primary btn-sm">Sebelumnya</a>
                  <span></span>
                @elseif($previous == null)
                  <span></span>
                  <a href="{{ url("/kehadiran/terkini/$next") }}" class="btn btn-outline-primary btn-sm">Selanjutnya</a>
                @else
                  <a href="{{ url("/kehadiran/terkini/$previous") }}" class="btn btn-outline-primary btn-sm">Sebelumnya</a>
                  <a href="{{ url("/kehadiran/terkini/$next") }}" class="btn btn-outline-primary btn-sm">Selanjutnya</a>
                @endif
              </div>

              <div class="d-flex justify-content-center">
                <p class="lead">{{ $kehadiran->user->name }}</p>
              </div>
              <div class="d-flex justify-content-center">
                <p class="lead">{{ $kehadiran->user->jabatan }}</p>
              </div>
              <div class="d-flex justify-content-center">
                <p class="lead">{{ $kehadiran->time }}</p>
              </div>
                            
              <div class="d-flex justify-content-center my-1">
                <img src="{{ asset("/storage/presensi/$kehadiran->image") }}" class="img-prev" height="auto" alt="">
              </div>
              <div class="d-flex justify-content-center my-1 ">
                <p class="lead">Lokasi : {{ $kehadiran->lokasi }}</p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
    <script src="{{ asset("assets/daterangepicker.js")}}"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
    </script>
@endsection