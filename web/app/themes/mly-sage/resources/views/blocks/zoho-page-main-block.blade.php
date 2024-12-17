<script>
  function handleClick() {
    const image = document.querySelector('.background-image');
    const subtitle = document.querySelector('.partner-description');
    const title = document.querySelector('.partner-title');

    image.classList.add('after-click');
    title.classList.add('hide-this');
    subtitle.classList.add('after-click-sub');
  }
</script>

<div class="zoho-partner-block" onclick="handleClick()">
  <div class="content-wrapper">
    <img src="{{ $image }}" alt="Zoho Partner" class="background-image">
    <div class="overlay-content">
      <h2 class="partner-title">
       {{ $title }}
      </h2>
      <br>
      <br>
      <p class="partner-description">
        {{ $description }}
      </p>
    </div>
  </div>
</div>
