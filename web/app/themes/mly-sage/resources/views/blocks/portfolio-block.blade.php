<div class="{{ $block->classes }} " style="{{ $block->inlineStyle }}">
  <div class="container-fluid">
    <div class="portfolio-block-wrapper d-flex justify-content-center">
        <div class="portfolio-section">
            <div class="portfolio-tags">
                @foreach ($tags as $tag)
                  <div class="tag-item" data-slug="{{ $tag->slug }}">
                    {{ $tag->name }}
                  </div>
                @endforeach
            </div>
            <div class="portfolio-content">
              <div class="portfolio-container" id="portfolio-list">
                @php
                  $portfolios = new WP_Query([
                      'post_type' => 'portfolio',
                      'posts_per_page' => -1,
                  ]);

                  $displayed_portfolios = []; // Array to track displayed portfolio IDs
                @endphp
                @if ($portfolios->have_posts())
                  @while ($portfolios->have_posts())
                    @php
                      $portfolios->the_post();
                      $current_id = get_the_ID();

                      // Skip if the portfolio has already been displayed
                      if (in_array($current_id, $displayed_portfolios)) {
                          continue;
                      }

                      // Add the current portfolio ID to the displayed list
                      $displayed_portfolios[] = $current_id;
                    @endphp
                    <a href="{{ get_permalink() }}" class="portfolio-link d-flex" target="_blank" rel="noopener noreferrer">
                      <div class="portfolio-item">
                        @if (has_post_thumbnail())
                          <div class="portfolio-image">
                            {!! get_the_post_thumbnail(null, 'thumbnail') !!}
                          </div>
                        @endif
                        <div class="portfolio-info">
                          <div class="blurred-background"></div>
                          <h3 class="portfolio-title">{{ get_the_title() }}</h3>
                          <p class="portfolio-description">{{ get_the_excerpt() }}</p>
                          <div class="portfolio-arrow-image">
                            <img src="{{ Roots\asset('images/partner/Rightarrow.png')->uri() }}" alt="arrow">
                          </div>
                        </div>
                      </div>
                    </a>
                  @endwhile
                @else
                  <p>No portfolios found.</p>
                @endif

                @php wp_reset_postdata(); @endphp
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
