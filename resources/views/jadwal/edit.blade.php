@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Edit Jadwal hari {{ $jadwal->nama_hari }}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item">Edit hari {{ $jadwal->nama_hari }}</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4>jadwal hari {{ $jadwal->nama_hari }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url("/jadwal/$jadwal->id") }}">
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Jam mulai</label>
                            <input type="time" class="form-control" name="jam_mulai" value="{{ $jadwal->jam_mulai }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Jam Selesai</label>
                            <input type="time" class="form-control" name="jam_selesai" value="{{ $jadwal->jam_selesai }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Lembur Mulai</label>
                            <input type="time" class="form-control" name="lembur_mulai" value="{{ $jadwal->lembur_mulai }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Lembur Selesai</label>
                            <input type="time" class="form-control" name="lembur_selesai" value="{{ $jadwal->lembur_selesai }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="custom-switch mt-2">
                              <input type="checkbox" name="status" class="custom-switch-input" {{ $jadwal->status == 1 ? "checked" : null }}>
                              <span class="custom-switch-indicator"></span>
                              <span class="custom-switch-description">masuk</span>
                            </label>
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