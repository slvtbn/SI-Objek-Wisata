@extends('master')

@section('title', 'Edit Data Fasilitas')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
       <div class="row">
        <div class="col-md-8">
          <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa  fa-coffee"></i></span>
            <div class="info-box-content">
              <h4 class="text-bold">Fasilitas</h4>
              <h5>Edit Data Fasilitas</h5>
            </div>
          </div>
        </div>
      </div>
      <ol class="breadcrumb">
        <li><a href="#">Data Fasilitas</a></li>
        <li class="active">Data Fasilitas</li>
      </ol>
    </section>
    <section class="content">
        <div class="box">
             <form role="form" action="{{url('/fasilitas/update/'.$fasilitas->id_fasilitas)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}} 
                {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="id_fasilitas">Id</label>
                        <input type="text" class="form-control" id="id_fasilitas" placeholder="Masukkan Id" name="id_fasilitas" value="{{$fasilitas->id_fasilitas}}" autocomplete="off">
                        @if($errors->has('id_fasilitas'))
                        <span class="text-danger">
                            <strong>{{$errors->first('id_fasilitas')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="keterangan" class="form-control" id="keterangan" placeholder="Masukkan Keterangan" name="keterangan" value="{{$fasilitas->keterangan}}" autocomplete="off">
                        @if($errors->has('keterangan'))
                        <span class="text-danger">
                            <strong>{{$errors->first('keterangan')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <img src="{{ asset('gambar_icon/'.$fasilitas->icon)}}" alt="" width="100px">
                    </div>

                    <div class="form-group">
                        <label for="inputIcon">Masukkan Icon</label>
                        <input type="file" id="inputIcon" name="icon" value="{{asset('gambar_icon/'.$fasilitas->icon)}}">
                        @if($errors->has('icon'))
                        <span class="text-danger">
                            <strong>{{$errors->first('icon')}}</strong>
                        </span>
                        @endif
                    </div> 
                </div>

                <div class="box-footer">
                    <input type="submit" class="btn btn-warning" value="Simpan">
                </div>
            </form>
        </div>
    </section>
</div>
@endsection