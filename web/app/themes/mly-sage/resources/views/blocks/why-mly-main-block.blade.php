<div class="{{ $block->classes }} d-flex align-items-center justify-content-center" style="{{ $block->inlineStyle }}">
  <div class="main-block-wrapper container-fluid" style="max-width:90.313rem;">
    @php
      $uniqueId = uniqid('title-');
    @endphp
    <div onclick="colorizeWords('{{ $uniqueId }}')" id="{{ $uniqueId }}" class="clickable-title">
      <div class="title-heading">
        <span class="dynamic-text" data-word="WE">WE</span>
        <span class="dynamic-text" data-word="R">R</span>
        <span class="dynamic-text" data-word="MLY">MLY</span>
      </div>
      <div id="replacementParagraph" class="replacement-paragraph" style="display: none;">
        <span class="paragraphCustom">{{ $paragraph_1 }}</span>
      </div>
    </div>
    <hr>
    <div class="paragraph">
      <span class="paragraphCustom">{{ $paragraph_2 }}</span>
    </div>
  </div>
  <div class="justify-content-start align-items-center last-row-styling">
    <div class="button-wrapper">
        <a href="{{ home_url('#form-block-1') }}">
          <span class="signature-gradient-button">{{ $button_text }}</span>
        </a>
    </div>
    <div class="test-last-row d-flex align-items-center justify-content-start">
      @foreach($properties as $property)
        <div class="individual-property d-flex flex-row justify-content-start align-items-start">
          <span class="factual-data">{{ $property['digits'] }}</span>
          <span class="textual-data">{{ $property['data'] }}</span>
        </div>
      @endforeach
    </div>
  </div>
</div>

<script>
  function colorizeWords(elementId) {
      const titleElement = document.getElementById(elementId);
      const titleHeadingElement = titleElement.querySelector('.title-heading');
      const replacementParagraph = document.getElementById('replacementParagraph');
      let currentColorIndex = 0;
      let clickCount = 0;

      if (!titleHeadingElement) {
          console.error('No title-heading element found inside the div.');
          return;
      }

      const wordSpans = titleHeadingElement.querySelectorAll('.dynamic-text');
      titleElement.onclick = function() {
          clickCount++;

          if (clickCount <= wordSpans.length) {
              if (currentColorIndex < wordSpans.length) {
                  wordSpans[currentColorIndex].style.color = 'cyan';
                  currentColorIndex++;

                  if (currentColorIndex === wordSpans.length) {
                     //
                  }
              }
          } else if (clickCount === wordSpans.length+1) {
              titleHeadingElement.style.display = 'none';
              replacementParagraph.style.display = 'block'; // Or any other display style you prefer.
              replacementParagraph.classList.add('slide-in'); // Add the slide-in class for animation.
          }
      };
  }
</script>
