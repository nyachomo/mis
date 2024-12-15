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



<section class="content">
    <div class="container-fliud">
         
        <!-- /.row -->
        <div class="card card-primary card-outline">
          
          <div class="card-body">
            <div class="row">
              
              <div class="col-5 col-sm-3">
                
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                 <button style="float:right"class="btn btn-success btn-sm" data-toggle="modal" data-target="#addSchoolModal"><i class="las la-plus"></i>Add New Scholarship Letter</button>
                 <br>
                  <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Letter Head</a>
                  @if(!empty($letters))
                    @foreach($letters as $key=>$letter)
                    <a class="nav-link" id="vert-tabs-profile-tab{{$letter->id}}" data-toggle="pill" href="#vert-tabs-profile{{$letter->id}}" role="tab" aria-controls="vert-tabs-profile{{$letter->id}}" aria-selected="false">{{$key+1}} . {{$letter->clas}}</a>
                    @endforeach
                  @endif

                  
                  
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                       <?php 
                         if(empty($letterHead->letter_head)){
                          
                         }else{
                          echo$letterHead->letter_head;
                         }
                            
                       ?>
                  </div>
                  @if(!empty($letters))
                       @foreach($letters as $key=>$letter)

                        <div class="tab-pane fade" id="vert-tabs-profile{{$letter->id}}" role="tabpanel" aria-labelledby="vert-tabs-profile-tab{{$letter->id}}">
                            <button  class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#updateLetter{{$letter->id}}"><i class="las la-plus"></i>Update this Scholarship Letter</button>
                            <button  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteLetter{{$letter->id}}"><i class="las la-plus"></i>Delete this Scholarship Letter</button>
                            
                            <textarea class="addTopic"name="scholarship_letter">
                                 <?php 
                               
                                   if(empty($letterHead->letter_head)){
                                    
                                   }else{
                                    echo$letterHead->letter_head;
                                   }
                                 
                                
                                 ?>
                                 <?php echo$letter->scholarship_letter;?>
                            </textarea>
                       
                        </div> 
                        
                        

                        <!--add student modal-->
                        <div class="modal  fade " id="updateLetter{{$letter->id}}">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Update Scholarship Letter for {{$letter->clas}}</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form role="form" method="POST" action="{{route('adminUpdateScholarshiLetter')}}">
                                    @csrf
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                           <input type="text" name="id" value="{{$letter->id}}" hidden="true">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Scholarship Letter</label>
                                                        <textarea name="scholarship_letter" class="addTopic">

                                                        <?php 
                                                          /*
                                                              if(empty($letterHead->letter_head)){
                                                                ?>
                                                                  <p>No Letter Head <a class="btn btn-success" href="{{route('adminViewLetterHead')}}">Add</a></p>
                                                                <?php
                                                              }else{
                                                                echo$letterHead->letter_head;
                                                              }
                                                            
                                                              */
                                                            ?>
                                                             

                                                               <?php echo$letter->scholarship_letter;?>
                                                        </textarea> 
                                                    </div>
                                                </div>
                                            </div>  
                                            
                                          

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                        <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!--end add student modal-->


                        <!--add student modal-->
                        <div class="modal  fade " id="deleteLetter{{$letter->id}}">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header" style="border:1px solid white">
                                    <h6 class="modal-title">Are you sure you want to delete this letter ?</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form role="form" method="POST" action="{{route('adminDeleteScholarshiLetter')}}">
                                    @csrf
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                           <input type="text" name="id" value="{{$letter->id}}" hidden="true">
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                        <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Delete</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!--end add student modal-->




                       @endforeach
                  @endif
                  
                  
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
            <h6 class="modal-title">New Scholarship Letter</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddScholarshiLetter')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">
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