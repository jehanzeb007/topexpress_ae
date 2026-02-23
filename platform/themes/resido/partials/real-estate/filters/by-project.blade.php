<select data-placeholder="{{ __('Project') }}" class="form-control select2 project_id"
    data-url="{{ route('public.ajax.projects-filter') }}" name="project_id" id="project_id">
    <option value="">{{ __('Project') }}</option>
    @if (!empty(request()->input('project_id')))
        @php
            $project = getProjectById(request()->input('project_id'));
        @endphp
        @if ($project)
            <option value="{{ request()->input('project_id') }}" selected>
                {{ $project->name }}
            </option>
        @endif
    @endif
</select>
