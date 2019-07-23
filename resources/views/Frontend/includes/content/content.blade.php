@extends('Frontend.layouts.master')

@section('title')
    {{ $article->blog_title }}
@endsection
@section('content')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId=901805713515915&autoLogAppEvents=1"></script>



    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">


{{--                    Content section start--}}


                    <div class="single_page">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('/') }}">Home/ </a></li>
                        <li class="active"><a href="#"> {{ $article->category->category_name }}</a></li>
                    </ol>
                    <h1>{{ $article->blog_title }}</h1>
                    <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>{{ $article->author_name }}</a> <span><i class="fa fa-calendar"></i>{{ $article->created_at->toFormattedDateString() }}</span>
                        <div class="fb-like pull-right" data-href="{{ Request::url() }}" data-width="50" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>

                    </div>

                    <div class="single_page_content line-numbers">
                        <p>{!! $article->blog_long_description !!} </p>


{{--                        <div class="fb-share-button pull-right" data-href="{{ Request::url() }}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F127.0.0.1%3A8000%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>--}}

{{--                        <div class="fb-like pull-right" data-href="{{ Request::url() }}" data-width="50" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>--}}

                    </div>





                    <div class="social_link">
                        <ul class="sociallink_nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>



                    <div class="container">

                        <div class="card">
                            <div class="card-header">
                                <h2>Posts Comments</h2>
                            </div>
                            <div class="card-body p-3">
                                <div class="media">

                                    <div class="fb-comments" data-href="{{ Request::url() }}" data-width="500" data-numposts="5"></div>                                </div>
                            </div>
                        </div>
                    </div>



{{--                    Content section end--}}


                    </div>
                </div>
            </div>




            <div class="col-lg-4 col-md-4 col-sm-4">
                <aside class="right_content">
                    <div class="single_sidebar">
                        <h2><span>Related Post</span></h2>
                        <ul class="spost_nav">

{{--                            @dd($article->id)--}}
                            @foreach($related_posts->take(5) as $related_post)

                                @if($article->id !== $related_post->id)
                            <li>
                                <div class="media wow fadeInDown"> <a href="{{ route('article', $related_post->slug) }}" class="media-left"> <img alt="" src="{{ $related_post->getFirstMediaUrl('blog') }}"> </a>
                                    <div class="media-body"> <a href="{{ route('article', $related_post->slug) }}" class="catg_title"> {{ $related_post->blog_title }}</a> </div>
                                </div>
                            </li>

                                @endif
                            @endforeach
                        </ul>
                    </div>


@endsection
