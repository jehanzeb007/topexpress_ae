<div class="form-group mb-3">
    <label class="control-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control">
</div>

<div class="form-group mb-3">
    <label class="control-label">{{ __('Description') }}</label>
    <textarea name="description" data-shortcode-attribute="content" class="form-control" rows="3">{{ $content }}</textarea>
</div>

<div class="form-group mb-3">
    <label class="control-label">{{ __('Country') }}</label>
    <select name="country" id="country" class="form-control">
        <option value="" @if (Arr::get($attributes, 'country') == "") selected @endif>{{ __('-----') }}</option>
        @foreach($countries as $key => $country)
            <option value="{{ $key }}" @if (Arr::get($attributes, 'country') == $key) selected @endif>{{ $country }}</option>
        @endforeach
    </select>
</div>
