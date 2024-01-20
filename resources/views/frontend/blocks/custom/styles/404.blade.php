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

    <section class="page-404">
        <div class="container">
          <div class="page-404-wrap">
            <div class="page-404-animal">
              <img src="{{ $image }}" alt="OOPS!!!!!" title="OOPS!!!!!">
            </div>
            <div class="page-404-content">
              <h1>{{ $brief }}</h1>
              <p class="sub-content">{{ $title }}</p>
              <p>{{ $content }}</p>
              <a href="{{ $url_link }}" class="button-main" title="Back to Homepage">{{ $url_link_title }}</a>
          </div>
          </div>
        </div>
      </section>


@endif
