@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Daftar Pegawai Masuk hari ini</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Modules</a></div>
        <div class="breadcrumb-item">DataTables</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4>Daftar Pegawai</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center"> # </th>
                      <th>Nama</th>
                      <th>Foto</th>
                      <th>Nama Jalan</th>
                      <th>Desa</th>
                      <th>Kecamatan</th>
                      <th>Waktu</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td> 1 </td>
                        <td>Joni</td>
                        <td>
                            <img alt="image" src="{{ asset("assets/img/avatar/avatar-5.png")}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                        </td>
                        <td><b>Belok kiri lurus wae<b></td>
                        <td>Ujung batu</td>
                        <td>Ujung batu</td>
                        <td>Jam menit detik</td>
                        <td>
                            <span class="text-success font-weight-bold">Hadir</span>
                        </td>
                        <td>
                            <a href="{{ url("/pegawai/show") }}" class="btn btn-secondary">Detail</a>
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>

                    <tr>
                        <td> 2 </td>
                        <td>Jono</td>
                        <td>
                          <img alt="image" src="{{ asset("assets/img/avatar/avatar-5.png")}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                        </td>
                        <td>Jalan xyz</td>
                        <td>Ujung batu</td>
                        <td>Ujung batu</td>
                        <td>09-11-32</td>
                        <td>
                            <span class="text-danger font-weight-bold">Belum Hadir </span>
                        </td>
                        <td>
                            <a href="{{ url("/pegawai/show") }}" class="btn btn-secondary">Detail</a>
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
    <!-- Page Specific JS File -->
    <script src="{{ asset("assets/js/page/modules-datatables.js")}}"></script>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
    </script>
@endsection