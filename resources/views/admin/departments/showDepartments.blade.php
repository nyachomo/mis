@extends("layouts.master")
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Departments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#"><span class="right badge badge-info">Go Back</span> </a></li>-->
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Departments</li>
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
                        <!--<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#uploadDepartmentModal">UPLOAD</button>-->
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addDepartmentModal" style="border-radius:50px"><i class="fa fa-plus"></i>Add New Department</button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#archivedDepartmentModal" style="border-radius:50px"><i class="fa fa-trash"></i> {{$archiveddepartments->count()}} Archive</button>
                        
                     
                        <button type="button" style="border-radius:50px" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Export
                        </button>
                        <ul class="dropdown-menu">
                            <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                            <li><a class="dropdown-item text-info"  href="{{route('adminExportDepartmentsAsPdf')}}"><i class="fa fa-download"></i>Export Pdf</a></li>
                                <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-success"  href="{{route('adminExportExcelDepartments')}}"><i class="fa fa-download"></i>Export Excel</a></li>
                        </ul>
                    </div>


                   
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped" id="example1">
                        <thead>
                          
                            <th>#</th>
                            <th>Department Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                             @if(!empty($departments))
                                @foreach($departments as $key=>$department)
                                   <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$department->department_name}}</td>

                                        <td>

                                        <!-- Example single danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#update_department{{$department->id}}" href="#"> <i class="fa fa-edit las1"></i> Edit</a></li>
                                                    <div class="dropdown-divider"></div>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#archive_department{{$department->id}}" href="#"> <i class="fa fa-trash las2"></i> Archive</a></li>
                                                </ul>
                                            </div>

                                        </td>
 
                                   </tr>


                                    <!--update department modal-->
                                    <div class="modal  fade " id="update_department{{$department->id}}">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Update Department</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('adminUpdateDepartments')}}">
                                                    @csrf
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>Depatment Name<sup>*</sup></label>
                                                                        <input type="text" class="form-control" name="id" value="{{$department->id}}" hidden="true">
                                                                        <input type="text" class="form-control" name="department_name" value="{{$department->department_name}}"  required>
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
                                    <div class="modal  fade " id="archive_department{{$department->id}}">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Are You sure you want to archve this record</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('adminArchiveDepartments')}}">
                                                    @csrf
                                                   
                                                        
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="id" value="{{$department->id}}" hidden="true"> 
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
<div class="modal  fade " id="addDepartmentModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">ADD NEW DEPARTMENT</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddDepartments')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">
                   
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Depatment Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="department_name" required>
                            </div>
                        </div>
                    </div>   
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>ADD</button>
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
            <h6 class="modal-title">Archived Departments</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                   
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-sm table-bordered table-stripped">
                                <thead>
                                     <th>No</th>
                                     <th>Department Name</th>
                                     <th>Action</th>
                                </thead>
                                <tbody>
                                    @if(!empty($archiveddepartments))
                                       @foreach($archiveddepartments as $key=>$archivedepartment)
                                          <tr>
                                                 <td>{{$key+1}}</td>
                                                 <td>{{$archivedepartment->department_name}}</td>
                                                 <td>
                                                    <form method="POST" action="{{route('adminRecoverDepartments')}}">
                                                        @csrf
                                                         <input type="text" name="id" value="{{$archivedepartment->id}}" hidden="true">
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