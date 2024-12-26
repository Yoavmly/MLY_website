<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="project-main-block">
    @if($title)
      <h2 class="block-title">
        {{ $title }}
      </h2>
    @endif
    <div class="project-container">
      @foreach($project_block as $project)
        @if($project['url'])
          <a href="{{ $project['url'] }}" class="project-link" target="_blank" rel="noopener noreferrer">
            <div class="project-item">
              @if($project['image']['url'])
                <div class="project-image">
                  <img src="{{ $project['image']['url'] }}" alt="{{ $project['title_project'] }}">
                </div>
              @endif
              <div class="project-info">


{{--                testing--}}
                  <div class="blurred-background"></div>
{{--                testing--}}


                  <h3 class="project-title">{{ $project['title_project'] }}</h3>
                  <p class="project-description">{{ $project['description_project'] }}</p>
  {{--            <span>&nbsp;→</span>--}}
                <div class="arrow-image">
                  <img src="{{ \Roots\asset("images/partner/Rightarrow.png") }}" alt="arrow">
                </div>
              </div>
            </div>
          </a>
        @endif
      @endforeach
    </div>
    <div class="view-all-project">
      @if($view_all_projects_link)
        <a href="{{ $view_all_projects_link }}" class="view-all-link custom-btn-secondary" target="_blank" rel="noopener noreferrer">View All Projects →</a>
      @endif
    </div>
  </div>
</div>
