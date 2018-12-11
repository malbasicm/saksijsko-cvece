<!DOCTYPE html>
<html lang="rs.RS">
<head>
    <!-- Meta tagovi -->
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- SEO Tagovi -->
    <!-- Open Graph -->
    <meta property="og:title" content="Saksijsko Cveće">
    <meta property="og:site_name" content="Saksijsko Cveće">
    <meta property="og:url" content="http://saksijsko-cvece.co.nf/">
    <meta property="og:description" content="Sajt posvećen saksijskom cveću. Školski projekat.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://i.imgur.com/dOTFtGE.jpg">
    <meta property="og:image:width" content="1399">
    <meta property="og:image:height" content="1200">
    <!-- Ostalo -->
    <meta name="description" content="Sajt posvećen saksijskom cveću. Školski projekat.">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="skola,skolski projekat,cvece,flowers">
    <link rel="shortcut icon" href="https://i.imgur.com/dOTFtGE.jpg" type="image/jpeg">
    <title>Saksijsko Cveće</title>
</head>
<body>
    <div class="container animated fadeIn">
        <h1 class="text-center">Saksijsko cveće <i class="fas fa-leaf"></i></h1>
        <h5 class="text-center">Školski projekat</h5>
        <hr>
        <div class="row text-center">
            <div class="column"><a href="/">Početna strana</a></div>
            <div class="column"><a href="/galerija">Galerija</a></div>
            <div class="column"><a href="/shop">Shop</a></div>
<<<<<<< HEAD
=======
            <div class="column"><a href="/cart">Korpa</a></div>
>>>>>>> 52a6b6efc00849d4f564073a13bbcd001b3487be
            <div class="column"><a href="/forum">Forum</a></div>
            <div class="column"><a href="/osajtu">O Sajtu</a></div>
            <div class="column"><a href="/oautoru">O Autoru</a></div>
            <div class="column">
                <?php if(Session::has('user')): ?>
                    <a href="/logout">Odjavi se</a>
                <?php else: ?>
                    <a href="/login">Prijavi/Registruj se</a>
                <?php endif; ?>
            </div>
        </div>
        <hr>