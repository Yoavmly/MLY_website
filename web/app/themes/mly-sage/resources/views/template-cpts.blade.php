{{--
  Template Name:services-page Template
--}}

@extends('layouts.app')

@section('back-arrow-button')
  <div class="cpt-back-button fixed-top" style="background-image: url('{{ asset('images/partner/Rightarrow.png') }}');background-repeat: no-repeat;background-size: contain;"></div>
@endsection

@section('cpt-background-image')
  <div class="star-flame" style="background-image: url('{{ asset('images/flame-star.png') }}');background-repeat: no-repeat;background-size: contain;">
  </div>
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')
  @include('partials.content-page')
  @endwhile
@endsection
