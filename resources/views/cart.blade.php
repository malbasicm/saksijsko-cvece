@include('layout/header')
@if (Session::has('user'))
    <ul id="cart"></ul>
    <button id="buybutton">Potvrdi</button>
    <script src="js/cart.js"></script>
@else
    <p>Prijavite se.</p>
@endif
@include('layout/footer')