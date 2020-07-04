@extends('layouts.parent')

@section('css')
  
<link rel="stylesheet" href="{{ asset("assets/modules/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{ asset("assets/modules/select.bootstrap4.min.css")}}">
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

      @if (session("err"))
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{ session("err") }}
        </div>
      </div>
      @endif

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="container">
                <div class="row">
                <h4>Daftar Pegawai</h4>
              </div>
              <div class="row">
                <a href="{{ url("pegawai/create") }}" class="btn btn-info px-5 pull-right mr-3">Tambah</a>
              
                <form action="{{ url("/pegawai/import") }}" method="post" enctype="multipart/form-data">
                  <input type="file" name="file" id="" required accept=".xls, .xlsx">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-outline-success">Import</button>
                </form>
              </div>
              <div class="row mt-4">
                <a href="https://drive.google.com/drive/folders/1BZ2618b5VD0hNQ5AvFNqWqXlxR9IJxsx?usp=sharing" class="btn btn-primary">Template</a>
              </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped hover" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center"> Nomor </th>
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
                          <td> {{ $loop->iteration  }} </td>
                          <td> {{ $item->no_thl }} </td>
                          <td> {{ \App\Helper\Helper::tgl_indo( date('Y-m-d', strtotime($item->tmt_pengangkatan_pertama)))  }} </td>
                          <td> {{ $item->name }} </td>
                          <td> {{ $item->tempat_lahir }} </td>
                          <td> {{ \App\Helper\Helper::tgl_indo( date('Y-m-d', strtotime($item->tanggal_lahir)))  }} </td>
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
                                <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Kamu yakin akan menghapus data ini ?');"
                                > Hapus </button>
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
    {{-- <script src="{{ asset("assets/js/page/modules-datatables.js")}}"></script> --}}

    <script src=" {{ asset("assets/modules/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/modules/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{ asset("assets/modules/select.bootstrap4.min.js")}}"></script>
    <script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
    </script>
@endsection