<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="horizontal-line-block">
    @if($checkbox)
      <div class="text-input">
        <p>
          <strong>Enter text : </strong>{{ $text_input }}
        </p>
      </div>
      @else
        <div class="text-input-disabled">
          <p>
            <em>Text input is disabled . enable to write here.</em>
          </p>
        </div>
    @endif
  </div>
</div>
