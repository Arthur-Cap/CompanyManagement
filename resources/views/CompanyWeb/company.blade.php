<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company</title>
    <link href="{{ asset('css\company.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <form method="post" action="/search">
        @csrf
        <input type="hidden" name="page" value={{request()->query('page')}} />
        <input type="hidden" name="url" value={{request()->url()}} />

        <input type="text" name="search-field">

        <div class="form-group">
            <label for="start_date">Từ ngày:</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">Trước ngày:</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>

        <input type="radio" name="date_type" value="open" id="open_date" checked>
        <label for="open_date">Open Date</label>
        <input type="radio" name="date_type" value="close" id="close_date">
        <label for="close_date">Close Date</label>

        <div>
            <label for="quantity">Số lượng:</label>
            <input type="number" id="quantity" name="quantity" min="0" step="1">
        </div>
        
        <button type="submit" name="search">Search</button>

    </form>
    <table>
        <tr>
            <th>Project</th>
            <th>Size</th>
            <th>Customer</th>
            <th>Technical</th>
            <th>Open Date</th>
            <th>Close Date</th>
            <th></th>

        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->Size===null?0:$project->Size }}</td>
                <td>{{ $project->customer }}</td>
                <td>{{ $project->techinical }}</td>
                <td>{{ $project->openDate }}</td>
                <td>{{ $project->closeDate }}</td>
                <td><a class = "detail-btn"href="/project/{{ $project->id }}">Detail</a></td>

            </tr>
        @endforeach


    </table>
    @php
        $currentPage = request()->input('page', 1);
    @endphp
        @if (($currentPage - 1)>0)
        <a href="?page={{ $currentPage - 1 }}">{{ $currentPage-1 }}</a>
        @endif
    
    <span><strong>{{ $currentPage  }}</strong></span>
    @if (($currentPage + 1)< $maxPage)
    <a href="?page={{ $currentPage + 1 }}">{{ $currentPage+1 }}</a>
    @endif
    <br/>
    <br/>
    <a href="/">Home</a>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
