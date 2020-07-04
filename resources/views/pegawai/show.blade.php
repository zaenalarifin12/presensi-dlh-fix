@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Lihat Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item"><a href="#">Profil</a></div>
        <div class="breadcrumb-item">{{$pegawai->name}}</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4>Profil pegawai {{ $pegawai->name  }}</h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="nama">No THL berdasarkan TMT</label>
                            <input disabled id="nama" type="text" class="form-control" value="{{ $pegawai->no_thl }}">
                        </div>
                        <div class="form-group col-6">
                            <label for="nip">TMT pengangkatan Pertama</label>
                            <input disabled id="nip" type="text" class="form-control" value="{{ \App\Helper\Helper::tgl_indo( date('Y-m-d', strtotime($pegawai->tmt_pengangkatan_pertama)))  }}">
                        </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>Nama</label>
                          <input disabled type="text" class="form-control" value="{{ $pegawai->name }}">
                      </div>
                      <div class="form-group col-6">
                          <label>Tempat lahir</label>
                          <input disabled type="text" class="form-control" value="{{ $pegawai->tempat_lahir }}">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>tanggal lahir</label>
                          <input disabled type="text" class="form-control" value="{{ \App\Helper\Helper::tgl_indo( date('Y-m-d', strtotime($pegawai->tanggal_lahir))) }}">
                      </div>
                      <div class="form-group col-6">
                          <label>tingkat pendidikan terkahir</label>
                          <input disabled type="text" class="form-control" value="{{ $pegawai->tingkat_pendidikan_terakhir}}">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>Jurusan pendidikan terakhir</label>
                          <input disabled type="text" class="form-control" value="{{ $pegawai->jurusan_pendidikan_terakhir }}">
                      </div>
                      <div class="form-group col-6">
                          <label>jabatan/tugas yang dilaksanakan</label>
                          <input disabled type="text" class="form-control" value="{{ $pegawai->jabatan}}">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>status tenaga non PNS dan NON PPPK</label>
                          <input disabled type="text" class="form-control" value="{{ $pegawai->status_tenaga}}">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>Unit kerja</label>
                          <input disabled type="text" class="form-control" value="{{ $pegawai->unit_kerja }}">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>keterangan</label>
                          <input disabled type="text" class="form-control" value="{{ $pegawai->keterangan }}">
                      </div>
                    </div>

                    <div class="form-group">
                    <a href="{{ url("/pegawai") }}" class="btn btn-lg btn-block btn-outline-primary">
                        Kembali
                    </a>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection