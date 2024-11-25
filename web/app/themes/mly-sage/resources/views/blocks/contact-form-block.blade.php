<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="form-block {{ $block->classes }}" style="{{ $block->inlineStyle }}">
    <div class="content">
      <div class="text-section">
        <h1>
          Let’s <span>Make</span> it Happen
        </h1>
      </div>
      <div class="form-section">
        <form action="{{ $form_action }}" method="POST">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required />
          </div>

          <div class="form-group">
            <label for="company">Company</label>
            <input type="text" id="company" name="company" required />
          </div>

          <div class="form-group">
            <label for="contact">Phone / Mail</label>
            <input type="text" id="contact" name="contact" required />
          </div>

          <div class="form-group">
            <label for="position">Position</label>
            <select id="position" name="position" required>
              <option value="" disabled selected>My Position in the Company</option>
              @foreach($positions as $position)
                <option value="{{ $position }}">{{ $position }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="purpose">Purpose</label>
            <select id="purpose" name="purpose" required>
              <option value="" disabled selected>We Need MLY For</option>
              @foreach($purposes as $purpose)
                <option value="{{ $purpose }}">{{ $purpose }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="signature-gradient-button">
            Submit →
          </button>
        </form>
      </div>
    </div>
    <div class="footer">
      © 2024 MLY All Rights Reserved
    </div>
  </div>
</div>
