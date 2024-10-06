
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Departments Report</title>
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

    <center><img src="{{ $imageSrc }}" alt="Logo" style="width:400px;height:auto;"></center>

    <!--<center><img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/logo.jpeg'))) }}" width="400px"></center>-->

    <h1>Courses</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Level</th>
                <th>Duration (Months)</th>
                <th>Department</th>
                <th>Price (Ksh)</th>
                <th>Created At</th>
               
            </tr>
        </thead>
        <tbody>
            @if(!empty($courses))
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->course_level }}</td>
                    <td>{{ $course->course_duration }}</td>
                    <td>{{ $course->department->department_name }}</td>
                    <td>{{ $course->course_price }}</td>
                    <td>{{ $course->created_at }}</td>
                   
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>
