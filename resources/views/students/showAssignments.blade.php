@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assignments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assignments</li>
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
                       <th scope="col">Action</th>
                        <th scope="col">#</th>
                        <th scope="col">Exam Type</th>
                        <th scope="col">Exam Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Total Marks</th>
                        <th scope="col">Exam Status</th>
                        <th scope="col">N.questions</th>
                        <th scope="col">Attemp Exam</th>
                       
                    </tr>
                </thead>
                <tbody>
                     @if(!empty($exams))
                        @foreach($exams as $key=>$exam)
                         <tr>

                          <!--action-->
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs lightColor btn-success btn-sm">Action</button>
                                    <button type="button" class="btn btn-xs btn-success lightColor btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <center><h6><b>MORE ACTIONS</b></h6></center>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item"  data-toggle="modal" data-target="#read_instruction{{$exam->id}}">
                                                <i class="las la-edit las1"></i> Read Instructions
                                        </a>
                                    </div>
                                    </button>
                                </div>
                            </td>
                            <!--end action-->


                            <td>{{$key+1}}</td>
                            <td>{{$exam->exam_type}}</td>
                            <td>{{$exam->exam_name}}</td>
                            <td>{{$exam->exam_start_date}}</td>
                            <td>{{$exam->exam_end_date}}</td>
                            <td>{{$exam->exam_duration}}</td>
                            <td>{{$exam->exam_total_score}}</td>
                            <td>{{$exam->exam_status}}</td>
                            <td>20</td>
                            <td>
                                 <a href="{{url('/showExamQuestions/'.$exam->id)}}" class="btn btn-xs btn-success"> Click To Start Exam</a>
                            </td>
                         </tr>


                         <!--add student modal-->
                        <div class="modal  fade " id="read_instruction{{$exam->id}}"">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Exam Instruction</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" method="POST" action="{{route('adminUpdateExams')}}" >
                                            @csrf
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                    <div class="row">
                                                       <?php echo$exam->exam_instruction;?>    
                                                    </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" data-dismiss="modal"><i class="las la-edit"></i>Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                        </div>
                        <!--end add student modal-->



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