        <?php

        use App\Http\Middleware\AdminMiddleware;
        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\PostController;
        use App\Http\Controllers\LoginController;
        use App\Http\Controllers\AdminController;

        Route::aliasMiddleware('admin', AdminMiddleware::class);
        // Ana sayfa ve temel sayfalar
    Route::get('/', [PostController::class, 'index'])->name('home');
    Route::get('/about', fn() => view('front.about'));
    Route::get('/contact', fn() => view('front.contact'));
    Route::get('/post', fn() => view('front.post'));

    // Post gösterme
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

    // Admin paneli ve gönderi yönetimi
    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/posts/{id}/edit', [AdminController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/posts/{id}', [AdminController::class, 'update'])->name('admin.posts.update');
        Route::delete('/posts/{id}', [AdminController::class, 'destroy'])->name('admin.posts.destroy');
    });
    
    // Kullanıcı giriş ve kayıt işlemleri
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        // Admin paneli ve gönderi oluşturma işlemleri
        Route::middleware('auth')->group(function () {
            Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
            Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
            Route::post('/comments', [PostController::class, 'storeComment'])->name('comments.store');
        });
        
        Route::get('/admin/update-post-status', [PostController::class, 'updateStatus'])->name('posts.update-status');
        Route::get('/posts/new', [PostController::class, 'newindex'])->name('posts.newindex');


