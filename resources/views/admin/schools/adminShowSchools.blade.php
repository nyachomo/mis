@extends("layouts.master")
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Schools</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
           
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Schools</li>
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
                        
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addSchoolModal"><i class="las la-plus"></i>Add New School</button>
                    </div>
 
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped" id="example1">
                        <thead>
                            <th>#</th>
                            <th>School Name</th>
                            <th>Location</th>
                            <th>Contact Person</th>
                            <th>Phonenumber</th>
                            <th>ACTION</th>
                        </thead>
                        <tbody>
                             @if(!empty($schools))
                                @foreach($schools as $key=>$school)
                                   <tr>
                                         
                                       <td>{{$key+1}}</td>
                                       <td>{{$school->school_name}}</td>
                                       <td>{{$school->school_location}}</td>
                                       <td>{{$school->school_contact_person}}</td>
                                       <td>{{$school->phonenumber}}</td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#update_clas{{$school->id}}" href="#"> <i class="fa fa-edit las1"></i> Edit</a></li>
                                                    <div class="dropdown-divider"></div>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#archive_clas{{$school->id}}" href="#"> <i class="fa fa-edit las2"></i> Archive</a></li>
                                                </ul>
                                            </div>
                                        </td>

                                   </tr>

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
<div class="modal  fade " id="addSchoolModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Add New School</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddSchools')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="school_name" required>
                            </div>
                        </div>
                    </div>  

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>School Location</label>
                                <input type="text" class="form-control" name="school_location" >
                            </div>
                        </div>
                    </div>  
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>School Contact Person<sup>*</sup></label>
                                <input type="text" class="form-control" name="school_contact_person">
                            </div>
                        </div>
                    </div>  
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Phonenumber<sup>*</sup></label>
                                <input type="text" class="form-control" name="phonenumber" >
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





@endsection