<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="project-main-block">
    @if($title)
      <h2 class="block-title">
        {{ $title }}
      </h2>
    @endif
    @if(!empty($project_block))
    <div class="project-container">
      @foreach($project_block as $project)
          <a href="{{ get_permalink($project) }}" class="project-link" target="_blank" rel="noopener noreferrer">
            <div class="project-item">
              @if(has_post_thumbnail($project))
                <div class="project-image">
{{--                  <img src="" alt="{{ get_the_title($project) }}">--}}
                      {!! get_the_post_thumbnail($project,'thumbnail') !!}
                </div>
              @endif
              <div class="project-info">
                  <h3 class="project-title">{{ get_the_title($project) }}</h3>
                  <p class="project-description">{{ get_the_excerpt($project) }}</p>
                <div class="arrow-image">
                  <img src="{{ \Roots\asset("images/partner/Rightarrow.png") }}" alt="arrow">
                </div>
              </div>
            </div>
          </a>
      @endforeach
    </div>
      @endif
    <div class="view-all-project">
      @if($view_all_projects_link)
        <a href="{{ $view_all_projects_link['url'] }}" class="view-all-link custom-btn-secondary" target="_blank" rel="noopener noreferrer">View All Projects →</a>
      @endif
    </div>
  </div>
</div>
