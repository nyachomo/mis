@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Letter Head</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="{{route('returnBackUrl')}}"><span class="right badge badge-secondary">Go Back</span></a></li>-->
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Letter Head</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->


<!-- Content Header (Page header) -->
 @if(empty($letterHead))
 <section class="content">
      <div class="container-fluid">
             <div class="card">
                <form method="POST" action="{{route('adminAddLetterHead')}}">
                    @csrf
                <div class="card-body">
                   
                    <textarea class="addTopic" name="letter_head"></textarea>
                </div>
                <div class="modal-footer justify-content-between">
                    
                    <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Add</button>
                </div>
                </form>

             </div>
      </div>
</section>

@else

    <section class="content">
        <div class="container-fluid">
        <button class="btn btn-danger" data-toggle="modal" data-target="#delete{{$letterHead->id}}"><i class="las la-plus"></i>Delete</button>
                <div class="card">
                    <form method="POST" action="{{route('adminUpdateLetterHead')}}">
                        @csrf
                    <div class="card-body">
                        <input type="text" name="id" value="{{$letterHead->id}}" hidden="true">
                        <textarea class="addTopic" name="letter_head">
                            {{$letterHead->letter_head}}
                        </textarea>
                    </div>

                    <div class="modal-footer justify-content-between">
                            
                        <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Update</button>
                    </form>
                    
                    </div>
                

                </div>
        </div>


            <!--add student modal-->
            <div class="modal  fade " id="delete{{$letterHead->id}}">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Are you sure you want to delete this record</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form role="form" method="POST" action="{{route('adminDeleteLetterHead')}}">
                            @csrf
                            <!-- /.card-header -->
                            <div class="card-body">
                                    <div class="row">
                                        <input type="text" name="id" value="{{$letterHead->id}}" hidden="true">
                                    </div>  
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                <button type="submit" class="btn btn-success"><i class="las la-edit"></i>Delete</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>
            <!--end add student modal-->


    </section>

@endif
<!-- /.container-fluid -->



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