<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
  </head>

  @yield('background-homepage')
  @yield('portfolio-page-background')
  @yield('zoho-page-background')
  @yield('services-page-background')


  <body @php(body_class()) >
    @php(wp_body_open())

    <div class="col-lg-1 col-md-1 col-xs-1"></div>
    <div class="main col-lg-10 col-md-10 col-xs-10">
    <div id="app" >

      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content') }}
      </a>


      @include('sections.header')

      <main id="main" >


        @yield('content')
      </main>

      @hasSection('sidebar')
        <aside class="sidebar">
          @yield('sidebar')
        </aside>
      @endif

      @include('sections.footer')

    </div>

      @php(do_action('get_footer'))
      @php(wp_footer())
    </div>
    <div class="col-lg-1 col-md-1 col-xs-1"></div>
  </body>
</html>
