<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="zoho-services-block">
    <div class="zoho-services-container">
      @foreach($services as $service)
        <div class="zoho-service-item">
          <div class="zoho-service-logo" style="
                        @if(count($service['icons']) > 1)
                            --first-image: url('{{ $service['icons'][0]['icon']['url'] }}');
                            --second-image: url('{{ $service['icons'][1]['icon']['url'] }}');

                            @if(count($service['icons']) > 2)
                                animation: imageCycle{{count($service['icons'])}} 4s infinite;
                                @keyframes imageCycle{{count($service['icons'])}} {
                                    @foreach($service['icons'] as $key => $icon)
                                        {{ floor(($key / (count($service['icons']) - 1)) * 100) }}% {
                                            content: url('{{ $icon['icon']['url'] }}');
                                        }
                                    @endforeach
                                }
                            @else
                                animation: imageCycle 4s infinite;
                                @keyframes imageCycle {
                                    0%, 100%{
                                      background-image:var('--first-image');
                                    }
                                    50%{
                                      background-image: var('--second-image');
                                    }
                                  }
                                background-size: contain;
                                background-repeat: no-repeat;
                            @endif
                        @elseif(count($service['icons']) == 1)
                            /* If only one image, display it statically */
                                background-image: url('{{ $service['icons'][0]['icon']['url'] }}');
                                background-size: contain;
                                background-repeat: no-repeat;

                        @endif
                    ">
          </div>
          <div class="zoho-service-info">
            <h3 class="zoho-service-title">{{ e($service['title']) }}</h3>
            <p class="zoho-service-description">{{ e($service['description']) }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
