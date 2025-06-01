<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // Obtener los últimos 4 posts ordenados por fecha de publicación
        $latestPosts = Post::with(['user', 'categories'])->latest('published_at')->take(3)->get();

        // Pasar los posts a la vista
        return view('welcome', compact('latestPosts'));
    }
}
