

<div class="col-lg-8 col-md-8 col-sm-8">
    <div class="slick_slider">
        @foreach($carousels as $carousel)

        <div class="single_iteam"> <a href="#"> <img src="{{ $carousel->getFirstMediaUrl('carousel') }}" alt=""></a>
            <div class="slider_article">
                <h2><a class="slider_tittle" href="">{{ $carousel->carousel_caption }}</a></h2>
            </div>
        </div>

            @endforeach

    </div>
</div>