{{--
  Template Name:Portfolio-page Template
--}}


@section('portfolio-page-background')
  <div class="ray-flame" style="background-image: url('{{ asset('images/flame-ray.png') }}');">
  </div>
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')
  @include('partials.content-page')
  @endwhile
@endsection
