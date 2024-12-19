<script>
  document.addEventListener('DOMContentLoaded', () => {
    const tags = document.querySelectorAll('.portfolio-tag-button');
    const groups = document.querySelectorAll('.portfolio-group');

    tags.forEach(tag => {
      tag.addEventListener('click', () => {
        const filter = tag.getAttribute('data-filter');

        groups.forEach(group => {
          if (group.getAttribute('data-category') === filter || filter === 'all') {
            group.style.display = 'block';
          } else {
            group.style.display = 'none';
          }
        });
      });
    });
  });
</script>
<div class="portfolio-block-wrapper" style="{{ $block->inlineStyle }}">
  {{-- Title Section --}}
  <h2 class="portfolio-title">
    {{ $title }}
    <span class="portfolio-highlighted-text">{{ $highlighted_text }}</span>
  </h2>

  {{-- Tags Filter --}}
  @if ($tags)
    <div class="portfolio-tags-wrapper">
      @foreach ($tags as $tag)
        <button class="portfolio-tag-button" data-filter="{{ Str::slug($tag) }}">
          {{ $tag }}
        </button>
      @endforeach
    </div>
  @endif

  {{-- Portfolio Grid --}}
  <div class="portfolio-grid">
    @foreach ($groupedPortfolios as $tag => $projects)
      <div class="portfolio-group" data-category="{{ Str::slug($tag) }}">
        @foreach ($projects as $project)
          <div class="portfolio-item">
            @if ($project['image'])
              <img src="{{ $project['image']['url'] }}" alt="{{ $project['title'] }}" class="portfolio-item-image">
            @endif
            <div class="portfolio-item-content">
              <h3 class="portfolio-item-title">{{ $project['title'] }}</h3>
              <p class="portfolio-item-description">{{ $project['description'] }}</p>
              <a href="{{ $project['url'] }}" target="_blank" class="portfolio-item-link">
                View Project →
              </a>
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
  </div>
</div>
