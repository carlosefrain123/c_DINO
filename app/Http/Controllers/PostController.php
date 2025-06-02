<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Últimos 4 posts para el home
        $latestPosts = Post::with(['user', 'categories'])->latest('published_at')->take(4)->get();

        // Todos los posts paginados (5 por página para home)
        $allPosts = Post::with(['user', 'categories'])->latest('published_at')->paginate(5);

        return view('welcome', compact('latestPosts', 'allPosts'));
    }

    public function show($id, $slug)
    {
        $post = Post::with(['user', 'categories'])->findOrFail($id);

        // Validación del slug
        if ($post->slug !== $slug) {
            abort(404);
        }

        $latestPosts = Post::latest('published_at')->take(4)->get();
        $categories = Category::with('posts')->get();

        return view('blog.view', compact('post', 'latestPosts', 'categories'));
    }

    public function blog(Request $request, $slug = null)
    {
        $search = $request->input('search');
        $category = null;
        $tag = null;

        // Query base
        $query = Post::with(['user', 'categories'])->latest('published_at');

        // Filtro por categoría
        if ($request->routeIs('posts.category') && $slug) {
            $category = Category::where('slug', $slug)->firstOrFail();
            $query->whereHas('categories', function ($q) use ($category) {
                $q->where('categories.id', $category->id);
            });
        }

        // Filtro por etiqueta
        if ($request->routeIs('posts.tag') && $slug) {
            $tag = Tag::where('slug', $slug)->firstOrFail();
            $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tags.id', $tag->id);
            });
        }

        // Filtro por búsqueda
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . '%')
                  ->orWhere('content', 'LIKE', '%' . $search . '%');
            });
        }

        $allPosts = $query->paginate(6); // Puedes ajustar el número si deseas

        $categories = Category::with('posts')->get();
        $tags = Tag::all();
        $latestPosts = Post::latest('published_at')->take(4)->get();

        return view('blog.index', compact('allPosts', 'categories', 'latestPosts', 'tags', 'category', 'tag', 'search'));
    }
}
