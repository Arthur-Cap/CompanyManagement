<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="{{ asset('css\app.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    
    @foreach( $companies as $company )
    <div class="company-banner">
        <h1 class="company-name">{{$company->name}}</h1>
        <div class= info>
            <span><ion-icon name="people-circle-outline"></ion-icon> {{$company->employee->count()}}</span>
            <span><ion-icon name="briefcase-outline"></ion-icon>{{$company->companyProject->count()}}</span>
        </div>
        <p class="establish"><strong>Establish : </strong> {{$company->founded_date}}</p>
        <a class="cpn-detail" href="company/{{$company->id}}"><strong>Details</strong></a>
    </div>
    @endforeach

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
