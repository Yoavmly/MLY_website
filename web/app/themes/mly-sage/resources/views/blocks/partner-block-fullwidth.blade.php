<div class="{{ $block->classes }} block-container" style="{{ $block->inlineStyle }}">
  @if($link)
    <a href="{{ $link }}" target="_blank" class="link">
      <div class="inner-block">
          <div class="content-section">
              @if($logo)
                <div class="logo">
                  <img src="{{ $logo }}" alt="partner-logo">
                </div>
            @endif
            <div class="title">{{ $title }}</div>
            @if($paragraph_1)
              <div class="paragraph">{{ $paragraph_1 }}</div>
                @endif
            @if($paragraph_2)
              <div class="paragraph">
              {{ $paragraph_2 }}
              </div>
                @endif
                <div class="arrow-image">
                    <img src="{{ \Roots\asset("images/partner/Rightarrow.png") }}" alt="arrow">
                </div>
          </div>
          <div class="image-section">
            <img src="{{ \Roots\asset("images/partner/5.png")->uri() }}" alt="Image">
          </div>
        <div class="clipping-container-round"></div>
        <div class="clipping-container" style=""></div>
      </div>
    </a>
  @endif
</div>
