@include('layout/header')
@foreach(array_slice(scandir(getcwd().'/image/galerija'),2) as $image)
    <abbr title="{{ pathinfo($image, PATHINFO_FILENAME) }}">
        <img src="{{ URL::to('/image/galerija').'/'.$image }}" alt="{{ pathinfo($image, PATHINFO_FILENAME) }}" class="galerija">
    </abbr>
@endforeach
@include('layout/footer')