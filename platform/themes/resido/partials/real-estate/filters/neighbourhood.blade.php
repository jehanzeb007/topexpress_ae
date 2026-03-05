@php
    $isAvailableForOneCountry = theme_option('is_available_for_one_country', 'no');
@endphp
<select
    data-placeholder="{{ $isAvailableForOneCountry ? __('City') : (__('Country') . ' ' . __('State') . ' ' . __('City'). ' ' . __('Neighbourhood'))  }}"
    class="form-control neighbourhood_id"
    data-url="{{ route('public.ajax.neighbourhoods') }}" name="neighbourhood_id"
    id="neighbourhood_id" {{ $isAvailableForOneCountry == 'yes' ? 'data-only-neighbourhood=true' : ''}}>
    @if(!empty(request()->input('neighbourhood_id')))
        <option value="{{ request()->input('neighbourhood_id') }}" selected>
            {{ Location::getCityNameById(request()->input('neighbourhood_id')) }}
        </option>
    @endif
</select>
