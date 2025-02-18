<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title','blog sitesi')</title>
        <link rel="icon" type="image/x-icon" href="{{asset('/')}}/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <!-- Start Bootstrap -->
                <a class="navbar-brand" href="{{ auth()->check() && auth()->user()->is_admin ? url('/admin') : url('/login') }}">
    Start 
</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/') }}">Ana Sayfa</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/about') }}">Hakkımda</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/contact') }}">İletişim</a></li>
        
                        @if(auth()->check())
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/posts/create') }}">Gönderi Oluştur</a></li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="nav-link px-lg-3 py-3 py-lg-4 logout-button">
                                        Çıkış Yap
                                    </button>
                                </form>
                            </li>
                            
                        @else
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/login') }}">Giriş Yap</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        
    
        
        