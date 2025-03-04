<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="zoho-description-block">
    <p class="zoho-description">
      {{ get_field('paragraph_1', $block->id) }}
    </p>
    <p class="zoho-description">
      {{ get_field('paragraph_2', $block->id) }}
    </p>
  </div>
  <div class="logo-title-div">
    <span class="logo_title"><h2>{{ get_field('logo_title', $block->id) }}</h2></span>
  </div>
  <div class="fancy-logo-block">
    @php
      $images = get_field('images', $block->id);
      // Define the row configuration: number of logos per row
      $rowConfig = [5, 4, 3, 2]; // Adjust row sizes as per your logic
      $currentIndex = 0; // Start from the first image
    @endphp

    @if($images)
      @foreach($rowConfig as $rowIndex => $rowCount)
        @if($currentIndex < count($images)) {{-- Check if there are more images to display --}}
        <div class="row-{{ $rowIndex + 1 }}">
          @foreach(array_slice($images, $currentIndex, $rowCount) as $image)
            <div class="fancy-logo-item">
              <a href="{{ $image['image_url'] ?? '#' }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ esc_url($image['url'] ?? '') }}" alt="{{ esc_attr($image['alt'] ?? 'Logo') }}" class="fancy-logo">
              </a>
            </div>
          @endforeach
          @php
            $currentIndex += $rowCount; // Update the current index for the next row
          @endphp
        </div>
        @endif
      @endforeach
    @endif
  </div>
</div>
