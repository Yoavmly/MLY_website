<div class="{{ $block->classes }} logo-block">
    <div class="logo-main-div">
        @if ($logos)
            <div class="logo-block__container">
                    @foreach ($logos as $logo)
                        <a href="{{ $logo['link'] }}" target="_blank" class="logo-block__item">
                            <img src="{{ $logo['src'] }}" alt="{{ $logo['alt'] }}" />
                        </a>
                    @endforeach
{{--                @else--}}
{{--                    <p>No logos available.</p>--}}
            </div>
        @endif
    </div>
</div>
