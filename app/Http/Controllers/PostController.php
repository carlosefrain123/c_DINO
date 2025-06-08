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
        // 🏁 Posts solo para carrusel (banners)
        $latestBanners = Post::whereHas('categories', fn($q) => $q->where('slug', 'banner'))
            ->with(['user', 'categories'])
            ->latest('published_at')
            ->take(6)
            ->get();

        // 🏗️ Posts para sección de proyectos
        $allPosts = Post::whereHas('categories', fn($q) => $q->where('slug', 'project'))
            ->with(['user', 'categories'])
            ->latest('published_at')
            ->paginate(5);

        return view('welcome', compact('latestBanners', 'allPosts'));
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
        // ✅ Generar el slug desde el backend
        $slug = Str::slug($request->title);

        // 🧠 Validar si el slug ya existe
        if (Post::where('slug', $slug)->exists()) {
            return redirect()->back()->withInput()->with('error', '⚠️ Publicación duplicada: el título ya fue usado.');
        }

        // ✅ Validaciones del formulario
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

        // 📷 Guardar imagen si existe
        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog', 'public');
        }

        // 📥 Crear el post
        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => $slug,
            'summary' => $request->summary,
            'content' => $request->content,
            'featured_image' => $imagePath,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        // 📎 Relacionar con categoría y etiquetas
        $post->categories()->attach($request->category_id);
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        // ✅ Redirigir con mensaje de éxito
        return redirect()->route('posts.userPosts')->with('success', '¡Post creado exitosamente!');
    }

    public function checkSlug(Request $request)
    {
        $title = $request->input('title');
        $postId = $request->input('post_id'); // útil en edición

        $slug = Str::slug($title);

        $query = Post::where('slug', $slug);
        if ($postId) {
            $query->where('id', '!=', $postId);
        }

        $exists = $query->exists();

        return response()->json([
            'exists' => $exists,
            'slug' => $slug,
        ]);
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
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $slug = Str::slug($request->title);

        // 🧠 Verifica si el nuevo slug ya existe en otro post
        $slugExists = Post::where('slug', $slug)
            ->where('id', '!=', $post->id) // excluye el post actual
            ->exists();

        if ($slugExists) {
            return redirect()->back()
                ->withInput()
                ->with('error', '⚠️ Otro post ya está usando este título. Usa uno diferente.');
        }

        // ✅ Validaciones
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

        // 📷 Imagen nueva (si existe)
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog', 'public');
            $post->featured_image = $imagePath;
        }

        // ✏️ Actualizar datos
        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'summary' => $request->summary,
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        // 🔁 Sincronizar categorías y etiquetas
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
