@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link ?? '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    @endphp


    <section class="infomation">
    <div class="infomation-item infomation-item-reverse">
      <div class="infomation-image">
          <img src="{{ $image }}" alt="What is the shelf life of the juices?" title="What is the shelf life of the juices?">
        </div>
        <div class="infomation-content">
          <h3>{{ $title }}</h3>
          <p>
            {{ $brief }}
          </p>
          <a href="{{ $url_link }}" class="button-main" title="{{ $url_link_title }}">
            {{ $url_link_title }}
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.41699 15.5833L15.5837 6.41663M15.5837 6.41663H6.41699M15.5837 6.41663V15.5833" stroke="white" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        </div>
        
        <div class="icon-leaf">
          <img src="{{ asset('themes/frontend/assets/image/icons/infomation-leaf-2.png') }}" alt="What is the shelf life of the juices?" title="What is the shelf life of the juices?">
        </div>
    </div>
    </section>
@endif
