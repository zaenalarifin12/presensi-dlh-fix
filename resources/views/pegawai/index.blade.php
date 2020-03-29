@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Daftar Pegawai</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Modules</a></div>
        <div class="breadcrumb-item">DataTables</div>
      </div>
    </div>

    <div class="section-body">

      @if (session("msg"))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{ session("msg") }}
        </div>
      </div>
      @endif

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Pegawai</h4>
              <a href="{{ url("pegawai/create") }}" class="btn btn-info px-5 pull-right">Tambah</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped hover" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center"> # </th>
                        <th>No THL</th>
                        <th>TMT pengangkatan kerja pertama</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Tingkat Pendidikan Terakhir</th>
                        <th>Jurusan Pendidikan Terakhir</th>
                        <th>Jabatan</th>
                        <th>Status Tenaga</th>
                        <th>unit Kerja</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $item)
                        <tr>
                          <td> 1 </td>
                          <td> {{ $item->no_thl }} </td>
                          <td> {{ $item->tmt_pengangkatan_pertama }} </td>
                          <td> {{ $item->name }} </td>
                          <td> {{ $item->tempat_lahir }} </td>
                          <td> {{ $item->tanggal_lahir }} </td>
                          <td> {{ $item->tingkat_pendidikan_terakhir }} </td>
                          <td> {{ $item->jurusan_pendidikan_terakhir }} </td>
                          <td> {{ $item->jabatan }} </td>
                          <td> {{ $item->status_tenaga }} </td>
                          <td> {{ $item->unit_kerja }} </td>
                          <td> {{ $item->keterangan }} </td>
                          <td >
                              <a href="{{ url("/pegawai/$item->id") }}" class="btn btn-secondary btn-sm">Detail</a>
                              <a href="{{ url("/pegawai/$item->id/edit") }}" class="btn btn-primary btn-sm">Edit</a>
                              <form action="{{ url("pegawai/$item->id") }}" method="post" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger btn-sm"> Hapus </button>
                              </form>
                          </td>
                        </tr>
                      @endforeach
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
    <script src="../assets/js/page/modules-datatables.js"></script>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
    </script>
@endsection