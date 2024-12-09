<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="zoho-services-block">
    <div class="zoho-services-container">
      @foreach($services as $service)
        <div class="zoho-service-item">
          @if(!empty($service['logo']))
            <div class="zoho-service-logo">
              <img src="{{ $service['logo'] }}" alt="{{ e($service['title']) }} logo">
            </div>
          @endif
          <div class="zoho-service-info">
            <h3 class="zoho-service-title">{{ e($service['title']) }}</h3>
            <p class="zoho-service-description">{{ e($service['description']) }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <div class="zoho-description-block">
    <p class="zoho-description">
      {{$paragraph_1}}
    </p>
    <p class="zoho-description">
      {{ $paragraph_2 }}
    </p>
  </div>
  <div class="logo-title-div">
    <span class="logo_title"><h2>{{ $logo_title }}</h2></span>
  </div>
  <div class="fancy-logo-block">
    @php
      // Define the row configuration: number of logos per row
      $rowConfig = [5, 4, 3, 2]; // Adjust row sizes as per your logic
      $currentIndex = 0; // Start from the first image
    @endphp

    @foreach($rowConfig as $rowIndex => $rowCount)
      @if($currentIndex < count($images)) {{-- Check if there are more images to display --}}
      <div class="row-{{ $rowIndex + 1 }}">
        @foreach(array_slice($images, $currentIndex, $rowCount) as $image)
          <div class="fancy-logo-item">
            <a href="{{ $image['image_url'] ?? '#' }}" target="_blank" rel="noopener noreferrer">
              <img src="{{ $image['url'] ?? '' }}" alt="{{ $image['title'] ?? 'Logo' }}" class="fancy-logo">
            </a>
          </div>
        @endforeach
        @php
          $currentIndex += $rowCount; // Update the current index for the next row
        @endphp
      </div>
      @endif
    @endforeach
  </div>
</div>
