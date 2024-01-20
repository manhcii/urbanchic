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



    <div class="container mt-5 mb-5" style="min-height: calc(100vh - 600px)">
        <h2 class="mt-5">@lang('Reset Password')</h2>
        <form method="post" action="{{ route('frontend.password.reset.post') }}" >
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
          <div class="form-group mb-3 mt-3">
            <label class="mb-2" for="email">@lang('Email'):</label>
            <input class="form-control input-text" value="{{ old('email') }}" type="email" name="email" autocomplete="username" required>
          </div>
          <div class="form-group mb-3">
            <label class="mb-2" for="pwd">@lang('New Password'):</label>
            <input class="form-control input-text" type="password" name="password" required value="{{ old('password') }}">
          </div>
          <div class="form-group mb-3">
            <label class="mb-2" for="pwd">@lang('Confirm password'):</label>
            <input class="form-control input-text" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
          </div>

          <button type="submit" class="btn btn-primary">@lang('Change password')</button>
        </form>
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
  @include('frontend.panels.scripts')
  @include('frontend.components.sticky.alert')
  {{-- Scripts custom each page --}}
  @stack('script')

</body>

</html>
