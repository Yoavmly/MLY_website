<script>
  function handleHover() {
    // Only run this script if screen width is greater than 768px
    if (window.innerWidth <= 768) return;

    // Run when the page loads
    document.addEventListener('DOMContentLoaded', () => {
      // Select all elements with class 'service-item'
      const serviceItems = document.querySelectorAll('.service-item');

      // Define an array of colors
      const colors = ['#57c1fa', '#4dfbf1', '#8ffb4d', '#4dfbb2'];

      // Loop through each service item
      serviceItems.forEach((item, index) => {
        const content = item.querySelector('.service-content');

        // Assign a dynamic arrow color from the array
        const color = colors[index % colors.length];
        item.style.setProperty('--arrow-color', color);

        // When mouse enters, adjust icon position
        item.addEventListener('mouseenter', () => {
          const contentHeight = content.scrollHeight; // Actual height of service-content
          const itemHeight = item.offsetHeight; // Total height of service-item

          // Calculate the upward movement based on content height and item height
          //const iconOffset = -(contentHeight / itemHeight) * 250; // adjusting by taking into account both Itemheight and Contentheight
          //OR
          const iconOffset = -(itemHeight * 0.15);//Adjusting accordingly just by ItemHeight by using %
          //OR
          //const iconOffset = -(contentHeight * 0.35);//Adjusting accordingly just by ContentHeight by using %

          item.style.setProperty('--icon-offset', `${iconOffset}px`); // Apply change
        });

        // When mouse leaves, reset icon position
        item.addEventListener('mouseleave', () => {
          item.style.removeProperty('--icon-offset'); // Remove the effect
        });
      });
    });
  }

  // Call the function to apply hover effects
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
