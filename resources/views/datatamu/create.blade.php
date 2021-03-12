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
            <h1>Tambah Data Tamu</h1>
          </div>

        </section>
                  <div class="section-body">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                        
                          <a href=""value="Refresh Page" onClick="document.location.reload(true)" class="btn btn-warning">Reload</a>
                           <a href="/datatamu" class="btn btn-danger">Kembali</a>
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
                    <form method="POST" action="/datatamu/stores" enctype="multipart/form-data">
                        @csrf
 
                        
                              <div class="form-group">
                                <label for="exampleInputEmail1">Guest Name</label>
                                <input name="nama"type="text" class="form-control" aria-describedby="emailHelp" id="nama">

                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Room Number</label>
                               <input name="room"type="text" class="form-control" aria-describedby="emailHelp" id="room">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Arrival Date</label>
                                <input name="arrival_date"type="date" class="form-control" id="arrival_date" aria-describedby="emailHelp">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Departure Date</label>
                               <input name="departure_date"type="date" class="form-control" id="departure_date" aria-describedby="emailHelp">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Number of people</label>
                                <input name="jumlah_orang"type="number" class="form-control" id="jumlah_orang" aria-describedby="emailHelp">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Market Segment</label>
                                <input name="market"type="text" class="form-control" id="market" aria-describedby="emailHelp">
                              </div>
                               <div class="form-group">
                                <label class="col-sm-2 control-label">Foto KTP</label>
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