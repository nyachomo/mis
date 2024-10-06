@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trainers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><span class="right badge badge-info">Go Back</span> </a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active"> Trainer Management</li>
              
            </ol>
          </div>
        </div>
      </div>
</section>

<section class="content">
  <div class="container-fliud">
   
          <div class="card">
                 <div class="card-header">
                                    
                    <div class="btn-group1" style="float:right">
                        <!--<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#uploadUsersModal"><i class="las la-plus"></i>Upload Users</button>-->
                        <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#uploadUsersModal"><i class="las la-plus"></i>Import Trainers</button>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addUserModal"><i class="las la-plus"></i>Add New Trainer</button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#archiveUsers"><i class="las la-plus"></i>{{$archivedUsers->count()}}Archive</button>
                        <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#suspendedUsers"><i class="las la-plus"></i>{{$suspendedUsers->count()}}Suspended</button>
                
                        <!--
                        <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Export
                        </button>
                        <ul class="dropdown-menu">
                            <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                            <li><a class="dropdown-item"  href="{{route('exportUser')}}">Export Pdf</a></li>
                                <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item"  href="{{route('adminExportUsersAsPdf')}}">Export Excel</a></li>
                        </ul>-->
                    </div>
                        
                 </div>

             <div class="card-body">
                
                <table class="table table-sm table-striped table-hover table-bordered" id="showUsersTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>  
                            <th scope="col">Roles</th> 
                            <th scope="col">Department</th>    
                            <th scope="col">Status</th>    
                            <th scope="col">Action</th>   
                        </tr>
                    </thead>

                    <tbody>
                       
                       @if(!empty($users))
                            @foreach($users as $key=>$user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->user_firstname}} {{$user->user_secondname}} {{$user->user_surname}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->user_phonenumber}}</td>
                                <td>
                                    <ol>
                                        @if($user->is_hod=='Yes')
                                              <li>Is Hod</li>
                                        @endif

                                        @if($user->is_trainer=='Yes')
                                              <li>Is Trainer</li>
                                        @endif

                                       

                                    </ol>
                                </td>
                                <td>
                                     @if(!empty($user->department))
                                          {{$user->department->department_name}}
                                     @else
                                     NA
                                     @endif
                                   
                                </td>
                                <td> <span class="right badge badge-success">{{$user->user_status}}</span></td>
                                <td>

                                <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                            <li><a class="dropdown-item" data-toggle="modal" data-target="#update_user{{$user->id}}" href="#"> <i class="fa fa-edit las1"></i> Edit Info</a></li>
                                            <div class="dropdown-divider"></div>
                                            <li><a class="dropdown-item" data-toggle="modal" data-target="#update_user_roles{{$user->id}}" href="#"> <i class="fa fa-edit las2"></i> Edit Roles</a></li>
                                            <div class="dropdown-divider"></div>
                                            <li><a class="dropdown-item" data-toggle="modal" data-target="#archive_user{{$user->id}}" href="#"> <i class=" fa fa-trash las3"></i> Archive </a></li>
                                            <div class="dropdown-divider"></div>
                                            <li><a class="dropdown-item" data-toggle="modal" data-target="#suspend_user{{$user->id}}" href="#"><i class=" fa fa-check las1"></i> Suspend </a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>

                                <!--Update-->
                              
                                <!--add student modal-->
                                <div class="modal  fade " id="update_user{{$user->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Edit Trainer</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form role="form" method="POST" action="{{route('adminUpdateUsers')}}">
                                                @csrf
                                                 <!-- /.card-header -->
                                                    <div class="card-body">
                                                        
                                                       <input type="text" name="id" value="{{$user->id}}" class="form-control" hidden="true">
                                                        <div class="row">

                                                         <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Department<sup>*</sup></label>
                                                                <select name="department_id" class="form-control" required>
                                                                    @if(!empty($user->department))
                                                                        <option value="{{$user->department->id}}">{{$user->department->department_name}}</option>
                                                                    @else
                                                                        <option value="">Select .. </option>
                                                                    @endif
                                                                
                                                                    @if(!empty($departments))
                                                                        @foreach($departments as $key=>$department)
                                                                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            </div>
                                                            <div class="col-sm-6">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Firstname<sup>*</sup></label>
                                                                    <input type="text" class="form-control" name="user_firstname" required value="{{$user->user_firstname}}">
                                                                </div>
                                                            </div>

                                                            
                                                            
                                                        </div>  

                                                        <div class="row">

                                                           <div class="col-sm-6">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Secondname<sup>*</sup></label>
                                                                    <input type="text" class="form-control" name="user_secondname" value="{{$user->user_secondname}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Surname<sup>*</sup></label>
                                                                    <input type="text" class="form-control" name="user_surname" value="{{$user->user_surname}}">
                                                                </div>
                                                            </div>

                                                            
                                                            
                                                        </div>  


                                                        <div class="row">

                                                           <div class="col-sm-6">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Phonenumber<sup>*</sup></label>
                                                                    <input type="number" class="form-control" name="user_phonenumber" required value="{{$user->user_phonenumber}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Email Address<sup>*</sup></label>
                                                                    <input type="email" class="form-control" name="email" required value="{{$user->email}}">
                                                                </div>

                                                            </div>


                                                        </div>  

                                                        
                                                        
                                                    </div>
                                                    <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                    <button type="submit" class="btn btn-success"><i class="las la-edit"></i>Update</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                <!-- /.modal-dialog -->
                                </div>
                                <!--end add student modal-->



                            <!--add student modal-->
                                <div class="modal  fade " id="update_user_roles{{$user->id}}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Update Role for : {{$user->user_firstname}} {{$user->user_secondname}} {{$user->user_surname}}</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                           
                                                @csrf
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                      <form method="post" action="{{route('adminRevokeUsersRoles')}}">
                                                        @csrf
                                                       <div class="row">
                                                        
                                                            <input type="text" name="id" value="{{$user->id}}" hidden="true"> 

                                                            @if($user->is_hod=='Yes')
                                                            <div class="col-sm-4">
                                                                 <input type="checkbox" name="is_hod" value="" > is Hod
                                                            </div>
                                                            @endif

                                                            @if($user->is_trainer=='Yes')
                                                            <div class="col-sm-4">
                                                                 <input type="checkbox" name="is_trainer" value=""> is Trainer
                                                            </div>
                                                            @endif
                                                             
                                                            
                                                            <div class="col-sm-6">
                                                                <button type="submit" name="submit" class="btn btn-success btn-sm">Revoke Selected Roles</button>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        </form>


                                                       
                                                        <form method="post" action="{{route('adminAddUsersRoles')}}">
                                                            @csrf
                                                        <div class="row">
                                                      
                                                           <label>Add Roles</label>
                                                           <input type="text" name="id" value="{{$user->id}}" hidden="true"> 

                                                           

                                                            @if($user->is_hod=='')
                                                            <div class="col-sm-4">
                                                                 <input type="checkbox" name="is_hod" value="Yes" >is Hod 
                                                            </div>
                                                            @endif

                                                            @if($user->is_trainer=='')
                                                            <div class="col-sm-4">
                                                                 <input type="checkbox" name="is_trainer" value="Yes"> Is Trainer
                                                            </div>
                                                            @endif
                                                             
                                                            
                                                            <div class="col-sm-6">
                                                                <button type="submit" name="submit" class="btn btn-success btn-sm">Add Selected Roles</button>
                                                            </div>
                                                           
                                                        </div>
                                                        </form>


                                                </div>
                                                <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                    <!--<button type="submit" class="btn btn-success"><i class="las la-trash"></i>Save</button>-->
                                                </div>
                                           
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                </div>
                            <!--end add student modal-->


                             <!--add student modal-->
                             <div class="modal  fade " id="archive_user{{$user->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Are you sure you want to archive this record</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form role="form" method="POST" action="{{route('adminArchiveUsers')}}">
                                                @csrf
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                       <input type="text" name="id" value="{{$user->id}}" hidden="true"> 
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                    <button type="submit" class="btn btn-success"><i class="las la-trash"></i>Archive</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                </div>
                            <!--end add student modal-->

                            <!--add student modal-->
                            <div class="modal  fade " id="suspend_user{{$user->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Are you sure you want to suspend this user</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form role="form" method="POST" action="{{route('adminSuspendUser')}}">
                                                @csrf
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                       <input type="text" name="id" value="{{$user->id}}" hidden="true"> 
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                    <button type="submit" class="btn btn-success"><i class="las la-trash"></i>Suspend</button>
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
                </table>    

             </div>

          </div>
    
  </div>
