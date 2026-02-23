<div class="image-cover hero-banner"
    style="background:#eff6ff url({{ RvMedia::getImageUrl($bg, null, false, RvMedia::getDefaultImage()) }}) no-repeat;">
</div>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center mb-4">
                    <h2>{!! clean($title) !!}</h2>
                    <p class="lead-i">{!! clean($description) !!}</p>
                </div>
            </div>
        </div>
        <form action="{{ route('public.properties') }}" method="GET" id="frmhomesearch">
            <div class="hero-search-content">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <div class="choose-property-type">
                                {!! Theme::partial('real-estate.filters.type') !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <div class="input-with-icon">
                                {!! Theme::partial('real-estate.filters.input-search') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group borders">
                            <div class="input-with-icon">
                                {!! Theme::partial('real-estate.filters.categories') !!}
                                <i class="ti-briefcase"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="form-group mb-2">
                            <div class="input-with-icon">
                                {!! Theme::partial('real-estate.filters.cities') !!}
                                <i class="ti-location-pin"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="form-group simple mb-2">
                            {!! Theme::partial('real-estate.filters.min-price') !!}
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="form-group simple mb-2">
                            {!! Theme::partial('real-estate.filters.max-price') !!}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="form-group">
                            <button class="btn search-btn" type="submit">{{ __('Search') }}</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>

<!-- ============================ Hero Banner End ================================== -->
