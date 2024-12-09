{{--
  Template Name:Background Template
--}}

@extends('layouts.app')

@section('background')
  <div class="background-page" style="background-image: url('{{ asset('images/background_page.png') }}');"></div>
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')
  @include('partials.content-page')
  @endwhile
@endsection
