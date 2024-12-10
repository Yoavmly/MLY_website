<div class="{{ $block->classes }} logo-block" style="{{ $block->inlineStyle }}">
  @if (!empty($logos))
    <div class="logo-block__container align-self-center" data-logos='@json($logos)'>
      @for ($i = 0; $i < 9; $i++)
        <div class="logo-block__item">
          <a href="#" target="_blank" rel="noopener noreferrer">
            <img src="{{ $logos[$i % count($logos)]['image'] ?? '' }}" alt="Logo" class="logo-block__image" id="logo-{{ $i }}" />
          </a>
        </div>
      @endfor
    </div>
  @else
    <p>No logos found. Please add logos in the block settings.</p>
  @endif
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const container = document.querySelector('.logo-block__container');
    const logos = JSON.parse(container.getAttribute('data-logos'));
    const visibleLogosCount = 9;
    let currentStartIndex = 0;

    setInterval(() => {
      for (let i = 0; i < visibleLogosCount; i++) {
        const imgElement = document.getElementById(`logo-${i}`);
        if (imgElement) {
          // Add the "hidden" class to start the fade-out animation
          imgElement.classList.add('hidden');

          setTimeout(()=>{

            // Calculate the index for the current logo slot
            const logoIndex = (currentStartIndex + i) % logos.length;

            // Update the image source and link dynamically
            imgElement.src = logos[logoIndex].image;
            if (imgElement.parentNode.tagName === 'A') {
              imgElement.parentNode.href = logos[logoIndex].link;
            }

            // Remove the "hidden" class to fade in the new logo
            imgElement.classList.remove('hidden');

          },250);

        }
      }

      // Move the start index for the next iteration
      currentStartIndex = (currentStartIndex + visibleLogosCount) % logos.length;
    }, 1000); // Update every second
  });
</script>
