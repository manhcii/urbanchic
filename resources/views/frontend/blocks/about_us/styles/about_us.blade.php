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
    <div class="page-about">
    <section class="about-us">
        <div class="about-us-wrap">
          <div class="about-us-content">
            <span class="sub-title">{{ $brief }}</span>
            <h3>{{ $title }}</h3>
            <p>
              {{ $content }}
            </p>
  
            <div class="about-us-label">
              @if($block_childs)
                @foreach ($block_childs as $item)
                  @php
                      $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                      $image_childs = $item->image != '' ? $item->image : null;
                  @endphp
                  <div class="about-us-label-item">
                      <img src="{{ $image_childs }}" alt="{{ $title_childs }}" title="{{ $title_childs }}">

                      <p>{{ $title_childs }}</p>
                  </div>
                @endforeach        
              @endif  
            </div>
          </div>
  
          <div class="about-us-banner">
            <img src="{{ asset('themes/frontend/assets/image/page-about-us-banner-2.png') }}" alt="About us" title="About us" class="about-us-banner-main">
  
            <div class="about-us-face">
              <img src="{{ asset('themes/frontend/assets/image/about-us-face.png') }}" alt="About us" title="About us" class="about-us-face-main">
              <div class="about-us-eye-left"></div>
              <div class="about-us-eye-right"></div>
            </div>
          </div>
  
          <div class="icon-leaf">
            <img src="{{ asset('themes/frontend/assets/image/icons/about-us-leaf.png') }}" alt="About us" title="About us">
          </div>

          <div class="icon-leaf">
            <img src="{{ asset('themes/frontend/assets/image/icons/page-about-about-us-leaf-2.png') }}" alt="About us" title="About us">
          </div>
        </div>
    </section>
    </div>
@endif
