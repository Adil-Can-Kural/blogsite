@extends('front.layouts.master')
@section('title', $post->title)

@section('content')
<header class="masthead" style="background-image: url('{{ $post->cover_image ? asset('storage/' . $post->cover_image) : asset('assets/img/post-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>
                    <h2 class="subheading">{{ Str::limit(strip_tags($post->content), 100) }}</h2>
                    <span class="meta">
                        Posted on {{ $post->created_at->format('F d, Y') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                {!! nl2br (($post->content)) !!}
            </div>
        </div>      
    </div>  
</article>


<!-- Yorumlar -->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h3>Yorumlar</h3>

            <!-- Yorumları Listele -->
            @foreach($post->comments as $comment)
                <div class="comment mb-3">
                    <strong>{{ $comment->author }}</strong>
                    <p>{{ $comment->content }}</p>
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </div>
            @endforeach

            <!-- Yorum Formu -->
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="mb-3">
                    <label for="author" class="form-label">Adınız</label>
                    <input type="text" class="form-control" name="author" id="author" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Yorumunuz</label>
                    <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gönder</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
@endsection

