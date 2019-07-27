<section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav main_nav">
                <li class="active"><a href="{{ url('/') }}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>

                @foreach($categories as $category)
                <li class=""> <a href="{{ route('category.post', $category->slug) }}" >{{ $category->category_name }}</a>
{{--                    @foreach($category->subCategories as $subCategory)--}}
{{--                        @if($subCategory->id !== NULL)--}}

{{--                            <ul class="dropdown-menu" role="menu">--}}
{{--                                @foreach($category->subCategories as $sub_category)--}}
{{--                                    <li><a href="{{ route('sub_category.post', $sub_category->slug) }}">{{ $sub_category->subcategory_name }}</a></li>--}}
{{--                                    <br>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        @endif--}}

{{--                        @endforeach--}}
                </li>
                    @endforeach

            </ul>
        </div>
    </nav>
</section>
