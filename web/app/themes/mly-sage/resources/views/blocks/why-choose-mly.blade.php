<div class="outer-block {{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="align-self-center parent-wrapper d-flex flex-column">
        <div class="mission-text">
          {!! $small_text !!}
        </div><br>
        <div class="horizontal-line"></div><br>

          <div class="title">
            {!! $title !!}
          </div>
          <div class="button-wrapper">
            <a href="#form-block-1" class="custom-btn-secondary">
              {{ get_field('button_text') ?? 'Let’s Talk' }}&nbsp;<span class="arrow">→</span>
            </a>
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
</div>
