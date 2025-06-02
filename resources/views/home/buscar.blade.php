<div class="search-box input-group">
    <form method="GET" action="{{ route('blog.index') }}" class="d-flex w-100">
        <input
            type="search"
            name="search"
            class="form-control"
            placeholder="Buscar en
                @if(request()->routeIs('posts.category'))
                    {{ $category->name ?? 'el blog' }}
                @elseif(request()->routeIs('posts.tag'))
                    {{ $tag->name ?? 'el blog' }}
                @else
                    el blog
                @endif"
            value="{{ request('search') }}"
        >
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>
