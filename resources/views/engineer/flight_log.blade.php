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
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header bg-primary">
                      <h3 class="card-title">Previous Flight Records</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered table-striped">
                        <thead>                  
                          <tr>
                            {{-- <th style="width: 10px">#</th> --}}
                            <th>Flight No</th>
                            <th>Aircraft</th>
                            <th>No of Hours</th>
                            {{-- <th style="width: 40px">Label</th> --}}
                          </tr>
                        </thead>
                        <tbody>
      
                          @if (count($flights) > 0)
                          @foreach ($flights as $flight)
                              <tr>
                                <td>{{$flight->aircraft_no}}</td>
                                <td>{{$flight->flight_no}}</td>
                                <td>{{$flight->flight_duration}}</td>
                              </tr>
                          @endforeach
                          
                        @else
                          
                        @endif 
                        
                        </tbody>
                      </table>
                      <nav class="pagination-block">
                        {{-- {{$data['materials']->links('layouts.paginationlinks')}} --}}
                      </nav>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
    
            </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    
@endsection