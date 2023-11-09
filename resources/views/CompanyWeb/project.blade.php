<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task</title>
    <link href="{{ asset('css\company.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

    <table>
        <tr>
            <th>Task Name</th>
            <th>Description</th>
            <th>Open Date</th>
            <th>Employee</th>
            <th>DeadLine</th>
            <th>Project</th>
            <th>Status</th>

        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->content }}</td>
                <td>{{ $task->openDate }}</td>
                <td>{{ $task->assignedEmployee->name; }}</td>
                <td>{{ $task->deadLine }}</td>
                <td>{{ $task->assignedProject->name }}</td>
                <td>{{ $task->status==='0'?'Chưa hoàn thành':'Đã hoàn thành' }}</td>

            </tr>
        @endforeach
    </table>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
