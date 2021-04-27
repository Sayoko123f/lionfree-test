@extends('admin.main')
@section('body')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$data['news'][0]->title}}</h4>
            <hr />
            <div class="markdown-body" id="maincontent"></div>
        </div>
    </div>
    <button type="button" class="btn btn-danger mt-2 float-right"
        onclick="my.destroy('{{route('news.destroy',$data['news'][0]->id)}}')">
        刪除</button>
    <button type="button" class="btn btn-secondary mt-2 mr-2 float-right"
        onclick="my.edit('{{route('news.edit',$data['news'][0]->id)}}')">編輯</button>
</div>
@endsection
@section('script')
<script>
    (()=> {
      let url = window.location.origin + "/api/news/{{$data['news'][0]->id}}";
      const csrfToken = document.head.querySelector(
        "[name~=csrf-token][content]"
      ).content;
      fetch(url, {
        method: "get",
        headers: {
          "X-CSRF-TOKEN": csrfToken,
        },
      }).then((response) => {
        response
          .json()
          .then((data) => {
            console.log(data);
            if (data.length == 0) {
              // go to 404 page
              location.href = '/admin';
            }
            try{
                document.getElementById('maincontent').innerHTML = marked(data[0].ctx);
            }catch(e){
                console.log(e);
            document.getElementById('maincontent').innerHTML = data[0].ctx;
            }   
          })
          .catch((err) => {
            console.log(err);
            alert(err);
          });
      });
    })();
</script>
@endsection