<div class="{{ $block->classes }} d-flex justify-content-center m-lg-auto" style="{{ $block->inlineStyle }}">
  <div class="get-in-touch-wrapper" id="form-block-2" style="--arrow-url : url('{{ asset("images/arrow-down-white.png") }}')">
    <div class="section-container" style="--arrow-url : url('{{ asset("images/arrow-down-white.png") }}')">
      <div class="visual-overlay"></div>
      <div class="form-area">
        <div class="heading-area">
          <h1>
            {!! $heading !!}
          </h1>
        </div>
          <div class="form-itself" style="padding:unset;">
            {!! FrmFormsController::get_form_shortcode(['id' => $form_id]) !!}
          </div>
      </div>

      <div class="video-wrapper">
        <div class="video-display">
          @if ($video_link || $video_file)
            <video autoplay muted loop playsinline data-object-fit="cover">
              <source src="{{ $video_link ?? $video_file }}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          @else
            <p>No Video Provided</p>
          @endif
        </div>
        <div class="video-socials">
          <div class="contact-info">
            <div class="visit-us">
              <strong>Visit Us</strong>
              <p>Pal Yam st. Haifa</p>
            </div>
            <div class="leave-message">
              <strong>Leave A Message</strong>
              <p><a href="mailto:mly@mly.co.il">mly@mly.co.il</a></p>
            </div>
            <div class="follow-us">
              <strong>Follow Us</strong>
              <div class="social-icons">
                <a href="#" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin"></i></a>
                <a href="#" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="legal-footer">
      <span class="footer-text">©2024 MLY All Rights Reserved</span>
    </div>
  </div>
</div>
