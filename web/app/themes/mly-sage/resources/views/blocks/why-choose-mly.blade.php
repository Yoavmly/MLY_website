<div class="outer-block {{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="mission-text">
    mission:&nbsp;<span>flex;</span>
  </div>
  <div class="horizontal-line"></div>
  <div class="title-button-wrapper">
    <div class="title">
      <span>Why</span>&nbsp;Choose MLY
    </div>
    <div class="button-wrapper">
      <a href="{{ get_field('button_link') }}" class="custom-btn-secondary">
        {{ get_field('button_text') ?? 'Let’s Talk' }}
      </a>
    </div>
  </div>
  <div class="inner-block">
    @foreach ($features as $feature)
      <div class="small-block">
        <div class="shape">
          <img src="{{ $feature['image'] }}" alt="{{ $feature['alt'] }}">
        </div>
        <div class="description">
          {{ $feature['description'] }}
        </div>
      </div>
    @endforeach
  </div>
</div>