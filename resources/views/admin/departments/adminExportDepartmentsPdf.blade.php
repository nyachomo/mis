
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

    <h1>Departments Report</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Department Name</th>
                <th>Department Status</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td>{{ $department->department_status }}</td>
                    <td>{{ $department->created_at }}</td>
                    <td>{{ $department->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
