{{--
  Template Name:services-page Template
--}}

@extends('layouts.app')

@section('services-page-background')
  <div class="star-flame" style="background-image: url('{{ asset('images/flame-arrow.png') }}');background-repeat: no-repeat;background-size: contain;"></div>
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')
  @include('partials.content-page')
  @endwhile
@endsection
