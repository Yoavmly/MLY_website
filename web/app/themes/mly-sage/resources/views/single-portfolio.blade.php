@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{ the_title() }}</h1>
    <h2>{{ get_field('subtitle') }}</h2>
    <div class="portfolio-description">
      {{ the_content() }}
      <div class="portfolio-images">
        @if(have_rows('images'))
          @while(have_rows('images')) @php the_row() @endphp
          <img src="{{ get_sub_field('image') }}" alt="{{ get_sub_field('image_alt') }}">
          @endwhile
        @endif
      </div>
    </div>
  </div>
@endsection
