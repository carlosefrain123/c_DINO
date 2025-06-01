<!-- Blog Section Start -->
<section class="section-b-space" id="recent_projects">
    <div class="container-fluid-lg">
        <div class="seller-title mb-5 text-center">
            <h2 class="fw-bold" style="color: #ffd60a">Proyectos Recientes</h2>
        </div>

        <div class="slider-4-blog ratio_50 no-arrow">
            @foreach ($allPosts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-box">
                        <div class="blog-box-image">
                            <a href="#" class="blog-image">
                                <!-- asset('storage/' . $post->featured_image)-->
                                <img src="{{ asset('assets/images/veg-3/banner/' . $post->featured_image)}}"
                                    class="bg-img blur-up lazyload" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <a href="#" class="blog-detail">
                            <h5>{{ $post->title }}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section End -->
