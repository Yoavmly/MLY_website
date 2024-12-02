<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="form-block">
    <div class="content">
      <div class="text-section">
        <h1>
          Let’s&nbsp;<span>Make</span> it&nbsp;Happen
        </h1>
      </div>
      <div class="form-section">
        <form action="{{ $form_action }}" method="POST">
          @csrf
          @foreach ($form_fields as $field)
            <div class="form-group">
              <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>

              @if ($field['type'] === 'text')
                <input
                  type="text"
                  id="{{ $field['name'] }}"
                  name="{{ $field['name'] }}"
                  placeholder="{{ $field['placeholder'] }}"
                  {{ $field['required'] ? 'required' : '' }}
                />
              @elseif ($field['type'] === 'textarea')
                <textarea
                  id="{{ $field['name'] }}"
                  name="{{ $field['name'] }}"
                  placeholder="{{ $field['placeholder'] }}"
                  {{ $field['required'] ? 'required' : '' }}
                ></textarea>
              @elseif ($field['type'] === 'select')
                <select
                  id="{{ $field['name'] }}"
                  name="{{ $field['name'] }}"
                  {{ $field['required'] ? 'required' : '' }}
                >
                  <option value="" disabled selected>{{ $field['placeholder'] }}</option>
                  @foreach ($field['options'] as $option)
                    <option value="{{ $option['option'] }}">{{ $option['option'] }}</option>
                  @endforeach
                </select>
              @endif
            </div>
          @endforeach

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
