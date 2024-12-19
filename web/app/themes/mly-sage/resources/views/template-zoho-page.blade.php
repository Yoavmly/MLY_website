{{--
  Template Name:Zoho-page Template
--}}

@extends('layouts.app')

@section('background')
  <div class="last-flame" style="background-image: url('{{ asset('images/flame-last.png') }}');">
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')
  @include('partials.content-page')
  @endwhile
@endsection
