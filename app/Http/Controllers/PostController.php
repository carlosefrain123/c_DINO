<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Obtener los últimos 4 posts ordenados por fecha de publicación
        $latestPosts = Post::with(['user', 'categories'])->latest('published_at')->take(3)->get();
        // Obtener todos los posts paginados (9 por página)
        $allPosts = Post::with(['user', 'categories'])->latest('published_at')->paginate(5);
        // Pasar los posts a la vista
        return view('welcome', compact('latestPosts', 'allPosts'));
    }
    public function show($id, $slug)
    {
        // Buscar el post por ID
        $post = Post::with(['user', 'categories'])->findOrFail($id);

        $latestPosts = Post::latest('published_at')->take(value: 4)->get();

        $categories = Category::with('posts')->get();

        // Verificar que el slug en la URL coincida con el slug del post
        if ($post->slug !== $slug) {
            abort(404); // Mostrar error 404 si no coincide
        }

        // Retornar la vista con los datos del post
        return view('blog.view', compact('post','latestPosts','categories'));
    }
    public function blog()
    {
        // Obtener todos los posts paginados (9 por página)
        $allPosts = Post::with(['user', 'categories'])->latest('published_at')->paginate(9);
        $categories = Category::with('posts')->get();
        $latestPosts = Post::latest('published_at')->take(value: 4)->get();
        return view('blog.index', compact('allPosts','categories','latestPosts'));
    }
}
