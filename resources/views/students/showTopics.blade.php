@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

 <!-- /.row -->
<section class="content">
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
            @if(!empty($topics))
              @foreach($topics as $topic)
              <a class="nav-link " id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home{{$topic->id}}" role="tab" aria-controls="vert-tabs-home" aria-selected="true">{{$topic->topic_name}}</a>
              @endforeach
            @endif
           
        </div>
        </div>
        <div class="col-7 col-sm-9">
        <div class="tab-content" id="vert-tabs-tabContent">
            @foreach($topics as $topic)
            <div class="tab-pane text-left fade show " id="vert-tabs-home{{$topic->id}}" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                <?php echo$topic->topic_content;?>
            </div>
            @endforeach
        </div>
        </div>
    </div>
    
    </div>
    <!-- /.card -->
</div>
<!-- /.card -->
</section>


@endsection