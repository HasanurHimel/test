<div class="technology">
    <div class="single_post_content">
        <h2><span>Technology</span></h2>
        <ul class="business_catgnav">

            @foreach($right_sections_big_div as $right_section)
            <li>
                <figure class="bsbig_fig wow fadeInDown"> <a href="{{ route('article', $right_section->slug) }}" class="featured_img"> <img alt="" src="{{ $right_section->getFirstMediaUrl('blog') }}"> <span class="overlay"></span> </a>
                    <figcaption> <a href="{{ route('article', $right_section->slug) }}">{{ $right_section->blog_title }}</a> </figcaption>
                    <p>{{ $right_section->blog_short_description }}</p>
                </figure>
            </li>
                <small style="padding-bottom: 50px" class="pull-right"><i class="fa fa-clock-o"></i> {{ $right_section->created_at->diffForHumans() }}</small>

            @endforeach
        </ul>
        <ul class="spost_nav">

            @foreach($right_sections_small_div as $right_section)
            <li>
                <div class="media wow fadeInDown"> <a href="{{ route('article', $right_section->slug) }}" class="media-left"> <img alt="" src="{{ $right_section->getFirstMediaUrl('blog') }}"> </a>
                    <div class="media-body"> <a href="{{ route('article', $right_section->slug) }}" class="catg_title"> {{ $right_section->blog_title }}</a> </div>
                </div>
            </li>
            @endforeach

        </ul>
    </div>
</div>
