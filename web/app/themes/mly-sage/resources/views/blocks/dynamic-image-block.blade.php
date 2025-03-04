<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="dynamic-image-layout">
    @if($images)
      @foreach($images as $image)
        <div class="dynamic-image-layout__item @if($image['full_width']) dynamic-image-layout__item--fullwidth @endif">
          <img src="{{ $image['image']['url'] }}" alt="{{ $image['image']['alt'] ?? '' }}" class="dynamic-image-layout__image"/>
        </div>
      @endforeach
    @endif
  </div>
</div>
