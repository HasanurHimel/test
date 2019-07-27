@extends('Frontend.layouts.master')
@section('title')
    Himel | Blog site
    @endsection

@section('content')




    <section id="sliderSection">
        <div class="row">
            @include('Frontend.includes.homepage.nested.carousel')
            @include('Frontend.includes.homepage.nested.latest-post')
        </div>
    </section>


    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">

                    @include('Frontend.includes.homepage.nested.main-section')

                    <div class="fashion_technology_area">
                        @include('Frontend.includes.homepage.nested.left-div-section')
                        @include('Frontend.includes.homepage.nested.right-div-section')



                    </div>


                    @include('Frontend.includes.homepage.nested.photography-section')


                    @include('Frontend.includes.homepage.nested.bottom-div-section')



                </div>
            </div>




            <div class="col-lg-4 col-md-4 col-sm-4">
                <aside class="right_content">

          @include('Frontend.includes.homepage.nested.popular-post')

    @include('Frontend.includes.homepage.nested.sidebar')
@endsection
