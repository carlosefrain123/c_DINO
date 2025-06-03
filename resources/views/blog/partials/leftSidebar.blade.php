<div class="col-xxl-3 col-xl-4 col-lg-5 order-lg-1">
    <div class="left-sidebar-box wow fadeInUp">
        <div class="left-search-box">
            <div class="search-box">
                <input type="search" class="form-control" id="exampleFormControlInput1" placeholder="Search....">
            </div>
        </div>

        <div class="accordion left-accordion-box" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne">
                        Recent Post
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body pt-0">
                        <div class="recent-post-box">
                            @foreach ($latestPosts as $latestPost)
                                <div class="recent-box">
                                    <a href="{{ route('posts.show', ['id' => $latestPost->id, 'slug' => $latestPost->slug]) }}"
                                        class="recent-image">
                                        <img src="{{ asset('storage/' . $latestPost->featured_image) }}"
                                            class="img-fluid blur-up lazyload" alt="{{ $latestPost->title }}">
                                    </a>

                                    <div class="recent-detail">
                                        <a
                                            href="{{ route('posts.show', ['id' => $latestPost->id, 'slug' => $latestPost->slug]) }}">
                                            <h5 class="recent-name">{{ $latestPost->title }}</h5>
                                        </a>
                                        <h6>{{ $latestPost->published_at->translatedFormat('d M, Y') }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo">Category</button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                    <div class="accordion-body p-0">
                        <div class="category-list-box">
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('posts.category', $category->slug) }}">
                                            <div class="category-name">
                                                <h5>{{ $category->name }}</h5>
                                                <span>{{ $category->posts->count() }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree">
                        Product Tags
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                    <div class="accordion-body pt-0">
                        <div class="product-tags-box">
                            <ul>
                                @foreach ($tags as $tag)
                                    <li>
                                        <a href="{{ route('posts.tag', $tag->slug) }}">{{ $tag->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
