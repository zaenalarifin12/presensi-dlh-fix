@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Edit Akun Pegawai</h1>
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
                <h4>Data Pegawai</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ url("pegawai/$user->id") }}">
                <div class="row">
                    <div class="form-group col-6">
                        <label>No THL berdasarkan TMT</label>
                        <input type="text" class="form-control @error('no_thl') is-invalid @enderror" name="no_thl" value="{{ old("no_thl") ? old("no_thl") : $user->no_thl }}">
                        @error("no_thl")
                            <div class="invalid-feedback"> 
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label>TMT pengangkatan Pertama</label>
                        <input type="date" class="form-control" name="tmt_pengangkatan_pertama" value="{{ old("tmt_pengangkatan_pertama") ? old("tmt_pengangkatan_pertama") : $user->tmt_pengangkatan_pertama }}">
                        @error("tmt_pengangkatan_pertama")
                            <div class="invalid-feedback"> 
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>Nama</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old("name") ? old("name") : $user->name }}">
                      @error("name")
                            <div class="invalid-feedback"> 
                                {{ $message }}
                            </div>
                        @enderror
                  </div>
                  <div class="form-group col-6">
                      <label>Tempat lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" value="{{ old("tempat_lahir") ? old("tempat_lahir") : $user->tempat_lahir }}">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>tanggal lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" value="{{ old("tanggal_lahir") ? old("tanggal_lahir") : $user->tanggal_lahir }}">
                  </div>
                  <div class="form-group col-6">
                      <label>tingkat pendidikan terkahir</label>
                      <input type="text" class="form-control" name="tingkat_pendidikan_terakhir" value="{{ old("tingkat_pendidikan_terakhir") ? old("tingkat_pendidikan_terakhir") : $user->tingkat_pendidikan_terakhir }}">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>Jurusan pendidikan terakhir</label>
                      <input type="text" class="form-control" name="jurusan_pendidikan_terakhir" value="{{ old("jurusan_pendidikan_terakhir") ? old("jurusan_pendidikan_terakhir") : $user->jurusan_pendidikan_terakhir }}">
                  </div>
                  <div class="form-group col-6">
                      <label>jabatan/tugas yang dilaksanakan</label>
                      <input type="text" class="form-control" name="jabatan" value="{{ old("jabatan") ? old("jabatan") : $user->jabatan }}">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>status tenaga non PNS dan NON PPPK</label>
                      <input type="text" class="form-control" name="status_tenaga" value="{{ old("status_tenaga") ? old("status_tenaga") : $user->status_tenaga }}">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>Unit kerja</label>
                      <input type="text" class="form-control" name="unit_kerja" value="{{ old("unit_kerja") ? old("unit_kerja") : $user->unit_kerja }}">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>keterangan</label>
                      <input type="text" class="form-control" name="keterangan" value="{{ old("keterangan") ? old("keterangan") : $user->keterangan }}">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-12">
                      <label>Password <span class="text-info">Diisi kalau mau ngedit</span></label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                      @error("password")
                          <div class="invalid-feedback"> 
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
                </div>
                @csrf
                @method("PUT")
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Edit
                  </button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection