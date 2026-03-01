@php
    $fileUrl = RvMedia::getImageUrl($bg);
    $extension = strtolower(pathinfo($bg, PATHINFO_EXTENSION));
    $videoExtensions = ['mp4','webm','mov','avi','mkv'];
@endphp

<div style="height: 80vh; position: relative; overflow: hidden;">

    @if(in_array($extension, $videoExtensions))

        <!-- Video -->
        <video autoplay muted loop playsinline
               style="width: 100%; height: 100%; object-fit: cover;">
            <source src="{{ $fileUrl }}">
        </video>

    @else

        <!-- Image -->
        <div style="
            width:100%;
            height:100%;
            background-image: url('{{ $fileUrl }}');
            background-size: cover;
            background-position: center;
        "></div>

    @endif

    <!-- Overlay (works for both) -->
    <div style="
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background: rgba(0,0,0,0.3);
    "></div>

    <!-- Banner Content (works for both) -->
    <div style="
        position:absolute;
        top:140px;
        left:180px;
        color:#fff;
        z-index:2;
        max-width:50%;
    ">
        <h1 style="margin-bottom: 10px;font-size: 3.75rem;color:#fff;">
            {{ $title }}
        </h1>
        <p>
            {{ $description }}
        </p>
    </div>

</div>

<section>
    <div class="container">
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
