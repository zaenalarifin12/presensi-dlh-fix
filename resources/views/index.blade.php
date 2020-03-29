
@extends('layouts.parent')

@section('title')
    Home
@endsection

@section('css')
    
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Home</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Pegawai</h4>
                    </div>
                        <div class="card-body">
                        {{ $count_user }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection

@section('script')
    <!-- Page Specific JS File -->
    <script src="{{ asset("assets/js/page/index-0.js")}}"></script>
@endsection

