
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

    <h3>System Users</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phonenumber</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($users))
                @foreach ($users as $key=>$user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->role}}</td>
                        <td>{{ $user->status}}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                @endforeach
            @else
            @endif
        </tbody>
    </table>
</body>
</html>
