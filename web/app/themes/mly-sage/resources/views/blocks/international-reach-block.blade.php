<script>
  document.addEventListener('DOMContentLoaded', function() {
    const section = document.querySelector('.global-impact-section');
    const cursorGlow = document.querySelector('.cursor-glow');

    if (!section || !cursorGlow) return;

    const TRAIL_COUNT = 10;
    const LERP_FACTOR = 0.2;
    const OPACITY_FACTOR = 0.1;

    const trailElements = Array.from({ length: TRAIL_COUNT }, () => {
      const trail = document.createElement('div');
      trail.classList.add('cursor-trail');
      section.appendChild(trail);
      return trail;
    });

    let positions = [];
    let isMoving = false;

    function updatePositions(x, y) {
      positions.unshift({ x, y });
      if (positions.length > TRAIL_COUNT) positions.pop();

      trailElements.forEach((trail, index) => {
        if (positions[index]) {
          trail.style.transform = `translate(${positions[index].x}px, ${positions[index].y}px)`;
          trail.style.opacity = 1 - (index * OPACITY_FACTOR);
        }
      });
      cursorGlow.style.opacity='1';
      cursorGlow.style.transform = `translate(${x}px, ${y}px)`;
    }

    function handleMouseMove(e) {
      const rect = section.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      isMoving = true;
      updatePositions(x, y);
    }

    function handleMouseLeave() {
      isMoving = false;
      positions.length = 0;
      trailElements.forEach(trail => trail.style.opacity = 0);
      cursorGlow.style.opacity='0';
    }

    function checkMovement() {
      if (!isMoving && positions.length > 0) {
        const headPosition = positions[0];
        trailElements.forEach((trail, index) => {
          if (index > 0) {
            const currentPos = positions[index] || { x: headPosition.x, y: headPosition.y };
            const newX = currentPos.x + (headPosition.x - currentPos.x) * LERP_FACTOR;
            const newY = currentPos.y + (headPosition.y - currentPos.y) * LERP_FACTOR;
            positions[index] = { x: newX, y: newY };
            trail.style.transform = `translate(${newX}px, ${newY}px)`;
            trail.style.opacity = Math.max(0, 1 - (index * OPACITY_FACTOR));
          }
        });
      }
      requestAnimationFrame(checkMovement);
    }

    section.addEventListener('mousemove', handleMouseMove);
    section.addEventListener('mouseleave', handleMouseLeave);
    checkMovement();
  });
</script>
<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="global-impact-section">
    <div class="cursor-glow"></div>
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
  </div>
</div>
