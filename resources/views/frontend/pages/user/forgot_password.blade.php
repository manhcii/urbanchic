<!DOCTYPE html>
<html lang="{{ $locale ?? 'vi' }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? '')) }}
    </title>
    <link rel="icon" href="{{ $web_information->image->favicon ?? '' }}" type="image/x-icon">
    {{-- Print SEO --}}
    @php
        $seo_title = $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''));
        $seo_keyword = $seo_keyword ?? ($page->keyword ?? ($web_information->information->seo_keyword ?? ''));
        $seo_description = $seo_description ?? ($page->description ?? ($web_information->information->seo_description ?? ''));
        $seo_image = $seo_image ?? ($page->json_params->og_image ?? ($web_information->image->seo_og_image ?? ''));
    @endphp
    <meta name="description" content="{{ $seo_description }}" />
    <meta name="keywords" content="{{ $seo_keyword }}" />
    <meta name="news_keywords" content="{{ $seo_keyword }}" />
    <meta property="og:image" content="{{ $seo_image }}" />
    <meta property="og:title" content="{{ $seo_title }}" />
    <meta property="og:description" content="{{ $seo_description }}" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    {{-- End Print SEO --}}
    {{-- Include style for app --}}
    @include('frontend.panels.styles')
    {{-- Styles custom each page --}}
    @stack('style')
</head>

<body class="page">
    <div id="page" class="hfeed page-wrapper">

        @isset($widget->header)
            @if (\View::exists('frontend.widgets.header.' . $widget->header->json_params->layout))
                @include('frontend.widgets.header.' . $widget->header->json_params->layout)
            @else
                {{ 'View: frontend.widgets.header.' . $widget->header->json_params->layout . ' do not exists!' }}
            @endif
        @endisset

        <div id="site-main" class="site-main container mt-5 mb-5">
            <div id="main-content" class="main-content mt-5" style="min-height: calc(100vh - 600px)">
                <div id="primary" class="content-area">
                    <div id="title" class="page-title">
                        <div class="section-container">
                            <div class="content-title-heading">
                                <h1 class="text-title-heading">
                                    @lang('Forgot Password')
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div id="content" class="site-content mt-5" role="main">
                        <div class="section-padding">
                            <div class="section-container p-l-r">
                                <div class="page-forget-password">
                                    <form method="post" action="{{ route('frontend.password.forgot.post') }}"
                                        class="reset-password">
                                        @csrf
                                        <p>@lang('Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.')</p>
                                        <div class="form-group mt-5">
                                            <label class="mb-2">@lang('Email'):</label>
                                            <input class="form-control input-text" required type="text"
                                                name="email" autocomplete="username" value="{{ old('email') }}"
                                                placeholder="@lang('Email')">
                                        </div>
                                        <div class="clear"></div>
                                        <div class="form-group mt-4">
                                            <button type="submit" class="button-solid "
                                                value="Reset password">@lang('Reset password')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div><!-- #main-content -->
        </div>

        @isset($widget->footer)
            @if (\View::exists('frontend.widgets.footer.' . $widget->footer->json_params->layout))
                @include('frontend.widgets.footer.' . $widget->footer->json_params->layout)
            @else
                {{ 'View: frontend.widgets.footer.' . $widget->footer->json_params->layout . ' do not exists!' }}
            @endif
        @endisset
    </div>
    {{-- Include scripts --}}
    @include('frontend.components.sticky.contact')
    @include('frontend.panels.scripts')
    @include('frontend.components.sticky.alert')

    {{-- Scripts custom each page --}}
    @stack('script')

</body>

</html>
