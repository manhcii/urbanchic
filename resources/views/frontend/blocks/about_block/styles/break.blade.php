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
        $galary_img = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    @endphp
    <style>
        
    </style>
    <section class="partner">
      <div class="container">
        <div class="partner-list">
          @if (count($galary_img) >0)
              @foreach ($galary_img as $val)  
                  <div class="partner-item">
                    <img src="{{$val}}" alt="Savory Spree" title="Savory Spree">
                  </div>
                  <div class="partner-line"></div>
              @endforeach
          @endif    
          

        </div>
      </div>
    </section>
@endif
