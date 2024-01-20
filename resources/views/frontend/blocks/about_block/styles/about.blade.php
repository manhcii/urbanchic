@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $icon = $block->icon ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    @endphp

    <section class="about-us">
      <div class="about-us-wrap">
        <div class="about-us-content">
          <span class="sub-title">{{ $brief }}</span>
          <h3>{{ $title }} </h3>
          <p>
            {{ $content }} 
          </p>

          <a href="{{ $url_link }}" class="button-main" title="{{ $url_link_title }}">
            {{ $url_link_title }}
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.41699 15.5834L15.5837 6.41669M15.5837 6.41669H6.41699M15.5837 6.41669V15.5834" stroke="white" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        </div>

        <div class="about-us-banner">
          <img src="{{ asset('themes/frontend/assets/image/about-us-banner.png') }}" alt="About us" title="About us" class="about-us-banner-main">

          <div class="about-us-face">
            <img src="{{ asset('themes/frontend/assets/image/about-us-face.png') }}" alt="About us" title="About us" class="about-us-face-main">
            <div class="about-us-eye-left"></div>
            <div class="about-us-eye-right"></div>
          </div>
        </div>

        <div class="icon-leaf">
          <img src="{{ asset('themes/frontend/assets/image/icons/about-us-leaf.png') }}" alt="About us" title="About us">
        </div>
      </div>
    </section>
@endif