</section>


<!--add student modal-->
<div class="modal  fade " id="addUserModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Add New Trainer</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddUsers')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">
                   
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Department<sup>*</sup></label>
                                <select name="department_id" class="form-control" required>
                                    <option value="">Select .. </option>
                                    @if($departments)
                                          @foreach($departments as $key=>$department)
                                             <option value="{{$department->id}}">{{$department->department_name}}</option>
                                          @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Firstname<sup>*</sup></label>
                                <input type="text" class="form-control" name="user_firstname" required>
                            </div>
                        </div>

                       
                        
                    </div>  

                    <div class="row">
                       <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Secondname</label>
                                <input type="text" class="form-control" name="user_secondname">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" class="form-control" name="user_surname">
                            </div>
                        </div>

                        
                    </div>  


                    <div class="row">

                       <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Phonenumber<sup>*</sup></label>
                                <input type="text" class="form-control" name="user_phonenumber" required>
                            </div>
                        </div>
                        

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Email Address<sup>*</sup></label>
                                <input type="email" class="form-control" name="email" required min="1">
                            </div>

                        </div>

                    </div>  

                    <div class="row">
                        <label>Select Role</label>
                        
                        <div class="col-sm-4">
                            <input type="checkbox" name="is_trainer" value="Yes"> Is Trainer
                        </div>

                        <div class="col-sm-4">
                            <input type="checkbox" name="is_hod" value="Yes"> Is Hod
                        </div>


                    </div>

                    
                   
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Add</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->


