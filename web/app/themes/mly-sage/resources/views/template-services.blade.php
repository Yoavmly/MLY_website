{{--
  Template Name:services-page Template
--}}

@extends('layouts.app')

@section('services-page-background')
  <div class="arrow-flame" style="background-image: url('{{ asset('images/flame-arrow.png') }}');"></div>
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')
  @include('partials.content-page')
  @endwhile
@endsection