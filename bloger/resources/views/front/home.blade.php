      @extends('front.layouts.master')
      @section('title','Ana Sayfa')
      
          
        <!-- Main Content-->
         @section('content')
         
         <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <span class="subheading">Benim Blog Sitem</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        
        
        
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-8 col-xl-7">
                    <!-- Post preview -->
                    @foreach($posts as $post)   
                        <div class="post-preview">
                            <a href="{{ route('post.show', $post->id) }}">
                                <h2 class="post-title">{{ $post->title }}</h2>
                                <h3 class="post-subtitle">{{ $post->subtitle }}</h3>
                            </a>
                            <p class="post-meta">
                                Posted on {{ $post->created_at->format('F d, Y') }}
                            </p>
                        </div>
                        <hr class="my-4" />
                    @endforeach
                    <!-- Pager -->
                    <div class="d-flex justify-content-end mb-4">
                        <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a>
                    </div>
                </div>
                @include('front.widgets.newwidget'  )
            </div>
        </div>
        

    
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdeliv
        <script src="{{ asset('js/scripts.js') }}"></script>

    </body>
</html>
@endsection
