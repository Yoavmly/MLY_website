<script>

  document.addEventListener('DOMContentLoaded', () => {
    const tagItems = document.querySelectorAll('.tag-item');
    const portfolioGroups = document.querySelectorAll('.portfolio-group');

    tagItems.forEach(tag => {
      tag.addEventListener('click', () => {
        const tagSlug = tag.dataset.tag;

        // Highlight selected tag
        tagItems.forEach(item => item.classList.remove('active'));
        tag.classList.add('active');

        // Show/Hide portfolio groups
        portfolioGroups.forEach(group => {
          group.style.display = group.dataset.tagGroup === tagSlug ? 'block' : 'none';
        });
      });
    });
  });


</script>


<div class="portfolio-block-wrapper" style="{{ $block->inlineStyle }}">
{{--  portfolio-grid--}}
  <div class="portfolio-tags">
{{--    list-tags--}}
    @if(!empty($tags))
      <ul class="tags-list">
        @foreach($tags as $tag)
          <li class="tag-item" data-tag="{{ $tag->slug }}">
            {{ $tag->name }}
          </li>
        @endforeach
      </ul>
    @endif
  </div>


  <div class="project-container">
    {{-- List Grouped Projects --}}
    @if (!empty($groupedPortfolios))
      @foreach ($groupedPortfolios as $tagName => $portfolios)
        <div class="portfolio-group" data-tag-group="{{ $tagName }}">
          <h3>{{ $tagName }}</h3>
          @foreach ($portfolios as $portfolio)
            <a href="{{ get_permalink($portfolio->ID) }}" class="project-link" target="_blank" rel="noopener noreferrer">
              <div class="project-item">
                @if (has_post_thumbnail($portfolio->ID))
                  <div class="project-image">
                    {!! get_the_post_thumbnail($portfolio->ID, 'thumbnail') !!}
                  </div>
                @endif
                <div class="project-info">
                  <h4 class="project-title">{{ get_the_title($portfolio->ID) }}</h4>
                  <p class="project-description">{{ get_the_excerpt($portfolio->ID) }}</p>
                </div>
              </div>
            </a>
          @endforeach
        </div>
      @endforeach
    @endif
  </div>

</div>
