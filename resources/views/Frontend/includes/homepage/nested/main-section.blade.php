<div class="single_post_content">
    <h2><span>Business</span></h2>


    <div class="single_post_content_left">
        <ul class="business_catgnav  wow fadeInDown">
            @foreach($main_sections_big_div as $main_section)

            <li>
                <figure class="bsbig_fig"> <a href="{{ route('article', $main_section->slug) }}" class="featured_img"> <img alt="" src="{{ $main_section->getFirstMediaUrl('blog') }}"> <span class="overlay"></span> </a>
{{--                <figure class="bsbig_fig"> <a href="{{ route('article', $main_section->slug) }}" class="featured_img"> <img alt="" src="{{ $main_section->getMedia('blog')[0]->name }}"> <span class="overlay"></span> </a>--}}

                    <figcaption> <a href="{{ route('article', $main_section->slug) }}">{{ $main_section->blog_title }}</a> </figcaption>
                    <p>{{ $main_section->blog_short_description }}</p>
                </figure>
            </li>

              <small class="pull-right"><i class="fa fa-clock-o"></i> {{ $main_section->created_at->diffForHumans() }}</small>

            @endforeach
        </ul>
    </div>


    <div class="single_post_content_right">
        <ul class="spost_nav">
            @foreach($main_sections_small_div as $main_section)

            <li>
                <div class="media wow fadeInDown"> <a href="{{ route('article', $main_section->slug) }}" class="media-left"> <img alt="" src="{{ $main_section->getFirstMediaUrl('blog') }}"> </a>
                    <div class="media-body"> <a href="{{ route('article', $main_section->slug) }}" class="catg_title">{{ $main_section->blog_title }}</a> </div>
                </div>
            </li>


                @endforeach


        </ul>
    </div>


</div>
{{--<div class="single_post_content">--}}
{{--    <h2><span>Business</span></h2>--}}


{{--    <div class="single_post_content_left">--}}
{{--        <ul class="business_catgnav  wow fadeInDown">--}}
{{--            @foreach($main_sections->where('thumbnail', 1)->take(1) as $main_section)--}}

{{--            <li>--}}
{{--                <figure class="bsbig_fig"> <a href="{{ route('article', $main_section->slug) }}" class="featured_img"> <img alt="" src="{{ $main_section->getFirstMediaUrl('blog') }}"> <span class="overlay"></span> </a>--}}
{{--                    <figcaption> <a href="{{ route('article', $main_section->slug) }}">{{ $main_section->blog_title }}</a> </figcaption>--}}
{{--                    <p>{{ $main_section->blog_short_description }}</p>--}}
{{--                </figure>--}}
{{--            </li>--}}

{{--              <small class="pull-right"><i class="fa fa-clock-o"></i> {{ $main_section->created_at->diffForHumans() }}</small>--}}

{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}


{{--    <div class="single_post_content_right">--}}
{{--        <ul class="spost_nav">--}}
{{--            @foreach($main_sections->where('thumbnail', 0)->take(5) as $main_section)--}}


{{--            <li>--}}
{{--                <div class="media wow fadeInDown"> <a href="{{ route('article', $main_section->slug) }}" class="media-left"> <img alt="" src="{{ $main_section->getFirstMediaUrl('blog') }}"> </a>--}}
{{--                    <div class="media-body"> <a href="{{ route('article', $main_section->slug) }}" class="catg_title">{{ $main_section->blog_title }}</a> </div>--}}
{{--                </div>--}}
{{--            </li>--}}


{{--                @endforeach--}}


{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}
