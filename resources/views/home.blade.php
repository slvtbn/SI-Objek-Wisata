@extends('master')

@section('title', 'Dashboard')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="info-box">
          <span class="info-box-icon bg-yellow"><img src="{{asset('data_file')}}/rocket.png" alt=""></span>
            <div class="info-box-content">
              <h4 class="text-bold text-yellow">Selamat Datang, Admin!</h4>
              <h5> Karang Panas | Sistem Informasi Objek Wisata di Biak Papua</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>  
@endsection
