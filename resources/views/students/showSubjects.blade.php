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
                        <th scope="col">Programe</th>
                       
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                     @if(!empty($subjects))
                        @foreach($subjects as $key=>$subject)
                         <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$subject->subject_name}}</td>
                            <td>
                              <a href="{{url('/showTopics/'.$subject->id)}}"> View Notes</a>
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