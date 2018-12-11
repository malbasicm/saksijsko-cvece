@include('layout/header')
@foreach ($posts as $post)
    <div class="forum-post">
        <h6>{{$post['user']}}</h6>
        <p>{{$post['content']}}</p>
        <br>
        <p>{{$post['created_at']}}</p>
    </div>
@endforeach
<hr>
<h6>Odgovor:</h6>
<form action="/forum/post" method="post">
<textarea name="post" cols="30" rows="10"></textarea>
<input type="hidden" name="thread" value="{{$tid}}">
{{ csrf_field() }}
<input type="submit" value="Postavi">
</form>
@include('layout/footer')