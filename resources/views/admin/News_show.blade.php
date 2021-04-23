@extends('admin.main')
@section('body')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$data['news'][0]->title}}</h4>
            <p class="card-text">{{$data['news'][0]->ctx}}</p>
        </div>
    </div>
    <button type="button" class="btn btn-danger mt-2 float-right"
        onclick="my.destroy('{{route('news.destroy',$data['news'][0]->id)}}')">
        刪除</button>
    <button type="button" class="btn btn-secondary mt-2 mr-2 float-right"
        onclick="my.edit('{{route('news.edit',$data['news'][0]->id)}}')">編輯</button>
</div>
@endsection