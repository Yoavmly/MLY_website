<script>
  function handleHover() {
    if (window.innerWidth <= 768) return;
    document.addEventListener('DOMContentLoaded', () => {
      const serviceItems = document.querySelectorAll('.service-item');

      document.querySelectorAll('.service-item').forEach((item, index) => {
        // Example logic to assign colors dynamically
        const colors = ['#57c1fa', '#4dfbf1', '#8ffb4d', '#4dfbb2'];
        const color = colors[index % colors.length];

        // Set the CSS variable
        item.style.setProperty('--arrow-color', color);
      });

      serviceItems.forEach(item => {
        const content = item.querySelector('.service-content');

        item.addEventListener('mouseenter', () => {
          // Get the current height of .service-content
          const contentHeight = content.scrollHeight;
          const totalHeight = item.offsetHeight;

          // Calculate gradient stop based on content height
          const gradientStop = Math.min((contentHeight / totalHeight) * 100, 33);
          item.style.setProperty('--gradient-stop', `${gradientStop}%`);

          // Calculate icon offset dynamically
          const iconOffset = -contentHeight / 5;
          item.style.setProperty('--icon-offset', `${iconOffset}px`);
        });

        item.addEventListener('mouseleave', () => {
          // Reset gradient and icon position on mouse leave
          item.style.removeProperty('--gradient-stop');
          item.style.removeProperty('--icon-offset');
        });
      });
    });
  }

  // call
  handleHover();

</script>
<div class="{{ $block->classes }} services-block" style="{{ $block->inlineStyle }}">
  <div class="services-container">
  @if($services)
    @foreach($services as $service)
{{--      <a href="{{ $service['url'] }}" class="service-link" target="_blank" rel="noopener noreferer">--}}
          <div class="service-item">
            <div class="service-icon">
              {!! $service['icon'] !!}
{{--              <img src="{{ $service['icon'] }}" alt="{{ $service['title'] }} Symbol">--}}
            </div>
            <div class="service-content">
              <h3 class="service-title">{!! $service['title'] !!} </h3>
              <p class="service-description">{{ $service['description'] }}</p>
            </div>
            <div class=" arrow-block">
              <img src="{{ \Roots\asset("images/Rightarrow.png") }}" alt="arrow" class="arrow">
            </div>
          </div>
{{--      </a>--}}
    @endforeach
    @else
      <p>No Service available. Please add some services from the editor.</p>
  @endif
  </div>
</div>
