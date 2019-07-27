<div class="col-lg-4 col-md-4 col-sm-4">
    <div class="latest_post">
        <h2><span>Latest post</span></h2>
        <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">

                @foreach($latest_posts as $latest_post)
                <li>
                    <div class="media"> <a href="{{ route('article', $latest_post->slug) }}" class="media-left"> <img alt="" src="{{ $latest_post->getFirstMediaUrl('blog') }} "> </a>
                        <div class="media-body"> <a href="{{ route('article', $latest_post->slug) }}" class="catg_title">  {{  $latest_post->blog_title }}</a> </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
        </div>
    </div>
</div>

