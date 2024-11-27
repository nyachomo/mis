@extends("layouts.master")
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Scholarship Letters</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
           
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Scholarship Letters</li>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Add New Scholarship Letter</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddSchools')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Class <sup class="supLeed">*</sup></label>
                                <select class="form-control" name="clas" required>
                                    <option value="">Select ..</option>
                                    <option value="Grade One">Grade 1</option>
                                    <option value="Grade Two">Grade 2</option>
                                    <option value="Grade Three">Grade 3</option>
                                    <option value="Grade Four">Grade 4</option>
                                    <option value="Grade Five">Grade 5</option>
                                    <option value="Grade Six">Grade 6</option>
                                    <option value="Grade Seven">Grade 7</option>
                                    <option value="Grade Eight">Grade 8</option>
                                    <option value="Grade Nine">Grade 9</option>
                                    <option value="Grade Ten">Grade 10</option>
                                    <option value="Grade Eleven">Grade 11</option>
                                    <option value="Grade Twelve">Grade 12</option>
                                    <option value="Form one">Form One</option>
                                    <option value="Form Two">Form Two</option>
                                    <option value="Form Three">Form Three</option>
                                    <option value="Form Four">Form Four</option>
                                </select>

                            </div>
                        </div>

                    </div>  

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Scholarship Letter</label>
                                <textarea name="scholarship_letter" class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        
                                </textarea> 
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