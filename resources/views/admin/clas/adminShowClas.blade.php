@extends("layouts.master")
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clases</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><span class="right badge badge-info">Go Back</span> </a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Clases</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

<!-- Content Header (Page header) -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header">

                <div class="btn-group1" style="float:right">
                        
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addClasModal"><i class="las la-plus"></i>Add New Clas</button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#archivedDepartmentModal"><i class="las la-plus"></i>{{$archivedclases->count()}} Archive</button>
                        <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Export
                        </button>
                        <ul class="dropdown-menu">
                            <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                            <li><a class="dropdown-item"  href="{{route('adminExportClasAsPdf')}}"> <i class="fa fa-download las1" aria-hidden="true"></i>Export Pdf</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item"  href="{{route('adminExportExcelClas')}}"><i class="fa fa-file-excel-o las3" aria-hidden="true"></i> Export Excel</a></li>
                           
                        </ul>
                    </div>
 
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped" id="example1">
                        <thead>
                            <th>#</th>
                            <th>Class Name</th>
                            <th>Department</th>
                            <th>Has Time Table</th>
                            <th>ACTION</th>
                        </thead>
                        <tbody>
                             @if(!empty($activeclases))
                                @foreach($activeclases as $key=>$activeclas)
                                   <tr>
                                         
                                       <td>{{$key+1}}</td>
                                       <td><a href="/adminShowStudentCatsPerClass/{{$activeclas->id}}">{{$activeclas->clas_name}}</a></td>
                                       <td>{{$activeclas->department->department_name}}</td>
                                       <td>
                                         @if($activeclas->timetable=="")
                                         <p class="text-danger"><b>Has no timetable</b></p>
                                         @else
                                         <p class="text-success"><b>Has  timetable</b></p>
                                         @endif
                                       </td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#update_clas{{$activeclas->id}}" href="#"> <i class="fa fa-edit las1"></i> Edit Clas</a></li>
                                                    <div class="dropdown-divider"></div>

                                                    @if($activeclas->timetable=="")
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#add_timetable{{$activeclas->id}}" href="#"> <i class="fa fa-edit las1"></i> Add Time table</a></li>
                                                    <div class="dropdown-divider"></div>
                                                    @else

                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#update_timetable{{$activeclas->id}}" href="#"> <i class="fa fa-edit las1"></i> View/Update Timetable</a></li>
                                                    <div class="dropdown-divider"></div>
                                                    @endif
                                                   

                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#archive_clas{{$activeclas->id}}" href="#"> <i class="fa fa-edit las2"></i> Archive Clas</a></li>
                                                </ul>
                                            </div>
                                        </td>

                                   </tr>


                                    <!--update department modal-->
                                    <div class="modal  fade " id="add_timetable{{$activeclas->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Add Timetable</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('adminUpdateClases')}}">
                                                    @csrf
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        
                                                            <input type="text" class="form-control" name="id" value="{{$activeclas->id}}" hidden="true" required>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Timetable<sup>*</sup></label> 

                                                                    <textarea name="timetable" class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                       
                                                                    </textarea> 

                                                                    
                                                                </div>
                                                            </div>

                                                          

                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                        <button type="submit" class="btn btn-success"><i class="las la-plus"></i>SAVE</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!--end update department modal-->

                                    <!--update department modal-->
                                    <div class="modal  fade " id="update_timetable{{$activeclas->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Update Timetable</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('adminUpdateClases')}}">
                                                    @csrf
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        
                                                            <input type="text" class="form-control" name="id" value="{{$activeclas->id}}" hidden="true" required>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Timetable<sup>*</sup></label> 

                                                                    <textarea name="timetable" class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                       <?php echo$activeclas->timetable?>
                                                                    </textarea> 

                                                                    
                                                                </div>
                                                            </div>

                                                          

                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                        <button type="submit" class="btn btn-success"><i class="las la-plus"></i>SAVE</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!--end update department modal-->


                                    <!--update department modal-->
                                    <div class="modal  fade " id="update_clas{{$activeclas->id}}">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Update Clas</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('adminUpdateClases')}}">
                                                    @csrf
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        
                                                            <input type="text" class="form-control" name="id" value="{{$activeclas->id}}" hidden="true" required>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Department<sup>*</sup></label> 
                                                                    <select class="form-control" name="department_id" required>
                                                                        <option value="{{$activeclas->department_id}}">{{$activeclas->department->department_name}}</option>
                                                                        @if(!empty($departments))
                                                                            @foreach($departments as $department)
                                                                                <option value="{{$department->id}}">{{$department->department_name}} </option>
                                                                            @endforeach
                                                                        @else
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>

                                                           

                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label>Clas Name<sup>*</sup></label>
                                                                        <input type="text" class="form-control" name="clas_name" value="{{$activeclas->clas_name}}"required>
                                                                    </div>
                                                                </div>
                                                            </div>   



                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                        <button type="submit" class="btn btn-success"><i class="las la-plus"></i>SAVE</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!--end update department modal-->

                                    <!--update department modal-->
                                    <div class="modal  fade " id="archive_clas{{$activeclas->id}}">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Are You sure you want to delete this record</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('adminArchiveClases')}}">
                                                    @csrf
                                                   
                                                        
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="id" value="{{$activeclas->id}}" hidden="true"> 
                                                                    </div>
                                                                </div>
                                                            </div>   
                                                  

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                        <button type="submit" class="btn btn-success"><i class="las la-trash"></i>ARCHIVE</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!--end update department modal-->

                                @endforeach
                               
                             @else
                             @endif
                        </tbody>
                    </table>
                </div>
             </div>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->


