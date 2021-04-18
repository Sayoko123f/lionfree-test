@extends('admin.main')
@section('body')
<div id="app" class="container">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>日期</th>
                    <th>標題</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['news'] as $item)
                <tr>
                    <td>{{ $item->created_at }}</td>
                    <td><a href="{{route('news.show',$item->id)}}">{{ $item->title }}</a></td>
                </tr>
                @endforeach
            </tbody>
            {{ $data['news']->links() }}
        </table>
    </div>
    {{-- <news-index></news-index> --}}
</div>
@endsection