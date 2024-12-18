@extends('front.layouts.master')
@section('title','login')


@section('content')
    

<header class="masthead" style="background-image: url('assets/img/login-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Giriş</h1>
                    <span class="subheading">Admin Giriş Paneli. Sayfanın Yazarları Buradan Giriş Yapar</span>
                </div>
            </div>
        </div>
    </div>
</header>

 

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-8 col-xl-7">
            <h1>Giriş Yap</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">E-posta:</label><br>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Şifre:</label><br>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit">Giriş Yap</button>
    </form>


            </div>
         
          
        </div>
  @endsection
  