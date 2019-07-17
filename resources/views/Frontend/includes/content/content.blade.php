@extends('Frontend.layouts.master')


@section('content')



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
                    <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>{{ $article->author_name }}</a> <span><i class="fa fa-calendar"></i>{{ $article->created_at->toFormattedDateString() }}</span>  </div>

                    <div class="single_page_content">
                        <p>{!! $article->blog_long_description !!} </p>

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


                                </div>
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
                            <li>
                                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="{{ asset('/') }}frontend/images/post_img1.jpg"> </a>
                                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="{{ asset('/') }}frontend/images/post_img2.jpg"> </a>
                                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="{{ asset('/') }}frontend/images/post_img1.jpg"> </a>
                                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="{{ asset('/') }}frontend/images/post_img2.jpg"> </a>
                                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                                </div>
                            </li>
                        </ul>
                    </div>


@endsection