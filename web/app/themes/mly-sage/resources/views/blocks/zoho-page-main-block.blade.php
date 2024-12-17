<script>
  let clickCount = 0;

  function handleClick() {
    const image = document.querySelector('.background-image');
    const subtitle = document.querySelector('.partner-description');
    const title = document.querySelector('.partner-title');
    const thirdDiv = document.querySelector('.third-div');

    clickCount = (clickCount + 1) % 4; // goes like  0, 1, 2, 3


    image.classList.remove('first-click', 'second-click');
    title.classList.remove('first-click', 'second-click');
    subtitle.classList.remove('first-click', 'second-click');
    thirdDiv.classList.remove('third-click');

    switch (clickCount) {
      case 1:
        image.classList.add('first-click');
        title.classList.add('first-click');
        subtitle.classList.add('first-click');
        break;
      case 2:
        image.classList.add('second-click');
        subtitle.classList.add('second-click');
        break;
      case 3:
        thirdDiv.classList.add('third-click');
        break;
      default:
        break;//nothing for default behaviour
    }
  }
</script>

<div class="zoho-partner-block" onclick="handleClick()">
  <div class="content-wrapper">
    <!-- Background Image -->
    <img src="{{ $image }}" alt="Zoho Partner" class="background-image">

    <!-- Overlay Content -->
    <div class="overlay-content">
      <h2 class="partner-title">{{ $title }}</h2>
      <p class="partner-description">{{ $description }}</p>
    </div>

    <!-- Third Div Content -->
    <div class="third-div">
      <img src="{{ $logo_image }}" alt="Logo Image" class="third-div-image">
      <div class="third-div-title">{{ $logo_title }}</div>
      <a href="{{ $logo_button_link }}">{{ $logo_button_text }}</a>
    </div>
  </div>
</div>
