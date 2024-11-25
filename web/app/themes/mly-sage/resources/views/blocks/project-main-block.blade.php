<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="project-main-block">
    @if($title)
      <h2 class="block-title">
          {{ $title }}
      </h2>
    @endif
    <div class="project-container">
      @foreach($project_block as $project)
        <div class="project-item">
          @if($project['image']['url'])
            <div class="project-image">
              <img src="{{ $project['image']['url'] }}" alt="{{ $project['title_project'] }}">
            </div>
          @endif
          <div class="project-info">
            <h3 class="project-title">{{ $project['title_project'] }}</h3>
            <p class="project-description">{{ $project['description_project'] }}</p>
            @if($project['url'])
              <a href="{{ $project['url'] }}" class="project-link" target="_blank" rel="noopener noreferrer">→</a>
            @endif
          </div>
        </div>
      @endforeach
    </div>
    <div class="view-all-project">
      @if($view_all_projects_link)
        <a href="{{ $view_all_projects_link }}" class="view-all-link custom-btn-secondary" target="_blank" rel="noopener noreferrer">View All Projects → </a>
        @endif
    </div>
  </div>
</div>
