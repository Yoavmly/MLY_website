<script>
  document.addEventListener('DOMContentLoaded', () => {
    const serviceItems = document.querySelectorAll('.service-item');

    serviceItems.forEach(item => {
      const content = item.querySelector('.service-content');
      const icon = item.querySelector('.service-icon');

      item.addEventListener('mouseenter', () => {
        // Get the current height of .service-content
        const contentHeight = content.scrollHeight; // Full height of the expanded content
        const totalHeight = item.offsetHeight; // Total height of the service-item

        // Calculate gradient stop based on content height
        const gradientStop = Math.min((contentHeight / totalHeight) * 100, 33); // Max at 50% for safety
        item.style.setProperty('--gradient-stop', `${gradientStop}%`);

        // Calculate icon offset dynamically
        const iconOffset = -contentHeight / 2; // Adjust to move the icon upwards as the content expands
        item.style.setProperty('--icon-offset', `${iconOffset}px`);
      });

      item.addEventListener('mouseleave', () => {
        // Reset gradient and icon position on mouse leave
        item.style.removeProperty('--gradient-stop');
        item.style.removeProperty('--icon-offset');
      });
    });
  });

</script>
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
            <div class=" arrow">
              <img src="{{ \Roots\asset("images/Rightarrow.png") }}" alt="arrow">
            </div>
          </div>
{{--      </a>--}}
    @endforeach
    @else
      <p>No Service available. Please add some services from the editor.</p>
  @endif
  </div>
</div>
