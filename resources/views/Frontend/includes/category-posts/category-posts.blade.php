@extends('Frontend.layouts.master')

@section('title')

    {{ $category_posts->category_name }}
@endsection
@section('content')


        <div class="row col-md-12" >

            <ul class="business_catgnav  wow fadeInDown">
                @forelse($category_posts->blogs as $category_post)
                    <div class="col-md-4" style="float: left;height: 450px">
                        <li>
                            <figure class="bsbig_fig"> <a href="{{ route('article', $category_post->slug) }}" class="featured_img"> <img alt="" height="200px" width="200px" src="{{ $category_post->getFirstMediaUrl('blog') }}"> <span class="overlay"></span> </a>
                                {{--                <figure class="bsbig_fig"> <a href="{{ route('article', $category_post->slug) }}" class="featured_img"> <img alt="" src="{{ $category_post->getMedia('blog')[0]->name }}"> <span class="overlay"></span> </a>--}}

                                <figcaption> <a href="{{ route('article', $category_post->slug) }}">{{ $category_post->blog_title }}</a> </figcaption>
                                <p>{{ $category_post->blog_short_description }}</p>
                            </figure>
                        </li>

                        <small class="pull-right"><i class="fa fa-clock-o"></i> {{ $category_post->created_at->diffForHumans() }}</small>

                    </div>
                @empty
                    <div class="alert alert-danger text-center text-danger">
                        <h3 >{{ $category_posts->category_name }} category has no posts yet</h3>
                    </div>

                @endforelse
            </ul>
        </div>

    <hr>


    @endsection
