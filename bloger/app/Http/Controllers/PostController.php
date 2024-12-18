<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

class PostController extends Controller
{
    public function create()
    {
        return view('front.create');
    }

    public function show($id)
{
    $post = Post::with('comments')->findOrFail($id); // Yorumlarla birlikte gönderiyi al

    // İçerik resimlerini düzenle
    $images = $post->images; // İlişkili resimleri al
    foreach ($images as $index => $image) {
        $placeholder = "[image" . ($index + 1) . "]";
        $imageTag = "<img src='" . asset("storage/{$image->image_path}") . "' alt='{$image->alt_text}' />";
        $post->content = Str::replaceFirst($placeholder, $imageTag, $post->content);
    }

    return view('front.post', compact('post'));
}

    
    
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kapak fotoğrafı doğrulama
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // İçerik fotoğrafları
        ]);
    
        // Kapak fotoğrafını kaydet
        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }
    
        // Gönderiyi kaydet
        $post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'cover_image' => $coverPath,
            'status' => 'new',
        ]);
    
        // İçerik resimlerini kaydet
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imagePath = $image->store("content_images/post_{$post->id}", 'public');
    
                // Yeni resim kaydını ilişkilendir
                $post->images()->create([
                    'image_path' => $imagePath,
                    'alt_text' => "Image for {$post->title}", // Opsiyonel
                    'order' => $index + 1,
                ]);
            }
        }
    
        return redirect()->route('post.show', $post)->with('success', 'Post created successfully!');
    }
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->take(4)->get();
    
        // Subtitle yerine content sütunundan kesit al
        foreach ($posts as $post) {
            $post->subtitle = Str::limit($post->content, 100); // 100 karakterlik bir kesit
        }
        $newPostCount = Post::where('status', 'new')->count();

        return view('front.home', compact('posts','newPostCount'));
    }
    public function storeComment(Request $request)
{
    $validated = $request->validate([
        'post_id' => 'required|exists:posts,id', // Geçerli bir post ID olmalı
        'author' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    // Yeni yorumu oluştur
    \App\Models\Comment::create([
        'post_id' => $validated['post_id'],
        'author' => $validated['author'],
        'content' => $validated['content'],
    ]);

    return redirect()->back()->with('success', 'Yorumunuz başarıyla eklendi.');
}

public function updateStatus()
    {
        Artisan::call('posts:update-status');
        return redirect()->back()->with('success', 'Post durumu başarıyla güncellendi.');
    }
    public function newindex(Request $request)
{
    // "show_new" parametresini kontrol et
    $showNew = $request->get('show_new', false);

    // Eğer "show_new" true ise sadece "new" olan postları getir
    if ($showNew == 'true') {
        $posts = Post::where('status', 'new')->latest()->get();
    } else {
        $posts = Post::latest()->get(); // Tüm postları getir
    }

    // Dinamik "new" post sayısı
    $newPostCount = Post::where('status', 'new')->count();

    return view('front.home', compact('newPostCount', 'showNew'));
}


}