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
                  $displayed_portfolios = []; // Array to keep track of displayed portfolio IDs
                @endphp
                @if(!empty($allPortfolios))
                  @foreach($allPortfolios as $portfolio)
                    @php
                      $current_id = $portfolio->ID;

                        // Skip if the portfolio has already been displayed
                        if (in_array($current_id, $displayed_portfolios)) {
                            continue;
                        }

                        // Add the current portfolio ID to the displayed list
                        $displayed_portfolios[] = $current_id;
                    @endphp
                    <a href="{{ get_permalink($portfolio) }}" class="portfolio-link d-flex" target="_blank" rel="noopener noreferrer">
                      <div class="portfolio-item">
                        @if (has_post_thumbnail($portfolio))
                          <div class="portfolio-image">
                            {!! get_the_post_thumbnail($portfolio, 'thumbnail') !!}
                          </div>
                        @endif
                        <div class="portfolio-info">
                          <div class="blurred-background"></div>
                          <h3 class="portfolio-title">{{ get_the_title($portfolio) }}</h3>
                          <p class="portfolio-description">{{ get_the_excerpt($portfolio) }}</p>
                          <div class="portfolio-arrow-image">
                            <img src="{{ Roots\asset('images/partner/Rightarrow.png')->uri() }}" alt="arrow">
                          </div>
                        </div>
                      </div>
                    </a>
                  @endforeach
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
