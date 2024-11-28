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
                            <th>Class</th>
                            <th>ACTION</th>
                        </thead>
                        <tbody>
                             @if(!empty($letters))
                                 @foreach($letters as $key=>$letter)
                                   <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$letter->clas}}</td>
                                   </tr>
                                 @endforeach
                                <tr></tr>
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

<section class="content">
    <div class="container-fliud">
         
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Vertical Tabs Examples
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Home</a>
                  @if(!empty($letters))
                    @foreach($letters as $key=>$letter)
                    <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">{{$key+1}} . {{$letter->clas}}</a>
                    @endforeach
                  @endif
                  
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur. 
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                     Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
                  </div>
                  
                </div>
              </div>
            </div>
           
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->



    </div>
</section>


<!--add student modal-->
<div class="modal  fade " id="addSchoolModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Add New Scholarship Letter</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddScholarshiLetter')}}">
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