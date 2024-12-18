@extends('front.layouts.master')
@section('title','Oluştur')
@section('content')
    
<header class="masthead" style="background-image: url('{{asset('assets/img/postcreate-bg.jpg')}}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Gönderi Oluştur</h1>
                    <span class="subheading">Gönderi Oluşturmak mı İstiyorsun O Zaman Tam Yerindesin</span>
                </div>
            </div>
        </div>
    </div>
</header>
<body>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-8 col-xl-7">
                <h1>Yeni Bir Gönderi Oluştur</h1>

                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Başlık:</label><br>
                    <input type="text" class="form-control" id="title" name="title" required><br><br>
                
                    <div style="margin-top: -40px ">
                        <label for="content">Gönderi İçeriği:</label><br>
                        <textarea class="form-control" id="content" name="content" rows="4" cols="3"></textarea>
                    </div>

                    <div style="margin-top: 20px;">
                        <label for="cover">Kapak Fotoğrafı:</label>
                        <input type="file" class="form-control" id="cover" name="cover" accept="image/*"><br>
                    
                        <label for="images">İçerik Fotoğrafı Ya Da Fotoğrafları:</label>
                        <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple><br>
                    </div>
                
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 20px;">Gönderi Oluştur</button>
                    
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
