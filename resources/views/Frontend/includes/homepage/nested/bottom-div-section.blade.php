<div class="single_post_content">
    <h2><span>Games</span></h2>
    <div class="single_post_content_left">
        <ul class="business_catgnav">

            @foreach($blogs
                 ->where('thumbnail', 1)
                 ->where('blog_section_id', 4)
                 ->take(1)
                 as $bottom_section)

            <li>
                <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="{{ route('article', $bottom_section->slug) }}"> <img src="{{ $bottom_section->getFirstMediaUrl('blog') }}" alt=""> <span class="overlay"></span> </a>
                    <figcaption> <a href="{{ route('article', $bottom_section->slug) }}">{{ $bottom_section->blog_title }}</a> </figcaption>
                    <p>{{ $bottom_section->blog_short_description }}</p>
                </figure>
            </li>

                <small class="pull-right"><i class="fa fa-clock-o"></i> {{ $bottom_section->created_at->diffForHumans() }}</small>

            @endforeach
        </ul>
    </div>
    <div class="single_post_content_right">
        <ul class="spost_nav">
            @foreach($blogs
                             ->where('thumbnail', 0)
                             ->where('blog_section_id', 4)
                             ->take(4)
                             as $bottom_section)
            <li>
                <div class="media wow fadeInDown"> <a href="{{ route('article', $bottom_section->slug) }}" class="media-left"> <img alt="" src="{{ $bottom_section->getFirstMediaUrl('blog') }}"> </a>
                    <div class="media-body"> <a href="{{ route('article', $bottom_section->slug) }}" class="catg_title">{{ $bottom_section->blog_title }}</a> </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
