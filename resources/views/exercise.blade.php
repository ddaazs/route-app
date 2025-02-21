<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
        .container {
            display: flex;
            flex-direction: column;
            margin: 5rem;
        }

        .container h1 {
            display: flex;
            justify-content: center;
        }

        .tbl-con {
            border-collapse: collapse;
        }

        .tbl-con thead tr {
            background-color: rgb(91, 184, 187);
        }

        .tbl-con th {
            padding: 0.5rem;
            border: 1px black solid
        }

        .tbl-con td {
            padding: 0.5rem;
            border-left: 1px black solid;
            border-right: 1px black solid;
            border-bottom: 1px black solid
        }

        .active {
            background-color: rgb(54, 255, 47);
        }

        .inactive {
            background-color: rgb(241, 84, 84);
        }

        .circle {
            border-radius: 20px;
        }
    </style>
    <title>Exercises</title>
</head>

<body>
    <div class="container">
        <h1>User table</h1>
        <table class="tbl-con">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Created_at</th>
                    <th style='width: 1.5rem'>Status</th>
                </tr>
            </thead>
            @foreach ($users as $user)
                <tbody>
                    {{-- @if ($user['status'] == 'active')
                    <tr class="active">
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['type'] }}</td>
                        <td>{{ $user['created_at'] }}</td>
                    </tr>
                @elseif ($user['status'] == 'inactive')
                    <tr class="inactive">
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['type'] }}</td>
                        <td>{{ $user['created_at'] }}</td>
                    </tr>
                @endif --}}
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['type'] }}</td>
                        <td>{{ $user['created_at'] }}</td>
                        @if ($user['status'] == 'active')
                            <td>
                                <div class='circle active'><br></div>
                            </td>
                        @elseif ($user['status'] == 'inactive')
                            <td>
                                <div class='circle inactive'><br></div>
                            </td>
                        @endif
                    </tr>

                </tbody>
                {{-- array(6) { ["id"]=> int(1) ["name"]=> string(15) "Nguyễn Văn A" ["email"]=> string(13) "a@example.com" ["type"]=> string(5) "admin" ["created_at"]=> string(19) "2023-01-01 12:00:00" ["status"]=> string(6) "active" } array(6) { ["id"]=> int(2) ["name"]=> string(14) "Trần Thị B" ["email"]=> string(13) "b@example.com" ["type"]=> string(6) "editor" ["created_at"]=> string(19) "2023-02-01 12:00:00" ["status"]=> string(6) "active" } array(6) { ["id"]=> int(3) ["name"]=> string(10) "Lê Văn C" ["email"]=> string(13) "c@example.com" ["type"]=> string(10) "subscriber" ["created_at"]=> string(19) "2023-03-01 12:00:00" ["status"]=> string(8) "inactive" } array(6) { ["id"]=> int(4) ["name"]=> string(13) "Phạm Văn D" ["email"]=> string(13) "d@example.com" ["type"]=> string(5) "admin" ["created_at"]=> string(19) "2023-04-01 12:00:00" ["status"]=> string(6) "active" } --}}
            @endforeach
        </table>
    </div>
</body>

</html>
