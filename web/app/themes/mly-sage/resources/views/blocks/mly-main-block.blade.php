<div class="{{ $block->classes }} mly-main-block" style="{{ $block->inlineStyle }}">
  <div class="container-fluid">
    <div class="mly-main-block__content">
      <h1 class="title-text">
        {!! $title !!}
      </h1>
      <p class="subtitle">{{ $subtitle }}</p>
      @if($button_text)
        <a href="{{ home_url('#form-block-1') }}" class="btn btn-primary custom-btn-secondary">
          {{ $button_text }} <span class="arrow">→</span>
        </a>
      @endif
    </div>
  </div>
</div>
