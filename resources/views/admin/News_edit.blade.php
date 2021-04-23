@extends('admin.main')
@section('body')
<div id="app">
    <news-edit puturl="{{route('news.update',$data['news'][0]->id)}}" _news="{{json_encode($data['news'][0])}}"></news-edit>
</div>
@endsection