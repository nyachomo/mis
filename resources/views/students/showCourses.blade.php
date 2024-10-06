@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fliud">
    <div class="row">
      <div class="col-sm-12">
          <div class="card">
             <div class="card-header"></div>
             <div class="card-body">
                
             <table class="table table-sm table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Level</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                     @if(!empty($courses))
                        @foreach($courses as $key=>$course)
                         <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->level}}</td>
                            <td>{{$course->duration}}</td>
                            <td>
                              <a href="{{url('/showSubjects/'.$course->id)}}"> View Topics</a>
                            </td>
                         </tr>
                        @endforeach
                     @else
                     @endif
                </tbody> 
              
              </tbody>
            </table>    

             </div>
          </div>
      </div>
    </div>
  </div>
</section>


@endsection