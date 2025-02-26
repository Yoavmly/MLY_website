@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    @php /*
    <x-alert type="warning">
      {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
 */
    @endphp



    <div class="404-block container">
      <div class="404-image-wrapper">
        <img class="404-image" src="{{ \Roots\asset("images/") }}"/>
      </div>
      <div class="404-content">

      </div>
    </div>
  @endif
@endsection
