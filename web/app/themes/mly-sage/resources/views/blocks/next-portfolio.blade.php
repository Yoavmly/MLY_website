<div class="{{ $block->classes }} @if(!$next_portfolio_item) no-next-item @endif nextPortfolio" style="{{ $block->inlineStyle }}">
  @if ($next_portfolio_item)
    <a href="{{ $next_portfolio_item['permalink'] }}" class="next-portfolio-link" style="--arrow-right: url('{{ \Roots\asset('images/partner/Rightarrow.png')->uri() }}')">
      <div class="next-portfolio-item">
        <h3>{{ $next_portfolio_item['title'] }}</h3>
        <p class="category">{{ $next_portfolio_item['excerpt'] }}</p>
        <img src="@if( function_exists('get_the_post_thumbnail_url')) {{ get_the_post_thumbnail_url(get_the_ID(),'large') }} @endif" alt="{{ $next_portfolio_item['title'] }}">
      </div>
    </a>
  @else
    <p>No next portfolio item found.</p>
  @endif
</div>
