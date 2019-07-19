<div class="fashion">
    <div class="single_post_content">
        <h2><span>Fashion</span></h2>
        <ul class="business_catgnav wow fadeInDown">
            @foreach($left_sections->where('thumbnail', 1)->take(1) as $left_section)


            <li>
                <figure class="bsbig_fig"> <a href="{{ route('article', $left_section->slug) }}" class="featured_img"> <img alt="" src="{{ $left_section->getFirstMediaUrl('blog') }}"> <span class="overlay"></span> </a>
                    <figcaption> <a href="{{ route('article', $left_section->slug) }}">{{ $left_section->blog_title }}</a> </figcaption>
                    <p>{{ $left_section->blog_short_description }}</p>
                </figure>
            </li>
                <small style="padding-bottom: 20px" class="pull-right"><i class="fa fa-clock-o"></i> {{ $left_section->created_at->diffForHumans() }}</small>
            @endforeach

        </ul>

        <ul class="spost_nav" >

            @foreach($left_sections->where('thumbnail', 0)->take(4) as $left_section)
            <li>
                <div class="media wow fadeInDown"> <a href="{{ route('article', $left_section->slug) }}" class="media-left"> <img alt="" src="{{ $left_section->getFirstMediaUrl('blog') }}"> </a>
                    <div class="media-body"> <a href="{{ route('article', $left_section->slug) }}" class="catg_title"> {{ $left_section->blog_title }}</a> </div>
                </div>
            </li>
                @endforeach

        </ul>
    </div>
</div>
