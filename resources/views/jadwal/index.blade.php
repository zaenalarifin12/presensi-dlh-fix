@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Daftar Jadwal</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item">Jadwal</div>
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
              <h4>Daftar Jadwal</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center"> # </th>
                        <th>Hari</th>
                        <th>Jam mulai</th>
                        <th>jam selesai</th>
                        <th>lembur mulai</th>
                        <th>lembur selesai</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($jadwal as $item)
                        <tr>
                          <td> {{ $loop->iteration }} </td>
                          <td> {{ $item->nama_hari }}</td>
                          <td> {{ $item->jam_mulai ? $item->jam_mulai : "-" }}</td>
                          <td> {{ $item->jam_selesai ? $item->jam_selesai : "-" }}</td>
                          <td> {{ $item->lembur_mulai ? $item->lembur_mulai : "-" }}</td>
                          <td> {{ $item->lembur_selesai ? $item->lembur_selesai : "-" }}</td>
                          <td> 
                            @if ($item->status == 1)
                                <p class="text-success"> Masuk </p>
                            @else
                                <p class="text-danger">  Libur </p>
                            @endif
                            </td>
                          <td>
                              <a href="{{ url("/jadwal/$item->id/edit") }}" class="btn btn-primary btn-sm">Edit</a>
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

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    
    </script>
@endsection