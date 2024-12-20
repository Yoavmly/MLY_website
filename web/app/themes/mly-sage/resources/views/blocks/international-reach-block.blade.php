<script>
  function handleTrail() {

    //skips mobile view
    if (window.innerWidth <= 768) return;

    document.addEventListener('DOMContentLoaded', function () {
      const sections = document.querySelectorAll('.global-impact-section');

      sections.forEach(section => {
        const positions = [];// array to store position of each .square element
        const squares = section.querySelectorAll(".square");//selects all .square
        let isMouseInWindow = false;//if mouse is within the section
        let sectionRect = section.getBoundingClientRect();//get the section

        // Initialize positions array for each square
        squares.forEach(() => {
          positions.push({//initializes for the center of the section
            x: sectionRect.width / 2,
            y: sectionRect.height / 2
          });
        });

        squares.forEach(square => {//bg color for each square
          square.style.backgroundColor = "#007bff";
        });

        function lerp(start, end, factor) {//linear interpolation function based on a factor
          return start + (end - start) * factor;
        }

        const coords = {//initial coords of the section
          x: sectionRect.width / 2,
          y: sectionRect.height / 2
        };

        function animate() {//updates the trail based on mouse movement

          sectionRect = section.getBoundingClientRect();//in case of window resize

          squares.forEach(function (square, index) {
            if (isMouseInWindow) {//interpolating towards the mouse coords
              if (index === 0) {
                positions[0].x = lerp(positions[0].x, coords.x, 0.3);
                positions[0].y = lerp(positions[0].y, coords.y, 0.3);
              } else {
                positions[index].x = lerp(
                  positions[index].x,
                  positions[index - 1].x,
                  0.3
                );
                positions[index].y = lerp(
                  positions[index].y,
                  positions[index - 1].y,
                  0.3
                );
              }

              // Make sure positions are relative to the section
              square.style.left = (positions[index].x - 40) + "px";
              square.style.top = (positions[index].y - 40) + "px";
              square.classList.add("active");
            } else {
              // Return to center of section when mouse leaves
              positions[index].x = lerp(
                positions[index].x,
                sectionRect.width / 2,
                0.1
              );
              positions[index].y = lerp(
                positions[index].y,
                sectionRect.height / 2,
                0.1
              );
              square.style.left = (positions[index].x - 40) + "px";
              square.style.top = (positions[index].y - 40) + "px";
              square.classList.remove("active");
            }
          });

          requestAnimationFrame(animate);//animate function would be called continuously
        }

        section.addEventListener("mousemove", function (e) {
          // Convert page coordinates to section coordinates
          const rect = section.getBoundingClientRect();
          coords.x = e.clientX - rect.left;
          coords.y = e.clientY - rect.top;
          isMouseInWindow = true;
        });

        section.addEventListener("mouseleave", function () {
          isMouseInWindow = false;
        });

        // Start animation for this section
        animate();
      });
    });
  }

  //call
  handleTrail();

</script>
<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="global-impact-section">
    <div class="small-globe-div">
      <img class="small-globe-image" src="{{ $image }}" alt="small globe image">
    </div>
    <div class="content-block">
      <div class="text-content">
        <div class="title">
          {{ $title }}
        </div>
        <div class="subtitle">
          {{ $description }}
        </div>
        <div class="button-placement">
          <a href="{{ get_field('button_link') }}" class="btn signature-gradient-button">
            {{ $button_title }}&nbsp;→
          </a>
        </div>
      </div>
    </div>
{{--    this here is the trailing squares--}}
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
  </div>
</div>
