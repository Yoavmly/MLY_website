<script>
  function toggleClick(url){
    location.href=url;
  }
</script>
<div class="{{ $block->classes }}" style=" {{ $block->inlineStyle }}">
  <div class="container" style="max-width:90.313rem;">
    @foreach($items as $item)
      <div class="job-listing-block" onclick="toggleClick('{{get_permalink($item)}}')">
        <div class="job-listing-content">
          <h2 class="job-title">{{ get_the_title($item) }}</h2>
          @php
          $location_types = get_the_terms($item,'location-types');
            @endphp
          @if(!empty($location_types))
            <span class="job-work-type">
              <ul style="list-style: none">
              @foreach ($location_types as $index => $location_type)
                  <li>{{ $location_type->name }}
                    @if ($index < count($location_types) - 1), @endif
                  </li>
                @endforeach
              </ul>
              </span>
          @endif
          <span class="job-arrow">→</span>
        </div>
      </div>
      <hr class="horizontal-line">
    @endforeach
  </div>
</div>
