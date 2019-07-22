<div class="single_sidebar">
    <h2><span>Popular Post</span></h2>
    <ul class="spost_nav">
        @foreach($popular_posts as $popular_post)
{{--            @dd($popular_post)--}}
        <li>
            <div class="media wow fadeInDown"> <a href="{{ route('article', $popular_post->slug) }}" class="media-left"> <img alt="" src="{{ $popular_post->getFirstMediaUrl('blog') }}"> </a>
                <div class="media-body"> <a href="{{ route('article', $popular_post->slug) }}" class="catg_title"> {{ $popular_post->blog_title }}</a> </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
