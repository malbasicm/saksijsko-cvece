@include('layout/header')
@if (Session::has('user'))
    @foreach (array_chunk($articles,3) as $arts)
        <div class="row">
            @for ($i = 0; $i < count($arts); $i++)
                <?php $article = $arts[$i]; ?>
                <div class="column">
                    <div class="shop-article">
                        <h3>{{$article['name']}}</h3>
                        <abbr title="{{$article['name']}}">
                            <img src="{{$article['src']}}" alt="{{$article['name']}}"/>
                        </abbr>
                        <h4>Cena: <span class="price">{{$article['price']}}</span></h4>
                        <p>{{$article['desc']}}</p>
                        <button data-id="{{$article['id']}}">Kupi</button>
                    </div>
                </div>
            @endfor
        </div>
    @endforeach
    <link rel="stylesheet" href="css/shop.css">
    <script src="js/shop.js"></script>
@else
    <p>Prijavite se.</p>
@endif
@include('layout/footer')