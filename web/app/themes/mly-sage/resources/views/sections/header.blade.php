<script>
  document.addEventListener('DOMContentLoaded', function() {
    const navItems = document.querySelectorAll('.nav-menu .nav-item');
    if (navItems.length > 0) {
      navItems[navItems.length - 1].classList.add('last-nav-item');
    }
  });

  function toggleMenu() {
    document.querySelector('.nav-menu').classList.toggle('show-menu');
    document.querySelector('.message-box').classList.toggle('show-menu');
    document.querySelector('.socials').classList.toggle('show-socials');
    document.querySelector('.socials').classList.toggle('show-menu');
  }
</script>
<header class="banner">
  <nav class="navbar">
    <div class="container">

      <div class="hamburger-icon" onclick="toggleMenu()">
        <img src="@asset('images/hamburger_menu.png')" alt="Hamburger_logo">
      </div>

      <a class="navbar-brand" href="<?php //echo esc_url(home_url('/')); ?>">
        <img src="@asset('images/MLY_logo.png')" alt="MLY_Logo">
      </a>

      <div class="message-box">
        <img src="@asset('images/message_button.png')" alt="Message_Box" srcset="">
      </div>


      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary_navigation',
        'container' => false,
        'menu_class' => 'nav-menu',
        'depth' => 1,
        'before' => '<span class="nav-item custom_navbar">',
        'after' => '</span>',
        'item_spacing' => 'preserve',
      ));
      ?>


      <div class="socials nav-item custom_navbar">
        <img src="@asset('images/linkedin.png')" alt="LinkedIn" href="#">&nbsp;&nbsp;&nbsp;&nbsp;<img src="@asset('images/facebook.png')" alt="Facebook" href="#">
      </div>
    </div>
  </nav>
</header>


