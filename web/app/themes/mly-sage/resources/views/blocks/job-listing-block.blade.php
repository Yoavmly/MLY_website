<div class="{{ $block->classes }} container" style="{{ $block->inlineStyle }}; cursor:pointer;" onclick="location.href='{{ $link }}'">
  <div class="job-listing-block">
      <div class="job-listing-content">
        <h2 class="job-title">{{ $title }}</h2>
        <span class="job-work-type">{{ $work_type }}</span>
        <span class="job-arrow">→</span>
      </div>
  </div>
  <br>
  <br>
  <hr class="horizontal-line">
</div>

