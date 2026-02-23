@php
    Theme::asset()->usePath()->add('leaflet-css', 'plugins/leaflet.css');
    Theme::asset()->usePath()->add('jquery-bar-rating', 'plugins/jquery-bar-rating/themes/fontawesome-stars.css');
    Theme::asset()->container('footer')->usePath()->add('leaflet-js', 'plugins/leaflet.js');
    Theme::asset()->usePath()->add('magnific-css', 'plugins/magnific-popup.css');
    Theme::asset()->container('footer')->usePath()->add('magnific-js', 'plugins/jquery.magnific-popup.min.js');
    Theme::asset()->container('footer')->usePath()->add('bootstrap-popper', 'plugins/bootstrap/popper.min.js');
    Theme::asset()->container('footer')->usePath()->add('property-js', 'js/property.js');
    Theme::asset()->container('footer')->usePath()->add('jquery-bar-rating-js', 'plugins/jquery-bar-rating/jquery.barrating.min.js');
    $allowShareViaWhatsapp = theme_option('allow_share_via_whatsapp', 'no');
    $video = $project->getMetaData('video', true);
    $videoUrl = $video['url'] ?? '';
@endphp

<div id="project-detail-content">

    {!! Theme::partial('real-estate.elements.project.header-images', compact('project')) !!}

    <!-- ============================ Property Detail Start ================================== -->

    <section class="gray-simple">
        <div data-project-id="{{ $project->id }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="property_block_wrap style-2 p-4">
                        <div class="prt-detail-title-desc">
                            <span class="prt-types sale">{{ $project->status->label() }}</span>
                            <h1 class="h3">{{ $project->name }}</h1 class="h3">
                            <span>
                                <i class="lni-map-marker"></i>
                                {{ $project->location }}
                            </span>
                            @if ($project->price_from || $project->price_to)
                                <h3 class="prt-price-fix mt-3">
                                    @if ($project->price_from)
                                        {{ format_price($project->price_from)  }}
                                    @endif
                                    @if ($project->price_to)
                                        - {{ format_price($project->price_to) }}
                                    @endif
                                </h3>
                            @endif
                        </div>
                    </div>

                    <div class="property_block_wrap style-2">
                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#clTwo"
                               aria-controls="clTwo"
                               href="javascript:void(0);" aria-expanded="true">
                                <h4 class="property_block_title">{{ __('Description') }}</h4>
                            </a>
                        </div>
                        <div id="clTwo" class="panel-collapse collapse show">
                            <div class="block-body">
                                {!! clean($project->content) !!}
                            </div>
                        </div>
                    </div>

                    {!! Theme::partial('real-estate.elements.project.amenities', compact('project')) !!}
                    {!! Theme::partial('real-estate.elements.video', ['object' => $project]) !!}
                    {!! Theme::partial('real-estate.elements.project.facilities', compact('project')) !!}
                    {!! Theme::partial('real-estate.elements.project.features', compact('project')) !!}
                    {!! Theme::partial('real-estate.elements.project.location', compact('project')) !!}
                    {!! Theme::partial('real-estate.elements.project.investor', compact('project')) !!}
                    {!! Theme::partial('real-estate.elements.gallery', ['property' => $project]) !!}
                </div>
                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">

                    <!-- Like And Share -->
                    <div class="like_share_wrap b-0">
                        <ul class="like_share_list justify-content-center">
                            <li class="social_share_list">
                                <a href="JavaScript:void(0);" class="btn btn-likes" data-bs-toggle="tooltip"
                                data-original-title="Share"><i class="fas fa-share"></i>{{ __('Share') }}</a>
                                <div class="social_share_panel">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&title={{ $project->description }}"
                                    target="_blank" class="cl-facebook"><i class="lni-facebook"></i></a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ $project->description }}"
                                    target="_blank" class="cl-twitter"><i class="lni-twitter"></i></a>
                                    <a href="https://linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&summary={{ rawurldecode($project->description) }}&source=Linkedin"
                                    target="_blank" class="cl-linkedin"><i class="lni-linkedin"></i></a>
                                    @if($allowShareViaWhatsapp == 'yes')
                                        <a href="https://api.whatsapp.com/send?text={{ rawurldecode($project->description) }} {{ urlencode(url()->current()) }}"
                                        data-action="share/whatsapp/share" target="_blank" class="cl-linkedin"><i
                                                class="lni-whatsapp"></i></a>
                                    @endif
                                </div>
                            </li>
                            <li><a href="JavaScript:Void(0);" data-id="{{ $project->id }}"
                                class="btn btn-likes add-to-wishlist" data-bs-toggle="tooltip"
                                data-original-title="Save"><i
                                        class="fas fa-heart"></i>{{ __('Save') }}</a></li>
                        </ul>
                    </div>

                    <div class="details-sidebar">
                        @if ($author = $project->author)
                            <!-- Agent Detail -->
                            <div class="sides-widget">
                                <div class="sides-widget-header">
                                    @if ($author->username)
                                        <div class="agent-photo">
                                            <img src="{{ RvMedia::getImageUrl($author->avatar->url, 'thumb') }}"
                                                alt="{{ $author->name }}">
                                        </div>
                                        <div class="sides-widget-details">
                                            <h4>
                                                <a href="{{ route('public.agent', $author->username) }}"> {{ $author->name }}</a>
                                            </h4>
                                            <a href="tel:{{ $author->phone }}"> <span><i class="lni-phone-handset"></i>{{ $author->phone }}</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    @endif
                                </div>

                                <div class="sides-widget-body simple-form">
                                    {!! Theme::partial('real-estate.elements.form-contact-consult', ['data' => $project]) !!}
                                </div>
                            </div>
                        @endif
                        {!! dynamic_sidebar('property_sidebar') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        {!! Theme::partial('real-estate.elements.project.properties', compact('project')) !!}
        {!! Theme::partial('real-estate.elements.project.related', compact('relatedProjects')) !!}
    </div>

    @if ($project->latitude && $project->longitude)
        <div
            data-magnific-popup="#trafficMap"
            data-map-id="trafficMap"
            data-popup-id="#traffic-popup-map-template"
            data-map-icon="{{ $project->map_icon }}"
            data-center="{{ json_encode([$project->latitude, $project->longitude]) }}">
        </div>
    @endif

    <script id="traffic-popup-map-template" type="text/x-custom-template">
    {!! Theme::partial('real-estate.elements.project.map', ['project' => $project]) !!}
    </script>
</div>
