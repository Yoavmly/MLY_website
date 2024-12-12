{{--
  Template Name:Front-page Template
--}}

@extends('layouts.app')

@section('background')
  <div class="first-flame" style="background-image: url('{{ asset('images/flame1.png') }}');"></div>
  <div class="globe-image-content" style="background-image: url('{{ asset('images/world2.png') }}');"></div>
  <div class="last-flame" style="background-image: url('{{ asset('images/flame-last.png') }}');"></div>
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')
  @include('partials.content-page')
  @endwhile
@endsection
