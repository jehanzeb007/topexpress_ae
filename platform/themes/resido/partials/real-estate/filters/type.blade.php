@php
    use Botble\RealEstate\Enums\PropertyTypeEnum;
    $types = PropertyTypeEnum::labels();
@endphp

@if (count($types))
    @php
        $type_choice = request()->input('type', PropertyTypeEnum::SALE());
    @endphp
    <div class="d-flex flex-row flex-nowrap">
        @foreach ($types as $key => $type)
            <div class="form-check form-check-inline">
                <input class="btn-check d-none" type="radio" name="type" id="cp-{{ $key }}" value="{{ $key }}"
                       @if ($type_choice == $key) checked @endif autocomplete="off">
                <label class="btn btn-outline-dark" for="cp-{{ $key }}">{{ $type }}</label>
            </div>
        @endforeach
    </div>
@endif
