@if(is_plugin_active('newsletter'))
<div class="footer-widget newsletter widget_newsletter">
    <div class="header-title-2">
        <h4 class="widget-title">
            <span>{{ $config['name'] }}</span>
        </h4>
        @if (!empty($config['subname']))
            <h3 class="font-heading">{{ $config['subname'] }}</h3>
        @endif
    </div>
    <form class="form-subcriber newsletter-form mt-30" action="{{ route('public.newsletter.subscribe') }}" method="post">
        @csrf
        <div class="form-group d-flex">
            <input type="email" name="email" class="form-control bg-white font-small" placeholder="{{ __('Enter your email') }}">
            <button class="btn bg-dark text-white" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send h-4 w-5"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path><path d="m21.854 2.147-10.94 10.939"></path></svg></button>
        </div>
        @if (setting('enable_captcha') && is_plugin_active('captcha'))
            <div class="form-group">
                {!! Captcha::display() !!}
            </div>
        @endif
    </form>
</div>
@endif
