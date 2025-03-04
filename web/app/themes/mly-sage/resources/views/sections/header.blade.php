<script>
  function toggleMenu() {
    document.querySelector('.mobile-navbar-collapse').classList.toggle('show-menu');
  }



</script>
@php
  class Custom_Nav_Walker extends Walker_Nav_Menu {
      public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
          $output .= '<li class="nav-item">';
          $output .= '<a class="nav-link" href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
      }

      public function end_el(&$output, $item, $depth = 0, $args = null) {
          $output .= '</li>';
      }
  }

  $menu_args = [
      'theme_location' => 'primary_navigation',
      'container'      => false,
      'menu_class'     => 'nav-menu',
      'depth'          => 0,
      'walker'         => new Custom_Nav_Walker(),
      'echo'           => false,
  ];
  $main_menu = wp_nav_menu($menu_args);
@endphp
<header class="banner">
  <nav class="navbar" id="navbar">
    <div class="container-fluid">

      <div class="hamburger-icon" onclick="toggleMenu()">
        <img src="@asset('images/hamburger_menu.png')" alt="Hamburger_logo">
      </div>

      <a class="navbar-brand" href="{{ esc_url(home_url('/')) }}">
        <img src="@asset('images/MLY_logo.png')" alt="MLY_Logo">
      </a>

      <div class="message-box">
        <img src="@asset('images/message_button.png')" alt="Message_Box">
      </div>

      <!-- Desktop Menu -->
      <div class="desktop-nav">
        {!! $main_menu !!}
      </div>

      <!-- Mobile Menu -->
      <div class="mobile-navbar-collapse">
        <img src="@asset('images/grain-navbar.png')" alt="mobile-navbar-background-flame-img"  class="mobile-navbar-background-flame-img" id="mobile-navbar-background-flame-img"/>
        <a class="close-button" onclick="toggleMenu()">
          <span class="close-button-wrapper">
            <img src="@asset('images/close.png')" class="close-button-icon"/>
          </span>
        </a>
        {!! $main_menu !!}
        <div class="socials">
          <a href="#">
          <img src="@asset('images/linkedin.png')" alt="LinkedIn">
          </a>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <a href="#">
          <img src="@asset('images/facebook.png')" alt="Facebook">
          </a>
        </div>
      </div>
    </div>
  </nav>
</header>
