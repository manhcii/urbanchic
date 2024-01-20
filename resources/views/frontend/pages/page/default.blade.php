{{-- Check và gọi template tương ứng --}}
@extends('frontend.layouts.default')

@section('content')
<section id="fhm-contact-us-breadcrumb" class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-list">
        <a href="{{ route('home.default') }}" title="@lang('Home')" class="breadcrumb-link">@lang('Home')</a>
        <div class="breadcrumb-arrow">
          <svg
            width="5"
            height="9"
            viewBox="0 0 5 9"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M3.64526 4.49898C3.58546 4.44862 3.54769 4.4203 3.51307 4.38568C2.39577 3.26838 1.27532 2.15108 0.161169 1.03063C0.0919282 0.961387 0.0352768 0.866968 0.0100982 0.772548C-0.0308171 0.627771 0.0573075 0.470405 0.189495 0.394869C0.321683 0.319333 0.488491 0.328774 0.611237 0.426342C0.649004 0.454668 0.680478 0.489288 0.715099 0.52391C1.92997 1.73878 3.14483 2.95364 4.36285 4.16851C4.5989 4.40456 4.5989 4.5934 4.366 4.8263C3.13854 6.05376 1.91108 7.27807 0.686773 8.50553C0.570322 8.62198 0.441282 8.68807 0.274473 8.63771C0.0195399 8.56218 -0.0780273 8.26004 0.0824863 8.04916C0.110812 8.0114 0.145433 7.97992 0.180054 7.9453C1.29421 6.83115 2.41151 5.71385 3.52566 4.5997C3.55399 4.56822 3.59175 4.54304 3.64526 4.49898Z"
              fill="#5E090A"
            />
          </svg>
        </div>
        <span class="breadcrumb-link">{{$page->json_params->title->{$locale} ?? $page->title}}</span>
      </div>
    </div>
  </section>
@endsection
