@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Administrator</h1>
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
                  <h3 class="card-title">Register User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('create_account')}}" method="post" enctype="multipart/form-data">
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
                        <label for="name">Name</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Last name first" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>

                    


                    <div class="form-group">
                        <label for="role">Role</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input list="role" placeholder="Admin|Engineer" type="text" class="form-control" name="role" required autocomplete="role" autofocus>
                          <datalist id="role">
                              <option value="Admin">
                              <option value="Engineer">
                          </datalist>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                          </div>
                          <input type="password" class="form-control" placeholder="Password must be more than four characters" name="password">
                      </div>
                  </div>

                   

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register User</button>
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