<!--add student modal-->
<div class="modal  fade " id="archiveUsers">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Archived Trainer</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                   
            <table class="table table-sm table-bordered table-stripped" id="example1">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>  
                            <th>Roles</th>
                            <th>Department</th>
                            <th scope="col">Status</th>    
                            <th scope="col">Action</th>
                               
                            </tr>
                        </thead> 

                        <tbody>
                              @if(!empty($archivedUsers))
                                  @foreach($archivedUsers as $key=>$user)
                                  <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->user_firstname}}{{$user->user_secondname}}{{$user->user_surname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->user_phonenumber}}</td>
                                        <td>
                                            <ol>
                                                @if($user->is_hod=='Yes')
                                                    <li>Is Hod</li>
                                                @endif

                                                @if($user->is_deputy_trainer=='Yes')
                                                    <li>Is D.Principal</li>
                                                @endif

                                            </ol>
                                        </td>
                                        <td>
                                            @if(!empty($user->department))
                                                {{$user->department->department_name}}
                                            @else
                                            NA
                                            @endif
                                   
                                </td>
                                        <td>{{$user->user_status}}</td>
                                        <td>
                                            <form method="POST" action="{{route('adminRecoverArchiveUsers')}}">
                                                @csrf
                                                <input type="text" name="id" value="{{$user->id}}"  class="form-control" hidden="true">
                                                <button type="submit" name="submit" class="btn btn-sm btn-success">Recover</button>
                                            </form>
                                        </td>
                                  </td>
                                  @endforeach
                              @endif
                        </tbody>

                 </table>     


                    
                   
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="las la-times"></i>Close</button>
               
            </div>
       
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->


<!--add student modal-->
<div class="modal  fade " id="suspendedUsers">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Suspended Users</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                   
            <table class="table table-sm table-bordered table-stripped" id="example1">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th> 
                            <th>Roles</th> 
                            <th>Department</th>
                            <th scope="col">Status</th>    
                            <th scope="col">Action</th>
                               
                            </tr>
                        </thead> 

                        <tbody>
                              @if(!empty($suspendedUsers))
                                  @foreach($suspendedUsers as $key=>$user)
                                  <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->user_firstname}}{{$user->user_secondname}}{{$user->user_surname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->user_phonenumber}}</td>
                                        <td>
                                            <ol>
                                                @if($user->is_hod=='Yes')
                                                    <li>Is Hod</li>
                                                @endif

                                                @if($user->is_trainer=='Yes')
                                                    <li>Is D.Principal</li>
                                                @endif

                                            </ol>
                                        </td>
                                        <td>
                                            @if(!empty($user->department))
                                                {{$user->department->department_name}}
                                            @else
                                            NA
                                            @endif
                                        </td>
                                        
                                        <td>
                                            <span class="right badge badge-danger">{{$user->user_status}}</span>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('adminRecoverArchiveUsers')}}">
                                                @csrf
                                                <input type="text" name="id" value="{{$user->id}}"  class="form-control" hidden="true">
                                                <button type="submit" name="submit" class="btn btn-sm btn-success">Activate Account</button>
                                            </form>
                                        </td>
                                  </td>
                                  @endforeach
                              @endif
                        </tbody>

                 </table>     


                    
                   
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="las la-times"></i>Close</button>
               
            </div>
       
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->


<!--add student modal-->
<div class="modal  fade " id="uploadUsersModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Upload Trainer</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('adminImportUsersDataAsFromexcel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                       <div class="row">
                              <div class="col-sm-12">
                                 <div class="form-group" style="float:right">
                                     <a href="{{route('downloadTrainerImportFile')}}">Download File</a>
                                 </div>
                              </div>
                       </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select name="department_id" class="form-control" required>
                                        <option value="">Select .. </option>
                                        @if(!empty($departments))
                                            @foreach($departments as $key=>$department)
                                                <option value="{{$department->id}}">{{$department->department_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                    <label>Choose File</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="exampleInputFile" name="user_file" accept=".xlsx,.xls" required> 
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

