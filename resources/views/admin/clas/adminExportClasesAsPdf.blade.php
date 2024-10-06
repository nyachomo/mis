
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

    <center><img src="{{$imageSrc}}" alt="Logo" style="width:400px;height:auto;"></center>
    <h1>Training Clases</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Class Name</th>
                <th>Department</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activeclases as $key=>$activeclas)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $activeclas->clas_name}}</td>
                    <td>{{ $activeclas->department->department_name}}</td>
                    <td>{{ $activeclas->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
