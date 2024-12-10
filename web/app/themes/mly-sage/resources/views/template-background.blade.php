{{--
  Template Name:Front-page Template
--}}

@extends('layouts.app')

@section('background')
  <div class="background-page" style="background-image: url('{{ asset('images/flame1.png') }}');"></div>
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')
  @include('partials.content-page')
  @endwhile
@endsection
