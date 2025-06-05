<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // 🏠 Página de inicio
    public function index()
    {
        $latestPosts = Post::with(['user', 'categories'])->latest('published_at')->take(4)->get();
        $allPosts = Post::with(['user', 'categories'])->latest('published_at')->paginate(5);

        return view('welcome', compact('latestPosts', 'allPosts'));
    }

    // 📄 Vista individual del post
    public function show($id, $slug)
    {
        $post = Post::with(['user', 'categories'])->findOrFail($id);

        if ($post->slug !== $slug) {
            abort(404);
        }

        $latestPosts = Post::latest('published_at')->take(4)->get();
        $categories = Category::with('posts')->get();
        $tags = Tag::all();

        return view('blog.view', compact('post', 'latestPosts', 'categories', 'tags'));
    }

    // 📁 Blog en vista tipo grid
    public function blog(Request $request, $slug = null)
    {
        $search = $request->input('search');
        $category = null;
        $tag = null;

        $query = Post::with(['user', 'categories'])->latest('published_at');

        if ($request->routeIs('posts.category') && $slug) {
            $category = Category::where('slug', $slug)->firstOrFail();
            $query->whereHas('categories', fn($q) => $q->where('categories.id', $category->id));
        }

        if ($request->routeIs('posts.tag') && $slug) {
            $tag = Tag::where('slug', $slug)->firstOrFail();
            $query->whereHas('tags', fn($q) => $q->where('tags.id', $tag->id));
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('content', 'LIKE', '%' . $search . '%');
            });
        }

        $allPosts = $query->paginate(6);

        $categories = Category::with('posts')->get();
        $tags = Tag::all();
        $latestPosts = Post::latest('published_at')->take(4)->get();

        return view('blog.index', compact('allPosts', 'categories', 'latestPosts', 'tags', 'category', 'tag', 'search'));
    }

    // 📃 Vista tipo lista
    public function list()
    {
        $allPosts = Post::with(['user', 'categories'])->latest('published_at')->paginate(10);
        $categories = Category::with('posts')->get();
        $tags = Tag::all();
        $latestPosts = Post::latest('published_at')->take(4)->get();

        return view('blog.list', compact('allPosts', 'categories', 'tags', 'latestPosts'));
    }

    // 📌 Posts tipo "notice"
    public function notice()
    {
        $category = Category::where('slug', 'notice')->firstOrFail();

        $allPosts = Post::with(['user', 'categories'])
            ->whereHas('categories', fn($q) => $q->where('categories.id', $category->id))
            ->latest('published_at')
            ->paginate(6);

        $categories = Category::with('posts')->get();
        $tags = Tag::all();
        $latestPosts = Post::latest('published_at')->take(4)->get();

        return view('blog.notice-item', compact('allPosts', 'categories', 'tags', 'latestPosts'));
    }

    // 👤 Listar posts del usuario autenticado
    public function userPosts()
    {
        $posts = Post::with(['categories', 'user'])
            ->where('user_id', Auth::id())
            ->latest('published_at')
            ->paginate(10);

        return view('blog.crud.listpost', compact('posts'));
    }

    // 🚀 NUEVAS FUNCIONES CRUD

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.crud.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog', 'public');
        }

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'content' => $request->content,
            'featured_image' => $imagePath,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        $post->categories()->attach($request->category_id);
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('posts.userPosts')->with('success', '¡Post creado exitosamente!');
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.crud.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog', 'public');
            $post->featured_image = $imagePath;
        }

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('posts.userPosts')->with('success', '¡Post actualizado exitosamente!');
    }


    public function destroy($id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($post->featured_image) {
            Storage::delete('public/' . $post->featured_image);
        }

        $post->delete();

        return redirect()->route('posts.userPosts')->with('success', '¡Post eliminado exitosamente!');
    }
}
