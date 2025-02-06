<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="dynamic-image-collage">
    @foreach($collage_images as $image)

      @php
            $url = $image['image']['url'];
        @endphp
      <div class="collage-item" style="">
        <img src="{{ $url }}" alt="collage Image">
      </div>
    @endforeach
  </div>
</div>
