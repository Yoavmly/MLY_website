<div class="{{ $block->classes }} information-block" style="{{ $block->inlineStyle }}">
    @if($title)
      <h2 class="information-block__title">{{ $title }}</h2>
    @endif

    @if($content)
      <div class="information-block__content">
        {!! $content !!}
      </div>
    @endif
</div>
