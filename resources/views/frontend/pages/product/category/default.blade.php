{{-- Check và gọi template tương ứng --}}
@extends('frontend.layouts.default')

@section('content')
    @php
        $seo_title = $seo_title ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($page->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($page->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($page->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $background_breadcrumbs = json_decode($setting->image)->background_breadcrumbs ?? '';

        $category_title = $page->json_params->name->{$locale} ?? $page->name;
        $category_brief = $page->json_params->brief->{$locale} ?? $page->brief;
        $category_description = $page->json_params->description->{$locale} ?? $page->description;
        $category_content = $page->json_params->content->{$locale} ?? $page->content;
        $category_image = $page->json_params->image != '' ? $page->json_params->image : $setting->background_breadcrumbs;
        $category_backgroud = $page->json_params->image_thumb != '' ? $page->json_params->image_thumb : ($setting->background_breadcrumbs??'');

    @endphp




    <section id="fhm-lp2-breadcrumb" class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-list">
                <a href="{{ route('home.default') }}" title="@lang('Home')" class="breadcrumb-link">@lang('Home')</a>
                <div class="breadcrumb-arrow">
                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.64526 4.49898C3.58546 4.44862 3.54769 4.4203 3.51307 4.38568C2.39577 3.26838 1.27532 2.15108 0.161169 1.03063C0.0919282 0.961387 0.0352768 0.866968 0.0100982 0.772548C-0.0308171 0.627771 0.0573075 0.470405 0.189495 0.394869C0.321683 0.319333 0.488491 0.328774 0.611237 0.426342C0.649004 0.454668 0.680478 0.489288 0.715099 0.52391C1.92997 1.73878 3.14483 2.95364 4.36285 4.16851C4.5989 4.40456 4.5989 4.5934 4.366 4.8263C3.13854 6.05376 1.91108 7.27807 0.686773 8.50553C0.570322 8.62198 0.441282 8.68807 0.274473 8.63771C0.0195399 8.56218 -0.0780273 8.26004 0.0824863 8.04916C0.110812 8.0114 0.145433 7.97992 0.180054 7.9453C1.29421 6.83115 2.41151 5.71385 3.52566 4.5997C3.55399 4.56822 3.59175 4.54304 3.64526 4.49898Z"
                            fill="#616161" />
                    </svg>
                </div>
                <span class="breadcrumb-link breadcrumb-link-current">{{ $category_title }}</span>
            </div>
        </div>
    </section>

    @if ($category_backgroud != '')
        <style>
            #fhm-lp2-banner .banner-wrapper {
                background: url({{ $category_backgroud }}) no-repeat center;
                background-size: cover;
                border-radius: 5px;
                height: 250px;
                position: relative;
                padding-right: 20px;
            }
        </style>
        <section id="fhm-lp2-banner">
            <div class="container">
                <div class="banner-wrapper">
                    <div class="heading-block">
                        <h1 class="title">{{ $category_title }}</h1>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <section id="fhm-list-product-products" class="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="products-filter-list">
                        <div class="products-filter-toggle-button-close">&#10005;</div>
                        <div class="products-filter-item">
                            <div class="products-filter-item-heading d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" data-bs-target="#filter-type">
                                <h2 class="heading">
                                    @lang('Type') <span class="quantity">({{ count($taxonomys) }})</span>
                                </h2>
                                <div class="icon">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <div id="filter-type" class="collapse show">
                                <ul class="products-filter-item-criteria" data-type="checkbox">
                                    @foreach ($taxonomys as $val)
                                        <li>
                                            <a href="{{ route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $val->alias ?? '']) }}"
                                                class="text {{Request::segment(2)==$val->alias ?'active':''}}">
                                                <p>
                                                    {{ $val->json_params->name->{$locale} ?? $val->name }}
                                                    <span class="quantity">({{number_format($val->count_post)}})</span>
                                                </p>
                                            </a>

                                        </li>
                                    @endforeach

                                </ul>
                                {{-- <div class="clear-button">
                                    <div class="icon">
                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.99219 4.16426C2.03925 4.01863 2.10983 3.89072 2.25689 3.82184C2.4314 3.73918 2.59611 3.75689 2.75101 3.87104C2.78631 3.89662 2.81768 3.93007 2.84905 3.96156C3.8765 4.99277 4.90395 6.02398 5.93336 7.05519C5.95493 7.07683 5.97846 7.09848 6.01572 7.13587C6.03729 7.10635 6.05101 7.07683 6.07258 7.05519C7.10395 6.01611 8.13729 4.97899 9.17062 3.94385C9.35297 3.76083 9.56474 3.72344 9.7667 3.83364C10.0157 3.9714 10.0843 4.30595 9.90983 4.5303C9.88238 4.56572 9.85101 4.59721 9.81964 4.6287C8.79219 5.65991 7.76474 6.69112 6.73729 7.72232C6.71572 7.74397 6.69023 7.76168 6.64317 7.79907C6.68434 7.82663 6.71376 7.8404 6.73532 7.86402C7.76866 8.90113 8.80199 9.93627 9.83533 10.9734C10.0216 11.1603 10.0589 11.3827 9.93925 11.5854C9.8667 11.7094 9.74905 11.7724 9.61768 11.8157C9.56474 11.8157 9.51376 11.8157 9.46081 11.8157C9.3118 11.7802 9.20591 11.6819 9.10199 11.5756C8.09219 10.5601 7.08042 9.54662 6.07062 8.53115C6.04905 8.50951 6.03532 8.47999 6.00591 8.43866C5.96866 8.48392 5.95101 8.50951 5.92944 8.53115C4.91964 9.54662 3.90787 10.5601 2.89807 11.5756C2.79415 11.6799 2.68827 11.7783 2.53925 11.8157C2.48631 11.8157 2.43532 11.8157 2.38238 11.8157C2.34121 11.7999 2.30003 11.7862 2.26082 11.7665C2.1118 11.6976 2.03729 11.5716 1.99219 11.4221C1.99219 11.3689 1.99219 11.3178 1.99219 11.2646C2.02944 11.1151 2.12552 11.0088 2.2314 10.9045C3.24317 9.89101 4.25297 8.87555 5.26474 7.86205C5.28631 7.8404 5.31572 7.82663 5.35689 7.79711C5.3118 7.75972 5.28631 7.742 5.26474 7.72036C4.25297 6.70686 3.24317 5.69139 2.2314 4.6779C2.12748 4.5736 2.02944 4.46733 1.99219 4.31776C1.99219 4.26856 1.99219 4.21543 1.99219 4.16426Z"
                                                fill="black" />
                                        </svg>
                                    </div>
                                    <p class="text">Clear All</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="products-list">
                        <div class="products-filter-toggle-button main-btn">Filter</div>
                        <div class="products-list-sort d-flex justify-content-between align-items-center">
                            <p class="products-list-sort-result">
                                <strong>1 - {{ App\Consts::PAGINATE[$page->taxonomy] }}</strong> @lang('of')
                                <strong>{{ $rows->total() }}</strong> @lang('Results')
                            </p>
                        </div>
                        <div class="products-container">
                            @if (count($rows) > 0)
                                @foreach ($rows as $items)
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
                                        $wishlist = isset($items->wishlist) && $items->wishlist > 0 ? 1 : 0;
                                    @endphp
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
                                @endforeach
                            @endif
                        </div>

                        <div class="products-list-pagination d-flex justify-content-between align-items-center">
                            <p class="products-list-pagination-result">
                                @lang('Total') <strong>{{ $rows->perPage() }}</strong> @lang('of')
                                <strong>{{ number_format($rows->total()) }}</strong> @lang('Resutls')
                            </p>
                            {{ $rows->withQueryString()->links('frontend.pagination.default') }}
                        </div>

                        <div class="products-list-guide">
                            <h2 class="heading">{{ $category_description }}</h2>
                            <div class="products-list-guide-content show_content">
                                {!! nl2br($category_content) !!}
                                <div class="products-list-guide-more"></div>
                            </div>

                            <div class="products-list-guide-btn load_more">
                                <span>@lang('Show More')</span>
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.00097 4.65477C5.06156 4.58281 5.09565 4.53736 5.13731 4.4957C6.48184 3.15118 7.82636 1.80287 9.17468 0.462127C9.258 0.378804 9.37162 0.310632 9.48524 0.280333C9.65946 0.231097 9.84883 0.337143 9.93973 0.496214C10.0306 0.655284 10.0193 0.856016 9.90186 1.00372C9.86777 1.04917 9.82611 1.08705 9.78445 1.12871C8.32251 2.59064 6.86058 4.05258 5.39864 5.5183C5.11459 5.80235 4.88735 5.80235 4.60708 5.52209C3.12999 4.045 1.6567 2.56792 0.179613 1.09462C0.0394789 0.954489 -0.0400562 0.799206 0.0205421 0.598474C0.11144 0.291695 0.475029 0.174285 0.728785 0.367442C0.774234 0.401529 0.812108 0.44319 0.853769 0.484852C2.19451 1.82559 3.53903 3.17011 4.87977 4.51085C4.91764 4.54494 4.94794 4.59039 5.00097 4.65477Z"
                                        fill="#616161" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
