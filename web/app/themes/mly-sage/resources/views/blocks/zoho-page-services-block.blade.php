<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="zoho-services-block">
    <div class="zoho-services-container">
      @foreach($services as $service)
        <div class="zoho-service-item">
          <div class="zoho-service-logo
                @if(count($service['icons']) > 1) animated-logo @endif
                 "
               @if(count($service['icons']) > 1)
                 style="--number-of-images: {{ count($service['icons']) }}"
            @endif
          >

            @foreach($service['icons'] as $key => $icon)
              <img class="logo-image logo-image-{{$key+1}}" src="{{ $icon['icon']['url'] }}" alt="Service Icon">
            @endforeach
          </div>
          <div class="zoho-service-info">
            <h3 class="zoho-service-title">{{ e($service['title']) }}</h3>
            <p class="zoho-service-description">{{ e($service['description']) }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
