@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Final Exam</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Final Exam</li>
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
                        <th scope="col">Exam Type</th>
                        <th scope="col">Exam Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Total Marks</th>
                        <th scope="col">Exam Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                     @if(!empty($exams))
                        @foreach($exams as $key=>$exam)
                         <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$exam->exam_type}}</td>
                            <td>{{$exam->exam_name}}</td>
                            <td>{{$exam->exam_start_date}}</td>
                            <td>{{$exam->exam_end_date}}</td>
                            <td>{{$exam->exam_duration}}</td>
                            <td>{{$exam->exam_total_score}}</td>
                            <td>{{$exam->exam_status}}</td>

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