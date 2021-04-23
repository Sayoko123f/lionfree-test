@extends('admin.main')
@section('body')
<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>日期</th>
                    <th>標題</th>
                    <th>功能</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['news'] as $item)
                <tr>
                    <td>{{ $item->created_at }}</td>
                    <td><a href="{{route('admin.news.show',$item->id)}}">{{ $item->title }}</a></td>
                    <td>
                        <button type="button" class="btn btn-secondary"
                            onclick="my.edit('{{route('news.edit',$item->id)}}')">編輯</button>
                        <button type="button" class="btn btn-danger"
                            onclick="my.destroy('{{route('news.destroy',$item->id)}}')">
                            刪除</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $data['news']->links() }}
</div>
@endsection