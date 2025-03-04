<div class="{{ $block->classes }} information-block" style="{{ $block->inlineStyle }}">
  @if($title)
    <h2 class="information-block__title">{{ $title }}</h2>
  @endif

  @if($isSocialsPresent && !empty($socials))
    <div class="socials-wrapper">
      @foreach($socials as $social)
        <div class="social-content">
          <a href="{{ $social['link'] }}" target="_blank" rel="noopener noreferrer">
            @if(isset($social['image']['url']))
              <img src="{{ $social['image']['url'] }}" alt="{{ $social['name'] }}-icon"/>
            @endif
          </a>
        </div>
      @endforeach
    </div>
  @endif

  @if($content)
    <div class="information-block__content">
      {!! $content !!}
    </div>
  @endif
</div>
