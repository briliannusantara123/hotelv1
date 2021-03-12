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
            <h1>Tambah Reservation diary</h1>
          </div>

        </section>
                  <div class="section-body">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                        
                          <a href=""value="Refresh Page" onClick="document.location.reload(true)" class="btn btn-warning">Reload</a>
                           <a href="/reservationdiary" class="btn btn-danger">Kembali</a>
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
                    <form method="POST" action="/reservationdiary/stores" enctype="multipart/form-data">
                        @csrf

                        <div class= "row">
 
                        <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">RSV DATE</label>
                                <input name="rsv_date"type="date" class="form-control" aria-describedby="emailHelp" id="rsv_date">
                              </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">          
                              <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input name="name"type="text" class="form-control" aria-describedby="emailHelp" id="name">
                              </div>    
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Adress</label>
                                <br>
                                <textarea name="adress" id="adress" style="width: 100%; height: 70px;"></textarea>
                              </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input name="phone"type="text" class="form-control" aria-describedby="emailHelp" id="phone">
                              </div>
                         </div>

                         <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Name Guest</label>
                                <input name="name_guest"type="text" class="form-control" aria-describedby="emailHelp" id="name_guest">
                              </div>
                         </div>

                         <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Person Guest</label>
                                <input name="person_guest"type="text" class="form-control" aria-describedby="emailHelp" id="person_guest">
                              </div>
                         </div>   

                         <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Date In</label>
                                <input name="date_in"type="date" class="form-control" aria-describedby="emailHelp" id="date_in">
                              </div>
                         </div>

                         <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Date Out</label>
                                <input name="date_out"type="date" class="form-control" aria-describedby="emailHelp" id="date_out">
                              </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Room Night</label>
                                <input name="room_night"type="text" class="form-control" aria-describedby="emailHelp" id="room_night">
                              </div>
                        </div>     

                        <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Room NO</label>
                                <input name="room_no"type="text" class="form-control" aria-describedby="emailHelp" id="room_no">
                              </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Remarks</label>
                                <br>
                                <textarea name="remarks" id="remarks" style="width: 100%; height: 70px;"></textarea>
                              </div>      
                          </div>                         

                        <div class="form-group">
                            <button class="btn btn-primary" style="width: 100%;">Simpan</button>
                        </div>

                        </div>
 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection