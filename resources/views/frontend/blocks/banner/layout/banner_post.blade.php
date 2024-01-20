@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = $block->json_params->style ?? '';
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });

    @endphp

    <style>
     
    </style>
    <div class="page-banner">
      <picture>
        <source media="(max-width:767px)" srcset="{{ $image }}" />
        <img src="{{ $image }}" alt="About us" title="About us" />
      </picture>

      <div class="page-banner-content module-content">
        <div class="container">
          <span class="sub-title">{{ $brief }}</span>
          <h3>{{ $title }}</h3>
          <a href="{{ $url_link }}" class="button-main" title="{{ $url_link_title }}">{{ $url_link_title }}</a>
        </div>
      </div>
    </div>
@endif
