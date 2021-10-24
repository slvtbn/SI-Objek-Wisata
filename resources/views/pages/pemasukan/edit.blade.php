@extends('master')

@section('title', 'Edit Data Pemasukkan')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
     <div class="row">
        <div class="col-md-8">
          <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-credit-card"></i></span>
            <div class="info-box-content">
              <h4 class="text-bold">Pemasukan</h4>
              <h5>Edit Data Pemasukan</h5>
            </div>
          </div>
        </div>
      </div>
      <ol class="breadcrumb">
        <li><a href="#">Data Pemasukan</a></li>
        <li class="active">Data Pemasukan</li>
      </ol>
    </section>
    <section class="content">
        <div class="box">
             <form role="form" action="{{url('/pemasukan/update/'.$pemasukan->id_pemasukan)}}" method="post">
                {{csrf_field()}} 
                {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="id_pemasukan">Id</label>
                        <input type="text" class="form-control" id="id_pemasukan" placeholder="Masukkan Id" name="id_pemasukan" value="{{$pemasukan->id_pemasukan}}" autocomplete="off">
                        @if($errors->has('id_pemasukan'))
                        <span class="text-danger">
                            <strong>{{$errors->first('id_pemasukan')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Objek Wisata</label>
                        <select class="form-control" name="id_ow" id="id_ow">
                        <option value="">--- Pilih Objek Wisata ---</option>
                        @foreach($objek as $o)
                            <option value="{{$o->id_ow}}"
                            @if($o->id_ow === $pemasukan->id_ow)
                                selected
                            @endif
                            >{{$o->nama}}</option>
                        @endforeach
                        </select>
                        <span class="text-danger">
                            <strong>{{$errors->first('id_ow')}}</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{$pemasukan->tanggal}}" autocomplete="off">
                        @if($errors->has('tanggal'))
                        <span class="text-danger">
                            <strong>{{$errors->first('tanggal')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="jlh_pemasukan">Jumlah Pemasukan</label>
                        <input type="text" class="form-control" id="jlh_pemasukan" value="{{$pemasukan->jlh_pemasukan}}" name="jlh_pemasukan" autocomplete="off">
                        <span class="text-danger">
                            <strong>{{$errors->first('jlh_pemasukan')}}</strong>
                        </span>
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