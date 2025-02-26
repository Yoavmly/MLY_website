<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="dynamic-image-layout">
    @if($images)
      @foreach($images as $image)
        <div class="dynamic-image-layout__item">
          <img src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? '' }}" class="dynamic-image-layout__image"/>
        </div>
      @endforeach
    @endif
  </div>
</div>
