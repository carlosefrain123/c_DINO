@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <!-- Blog Section Start -->
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-4">
                <div class="col-xxl-9 col-xl-8 col-lg-7 order-lg-2">
                    <div class="row g-4 ratio_65">
                        <div class="col-xxl-4 col-sm-6">
                            <div class="blog-box wow fadeInUp">
                                <div class="blog-image">
                                    <a href="blog-detail.html">
                                        <img src="../assets/images/inner-page/blog/1.jpg" class="bg-img blur-up lazyload"
                                            alt="">
                                    </a>
                                </div>

                                <div class="blog-contain">
                                    <div class="blog-label">
                                        <span class="time"><i data-feather="clock"></i> <span>25 Feg, 2022</span></span>
                                        <span class="super"><i data-feather="user"></i> <span>Mark J.
                                                Speight</span></span>
                                    </div>
                                    <a href="blog-detail.html">
                                        <h3>one pot creamy mediterranean chicken pasta cream.</h3>
                                    </a>
                                    <button onclick="location.href = 'blog-detail.html';" class="blog-button">Read More
                                        <i class="fa-solid fa-right-long"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-sm-6">
                            <div class="blog-box wow fadeInUp" data-wow-delay="0.5s">
                                <div class="blog-image">
                                    <a href="blog-detail.html">
                                        <img src="../assets/images/inner-page/blog/4.jpg" class="bg-img blur-up lazyload"
                                            alt="">
                                    </a>
                                </div>

                                <div class="blog-contain">
                                    <div class="blog-label">
                                        <span class="time"><i data-feather="clock"></i> <span>25 Feg, 2022</span></span>
                                        <span class="super"><i data-feather="user"></i> <span>Chris C.
                                                Hall</span></span>
                                    </div>
                                    <a href="blog-detail.html">
                                        <h3>Vegina good quality special liquide fesh vegetables.</h3>
                                    </a>
                                    <button onclick="location.href = 'blog-detail.html';" class="blog-button">Read More
                                        <i class="fa-solid fa-right-long"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <nav class="custom-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-5 order-lg-1">
                    <div class="left-sidebar-box wow fadeInUp">
                        <div class="left-search-box">
                            <div class="search-box">
                                <input type="search" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Search....">
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
                                                            class="img-fluid blur-up lazyload"
                                                            alt="{{ $latestPost->title }}">
                                                    </a>

                                                    <div class="recent-detail">
                                                        <a
                                                            href="{{ route('posts.show', ['id' => $latestPost->id, 'slug' => $latestPost->slug]) }}">
                                                            <h5 class="recent-name">{{ $latestPost->title }}</h5>
                                                        </a>
                                                        <h6>{{ $latestPost->published_at->translatedFormat('d M, Y') }} <i
                                                                data-feather="thumbs-up"></i></h6>
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
                                                        <a href="blog-list.html">
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
                                                        <a href="javascript:void(0)">{{ $tag->name }}</a>
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
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
