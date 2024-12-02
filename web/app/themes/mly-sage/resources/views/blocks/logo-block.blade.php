<div class="{{ $block->classes }} logo-block" style="{{ $block->inlineStyle }}">
  @if (!empty($logos))
    <div class="logo-block__container align-self-center">
      @foreach ($logos as $logo)
        <div class="logo-block__item">
          @if (!empty($logo['link']))
            <a href="{{ $logo['link'] }}" target="_blank" rel="noopener noreferrer">
              <img src="{{ $logo['image'] }}" alt="Logo" class="logo-block__image" />
            </a>
          @else
            <img src="{{ $logo['image'] }}" alt="Logo" class="logo-block__image" />
          @endif
        </div>
      @endforeach
    </div>
  @else
    <p>No logos found. Please add logos in the block settings.</p>
  @endif
</div>
