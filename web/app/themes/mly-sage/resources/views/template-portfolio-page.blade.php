{{--
  Template Name:Portfolio-page Template
--}}

@extends('layouts.app')

@section('portfolio-page-background')
  <div class="ray-flame" style="background-image: url('{{ asset('images/flame-ray.png') }}');background-repeat: no-repeat;background-size: cover    ;"></div>
  <div class="only-flame" style="background-image: url('{{ asset('images/flame-last.png') }}');background-size: contain;background-repeat: no-repeat;"></div>
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')
  @include('partials.content-page')
  @endwhile
@endsection
