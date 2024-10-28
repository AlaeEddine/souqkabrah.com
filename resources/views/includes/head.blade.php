<meta charset="utf-8" />
@if(isset($Page) && ($Page->title != null))
<title>{{ e($Page->title) }}</title>
@else
<title>{{e($Setting->title)}}</title>
@endif
<meta name="description" content="{{e($Setting->description)}}" />
<meta name="keywords" content="{{e($Setting->tags)}}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='copyright' content=''>
<link rel="author" href="humans.txt" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta property="og:locale" content="ar_MA" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="canonical" href="{!! $Setting->url !!}" />
<meta name="application-name" content="{{$Setting->title2}}"/>

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<meta name="msapplication-notification" content="frequency=30;polling-uri=https://notifications.buildmypinnedsite.com/?feed=https://www.souqkabrah.com/feeds&amp;id=1;polling-uri2=https://notifications.buildmypinnedsite.com/?feed=https://www.souqkabrah.com/feeds&amp;id=2;polling-uri3=https://notifications.buildmypinnedsite.com/?feed=https://www.souqkabrah.com/feeds&amp;id=3;polling-uri4=https://notifications.buildmypinnedsite.com/?feed=https://www.souqkabrah.com/feeds&amp;id=4;polling-uri5=https://notifications.buildmypinnedsite.com/?feed=https://www.souqkabrah.com/feeds&amp;id=5;cycle=1" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/23.1.0/css/intlTelInput.css" integrity="sha512-OkSoWyaoScjXhOm87XO5hDz1E5buvm2aAkq+5zJmaYpylA0OKJ5no5qc4ZRrmApoaXEgXc3n0iyVS1q5FgiJjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/choices.js/10.2.0/choices.min.css" integrity="sha512-oW+fEHZatXKwZQ5Lx5td2J93WJnSFLbnALFOFqy/pTuQyffi9gsUylGGZkD3DTSv8zkoOdU7MT7I6LTDcV8GBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{ url('/assets/css/plugins') }}/toggle-password.css" rel="stylesheet">

<style>
    .black{
        text-decoration:none;
        font-weight: bold;
        color: black;
    }
    .black:hover{
        color: black;
        cursor: pointer;
    }

    .city_selector,.choices__inner{
        margin-top: -2px !important;
        padding: 0px !important;
        font-size: 20px !important;
        color: gray !important;
        border:transparent !important;
        float: right !important;
        background-color: transparent !important;
    }
    .gray{
        background-color: #eee;
    }
    .row{
        max-width: 100% !important;
    }
    .border-dark{
        border: 1px solid #000 !important;
    }
    .position-relative.shineEffect.btn.btn-primary.form-control.mt-2.p-2.mb-2 {
    overflow: hidden; /* Empêche l'effet de déborder du bouton */
}

.shineEffect:before {
    content: "";
    position: absolute;
    background: #FFF;
    width: 4px;
    height: 50px;
    top: -5px;
    bottom: 0;
    left: -40px;
    transform: rotate(25deg);
    box-shadow: 0 0 20px #fff;
    filter: blur(3px);
    transition: 1s;
    animation: shineEffectFrame 1s infinite ease-in-out;
}

@-webkit-keyframes shineEffectFrame {
    from {
        left: -40px;
    }
    to {
        left: calc(100% + 40px); /* Assure que l'effet ne s'arrête pas avant la fin du bouton */
    }
}

@keyframes shineEffectFrame {
    from {
        left: -40px;
    }
    to {
        left: calc(100% + 40px); /* Assure que l'effet ne s'arrête pas avant la fin du bouton */
    }
}

</style>
{!! $Setting->header !!}
