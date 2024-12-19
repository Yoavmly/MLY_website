{{--
  Template Name:Portfolio-page Template
--}}


@section('background')
  <div class="only-flame" style="background-image: url('{{ asset('images/flame-last.png') }}');"
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')
  @include('partials.content-page')
  @endwhile
@endsection
