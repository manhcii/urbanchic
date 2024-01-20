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
        <main id="fhm-wishlist-content">
            <section id="fhm-wishlist-breadcrumb" class="breadcrumb">
                <div class="container">
                    <div class="breadcrumb-list">
                        <a href="{{ route('home.default') }}" title="@lang('Home')"
                            class="breadcrumb-link">@lang('Home')</a>
                        <div class="breadcrumb-arrow">
                            <svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.64526 4.49898C3.58546 4.44862 3.54769 4.4203 3.51307 4.38568C2.39577 3.26838 1.27532 2.15108 0.161169 1.03063C0.0919282 0.961387 0.0352768 0.866968 0.0100982 0.772548C-0.0308171 0.627771 0.0573075 0.470405 0.189495 0.394869C0.321683 0.319333 0.488491 0.328774 0.611237 0.426342C0.649004 0.454668 0.680478 0.489288 0.715099 0.52391C1.92997 1.73878 3.14483 2.95364 4.36285 4.16851C4.5989 4.40456 4.5989 4.5934 4.366 4.8263C3.13854 6.05376 1.91108 7.27807 0.686773 8.50553C0.570322 8.62198 0.441282 8.68807 0.274473 8.63771C0.0195399 8.56218 -0.0780273 8.26004 0.0824863 8.04916C0.110812 8.0114 0.145433 7.97992 0.180054 7.9453C1.29421 6.83115 2.41151 5.71385 3.52566 4.5997C3.55399 4.56822 3.59175 4.54304 3.64526 4.49898Z"
                                    fill="#616161" />
                            </svg>
                        </div>
                        <span class="breadcrumb-link-current">@lang('Wishlist')</span>
                    </div>
                </div>
            </section>
            <section id="fhm-wishlist-banner">
                <div class="container">
                    <h1 class="title">@lang('Wishlist')</h1>
                    <p class="desc">@lang('Total') <strong>{{ count($rows) ?? 0 }}</strong> @lang('items in your wishlist.')</p>
                </div>
            </section>
            <section id="fhm-wishlist" class="wishlist products">
                <div class="container">
                    @if (isset($rows) && count($rows) > 0)
                        <div class="wishlist-list products-list">
                            <table class="table">
                                <tbody>
                                    @foreach ($rows as $items)
                                        @php
                                            $title = $items->json_params->name->{$locale} ?? $items->name;
                                            $brief = $items->json_params->brief->{$locale} ?? $items->brief;
                                            $price = $items->price != '' ? $items->price : 0;
                                            $price_old = $items->price_old != '' ? $items->price_old : 0;
                                            $image = $items->image != '' ? $items->image : 'data/images/no_image.jpg';
                                            $alias = route('frontend.page', ['taxonomy' => $items->alias ?? '']);
                                            $time = date('M d,Y', strtotime($items->created_at));
                                        @endphp
                                        <tr class="cart-product item_product wishlist-{{ $items->id }}">
                                            <td class="cart-img">
                                                <img src="{{ $image }}" title="{{ $title }}"
                                                    alt="{{ $title }}" />
                                            </td>
                                            <td class="cart-info">
                                                <div class="cart-info-content">
                                                    <a href="{{ $alias }}" title="{{ $title }}">
                                                        {{ $title }}
                                                    </a>
                                                    <span>{{ $brief }}</span>
                                                </div>
                                            </td>
                                            <td class="cart-quantity">
                                                <div class="cart-quantity-form">
                                                    <input type="button" value="-" class="qtyminus minus"
                                                        field="quantity" />
                                                    <input type="text" name="quantity" value="1"
                                                        class="qty" />
                                                    <input type="button" value="+" class="qtyplus plus"
                                                        field="quantity" />
                                                </div>
                                            </td>
                                            <td class="cart-price">
                                                <h4>{{ $lang_default == $locale ? $setting->currency_unit : $setting->{$locale . '-currency_unit'} }}
                                                    {{ number_format($price, 2) }}</h4>
                                                @if ($price_old != 0)
                                                    <span>{{ $lang_default == $locale ? $setting->currency_unit : $setting->{$locale . '-currency_unit'} }}
                                                        {{ number_format($price_old, 2) }}</span>
                                                @endif

                                            </td>
                                            <td class="cart-delete">
                                                <button class="delete_wishlist" data-id="{{ $items->id }}">
                                                    <svg width="14" height="18" viewBox="0 0 14 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_219_8079)">
                                                            <path
                                                                d="M11.0736 17.2376H2.89471C2.65658 17.1475 2.39888 17.0902 2.18402 16.9617C1.46152 16.5299 1.14581 15.8611 1.14547 15.0337C1.14412 11.7934 1.14491 8.5529 1.14783 5.31234C1.14783 5.18147 1.11916 5.11637 0.985593 5.07286C0.730931 4.99022 0.526864 4.82562 0.351467 4.62121C0.163928 4.40197 0.0816268 4.13854 0 3.87207V3.39985C0.00742061 3.39175 0.020238 3.38467 0.0215872 3.37556C0.159206 2.60348 0.824026 2.05807 1.73777 2.08842C2.29803 2.10698 2.8593 2.0918 3.42023 2.0918H3.60541C3.60541 1.90696 3.60203 1.75011 3.60541 1.5936C3.62328 0.845808 4.06582 0.265988 4.78596 0.0636078C4.92613 0.0248213 5.07091 0.00519199 5.21635 0.00525478C6.40534 0.000532575 7.59466 0.00525476 8.78365 0.00154446C9.60936 -0.00385235 10.3147 0.637019 10.3706 1.43271C10.3858 1.64858 10.3949 1.86479 10.4077 2.09281C10.5005 2.09281 10.5838 2.09281 10.6671 2.09281C11.3286 2.10124 11.9914 2.08438 12.6508 2.12654C13.3409 2.16938 13.89 2.75021 13.9879 3.47001C14.0769 4.12673 13.6603 4.83371 13.0309 5.0651C12.891 5.11671 12.8505 5.17911 12.8508 5.32583C12.8555 8.51895 12.8567 11.7113 12.8542 14.9028C12.8542 14.9925 12.8566 15.0826 12.8508 15.1727C12.8056 15.8692 12.5351 16.448 11.9647 16.8713C11.6983 17.0676 11.389 17.1594 11.0736 17.2376ZM1.95263 5.18316V14.9335C1.95263 14.9784 1.95263 15.0232 1.95263 15.0684C1.98636 15.8833 2.48725 16.4274 3.22999 16.4288C5.74266 16.4333 8.25521 16.4333 10.7676 16.4288C11.2827 16.4288 11.6618 16.1849 11.8929 15.716C12.013 15.4718 12.0399 15.2125 12.0399 14.9487C12.0415 11.7569 12.0415 8.56516 12.0399 5.37339V5.18417L1.95263 5.18316ZM7.00203 4.35306H12.2842C12.357 4.35306 12.4302 4.35306 12.5027 4.34867C12.8434 4.32911 13.1271 4.06838 13.1642 3.74153C13.2077 3.36207 13.0006 3.02983 12.6511 2.94179C12.5305 2.91655 12.4073 2.90613 12.2842 2.91076C8.76251 2.90941 5.24098 2.90941 1.71956 2.91076C1.63543 2.91037 1.55134 2.91419 1.4676 2.92223C1.10938 2.95798 0.860454 3.21433 0.823351 3.58334C0.809835 3.7467 0.853805 3.90964 0.947664 4.04403C1.04152 4.17841 1.17937 4.27578 1.3374 4.31933C1.44614 4.34459 1.55774 4.35537 1.6693 4.35137C3.4462 4.35362 5.22344 4.35418 7.00101 4.35306H7.00203ZM9.57158 2.08303C9.57158 1.8992 9.58001 1.73088 9.56989 1.56358C9.54291 1.12982 9.24777 0.817475 8.81771 0.813427C7.6068 0.801959 6.3959 0.80432 5.18499 0.813427C4.82003 0.815788 4.51038 1.05999 4.45001 1.39223C4.40886 1.61452 4.41628 1.84557 4.40144 2.08404L9.57158 2.08303Z"
                                                                fill="#616161" fill-opacity="0.7" />
                                                            <path
                                                                d="M8.96882 10.4523C8.96882 9.24069 8.96882 8.02911 8.96882 6.81752C8.96813 6.73359 8.97456 6.64975 8.98804 6.56691C9.00461 6.47963 9.0501 6.40048 9.11716 6.34222C9.18422 6.28396 9.26896 6.24998 9.35769 6.24577C9.44643 6.24157 9.534 6.26737 9.60627 6.31902C9.67855 6.37067 9.73132 6.44516 9.75608 6.53048C9.77631 6.61179 9.78651 6.69528 9.78643 6.77907C9.78778 9.23574 9.78778 11.6923 9.78643 14.1488C9.78625 14.2269 9.77686 14.3048 9.75844 14.3808C9.73594 14.4678 9.68444 14.5446 9.61243 14.5984C9.54042 14.6522 9.45221 14.6798 9.36238 14.6767C9.27255 14.6736 9.18646 14.6399 9.11834 14.5813C9.05022 14.5227 9.00414 14.4425 8.98771 14.3542C8.97434 14.2713 8.96802 14.1875 8.96882 14.1036C8.96882 12.887 8.96882 11.6699 8.96882 10.4523Z"
                                                                fill="#616161" fill-opacity="0.7" />
                                                            <path
                                                                d="M6.59319 10.4715C6.59319 9.23799 6.59319 8.00415 6.59623 6.77064C6.59569 6.65442 6.61995 6.53943 6.6674 6.43334C6.73486 6.28931 6.8772 6.23939 7.03404 6.25322C7.20033 6.26772 7.31839 6.3561 7.36966 6.51429C7.39287 6.59482 7.40368 6.67842 7.4017 6.76221C7.40305 9.22967 7.40305 11.6971 7.4017 14.1646C7.40324 14.2427 7.39416 14.3207 7.37472 14.3963C7.35045 14.4835 7.29637 14.5593 7.22191 14.6107C7.14745 14.662 7.05733 14.6856 6.96726 14.6773C6.87688 14.6716 6.79121 14.635 6.72468 14.5736C6.65815 14.5121 6.61481 14.4296 6.60196 14.34C6.59408 14.2675 6.59127 14.1946 6.59353 14.1218C6.59308 12.9052 6.59297 11.6885 6.59319 10.4715Z"
                                                                fill="#616161" fill-opacity="0.7" />
                                                            <path
                                                                d="M5.01817 10.4708C5.01817 11.7047 5.02019 12.9385 5.0148 14.172C5.0151 14.288 4.9883 14.4025 4.93654 14.5063C4.86267 14.6473 4.71898 14.6945 4.56214 14.675C4.48882 14.6686 4.41909 14.6404 4.36206 14.5939C4.30502 14.5474 4.26332 14.4848 4.24238 14.4142C4.21971 14.3393 4.2089 14.2614 4.21033 14.1832C4.20853 11.7042 4.20853 9.22552 4.21033 6.74704C4.21033 6.45999 4.32232 6.29944 4.54527 6.26065C4.59874 6.24934 4.654 6.24942 4.70744 6.2609C4.76087 6.27238 4.81129 6.29499 4.8554 6.32726C4.89951 6.35953 4.93633 6.40074 4.96344 6.44819C4.99056 6.49565 5.00737 6.54829 5.01277 6.60267C5.01871 6.66996 5.02074 6.73753 5.01884 6.80505C5.01862 8.02631 5.01839 9.24823 5.01817 10.4708Z"
                                                                fill="#616161" fill-opacity="0.7" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_219_8079">
                                                                <rect width="14" height="17.2374" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </td>
                                            <td class="cart-add">
                                                <button class="button-solid add-to-cart" data-id="{{ $items->id }}">
                                                    <span class="text">@lang('Add to Cart')</span>
                                                    <span class="icon">
                                                        <img src="{{ asset('themes/frontend/assets/images/icon/cart-2.svg') }}"
                                                            alt="Add to cart" />
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="products-list-pagination d-flex justify-content-between align-items-center">
                                <p class="products-list-pagination-result">
                                    @lang('Total') <strong>{{ $rows->perPage() }}</strong> @lang('of')
                                    <strong>{{ number_format($rows->total()) }}</strong> @lang('Resutls')
                                </p>
                                {{ $rows->withQueryString()->links('frontend.pagination.default') }}
                            </div>

                        </div>
                    @endif
                </div>
            </section>
            @isset($posts)
                <section id="fhm-wishlist-relate" class="relate-products products">
                    <div class="container">
                        <div class="heading-block">
                            <h2 class="title">@lang('May you also like?')</h2>
                        </div>
                        <div class="relate-products-slider">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($posts as $items)
                                    @php
                                        $title_child = $items->json_params->name->{$locale} ?? $items->name;
                                        $brief_child = $items->json_params->brief->{$locale} ?? $items->brief;
                                        $content_child = $items->json_params->content->{$locale} ?? $items->content;
                                        $image_child = $items->image != '' ? $items->image : 'data/images/no_image.jpg';
                                        $price = $items->price != '' ? $items->price : 0;
                                        $price_old = $items->price_old != '' ? $items->price_old : 0;
                                        $percent = null;
                                        if ($price_old != 0 && $price != 0) {
                                            $percent = (($price_old - $price) / $price) * 100;
                                        }
                                        $time = date('d.M.Y', strtotime($items->updated_at));
                                        $alias = route('frontend.page', ['taxonomy' => $items->alias ?? '']);
                                        $wishlist = isset($items->wishlist) && $items->wishlist > 0 ? 1 : 0;
                                        $txt_tag = '';
                                        if (isset($items->json_params->paramater)) {
                                            foreach ($items->json_params->paramater as $keys => $value) {
                                                if (isset($value->childs) && $value->name == 'type') {
                                                    $val_tag = $value->childs[0];
                                                    $tag = $parameter->first(function ($item, $key) use ($keys, $val_tag) {
                                                        return $item->parent_id == $keys && $item->id == $val_tag;
                                                    });
                                                    $txt_tag = $tag->name ?? '';
                                                }
                                            }
                                        }
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="products-item">
                                                <div class="products-item-image">
                                                    <img src="{{ $image_child }}" alt="{{ $title_child }}" />
                                                    <div class="products-content-info">
                                                        <button class="wishlist-button" type="button">
                                                            @if ($wishlist > 0)
                                                                <img src="{{ asset('themes/frontend/assets/images/icon/heart-red-solid.svg') }}"
                                                                    alt="Wishlist" class="unwishlist add_wishlist" data-id={{ $items->id }} />
                                                                <img src="{{ asset('themes/frontend/assets/images/icon/heart-red-solid.svg') }}"
                                                                    alt="Wishlist" class="wishlist add_wishlist" data-id={{ $items->id }} />
                                                            @else
                                                                <img src="{{ asset('themes/frontend/assets/images/icon/heart-dark-outline.svg') }}"
                                                                    alt="Unwishlist" class="unwishlist add_wishlist"
                                                                    data-id={{ $items->id }} />
                                                                <img src="{{ asset('themes/frontend/assets/images/icon/heart-red-solid.svg') }}"
                                                                    alt="Wishlist" class="wishlist add_wishlist" data-id={{ $items->id }} />
                                                            @endif
                                                        </button>
                                                        <span class="sale">-{{ number_format($percent) }}%</span>
                                                    </div>
                                                    <button type="button" data-id="{{ $items->id }}"
                                                        class="quickview-button ">
                                                        @lang('Quickview')
                                                    </button>
                                                </div>
                                                <div class="products-item-content">
                                                    <span class="badge"> {{ $txt_tag }} </span>
                                                    <a href="{{ $alias }}" title="{{ $title_child }}"
                                                        class="title">{{ $title_child }}</a>
                                                    <div class="price">
                                                        <span
                                                            class="current">{{ $lang_default == $locale ? $setting->currency_unit : $setting->{$locale . '-currency_unit'} }}
                                                            {{ number_format($price, 2) }}</span>
                                                        <span
                                                            class="old">{{ $lang_default == $locale ? $setting->currency_unit : $setting->{$locale . '-currency_unit'} }}
                                                            {{ number_format($price_old, 2) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endisset


        </main>

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