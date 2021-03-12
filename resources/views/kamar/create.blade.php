@extends('layouts.master')
@section('content')

<style type="text/css">
    .container  .card{
        margin-top: 15%;
        margin-left: 200px;
    }
</style>

 <div class="main">
    <div class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                  <section class="section">
          <div class="section-header">
            <h1>Tambah Kamar</h1>
          </div>

        </section>
                  <div class="section-body">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                        
                          <a href=""value="Refresh Page" onClick="document.location.reload(true)" class="btn btn-warning">Reload</a>
                           <a href="/kamar" class="btn btn-danger">Kembali</a>
                <br>

                          @if($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif
                      </div>
                    </div>
                    <br>
                   
                </div>
 
                <div class="card-body">
                    <form method="POST" action="/kamar/stores" enctype="multipart/form-data">
                        @csrf
 
                        
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kamar</label>
                                <input name="namakamar"type="text" class="form-control" aria-describedby="emailHelp" id="namakamar">

                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Tipe Kamar</label>
                                <select name="id_tipekamar" class="form-control"  id="id_tipekamar">
                                  @foreach($tipekamar as $tipekamar)
                                  <option value="{{$tipekamar->tipekamar}}">{{$tipekamar->tipekamar}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Fasilitas Kamar</label>
                                <input name="id_fasilitaskamar"type="text" class="form-control" id="id_fasilitaskamar" aria-describedby="emailHelp">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi Kamar</label>
                                <br>
                                <textarea name="deskripsi" id="deskripsi" style="width: 100%; height: 70px;"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Kamar</label>
                                <input name="jumlahkamar"type="number" class="form-control" id="jumlahkamar" aria-describedby="emailHelp">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Harga Kamar</label>
                                <input name="hargakamar"type="text" class="form-control" id="hargakamar" aria-describedby="emailHelp">
                              </div>
                               <div class="form-group">
                                <label class="col-sm-2 control-label">Gambar</label>
                                <div class="col-sm-12">
                                <input id="image" type="file" name="image" accept="image/*" onchange="readURL(this);">
                                <input type="hidden" name="hidden_image" id="hidden_image">
                                </div>
                                <br>
                               

                        <div class="form-group">
                            <button class="btn btn-primary" style="width: 100%;">Simpan</button>
                        </div>
 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection