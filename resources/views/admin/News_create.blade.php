@extends('admin.main')
@section('body')
<div id="app" class="container">
    {{-- <form action="{{route('news.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">標題：</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="content">內容：</label>
        <textarea class="form-control" rows="5" id="content" name="ctx"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">送出</button>
    </form> --}}
    <news-create></news-create>
</div>
@endsection