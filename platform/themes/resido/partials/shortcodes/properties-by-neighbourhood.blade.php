@php
    use Botble\Base\Enums\BaseStatusEnum;
    use Botble\Location\Repositories\Interfaces\NeighbourhoodInterface;

    $neighbourhoods = collect([]);
    if (is_plugin_active('location')) {
        $condition = [
                'neighbourhoods.status' => BaseStatusEnum::PUBLISHED,
                'is_featured'=> 1,
            ];
        $countryId = Botble\Location\Models\Country::where('code', $country)->value('id');
        if(!empty($countryId)){
            $condition['neighbourhoods.country_id'] = $countryId;
        }

        $neighbourhoods = app(NeighbourhoodInterface::class)->advancedGet([
            'condition' => $condition,
            'take' => (int) theme_option('number_of_featured_cities', 20),
            'withCount' => [],
            'select' => ['neighbourhoods.id', 'neighbourhoods.name', 'neighbourhoods.slug', 'neighbourhoods.image'],
            'with' => [],
        ]);
    }
@endphp
<section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2>{!! clean($title) !!}</h2>
                    <p>{!! clean($description) !!}</p>
                </div>
            </div>
        </div>

        <div class="row list-layout">
            @foreach ($neighbourhoods as $neighbourhood)

                <div class="col-lg-3 col-md-3">
                    <div class="neighbourhood-property-wrap">
                        <div class="neighbourhood-property-thumb">
                            <a href="{{ route('public.properties-by-city', ['slug' => $neighbourhood['slug']]) }}">
                                <img src="{{ get_image_loading() }}"
                                     data-src="{{ RvMedia::getImageUrl($neighbourhood->image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                     class="w-100 lazy" alt="{{ $neighbourhood->name }}"/>
                            </a>
                        </div>
                        <div class="neighbourhood-property-content">
                            <div class="lp-content-flex">
                                <h4 class="lp-content-title">{{ $neighbourhood->name }}</h4>
                                <span>{{ $neighbourhood->properties_count }} {{ __('Properties') }}</span>
                            </div>
                            <div class="lp-content-right">
                                <a href="{{ route('public.properties-by-city', ['slug' => $neighbourhood['slug']]) }}"
                                   class="lp-property-view">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <a href="{{ route('public.properties') }}"
                   class="btn btn-theme-light-2 rounded">{{ __('Browse More Locations') }}</a>
            </div>
        </div>
    </div>
</section>
