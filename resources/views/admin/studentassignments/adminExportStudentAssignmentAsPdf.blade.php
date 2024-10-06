
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Student Cat </title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }

            table {
            width: 100%;
            border-collapse: collapse;
            }
            img {
                max-width: 100%; /* Ensure images don't exceed page width */
                height: auto;
            }
        </style>
    </head>
<body> 

    <center><img src="{{$imageSrc}}" alt="Logo" style="width:400px;height:auto;"></center>
    

                        <table class="table table-sm table-bordered table-stripped" id="example1">
                            <thead>
                            
                                <th>DEPARTMENT</th>
                                <th>COURSE</th>
                                <th>CLASS</th>
                                <th>EXAM TYPE</th>
                                <th>EXAM NAME</th>
                                <th>START_DATE</th>
                                <th>END DATE</th>
                                <th>DURATION</th>
                                <th>TOTAL SCORE</th>
                                <th>EXAM STATUS</th>
                               
                            </thead>
                            <tbody>
                                @if($studentAssignments->count()>0)
                                    @foreach($studentAssignments as $key=>$exam)
                                    <tr>
                                            
                                            <td>{{$exam->department->department_name}}</td>
                                            <td>{{$exam->course->course_name}}</td>
                                            <td>{{$exam->clas->clas_name}}</td>
                                            <td>{{$exam->exam_type}}</td>
                                            <td>{{$exam->exam_name}}</td>  
                                            <td>{{$exam->exam_start_date}}</td>  
                                            <td>{{$exam->exam_end_date}}</td>  
                                            <td>{{$exam->exam_duration}}</td>  
                                            <td>{{$exam->exam_total_score}}</td>  
                                            <td>
                                                @if($exam->exam_status=="Published")
                                                    <span class="right badge badge-success">{{$exam->exam_status}}</span>
                                                @else
                                                    <span class="right badge badge-danger">{{$exam->exam_status}}</span>
                                                    
                                                @endif
                                                
                                            </td>  
                                    </tr>


                                    @endforeach
                                @else
                                @endif
                            </tbody>
                        </table>
</body>
</html>
