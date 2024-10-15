@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h6>Exam Attempts</h6>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#"><span class="right badge badge-secondary">Go Back</span></a></li>-->
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Attempts</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

<!--section>-->
    <section class="content">
         <div class="container-fluid">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <table>
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phonenumber</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if(!empty($studentAttempts))

                                @foreach($studentAttempts as $key=>$attempt)
                                   <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$attempt->user->user_firstname}} {{$attempt->user->user_secondname}} {{$attempt->user->user_surname}}</td>
                                      <td>{{$attempt->user->email}}</td>
                                      <td>{{$attempt->user->user_phonenumber}}</td>
                                      <td>
                                        <a href="{{url('/adminViewStudentAnswers/'.$attempt->user_id)}}"class="btn btn-sm btn-success"><i class="fa fa-eye"></i>View Answers</a>
                                      </td>
                                   </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                    
                </div>
            </div>
         </div>
    </section>
<!--endsection>-->
@endsection