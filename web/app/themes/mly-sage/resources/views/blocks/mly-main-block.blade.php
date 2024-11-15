<div class="{{ $block->classes }} mly-main-block" style="{{ $block->inlineStyle }}">
  <div class="mly-main-block__content">
    <h1>
      {{ $title }}&nbsp;<span class="highlight">{{ $highlighted_text }}</span>
    </h1>
    <p class="subtitle">{{ $subtitle }}</p>
    @if($button_text && $button_link)
      <a href="{{ $button_link }}" class="btn btn-primary">
        {{ $button_text }} <span class="arrow">→</span>
      </a>
    @endif
  </div>
</div>
