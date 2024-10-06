
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
    @if(!empty($studentcat))
    <ol>
        <li> <b>Exam Name </b>: {{$studentcat->exam_name}}</li>
        <li> <b>Department </b>: {{$studentcat->department->department_name}}</li>
        <li> <b>Course Name </b> : {{$studentcat->course->course_name}}</li>
        <li> <b>Class Name </b>: {{$studentcat->clas->clas_name}}</li>

    </ol>
    @else
    @endif

    <table class="table table-stripped">
        <thead>
        
            <th>NO</th>
            <th>QUESTION</th>
            <th>ANSWER</th>
            <th>MARK</th>
            <th>ACTION</th>
        </thead>
        <tbody>
            @if(!empty($studentcatquestions))
                @foreach($studentcatquestions as $key=>$question)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td> <?php echo$question->question_name?> </td>
                        <td> <?php echo$question->question_answer?> </td>
                        <td>{{$question->question_mark}}</td>
                    </tr>

                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>
