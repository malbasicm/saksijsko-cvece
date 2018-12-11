@include('layout/header')
<form action="/forum/thread" method="post">
<input type="text" name="thread-name" placeholder="Ime teme..." required><br>
{{ csrf_field() }}
<input type="submit" value="Postavi">
</form>
@include('layout/footer')