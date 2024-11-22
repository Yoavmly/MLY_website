<div class="{{ $block->classes }} services-block" style="{{ $block->inlineStyle }}">
  <div class="services-container">
  @if($services)
    @foreach($services as $service)
{{--      <a href="{{ $service['url'] }}" class="service-link" target="_blank" rel="noopener noreferer">--}}
          <div class="service-item">
            <div class="service-icon">
              <img src="{{ $service['icon'] }}" alt="{{ $service['title'] }} Symbol">
            </div>
            <div class="service-content">
              <h3 class="service-title">{{ $service['title'] }}</h3>
              <p class="service-description">{{ $service['description'] }}</p>
            </div>
            <span class="arrow">→</span>
          </div>
{{--      </a>--}}
    @endforeach
    @else
      <p>No Service available. Please add some services from the editor.</p>
  @endif
  </div>
</div>
