@extends('Frontend.layouts.master')


@section('content')

    {{--@dd($content)--}}
{{--<h1>{{ $content->blog_title }}</h1>--}}

<p>{!! $content->blog_long_description !!}</p>


{{--<script src="{{ asset('Frontend/js/prism.js') }}"></script>--}}

    @endsection