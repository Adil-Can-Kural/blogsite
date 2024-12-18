<!-- resources/views/front/admindashboard/index.blade.php -->
@extends('front.admindashboard.layouts.adminmaster')

@section('title', 'Post Yönetimi')

@section('content')
    <h1>Posts</h1>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Başlık</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @if($posts->isEmpty())
           <p>Henüz post bulunmamaktadır.</p>
            @else
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    <!-- Sayfalama -->
    {{ $posts->links() }}
@endsection
