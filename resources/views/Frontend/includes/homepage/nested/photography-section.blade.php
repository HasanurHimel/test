<div class="single_post_content">
    <h2><span>Photography</span></h2>
    <ul class="photograph_nav  wow fadeInDown">

       @foreach($photographies as $photography)
        <li>
            <div class="photo_grid">
                <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="{{ asset($photography->photography_image_path) }}" title="Photography by Himel"> <img src="{{ asset($photography->photography_image_path) }}" alt=""/></a> </figure>
            </div>
        </li>
        @endforeach
    </ul>
</div>

