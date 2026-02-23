<div class="property_block_wrap style-2">
    <div class="property_block_wrap_header">
        <a data-bs-toggle="collapse" data-parent="#loca" data-bs-target="#clSix" aria-controls="clSix"
           href="javascript:void(0);" aria-expanded="true">
            <h4 class="property_block_title">{{ __("Project's information") }}</h4>
        </a>
    </div>

    <div class="block-body">
        <div class="agency-list">
            <div class="agency-avatar">
                <img class="lazy" src="{{ get_image_loading() }}" data-src="{{ $property->project->image_thumb }}" alt="{{ $property->project->name }}">
            </div>
            <div class="agency-content">
                <div class="agency-name">
                    <a href="{{ $property->project->url }}"><h4>{{ $property->project->name }}</h4></a>
                </div>
                <div class="agency-desc">{{ Str::words(clean($property->project->description), 50, '') }}</div>
            </div>
        </div>
    </div>
</div>
