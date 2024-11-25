<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="global-impact-section">
    <div class="content-block">
      <div class="image-content">
        <img src="{{ $image }}" alt="{{ get_field('image_description') }}">
      </div>
      <div class="text-content">
        <div class="title">
          {{ $title }}
        </div>
        <div class="subtitle">
          {{ $description }}
        </div>
        <div class="button-placement">
          <a href="{{ get_field('button_link') }}" class="btn signature-gradient-button">
            {{ $button_title }}
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
