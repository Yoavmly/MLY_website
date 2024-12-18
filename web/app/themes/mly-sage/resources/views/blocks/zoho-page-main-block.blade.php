<script>
  let clickCount = 0;

  function handleClick() {
    const image = document.querySelector('.background-image');
    const subtitle = document.querySelector('.partner-description');
    const title = document.querySelector('.partner-title');
    const thirdDiv = document.querySelector('.third-div');
    // const parentBlock=document.querySelector('.zoho-partner-block');

    clickCount = (clickCount + 1) % 4; // goes like  0, 1, 2, 3


    image.classList.remove('first-click', 'second-click','third-click');
    title.classList.remove('first-click', 'second-click','third-click');
    subtitle.classList.remove('first-click', 'second-click','third-click');
    thirdDiv.classList.remove('third-click');

    switch (clickCount) {
      case 1:
        image.classList.add('first-click');
        title.classList.add('first-click');
        subtitle.classList.add('first-click');
        break;
      case 2:
        image.classList.add('second-click','third-click');
        subtitle.classList.add('second-click');
        title.classList.add('second-click','third-click');
        thirdDiv.classList.add('third-click');
        break;
      // case 3:
      //   // image.classList.add('third-click');
      //   break;
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
      <a href="{{ $logo_button_link }}" class="custom-btn-secondary">{{ $logo_button_text }}<span class="arrow">→</span></a>
    </div>
  </div>
</div>
