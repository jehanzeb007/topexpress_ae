<h1>{{ __('Agents') }}</h1>
{!! Theme::breadcrumb()->render() !!}

@foreach($accounts as $account)
    @include('plugins/real-estate::themes.partials.agents.item', ['account' => $account])
@endforeach

<br>

{!! $accounts->withQueryString()->links() !!}
