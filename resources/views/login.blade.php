@include('layout/header')
    <div class="container">
        <form action="/user/login" method="post">
            <input type="email" placeholder="E-Mail..." name="email" required>
            <input type="password" placeholder="Password..." name="password" required>
            <input style="width: 100%" type="submit" value="Login/Register">
            @csrf
        </form>
        <br>
        <br>
        <form action="/user/reset" method="post">
            <input type="email" placeholder="E-Mail..." name="email" required>
            <input style="width: 100%" type="submit" value="Forgot Password?">
            @csrf
        </form>
    </div>
@include('layout/footer')