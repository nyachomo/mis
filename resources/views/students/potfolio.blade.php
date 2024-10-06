@extends('layouts.master')
@section('content')


<!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Potfolio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Potfolio</li>
            </ol>
          </div>
        </div>
      </div>
  </section>
<!--container-fluid -->

 <!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profesional Summary</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Education Experience</a></li>
                    <li class="nav-item"><a class="nav-link" href="#workExperience" data-toggle="tab">Work Experience</a></li>
                    <li class="nav-item"><a class="nav-link" href="#referee" data-toggle="tab">Referee</a></li>
                    <li class="nav-item"><a class="nav-link" href="#documents" data-toggle="tab">Documents</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                <h6>Profesional Summary</h6>
                                    <div class="btn-group" >
                                    @if(!empty($professionalSummary))   
                                        
                                        <button class="btn btn-xs  btn-success" data-toggle="modal" data-target="#updateProSummary{{$professionalSummary->id}}"><i class="las la-trash"></i>Update Profesional Summary</button>
                                        <button class="btn btn-xs  btn-danger" data-toggle="modal" data-target="#deleteProSummary{{$professionalSummary->id}}"><i class="las la-trash"></i><br>Delete Profesional Summary</button>
                                    @else
                                        <button class="btn btn-xs  btn-success" data-toggle="modal" data-target="#addProfesionalSummary"><i class="las la-plus"></i>Add Professional Summary</button>
                                    @endif
                                    </div>
                                </div>
                                <div class="card-body">
                                @if(!empty($professionalSummary))
                                
                                    
                                   
                                    <p><?php echo$professionalSummary->professional_summary;?></p>

                                        <!--profession summary modal-->
                                        <div class="modal fade" id="updateProSummary{{$professionalSummary->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">
                                                UPDATE PROFESIONAL SUMMARY
                                                </h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{route('updateStudentProfessionalSummary')}}">
                                                @csrf
                                                <div class="modal-body">
                                                <input type="text" name="id" value="{{$professionalSummary->id}}" class="form-control" hidden="true">
                                                <label>PROFESSIONAL SUMMARY</label>
                                                <textarea class="addTopic" name="professional_summary" required>{{$professionalSummary->professional_summary}}</textarea>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i> CLOSE</button>
                                                <button type="submit" class="btn btn-success"> <i class="las la-edit"></i> UPDATE</button>
                                                </div>
                                            </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                        </div>
                                        <!--end of professional summary modal-->


                                        <!--profession summary modal-->
                                        <div class="modal fade" id="deleteProSummary{{$professionalSummary->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">
                                                    ARE YOU SURE YOU WANT TO DELETE THIS RECORD ?
                                                    </h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="{{route('deleteStudentProfessionalSummary')}}">
                                                    @csrf
                                                    <div class="modal-body">
                                                    <input type="text" name="id" value="{{$professionalSummary->id}}" class="form-control" hidden="true">
                                                    
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times"></i> CLOSE</button>
                                                    <button type="submit" class="btn btn-danger"> <i class="las la-trash"></i> DELETE</button>
                                                    </div>
                                                </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        
                                        </div>
                                        <!--end of professional summary modal-->

                                @else
                                    <p style="color:red">No Record</p>
                                @endif
                                
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                    

                        <section class="content">
                            <div class="container-fluid">
                                <!--first row-->
                                <div class="row">
                                    

                                

                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                            
                                                SKILLS
                                                <button class="btn btn-xs btn-success" style="float:right" data-toggle="modal" data-target="#addSkill"><i class="las la-plus"></i>Add SKILLS</button>
                                            

                                            </div>
                                            <div class="card-body">
                                                <table class="table table-sm table-bordered table-stripped" id="example1">
                                                    <thead>
                                                        <th>NO</th>
                                                        <th>SKILLS</th>
                                                        <th>ACTION</th>
                                                    </thead>
                                                    <tbody>
                                                    @if(!empty($skills))
                                                        @foreach($skills as $key=>$skill)
                                                            <tr>
                                                                <!--action-->
                                                                <td>{{$key+1}}</td>
                                                                <td>{{$skill->student_skills}}</td>
                                                                <td>
                                                                <button class="btn btn-xs btn-outline-success" style="float:right" data-toggle="modal" data-target="#updateSkill{{$skill->id}}"><i class="las la-edit"></i>Update Skill</button>
                                                                <button class="btn btn-xs btn-outline-danger" style="float:right" data-toggle="modal" data-target="#deleteSkill{{$skill->id}}"><i class="las la-trash"></i>Delete Skill</button>
                    
                                                                </td>
                                                                <!--end action-->
                                                            
                                                            </tr>

                                                            <!--student skills-->
                                                            <div class="modal fade" id="updateSkill{{$skill->id}}">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h6 class="modal-title">
                                                                        <i class="fa fa-edit las1"></i> UPDATE SKILL
                                                                    </h6>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    </div>
                                                                    <form method="post" action="{{route('studentUpdateSkill')}}">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <input type="text" name="id" value="{{$skill->id}}" class="form-control" hidden="true">
                                                                        <label>UPDATE SKILLS</label>
                                                                        <input type="text" class="form-control" name="student_skills" required value="{{$skill->student_skills}}">
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                                        <button type="submit" class="btn btn-success"> <i class="las la-plus"></i>UPDATE</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!--studentskills-->

                                                            <!--student skills-->
                                                            <div class="modal fade" id="deleteSkill{{$skill->id}}">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h6 class="modal-title">
                                                                    ARE YOUR YOU WANT TO DELETE THIS RECORD
                                                                    </h6>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    </div>
                                                                    <form method="post" action="{{route('studentDeleteSkill')}}">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <input type="text" name="id" value="{{$skill->id}}" class="form-control" hidden="true">
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                                        <button type="submit" class="btn btn-danger"> <i class="las la-trash"></i> DELETE </button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!--studentskills-->


                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>




                                
                                
                                
                                </div>
                            </div>
                        </section> 



                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        
                        <!--section-->
                        <section class="content">
                            <div class="container-fliud">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                @if(!empty($educations))
                                                {{$educations->count()}} Education Experience
                                                @else
                                                0 Education Experience
                                                @endif
                                            
                                                <button type="button" class="btn btn-xs btn-success" style="float:right" data-toggle="modal" data-target="#addEducationExperienceModal">
                                                     <i class="las la-plus"></i> Add Education
                                                </button>
                                            </div>
                                            <div class="card-body">

                                                    <table  id="educationExperience" class="table table-bordered table-striped table-sm">
                                                        <thead>
                                                            <tr>
                                                             
                                                                <th>From</th>
                                                                <th>To</th>
                                                                <th>Institution</th>
                                                                <th>Course</th>
                                                                <th>Grade</th>
                                                                <th>Achivements</th>
                                                                <th>Action</th>
                                                            
                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!empty($educations))
                                                            @foreach($educations as $education)
                                                                <tr>
                                                                    <!--action-->
                                                                    
                                                                    <!--end action-->

                                                                    <td>{{$education->start_date}}</td>
                                                                    <td>{{$education->end_date}}</td>
                                                                    <td>{{$education->school_attended}}</td>
                                                                    <td>{{$education->course_studied}}</td>
                                                                    <td>{{$education->grade_scored}}</td>
                                                                    <td>
                                                                        @if (!empty($education->achievements))
                                                                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#achievementsModal{{ $education->id }}">
                                                                            {{ $education->achievements->count() }} Achievement(s)
                                                                            </button>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="achievementsModal{{ $education->id }}" tabindex="-1" role="dialog" aria-labelledby="achievementsModalLabel{{ $education->id }}" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="achievementsModalLabel{{ $education->id }}"> <i class="las la-graduation-cap las1"></i> Achievements In  {{ $education->school_attended }}</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <table class="table table-bordered table-striped table-sm" id="educationAchievements">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>Action</th>
                                                                                                    
                                                                                                        <th>Achievement</th>
                                                                                                    
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    @foreach ($education->achievements as $key => $achievement)
                                                                                                        <tr>
                                                                                                            
                                                                                                            <!--action-->
                                                                                                            <td>
                                                                                                                <div class="btn-group">
                                                                                                                    <button type="button" class="btn addButton btn-success btn-sm">Action</button>
                                                                                                                    <button type="button" class="btn btn-success addButton btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                                                                    <div class="dropdown-menu" role="menu">
                                                                                                                        <center><h4><b>MORE ACTIONS</b></h4></center>
                                                                                                                        <div class="dropdown-divider"></div>
                                                                                                                        <a class="dropdown-item"  data-toggle="modal" data-target="#update_achievement{{$achievement->id}}">
                                                                                                                        <i class="las la-edit las1"></i> UPDATE ACHIEVEMENT(S)
                                                                                                                        
                                                                                                                        </a>
                                                                                                                        <div class="dropdown-divider"></div>
                                                                                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_achievement{{$achievement->id}}">
                                                                                                                        <i class="las la-trash-alt las3"></i> DELETE ACHIVEMENT(S)
                                                                                                                        </a>
                                                                                                                    
                                                                                                                    </div>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <!--end action-->
                                                                                                            <td>{{ $achievement->student_education_achivement}}</td>
                                                                                                        </tr>


                                                                                                        <!--end update-->
                                                                                                        <div class="modal fade" id="update_achievement{{$achievement->id}}" style="z-index:200">
                                                                                                            <div class="modal-dialog">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header">
                                                                                                                        <h6>Update Achievement</h6>
                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                            <span aria-hidden="true">&times;</span>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <div class="modal-body">

                                                                                                                    <form method="post" action="{{route('updateAchivement')}}">
                                                                                                                        @csrf
                                                                                                                        <div class="row">
                                                                                                                            <input type="text" class="form-control" name="id" value="{{$achievement->id}}">
                                                                                                                            <label>Achivement</label>
                                                                                                                        
                                                                                                                            <input type="text" name="student_education_achivement" class="form-control" value="{{$achievement->student_education_achivement}}">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="modal-footer justify-content-between">
                                                                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i>Close</button>
                                                                                                                        <button type="submit" class="btn btn-success addButton">
                                                                                                                            <i class="las la-edit las1"></i>
                                                                                                                            Update
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                </form>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <!--delete--data-->

                                                                                                        <!--end update-->
                                                                                                        <div class="modal fade" id="delete_achievement{{$achievement->id}}" style="z-index:300">
                                                                                                            <div class="modal-dialog">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header">
                                                                                                                        <h6>Are you sure you want to delete this record ?</h6>
                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                            <span aria-hidden="true">&times;</span>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <div class="modal-body">

                                                                                                                    <form method="post" action="{{route('deleteAchivement')}}">
                                                                                                                        @csrf
                                                                                                                        <div class="row">
                                                                                                                            <input type="text" class="form-control" name="id" value="{{$achievement->id}}">
                                                                                    
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="modal-footer justify-content-between">
                                                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-trash-alt"></i>Close</button>
                                                                                                                        <button type="submit" class="btn btn-danger">
                                                                                                                            <i class="las la-trash las3"></i>
                                                                                                                            Delete
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                </form>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <!--delete--data-->



                                                                                                    @endforeach
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>

                                                                                        <!--modal-footer-->

                                                                                            <div class="modal-footer justify-content-between">
                                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                                                                                            
                                                                                            </div>

                                                                                        <!--end modal-footer-->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <button class="btn btn-xs btn-warning">0 Achievement(s)</button>
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                   
                                                                    <button class="btn btn-xs btn-outline-secondary"  data-toggle="modal" data-target="#achivementModal{{$education->id}}"> <i class="las la-plus las1"></i> Add Achievements</button>
                                                                    <button class="btn btn-xs btn-outline-success"  data-toggle="modal" data-target="#modalupdate{{$education->id}}"> <i class="las la-edit las1"></i> Update</button>
                                                                    <button class="btn btn-xs btn-outline-danger"  data-toggle="modal" data-target="#modaldelete{{$education->id}}"> <i class="las la-edit edit"></i> Delete</button>
                                                                   
                                                                    </td>
                                                                </tr>

                                                                <!--update-->

                                                                    <div class="modal fade" id="modalupdate{{$education->id}}">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header"></div>
                                                                                <div class="modal-body">

                                                                                <form method="post" action="{{route('student.updateEducationExperience')}}">
                                                                                    @csrf
                                                                                    <div class="row">
                                                                                        <input type="text" class="form-control" name="id" value="{{$education->id}}">
                                    
                                                                                        <div class="col-sm-6">
                                                                                            <!-- text input -->
                                                                                            <div class="form-group">
                                                                                                <label>From</label>
                                                                                                <input type="text" name="start_date" value="{{$education->start_date}}" class="form-control @error('start_date') is-invalid @enderror"  value="{{ old('start_date') }}"  autocomplete="start_date" autofocus placeholder="eg 2006">
                                                                                                @error('start_date')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                            <div class="form-group">
                                                                                                <label>To</label>
                                                                                                <input type="text" name="end_date" value="{{$education->end_date}}" class="form-control @error('end_date') is-invalid @enderror"  value="{{ old('end_date') }}"  autocomplete="end_date" autofocus placeholder="eg 2019">
                                                                                                @error('end_date')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                            <!-- textarea -->
                                                                                            <div class="form-group">
                                                                                                    <label>School Attended</label>
                                                                                                    <input type="text" name="school_attended" value="{{$education->school_attended}}" class="form-control @error('school_attended') is-invalid @enderror"  value="{{ old('school_attended') }}"  autocomplete="school_attended">
                                                                                                    @error('school_attended')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                            <div class="form-group">
                                                                                                    <label>Course Studied</label>
                                                                                                    <input type="text" value="{{$education->course_studied}}" class="form-control @error('course_studied') is-invalid @enderror"  value="{{ old('course_studied') }}"  autocomplete="course_studied" autofocus  name="course_studied">
                                                                                                    @error('course_studied')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                    @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-sm-12">
                                                                                            <!-- textarea -->
                                                                                            <div class="form-group">
                                                                                                    <label>Grade Scored</label>
                                                                                                    <input type="text"  name="grade_scored" value="{{$education->grade_scored}}" class="form-control @error('grade_scored') is-invalid @enderror"  value="{{ old('grade_scored') }}"  autocomplete="grade_scored" autofocus>
                                                                                                        @error('grade_scored')
                                                                                                        <span class="invalid-feedback" role="alert">
                                                                                                            <strong>{{ $message }}</strong>
                                                                                                        </span>
                                                                                                        @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-sm-12">
                                                                                            <!-- textarea -->
                                                                                            <div class="form-group">
                                                                                            <label>Achievements</label>
                                                                                            <textarea  name="achivement"  class="form-control @error('achivement') is-invalid @enderror"  value="{{ old('achivement') }}"  autocomplete="achivement" autofocus >{{$education->achivement}}</textarea>
                                                                                            @error('achivement')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                                <div class="modal-footer justify-content-between">
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                                </div>
                                                                            </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                <!--end update-->
                                                                    <div class="modal fade" id="modaldelete{{$education->id}}">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h6>Are you sure you want to delete this record</h6>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                <form method="post" action="{{route('student.deleteEducationExperience')}}">
                                                                                    @csrf
                                                                                    <div class="row">
                                                                                        <input type="text" class="form-control" name="id" value="{{$education->id}}" hidden="true">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer justify-content-between">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                                </div>
                                                                            </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <!--delete--data-->

                                                                <!--end update-->
                                                                    <div class="modal fade" id="achivementModal{{$education->id}}">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h6>Add Education Achievement</h6>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                <form method="post" action="{{route('addAchivement')}}">
                                                                                    @csrf
                                                                                    <div class="row">
                                                                                        <input type="text" class="form-control" name="education_id" value="{{$education->id}}">
                                                                                        <label>Education Achivement</label>
                                                                                    
                                                                                        <input type="text" name="student_education_achivement" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer justify-content-between">
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i>Close</button>
                                                                                    <button type="submit" class="btn btn-success addButton">
                                                                                        <i class="las la-edit"></i>
                                                                                        Add
                                                                                    </button>
                                                                                </div>
                                                                            </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <!--delete--data-->

                                                            @endforeach
                                                            @endif
                                                        </tbody>
                                                        
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--end section--> 


                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="workExperience">

                    <!--section2-->
                    <section class="content">
                        <div class="container-fliud">
                            <div class="card">
                                <div class="card-header">
                                    @if(!empty($works))
                                        <h6>{{$works->count()}} Work Experience</h6>
                                    @else
                                        <h6>0 Work Experience</h6>
                                    @endif
                                    <button type="button" class="btn btn-xs btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#addWorkExperienceModal">
                                         <i class="las la-plus"></i> Add Work Experience
                                    </button>
                                </div>
                                <div class="card-body">
                                        <table class="table table-stripped table-sm table-bordered table-sm" id="workExperience">
                                        <!--thead-->
                                        <thead>
                                                <tr>
                                                   
                                                    <th>NO</th>
                                                    <th>FROM</th>
                                                    <th>TO</th>
                                                    <th>COMPANY</th>
                                                    <th>ROLES</th>
                                                    <th>REASON FOR LEAVING</th>
                                                    <th>ACHIEVEMENTS</th>
                                                    <th>ACTION</th>
                                                    
                                                </tr>
                                        </thead>
                                            <tbody>
                                                @if(!empty($works))
                                                    @foreach($works as $key=>$work)
                                                    <tr>

                                                                <!--
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn addButton btn-success btn-sm">ACTION</button>
                                                                        <button type="button" class="btn btn-success addButton btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                                        <span class="sr-only">Toggle Dropdown</span>
                                                                        <div class="dropdown-menu" role="menu">
                                                                            <center><h4><b>MORE ACTIONS</b></h4></center>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addAchivementModal{{$work->id}}">
                                                                            <i class="las la-plus las2"></i> ADD ACHIEVEMENTS
                                                                            </a>

                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item"  data-toggle="modal" data-target="#update_workexperience{{$work->id}}">
                                                                            <i class="las la-edit las1"></i> UPDATE WORK EXPERIENCE
                                                                            
                                                                            </a>
                                                                            
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_workexperience{{$work->id}}">
                                                                            <i class="las la-trash-alt las3"></i> DELETE WORK EXPERIENCE
                                                                            </a>
                                                                        
                                                                        </div>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                               -->

                                                                <td>{{$key+1}}</td>
                                                                <td>{{$work->start_date}}</td>
                                                                <td>{{$work->end_date}}</td>
                                                                <td>{{$work->company}}</td>
                                                                <td>{{$work->role}}</td>
                                                            
                                                                <td>{{$work->reason_for_leaving}}</td>

                                                                <td>
                                                                    @if (!empty($work->achievements))
                                                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#achievementsModal{{$work->id }}">
                                                                        {{$work->achievements->count() }} Achievement(s)
                                                                        </button>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="achievementsModal{{$work->id }}">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="achievementsModalLabel{{ $work->id }}"> <i class="las la-graduation-cap las1"></i> Achievements In  {{ $work->company }}</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <table class="table table-bordered table-striped table-sm" id="educationAchievements">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Action</th>
                                                                                                
                                                                                                    <th>Achievement</th>
                                                                                                
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach ($work->achievements as $key => $achievement)
                                                                                                    <tr>
                                                                                                        
                                                                                                        <!--action-->
                                                                                                        <td>
                                                                                                            <div class="btn-group">
                                                                                                                <button type="button" class="btn addButton btn-success btn-sm">Action</button>
                                                                                                                <button type="button" class="btn btn-success addButton btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                                                                                <span class="sr-only">Toggle Dropdown</span>
                                                                                                                <div class="dropdown-menu" role="menu">
                                                                                                                    <center><h4><b>MORE ACTIONS</b></h4></center>
                                                                                                                    <div class="dropdown-divider"></div>
                                                                                                                    <a class="dropdown-item"  data-toggle="modal" data-target="#update_achievement{{$achievement->id}}">
                                                                                                                    <i class="las la-edit las1"></i> UPDATE ACHIEVEMENT(S)
                                                                                                                    
                                                                                                                    </a>
                                                                                                                    <div class="dropdown-divider"></div>
                                                                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_achievement{{$achievement->id}}">
                                                                                                                    <i class="las la-trash-alt las3"></i> DELETE ACHIVEMENT(S)
                                                                                                                    </a>
                                                                                                                
                                                                                                                </div>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                        <!--end action-->
                                                                                                        <td>{{ $achievement->student_work_achivement}}</td>
                                                                                                    </tr>


                                                                                                    <!--end update-->
                                                                                                    <div class="modal fade" id="update_achievement{{$achievement->id}}" style="z-index:200">
                                                                                                        <div class="modal-dialog">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    <h6>Update Achievement</h6>
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body">

                                                                                                                <form method="post" action="{{route('student.updateWorkAchivement')}}">
                                                                                                                    @csrf
                                                                                                                    <div class="row">
                                                                                                                        <input type="text" class="form-control" name="id" value="{{$achievement->id}}">
                                                                                                                        <label>Achivement</label>
                                                                                                                        <input type="text" name="student_work_achivement" class="form-control" value="{{$achievement->student_work_achivement}}">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="modal-footer justify-content-between">
                                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i>Close</button>
                                                                                                                    <button type="submit" class="btn btn-success addButton">
                                                                                                                        <i class="las la-edit las1"></i>
                                                                                                                        Update
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                            </form>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!--delete--data-->

                                                                                                    <!--end update-->
                                                                                                    <div class="modal fade" id="delete_achievement{{$achievement->id}}" style="z-index:300">
                                                                                                        <div class="modal-dialog">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    <h6>Are you sure you want to delete this record ?</h6>
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body">

                                                                                                                <form method="post" action="{{route('student.deleteWorkAchivement')}}">
                                                                                                                    @csrf
                                                                                                                    <div class="row">
                                                                                                                        <input type="text" class="form-control" name="id" value="{{$achievement->id}}">
                                                                                
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="modal-footer justify-content-between">
                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-trash-alt"></i>Close</button>
                                                                                                                    <button type="submit" class="btn btn-danger">
                                                                                                                        <i class="las la-trash las3"></i>
                                                                                                                        Delete
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                            </form>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!--delete--data-->



                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>

                                                                                    <!--modal-footer-->

                                                                                        <div class="modal-footer justify-content-between">
                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                                                                                        
                                                                                        </div>

                                                                                    <!--end modal-footer-->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    @else
                                                                        <button class="btn btn-xs btn-warning">0 Achievement(s)</button>
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                <button class="btn btn-xs btn-outline-secondary"  data-toggle="modal" data-target="#addAchivementModal{{$work->id}}"> <i class="las la-edit"></i> Add Achievements</button>
                                                                <button class="btn btn-xs btn-outline-success"  data-toggle="modal" data-target="#update_workexperience{{$work->id}}"> <i class="las la-edit"></i>Update</button>
                                                                <button class="btn btn-xs btn-outline-danger"  data-toggle="modal" data-target="#delete_workexperience{{$work->id}}"> <i class="las la-delete"></i> Delete</button>
                                                                   
                                                                </td>






                                                    </tr>

                                                    <!--modal for add data-->
                                                        <div class="modal fade" id="update_workexperience{{$work->id}}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h6>
                                                                        <i class="las la-plus"></i> Update Work Experience
                                                                    </h6>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                    <form method="post" action="{{route('student.updateWorkExperience')}}">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <input type="text" class="form-control" name="work_id" value="{{$work->id}}">
                                                                            <div class="col-sm-6">
                                                                                <!-- text input -->
                                                                                <div class="form-group">
                                                                                    <label>From</label>
                                                                                    <input type="text" name="start_date" class="form-control" value="{{$work->start_date}}" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>To</label>
                                                                                    <input type="text" name="end_date" class="form-control" value="{{$work->end_date}}" required>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <!-- textarea -->
                                                                                <div class="form-group">
                                                                                        <label>Company</label>
                                                                                        <input type="text" name="company" class="form-control" value="{{$work->company}}" required>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                        <label>Position</label>
                                                                                        <input type="text" class="form-control" value="{{$work->role}}" name="role" required>
                                                                                        @error('role')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                        @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <!-- textarea -->
                                                                                <div class="form-group">
                                                                                        <label>Achivements</label>
                                                                                        <input type="text"  name="achivement" class="form-control" value="{{$work->role}}" required>
                                                                                            
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <!-- textarea -->
                                                                                <div class="form-group">
                                                                                <label>Reason For Leaving</label>
                                                                                <textarea  name="reason_for_leaving" class="form-control">{{$work->reason_for_leaving}}</textarea>
                                                                                

                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                                                                        <button type="submit" class="btn addButton btn-success"><i class="las la-edit"></i>Update</button>
                                                                    </div>
                                                                </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!--end modal for add data-->


                                                    <!--modal for add data-->
                                                    <div class="modal fade" id="addAchivementModal{{$work->id}}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h6>
                                                                    <i class="las la-plus las1"></i>
                                                                        Add Achievement
                                                                    </h6>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                    <form method="post" action="{{route('student.addWorkAchivement')}}">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <input type="text" class="form-control" name="work_id" value="{{$work->id}}" hidden="true">
                                                                            <label>Achievements<lebal>
                                                                            <input type="text" class="form-control" name="student_work_achivement" required>
                                                                            
                                                                        </div>

                                                                        


                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                                                                        <button type="submit" class="btn addButton btn-success"><i class="las la-plus"></i>Add</button>
                                                                    </div>
                                                                </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!--end modal for add data-->

                                                    <!--modal for add data-->
                                                    <div class="modal fade" id="delete_workexperience{{$work->id}}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h6>
                                                                    Are you sure you want to delete this record
                                                                    </h6>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                    <form method="post" action="{{route('student.deleteWorkExperience')}}">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <input type="text" class="form-control" name="work_id" value="{{$work->id}}">
                                                                            
                                                                        </div>

                                                                        


                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                                                                        <button type="submit" class="btn addButton btn-success"><i class="las la-trash"></i>Delete</button>
                                                                    </div>
                                                                </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!--end modal for add data-->

                                                    @endforeach
                                                @else
                                                @endif
                                            </tbody>
                                        </table>

                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                    </section>
                    <!--endsection2-->

                    </div>



                    <div class="tab-pane" id="referee">

                    <!--second section-->
                        <section class="content">
                            <div class="container-fliud">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <!--modal-->
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addReferee">
                                                
                                                <i class="las la-plus"></i> Add Referee
                                                </button>

                                            </div>
                                            <div class="card-body">
                                                <table class="table table-stripped table-bordered table-sm">
                                                <thead>
                                                    <th>Action</th>
                                                    <th>Name</th>
                                                    <th>Phonenumber</th>
                                                    <th>Email Address</th>
                                                    <th>Organisation</th>
                                                    <th>Position</th>
                                                    <th>Years Knowing referee</th>
                                                    <th>Action</th>
                                                
                                                </thead>
                                                <tbody>
                                                    @if(!empty($referees))
                                                    @foreach($referees as $key=>$referee)
                                                    <tr>
                                                        <td>$key+1</td>
                                                        <!--
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-success">Action</button>
                                                                <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                                <div class="dropdown-menu" role="menu">
                                                                    <a class="dropdown-item"  data-toggle="modal" data-target="#update_referee{{$referee->id}}">
                                                                    <i class="las la-user-edit"></i>Update
                                                                    
                                                                    </a>
                                                                    <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_referee{{$referee->id}}">
                                                                            <i class="las la-user-minus"></i> Delete
                                                                        </a>
                                                                
                                                                </div>
                                                                </button>
                                                            </div>

                                                        </td>-->

                                                        <td>{{$referee->referee_name}}</td>
                                                        <td>{{$referee->referee_phone}}</td>
                                                        <td>{{$referee->referee_email}}</td>
                                                        <td>{{$referee->referee_organisation}}</td>
                                                        <td>{{$referee->referee_position}}</td>
                                                        <td>{{$referee->years_knowing_referee}}</td>
                                                        <td>
                                                            <button class="btn btn-xs btn-outline-success"  data-toggle="modal" data-target="#update_referee{{$referee->id}}"> <i class="las la-edit"></i> Update Referee</button>
                                                            <button class="btn btn-xs btn-outline-danger"  data-toggle="modal" data-target="#delete_referee{{$referee->id}}"> <i class="las la-trash"></i> Delete Referee</button>
                                                                 
                                                        </td>


                                                            <!--section for modal-->
                                                            <div class="modal fade " id="update_referee{{$referee->id}}">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">
                                                                        <i class="las la-plus"></i>
                                                                            Add New Referee
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="post" action="{{route('student.updateReferee')}}">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                        <!--row1-->
                                                                        <div class="row">
                                                                            <input type="text" name="id" class="form-control" value="{{$referee->id}}">
                                                                            <input type="text" name="student_id" class="form-control" value="{{$student_id}}" hidden="true">
                                                                            <div class="col-sm-6">
                                                                                <div class="for-group">
                                                                                    <label>Fullname</label>
                                                                                    <input type="text" name="referee_name" value="{{$referee->referee_name}}" class="form-control @error('referee_name') is-invalid @enderror" name="referee_name" value="{{ old('referee_name') }}"  autocomplete="referee_name" autofocus>
                                                                                    @error('referee_name')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror

                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-6">
                                                                                <div class="for-group">
                                                                                    <label>Phonenumber</label>
                                                                                    <input type="number" name="referee_phone" value="{{$referee->referee_phone}}"  class="form-control @error('referee_phone') is-invalid @enderror"  value="{{ old('referee_phone') }}"  autocomplete="referee_phone" autofocus>
                                                                                    @error('referee_phone')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            

                                                                        </div>
                                                                        <!--endrow1-->

                                                                        <!--secondrow-->
                                                                        <div class="row">
                                                                                <div class="col-sm-6">
                                                                                        <div class="for-group">
                                                                                            <label>Email Address</label>
                                                                                            <input type="text" name="referee_email" value="{{$referee->referee_email}}" class="form-control @error('referee_email') is-invalid @enderror"  value="{{ old('referee_email') }}"  autocomplete="referee_email" autofocus>
                                                                                            @error('referee_email')
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        </div>
                                                                                </div>

                                                                                <div class="col-sm-6">
                                                                                    <div class="for-group">
                                                                                        <label>Organisation</label>
                                                                                        <input type="text" name="referee_organisation" value="{{$referee->referee_organisation}}" class="form-control @error('referee_organisation') is-invalid @enderror"  value="{{ old('referee_organisation') }}"  autocomplete="referee_organisation" autofocus>
                                                                                            @error('referee_organisation')
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>


                                                                        </div>
                                                                        <!--endsecond row-->

                                                                        <!--row1-->
                                                                        <div class="row">
                                                                            
                                                                            <div class="col-sm-6">
                                                                                <div class="for-group">
                                                                                    <label>Position</label>
                                                                                    <input type="text" name="referee_position" value="{{$referee->referee_position}}" class="form-control @error('referee_position') is-invalid @enderror"  value="{{ old('referee_position') }}"  autocomplete="referee_position" autofocus>
                                                                                    @error('referee_position')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-6">
                                                                                <div class="for-group">
                                                                                    <label>How long have you know the referee</label>
                                                                                    <input type="number" name="years_knowing_referee" value="{{$referee->years_knowing_referee}}"  min="1" class="form-control @error('years_knowing_referee') is-invalid @enderror"  value="{{ old('years_knowing_referee') }}"  autocomplete="years_knowing_referee" autofocus>
                                                                                    @error('years_knowing_referee')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <!--endrow1-->



                                                                        </div>
                                                                        <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Update changes</button>
                                                                        </div>
                                                                    </form>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->
                                                            
                                                            <!--delete btn-->
                                                            <div class="modal fade " id="delete_referee{{$referee->id}}">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title"> Are you sure you want do delete this record ?</h6>

                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                    <form method="post" action="{{route('student.deleteReferee')}}">
                                                                        @csrf
                                                                        
                                                                        <input type="text" name="id" class="form-control" value="{{$referee->id}}" hidden="true">
                                                                            
                                                                        <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!--delete btn-->


                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <p style="color:red;">No record</p>
                                                    @endif
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </section>
                    <!--endSecond section-->

                    </div>


                    <div class="tab-pane" id="documents">

                    <!--second section-->
                        <section class="content">
                            <div class="container-fliud">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <!--modal-->
                                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addDocument">
                                                
                                                <i class="las la-plus"></i> Add New Document
                                                </button>

                                            </div>
                                            <div class="card-body">
                                                <table class="table table-stripped table-bordered table-sm">
                                                <thead>
                                                    <th>No</th>
                                                    <th>Document Name</th>
                                                    <th>Document Type</th>
                                                    <th>File</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @if(!empty($documents))
                                                    @foreach($documents as $key=>$document)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <!--
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-success">Action</button>
                                                                <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                                <div class="dropdown-menu" role="menu">
                                                                    <a class="dropdown-item"  data-toggle="modal" data-target="#update_document{{$document->id}}">
                                                                    <i class="las la-user-edit"></i>Update
                                                                    
                                                                    </a>
                                                                    <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_document{{$document->id}}">
                                                                            <i class="las la-user-minus"></i> Delete
                                                                        </a>
                                                                
                                                                </div>
                                                                </button>
                                                            </div>

                                                        </td>-->

                                                        <td>{{$document->document_type}}</td>
                                                        <td>{{$document->document_name}}</td>
                                                        <td>{{$document->document_file}}</td>

                                                        <td>
                                                        <button class="btn btn-xs btn-outline-success"  data-toggle="modal" data-target="#update_document{{$document->id}}"> <i class="las la-edit"></i> Update Documents</button>
                                                        <button class="btn btn-xs btn-outline-danger"  data-toggle="modal" data-target="#delete_document{{$document->id}}"> <i class="las la-trash"></i> Delete Documents</button>
                                                             
                                                        </td>


                                                            <!--section for modal-->
                                                            <div class="modal fade " id="update_document{{$document->id}}">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">
                                                                        <i class="las la-plus"></i>
                                                                            Update Document
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="post" action="{{route('updateStudentProfileDocument')}}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="modal-body">

                                                                        <!--modal-body-content-->

                                                                        <!--row1-->
                                                                            <div class="row">
                                                                                <input type="text" name="id" class="form-control" value="{{$document->id}}" hidden="true">
                                                                                <input type="text" name="student_id" class="form-control" value="{{$student_id}}" hidden="true">
                                                                                <div class="col-sm-6">
                                                                                    <div class="for-group">
                                                                                        <label>Document Type</label>
                                                                                        <select name="document_type"  class="form-control @error('document_type') is-invalid @enderror"  value="{{ old('document_type') }}"  autocomplete="document_type" autofocus>
                                                                                            <option value="{{$document->document_type}}">{{$document->document_type}}</option>
                                                                                            <option value="Academic">Academic</option>
                                                                                            <option value="Cv">Cv</option>
                                                                                            <option value="Other">Other</option>
                                                                                        </select>
                                                                                        @error('document_type')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror

                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-sm-6">
                                                                                            <div class="for-group">
                                                                                                <label>Document Name</label>
                                                                                                <input type="text" name="document_name" value="{{$document->document_name}}"  class="form-control @error('document_name') is-invalid @enderror"  value="{{ old('document_name') }}"  autocomplete="document_name" autofocus>
                                                                                                
                                                                                                @error('document_name')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror
                                                                                            </div>
                                                                                    </div>

                                                                                
                                                                                

                                                                            </div>
                                                                            <!--endrow1-->

                                                                            <!--secondrow-->
                                                                            <div class="row">
                                                                                    

                                                                                    <div class="col-sm-12">
                                                                                        <div class="for-group">
                                                                                            <label>Document File</label>
                                                                                            <input type="file" name="document_file"  class="form-control @error('document_file') is-invalid @enderror"  value="{{ old('document_file') }}"  autocomplete="document_file" autofocus>
                                                                                                @error('document_file')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror
                                                                                        </div>
                                                                                    </div>


                                                                            </div>
                                                                            <!--endsecond row-->

                                                                        <!---end of modal-body-content-->
                                                                    

                                                                        

                                                                    



                                                                        </div>
                                                                        <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Update changes</button>
                                                                        </div>
                                                                    </form>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->
                                                            
                                                            <!--delete btn-->
                                                            <div class="modal fade " id="delete_document{{$document->id}}">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title"> Are you sure you want do delete this record ?</h6>

                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                    <form method="post" action="{{route('deleteStudentProfileDocument')}}">
                                                                        @csrf
                                                                        
                                                                        <input type="text" name="id" class="form-control" value="{{$document->id}}" hidden="true">
                                                                            
                                                                        <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!--delete btn-->






                                                        
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <p style="color:red;">No record</p>
                                                    @endif
                                                </tbody>

                                                
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </section>
                    <!--endSecond section-->

                    </div>


                </div>
            <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
