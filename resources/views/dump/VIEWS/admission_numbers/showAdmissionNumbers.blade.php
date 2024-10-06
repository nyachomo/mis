@extends('layouts.master')
@section('content')
<section class="content">
    <div class="container-fliud">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                            <div class="btn-group">
                                <button class="btn btn-sm orange" style="float:right" data-toggle="modal" data-target="#addNumberModal"><i class="las la-plus las1"></i>ADD NEW ADMISSION NUMBER</button>
                            </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-stripped" id="example1">
                            <thead>
                                <th>ACTION</th>
                                <th>ADM NUMBER</th>
                                <th>STATUS</th>
                               
                            </thead>
                            <tbody>
                                @if($numbers->count()>0)
                                   @foreach($numbers as $number)
                                    <tr>
                                        <!--action-->
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn lightColor btn-success btn-sm">ACTION</button>
                                                <button type="button" class="btn btn-success lightColor btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                                <div class="dropdown-menu" role="menu">
                                                    <center><h4><b>MORE ACTIONS</b></h4></center>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"  data-toggle="modal" data-target="#update_number{{$number->id}}">
                                                    <i class="las la-edit las1"></i> UPDATE ADMISSION NUMBER(S)
                                                    
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_number{{$number->id}}">
                                                        <i class="las la-eye las3"></i> DELETE ADMISSION NUMBER
                                                    </a>
                                                
                                                </div>
                                                </button>
                                            </div>
                                        </td>
                                        <!--end action-->

                                         <td>{{$number->number}}</td>
                                         <td>{{$number->status}}</td>
                                         
                                    </tr>

                                    <!--update leed-->
                                    <div class="modal fade" id="update_number{{$number->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">UPDATE ADMISSION NUMBER</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('updateAdmissionNumbers')}}">
                                                    @csrf
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <input type="text" name="id" value="{{$number->id}}" hidden="true">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>ADMISSION NUMBER <sup>*</sup></label>
                                                                    <input type="text"  name="number"  class="form-control @error('number') is-invalid @enderror"  value="{{$number->number}}" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
 
                                                        <!-- input states -->
                                                </div>
                                                <!-- /.card-body -->

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
                                                        <button type="submit" class="btn btn-success"><i class="las la-plus"></i>UPDATE</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!--end update leed-->
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

<!--add modal-->
<!--update profile image-->
<div class="modal fade" id="addNumberModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">ADD NEW ADMISSION NUMBER</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('addAdmissionNumbers')}}">
            @csrf
        <!-- /.card-header -->
        <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>ADMISSION NUMBER <sup>*</sup></label>
                            <input type="text"  name="number"  class="form-control @error('number') is-invalid @enderror"  value="{{ old('number') }}" required>
                            @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                

            
            <!-- input states -->
        </div>
        <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>ADD</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--studentskills-->

<!--end add modal-->


<!--error-->
@if ($errors->any())
    <div id="flash-message" class="alert alert-danger alert-dismissible position-fixed" style="top: 40px; right: 20px; z-index: 9999;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Faile. Please check the form  for errors
    </div>
@endif

@endsection

<!-- Include jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // setTimeout function to hide the flash message after 5 seconds
        setTimeout(function() {
            $('#flash-message').fadeOut('fast');
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>