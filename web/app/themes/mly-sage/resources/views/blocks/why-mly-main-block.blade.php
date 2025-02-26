<div class="{{ $block->classes }} d-flex align-items-center justify-content-center" style="{{ $block->inlineStyle }}">
  <div class="main-block-wrapper container-fluid" style="max-width:90.313rem;">
    @php
      $uniqueId = uniqid('title-'); // Generate a unique ID
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

<style>
  .clickable-title {
    cursor: pointer;
    height: auto;
    min-height:50vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position:relative;
    grid-template-columns: 1fr auto 1fr;
  }

  .title-heading {
    width: 100%;
    text-align: center;
    margin: 0;
    transition: display 0.5s ease-in-out;
    display:grid;
    grid-template-columns: 1fr auto 1fr;
  }

  .dynamic-text {
    display: flex;
    justify-content: center;
    align-items: center;
    white-space: nowrap;
    font-size: calc(1ch * 25);
  }

  .replacement-paragraph {
    position:absolute;
    top:0;
    left:0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    overflow: hidden;
    opacity: 0;
    transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    transform: translateY(100%);
  }

  .replacement-paragraph.slide-in {
    opacity: 1;
    transform: translateY(0);
    transition: opacity 1.0s ease-in-out, transform 0.5s ease-in-out;
  }
</style>
