<script>
  // Define the global function to handle the click and navigate to a URL
  function toggleClick(url, isOpenNewTab = false) {
      if (isOpenNewTab) {
          window.open(url, '_blank').focus();
      } else {
          location.href = url;
      }
  }
</script>
<div class="{{ $block->classes }} services-block" style="{{ $block->inlineStyle }}">
  @if(isset($items))
    @foreach($items as $item)
      <div class="services-container">
        <div class="service-item"
             onclick="toggleClick('{{ $item['url'] }}')"
             style="background-image: url('{{ $item['icon'] }}'); --hover-translate: {{ $item['hover_translate'] }};">
          <div class="service-content" style="background:linear-gradient(to top, {{ $item['color'] }} 0%, rgba(0, 0, 0, 0) 85%)">
            <h3 class="service-title">{!! $item['title'] !!} </h3>
            <p class="service-description">{!! $item['description'] !!}</p>
          </div>
        </div>
        <div class="arrow-block" style="background:{{ $item['color'] }}">
          <img src="{{ \Roots\asset("images/Rightarrow.png") }}" alt="arrow" class="arrow">
        </div>
      </div>
    @endforeach
  @endif
</div>