<!--add student modal-->
<div class="modal  fade " id="addClasModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">ADD NEW CLASS</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddClases')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12">
                             <label>Department<sup>*</sup></label> 
                             <select class="form-control" name="department_id" required>
                                 <option value="">Select .. </option>
                                 @if(!empty($departments))
                                    @foreach($departments as $department)
                                         <option value="{{$department->id}}">{{$department->department_name}} </option>
                                    @endforeach
                                 @else
                                 @endif
                             </select>
                        </div>
                    </div>

                    

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Clas Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="clas_name" required>
                            </div>
                        </div>
                    </div>   
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>SAVE</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->



<!--add student modal-->
<div class="modal  fade " id="archivedDepartmentModal">
  <div class="modal-dialog ">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Archived Clases</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                   
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-sm table-bordered table-stripped">
                                <thead>
                                     <th>No</th>
                                     <th>Class Name</th>
                                     <td>Department</td>
                                     <th>Action</th>
                                </thead>
                                <tbody>
                                    @if(!empty($archivedclases))
                                       @foreach($archivedclases as $key=>$archivedclas)
                                          <tr>
                                                 <td>{{$key+1}}</td>
                                                 <td>{{$archivedclas->clas_name}}</td>
                                                 <td>{{$archivedclas->department->department_name}}</td>
                                                 <td>
                                                    <form method="POST" action="{{route('adminRecoverClases')}}">
                                                        @csrf
                                                         <input type="text" name="id" value="{{$archivedclas->id}}" hidden="true">
                                                         <button type="submit" class="btn btn-sm btn-success">Recover</button>
                                                    </form>
                                                 </td>
                                          </tr>
                                       @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>   
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                
            </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->

<!--add student modal-->
<div class="modal  fade " id="uploadDepartmentModal">
  <div class="modal-dialog ">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Upload Department</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('adminImportExcelDepartments') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-sm-12">

                                    <div class="input-group">
                                        <div class="custom-file">
                                           
                                            <input type="file" class="form-control" id="exampleInputFile" name="department_file">
                                           
                                        </div>
                                        <div class="input-group-append">
                                           <button type="submit" class="btn btn-secondary">Import</button>
                                        </div>
                                    </div>
                            </div>
                        </div> 
                    </form>  
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                
            </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->


@endsection