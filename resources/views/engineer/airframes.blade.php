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
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header bg-primary">
                      <h3 class="card-title">Registered Airframes</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>                  
                          <tr>
                            <th>Aircraft</th>
                            <th>Model</th>
                            <th>A Check</th>
                            <th>B Check</th>
                            <th>C Check</th>
                            <th>D Check</th>
                          </tr>
                        </thead>
                        <tbody>
      
                        @if (count($airframes) > 0)
                          {{-- @foreach ($data['materials'] as $key =>$material) --}}
                          @foreach ($airframes as $airframe)

                              <tr>
                                <td>{{$airframe->aircraft_no}}</td>
                                <td>{{$airframe->model}}</td>
                                <td>{{$airframe->a_check}}</td>
                                <td>{{$airframe->b_check}}</td>
                                <td>{{$airframe->c_check}}</td>
                                <td>{{$airframe->d_check}}</td>
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