@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link ?? null;
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });
    @endphp
    <style>
        #fhm-home-banner {
            margin-top: -82px;
            background: url({{$image_background}}) center no-repeat;
            background-size: cover;
        }
    </style>
    <section id="fhm-home-banner">
        <div class="home-banner-slider">
            <div class="container">
                <div class="top-wrapper">
                    <div class="swiper slide-1 swiper-no-swiping">
                        <div class="swiper-wrapper">
                            @if ($block_childs)
                                @foreach ($block_childs as $item)
                                    @php
                                        $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                        $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                        $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                        $url_link_childs = $item->url_link ?? '';
                                        $url_link_title_childs = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                        $image_childs = $item->image != '' ? $item->image : null;
                                        $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                                        $galary_img_child = $item->json_params->gallery_image ?? [];

                                    @endphp

                                    <div class="swiper-slide">
                                        <div class="home-banner-content">
                                            <span class="badge"> {{ $brief_childs }} </span>
                                            <h1 class="title">
                                                {{ $title_childs }}
                                            </h1>
                                            <a href="{{ $url_link_childs }}" title="{{ $url_link_title_childs }}"
                                                class="button-solid">
                                                {{ $url_link_title_childs }}
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="home-banner-image">
                        <div class="swiper slide-2 swiper-no-swiping">
                            <div class="swiper-wrapper">
                                @if ($block_childs)
                                    @foreach ($block_childs as $item)
                                        @php
                                            $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                            $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                            $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                            $url_link_childs = $item->url_link ?? '';
                                            $url_link_title_childs = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                            $image_childs = $item->image != '' ? $item->image : null;
                                            $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                                            $galary_img_child = $item->json_params->gallery_image ?? [];
                                        @endphp
                                        @if (count($galary_img_child) >= 1)
                                            <div class="swiper-slide">
                                                <div class="image-item">
                                                    <img src="{{ $galary_img_child[0] }}" alt="Wine" />
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="swiper slide-3 swiper-no-swiping">
                            <div class="swiper-wrapper">
                                @if ($block_childs)
                                    @foreach ($block_childs as $item)
                                        @php
                                            $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                            $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                            $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                            $url_link_childs = $item->url_link ?? '';
                                            $url_link_title_childs = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                            $image_childs = $item->image != '' ? $item->image : null;
                                            $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                                            $galary_img_child = $item->json_params->gallery_image ?? [];
                                        @endphp
                                        @if (count($galary_img_child) >= 2)
                                            <div class="swiper-slide">
                                                <div class="image-item">
                                                    <img src="{{ $galary_img_child[1] }}" alt="Tet" />
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-wrapper">
                    <div class="home-banner-image">
                        <div class="swiper slide-4 swiper-no-swiping">
                            <div class="swiper-wrapper">
                                @if ($block_childs)
                                    @foreach ($block_childs as $item)
                                        @php
                                            $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                            $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                            $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                            $url_link_childs = $item->url_link ?? '';
                                            $url_link_title_childs = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                            $image_childs = $item->image != '' ? $item->image : null;
                                            $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                                            $galary_img_child = $item->json_params->gallery_image ?? [];
                                        @endphp
                                        @if (count($galary_img_child) >= 3)
                                            <div class="swiper-slide">
                                                <div class="image-item">
                                                    <img src="{{ $galary_img_child[2] }}" alt="Gift" />
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-image">
            <img src="{{ $image }}" alt="Gifts" />
        </div>
    </section>
@endif
