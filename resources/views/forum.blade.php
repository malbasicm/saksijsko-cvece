@include('layout/header')
<h3>Forum:</h3>
@if (count($threads) == 0)
    <h5>Nema tema...</h5>
@else
    @foreach ($threads as $thread)
        <div class="forum-thread">
            <h6><a href="/forum/view/{{$thread['id']}}">{{$thread['name']}}</a> by {{$thread['user']}}</h6>
            <p>{{$thread['created_at']}}</p>
        </div>
    @endforeach
@endif
<hr>
<a href="/forum/thread">Nova tema</a>
@include('layout/footer')