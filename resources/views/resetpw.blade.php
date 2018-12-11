@include('layout/header')
        <form action="/user/reset" method="post">
            <input type="password" placeholder="Password..." name="email" required>
            <input type="hidden" name="token" value="{{$token}}">
            <input style="width: 100%" type="submit" value="Reset">
            @csrf
        </form>
    </div>
@include('layout/footer')