@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset("assets/daterangepicker.css")}}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Daftar kehadiran</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Modules</a></div>
        <div class="breadcrumb-item">DataTables</div>
      </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                <div class="card-body">
                    <div class="row center">
                      <form action="{{ url("/kehadiran") }}" method="get">
                        <div class="col">
                          <div class="form-group mb-3">
                            <label>Mulai</label>
                            @if (!empty($mulai))
                              <input type="text" class="form-control datepicker" name="mulai" value="{{ $mulai }}">    
                            @else
                              <input type="text" class="form-control datepicker" name="mulai">    
                            @endif
                            
                          </div>                    
                          <div class="form-group">
                            <label>Sampai</label>
                            @if (!empty($selesai))
                              <input type="text" class="form-control datepicker" name="selesai" value="{{ $selesai }}">
                            @else
                              <input type="text" class="form-control datepicker" name="selesai">
                            @endif
                            
                          </div>  


                          
                          <div class="form-group">
                            <label>Tugas</label>
                            <select name="tugas" id="" class="form-control" name="tugas">
                              @foreach ($tugas as $item)
                                @if (!empty($tugas_recent))
                                  @if ($tugas_recent == $item->jabatan)
                                    <option selected value="{{$item->jabatan}}">{{$item->jabatan}}</option>    
                                  @else
                                    <option value="{{$item->jabatan}}">{{$item->jabatan}}</option>    
                                  @endif
                                @else
                                  <option value="{{$item->jabatan}}">{{$item->jabatan}}</option>    
                                @endif
                              @endforeach
                            </select>
                          </div>      

                          <div class="form-group">
                            <label>Jam Waktu</label>
                            <select name="waktu" id="" class="form-control" name="waktu">
                              @if (!empty($waktu))
                                @if ($waktu == "pagi")
                                  <option selected value="pagi">Pagi</option>
                                  <option value="sore">Sore</option>
                                @else
                                  <option value="pagi">Pagi</option>
                                  <option selected value="sore">Sore</option>
                                @endif
                              @else
                                <option value="pagi">Pagi</option>
                                <option value="sore">Sore</option>                                  
                              @endif
                            </select>
                          </div>      
                            <input type="submit" name="action" class="btn btn-primary px-5" value="cari">
                            <input type="submit" name="action" class="btn btn-info px-5" value="cetak">
                        </div>
                      </form>
                    </div>
                </div>
                </div>
            </div>
        </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Kehadiran </h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th class="text-center"> No </th>
                        <th>Nama</th>
                        @php
                            $start_date = $mulai;
                            $end_date   = $selesai;

                            while (strtotime($start_date) <= strtotime($end_date)) {
                                echo "<th>" . \App\Helper\Helper::tgl_indo( date('Y-m-d', strtotime($start_date)))  . "</th>";
                                $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
                            }
                        @endphp   
                      </tr>
                    </thead>
            
                    <tbody>
                      @foreach($user as $item)
                        <tr>
                          <td> {{ $loop->iteration }} </td>
                          <td>{{ $item->name }}</td>   

                          @php
                              $start_date = $mulai;
                              $end_date   = $selesai;                           
                              $mulai_saya = $start_date;
                          @endphp

                          @foreach ($item->kehadirans as $kehadiran)
                              @php
                                while (strtotime($mulai_saya) <= strtotime($end_date)) {
                                  
                                  $ts    = strtotime($kehadiran->time);
                                  $hasil = date('Y-m-d', $ts);
                                  if ($hasil == $mulai_saya){
                                    echo "<td>" . \App\Helper\Helper::tgl_indo( date('Y-m-d', strtotime($kehadiran->time))) ."</td>";
                                    $mulai_saya = date ("Y-m-d", strtotime("+1 days", strtotime($mulai_saya)));
                                    break;
                                  }
                                    echo "<td></td>";
                                    $mulai_saya = date ("Y-m-d", strtotime("+1 days", strtotime($mulai_saya)));
                                }
                              @endphp   
                          @endforeach
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
    <script src="{{ asset("assets/daterangepicker.js")}}"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
    </script>
@endsection