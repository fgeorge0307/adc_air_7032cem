@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
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
                <h3 class="card-title">Maintenance Record</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" action="{{ route('add_maintenance') }}">
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
                          <input type="text" class="form-control" placeholder="Aircraft No" name="aircraft" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="checks">Check Type</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                          </div>
                          <input list="checks" autocomplete="checks" type="text" class="form-control" placeholder="A Check|B Check|C Check|D Check" name="checks" required>
                          <datalist id="checks">
                            <option value="A Check">
                            <option value="B Check">
                            <option value="C Check">
                            <option value="D Check">
                        </datalist>
                      </div>
                  </div>





                  <div class="form-group">
                      <label for="man_hours">Man Hours (Hours)</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                          </div>
                          <input type="number" class="form-control" placeholder="Man Hours" name="man_hours">
                      </div>
                  </div>
                  

                  <div class="form-group">
                      <button type="submit" class="btn btn-primary">Add Maintenance Record</button>
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

    
@endsection