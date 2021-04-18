<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}" /> --}}
</head>

<body>
    <div class="container">
        @foreach ($data as $item)
        {{ $item->id }}
        @endforeach
    </div>

    {{ $data->links() }}
    <form action="{{route('test.store')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Insert</button>
    </form>
</body>

</html>