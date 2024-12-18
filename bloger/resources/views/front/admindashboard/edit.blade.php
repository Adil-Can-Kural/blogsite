@extends('front.admindashboard.layouts.adminmaster')
@section('title','Gönderi Düzenle')
@section('content')

<header class="masthead">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">

                </div>
            </div>
        </div>
    </div>
</header>

<body>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-8 col-xl-7">
                <h1>Gönderiyi Düzenle</h1>  

                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Put method kullanarak güncelleme işlemi yapılıyor -->
                    
                    <label for="title">Başlık:</label><br>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required><br><br>

                    <div style="margin-top: -40px ">
                        <label for="content">Gönderi İçeriği:</label><br>
                        <textarea class="form-control" id="content" name="content" rows="4" cols="3">{{ old('content', $post->content) }}</textarea>
                    </div>

                    <div style="margin-top: 20px;">
                        <label for="cover">Kapak Fotoğrafı:</label>
                        <input type="file" class="form-control" id="cover" name="cover" accept="image/*"><br>
                        @if($post->cover_image)
                            <img src="{{ asset('storage/'.$post->cover_image) }}" alt="Kapak Resmi" width="100"><br>
                            <small>Mevcut Kapak Resmi</small>
                        @endif

                        <label for="images">İçerik Fotoğrafı Ya Da Fotoğrafları:</label>
                        <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple><br>
                    </div>
                
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 20px;">Kaydet</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm" style="margin-top: 20px;">Geri</a>

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

@endsection