</section> 
<!--section-->

 
<!--profession summary modal-->
<div class="modal fade" id="addProfesionalSummary">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
         ADD PROFESSIONAL SUMMARY
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('addStudentProfessionalSummary')}}">
        @csrf
        <div class="modal-body">
          <input type="text" name="student_id" value="{{$student->id}}" class="form-control" hidden="true">
          <label>PROFESSIONAL SUMMARY</label>
          <textarea class="addTopic" name="professional_summary" required></textarea>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
          <button type="submit" class="btn btn-success"> <i class="las la-plus"></i>ADD</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end of professional summary modal-->

<!--student skills-->
<div class="modal fade" id="addSkill">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
        <i class="las la-plus"></i> ADD SKILL
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('studentAddSkill')}}">
        @csrf
        <div class="modal-body">
          <input type="text" name="student_id" value="{{$student->id}}" class="form-control" hidden="true">
          <label>ADD SKILL</label>
          <input type="text" class="form-control" name="student_skills" required>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
          <button type="submit" class="btn btn-success"> <i class="las la-plus"></i>ADD</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--studentskills-->

<div class="modal fade" id="addEducationExperienceModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h6>
                   <i class="las la-plus"></i> Add Education Experience
               </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form method="post" action="{{route('student.addEducationExperience')}}">
                @csrf
                <div class="row">
                    <input type="text" class="form-control" name="student_id" value="{{$student->id}}" hidden="true">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>From</label>
                            <input type="text" name="start_date" class="form-control @error('start_date') is-invalid @enderror"  value="{{ old('start_date') }}"  autocomplete="start_date" autofocus placeholder="eg 2006">
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                             <label>To</label>
                             <input type="text" name="end_date" class="form-control @error('end_date') is-invalid @enderror"  value="{{ old('end_date') }}"  autocomplete="end_date" autofocus placeholder="eg 2019">
                             @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                                <label>School Attended</label>
                                <input type="text" name="school_attended" class="form-control @error('school_attended') is-invalid @enderror"  value="{{ old('school_attended') }}"  autocomplete="school_attended">
                                @error('school_attended')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                                <label>Course Studied</label>
                                <input type="text" class="form-control @error('course_studied') is-invalid @enderror"  value="{{ old('course_studied') }}"  autocomplete="course_studied" autofocus  name="course_studied">
                                @error('course_studied')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                                <label>Grade Scored</label>
                                <input type="text"  name="grade_scored" class="form-control @error('grade_scored') is-invalid @enderror"  value="{{ old('grade_scored') }}"  autocomplete="grade_scored" autofocus>
                                    @error('grade_scored')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                        <label>Achievements</label>
                           <textarea  name="achivement" class="form-control @error('achivement') is-invalid @enderror"  value="{{ old('achivement') }}"  autocomplete="achivement" autofocus ></textarea>
                           @error('achivement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                <button type="submit" class="btn addButton btn-success"><i class="las la-plus"></i>Save</button>
            </div>
        </form>

        </div>
    </div>
</div>

<!--modal for add data-->

<div class="modal fade" id="addWorkExperienceModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h6>
                   <i class="las la-plus"></i> Add Work Experience
               </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form method="post" action="{{route('student.addWorkExperience')}}">
                @csrf
                <div class="row">
                    <input type="text" class="form-control" name="student_id" value="{{$student->id}}">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>From</label>
                            <input type="text" name="start_date" class="form-control @error('start_date') is-invalid @enderror"  value="{{ old('start_date') }}"  autocomplete="start_date" autofocus placeholder="eg 2006">
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                             <label>To</label>
                             <input type="text" name="end_date" class="form-control @error('end_date') is-invalid @enderror"  value="{{ old('end_date') }}"  autocomplete="end_date" autofocus placeholder="eg 2019">
                             @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                                <label>Company</label>
                                <input type="text" name="company" class="form-control @error('company') is-invalid @enderror"  value="{{ old('company') }}"  autocomplete="company">
                                @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control @error('role') is-invalid @enderror"  value="{{ old('role') }}"  autocomplete="role" autofocus  name="role">
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                                <label>Achivements</label>
                                <input type="text"  name="achivement" class="form-control @error('achivement') is-invalid @enderror"  value="{{ old('achivement') }}"  autocomplete="achivement" autofocus>
                                    @error('achivement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                        <label>Reason For Leaving</label>
                           <textarea  name="reason_for_leaving" class="form-control @error('reason_for_leaving') is-invalid @enderror"  value="{{ old('reason_for_leaving') }}"  autocomplete="reason_for_leaving" autofocus ></textarea>
                           @error('reason_for_leaving')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                <button type="submit" class="btn addButton btn-success"><i class="las la-plus"></i>Save</button>
            </div>
        </form>

        </div>
    </div>
</div>
<!--end modal for add data-->


<!--section for modal-->
<div class="modal fade " id="addReferee">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
               <i class="las la-plus"></i>
                Add New Referee
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="{{route('student.addReferee')}}">
            @csrf
            <div class="modal-body">
               <!--row1-->
               <div class="row">
                 <input type="text" name="student_id" class="form-control" value="{{$student_id}}" hidden="true">
                  <div class="col-sm-6">
                     <div class="for-group">
                        <label>Fullname</label>
                        <input type="text" name="referee_name" class="form-control @error('referee_name') is-invalid @enderror" name="referee_name" value="{{ old('referee_name') }}"  autocomplete="referee_name" autofocus>
                        @error('referee_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                     </div>
                  </div>

                  <div class="col-sm-6">
                     <div class="for-group">
                        <label>Phonenumber</label>
                        <input type="number" name="referee_phone"  class="form-control @error('referee_phone') is-invalid @enderror"  value="{{ old('referee_phone') }}"  autocomplete="referee_phone" autofocus>
                        @error('referee_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  </div>

                  

               </div>
               <!--endrow1-->

               <!--secondrow-->
               <div class="row">
                    <div class="col-sm-6">
                            <div class="for-group">
                                <label>Email Address</label>
                                <input type="text" name="referee_email"  class="form-control @error('referee_email') is-invalid @enderror"  value="{{ old('referee_email') }}"  autocomplete="referee_email" autofocus>
                                @error('referee_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="for-group">
                            <label>Organisation</label>
                            <input type="text" name="referee_organisation"  class="form-control @error('referee_organisation') is-invalid @enderror"  value="{{ old('referee_organisation') }}"  autocomplete="referee_organisation" autofocus>
                                @error('referee_organisation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>


               </div>
               <!--endsecond row-->

               <!--row1-->
               <div class="row">
                  
                  <div class="col-sm-6">
                     <div class="for-group">
                        <label>Position</label>
                        <input type="text" name="referee_position"  class="form-control @error('referee_position') is-invalid @enderror"  value="{{ old('referee_position') }}"  autocomplete="referee_position" autofocus>
                        @error('referee_position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  </div>

                  <div class="col-sm-6">
                     <div class="for-group">
                        <label>How long have you know the referee</label>
                        <input type="number" name="years_knowing_referee"  min="1" class="form-control @error('years_knowing_referee') is-invalid @enderror"  value="{{ old('years_knowing_referee') }}"  autocomplete="years_knowing_referee" autofocus>
                        @error('years_knowing_referee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  </div>

               </div>
               <!--endrow1-->



            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!--section for modal-->
<div class="modal fade " id="addDocument">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
               <i class="las la-plus"></i>
                Add New Document
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="{{route('addStudentProfileDocument')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">

               <!--row1-->
               <div class="row">
                 <input type="text" name="student_id" class="form-control" value="{{$student_id}}" hidden="true">
                  <div class="col-sm-6">
                     <div class="for-group">
                        <label>Document Type</label>
                        <select name="document_type"  class="form-control @error('document_type') is-invalid @enderror"  value="{{ old('document_type') }}"  autocomplete="document_type" autofocus>
                            <option value="None">None</option>
                            <option value="Academic">Academic</option>
                            <option value="Cv">Cv</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('document_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                     </div>
                  </div>

                  <div class="col-sm-6">
                            <div class="for-group">
                                <label>Document Name</label>
                                <input type="text" name="document_name"  class="form-control @error('document_name') is-invalid @enderror"  value="{{ old('document_name') }}"  autocomplete="document_name" autofocus>
                                @error('document_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                 
                  

               </div>
               <!--endrow1-->

               <!--secondrow-->
               <div class="row">
                    

                    <div class="col-sm-12">
                        <div class="for-group">
                            <label>Document File</label>
                            <input type="file" name="document_file"  class="form-control @error('document_file') is-invalid @enderror"  value="{{ old('document_file') }}"  autocomplete="document_file" autofocus>
                                @error('document_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>


               </div>
               <!--endsecond row-->




            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--end of modalad-->

@endsection