<script>
  document.addEventListener('DOMContentLoaded', function() {
    const section = document.querySelector('.global-impact-section');
    const cursorGlow = document.querySelector('.cursor-glow');

    if (section && cursorGlow) {
      section.addEventListener('mousemove', (e) => {
        const rect = section.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        cursorGlow.style.left = `${x}px`;
        cursorGlow.style.top = `${y}px`;
      });
    }
  });
</script>
<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="global-impact-section">
{{--    <div class="image-content">--}}
{{--      <img src="{{ $image }}" alt="{{ get_field('image_description') }}">--}}
{{--    </div>--}}
    <div class="content-block">
      <div class="text-content">
        <div class="title">
          {{ $title }}
        </div>
        <div class="subtitle">
          {{ $description }}
        </div>
        <div class="button-placement">
          <a href="{{ get_field('button_link') }}" class="btn signature-gradient-button">
            {{ $button_title }}&nbsp;→
          </a>
        </div>
      </div>
    </div>
    <div class="cursor-glow"></div>
  </div>
</div>
