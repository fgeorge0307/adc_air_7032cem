@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">AirFrames</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

  <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Register Airframe</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" action="{{ route('add_airframe') }}">
                    {{ csrf_field() }}
                  <div class="card-body">

                    <div class="row">
                        @if(session()->has('message'))
                            <div class="alert alert-light col-6" id="removenotice" style="color:green">
                                <strong>{{ session()->get('message') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="aircraft">Aircraft No</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-plane"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Aircraft No" name="aircraft">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="model">Aircraft Model</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-plane"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Aircraft Model" name="model">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="a_check">A Check</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-plane"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="A Check (hours)" name="a_check">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="b_check">B Check</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-plane"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="B Check (hours)" name="b_check">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="c_check">C Check</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-plane"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="C Check (hours)" name="c_check">
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="c_check">D Check</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-plane"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="D Check (hours)" name="d_check">
                      </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register Airframe</button>
                    </div>


                  </div>
                  <!-- /.card-body -->
  
                  
                </form>
              </div>
              <!-- /.card -->
  
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    
@endsection