<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{

   /*  public function __construct()
    {
         // Controller'a middleware eklemek
        $this->middleware(AdminMiddleware::class);

    }  */
     public function index()
{
    $posts = Post::orderBy('created_at', 'desc')->paginate(10);
    return view('front.admindashboard.index', compact('posts'));
} 


  

    // Post düzenleme formunu gösterme
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('front.admindashboard.edit', compact('post'));
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $post = Post::findOrFail($id);
        $post->title = $validated['title'];
        $post->content = $validated['content'];
    
        // Kapak fotoğrafı yükleme işlemi
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $post->cover_image = $coverPath;
        }
    
        // İçerik fotoğrafları yükleme işlemi
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images', 'public');
                // Bu resmi veritabanına kaydedebilirsiniz
            }
        }
    
        $post->save();
    
        return redirect()->route('post.show', $post->id)->with('success', 'Gönderi başarıyla güncellendi!');
    }
    

    // Post silme işlemi
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->cover_image) {
            \Storage::disk('public')->delete($post->cover_image);
        }

        $post->delete();

     return redirect()->route('admin.dashboard')->with('success', 'Post deleted successfully!');

    }

/* public function adminIndex()
{
    $posts = Post::orderBy('created_at', 'desc')->paginate(10);
    return view('front.admindashboard.index', compact('posts'));
} */

}
