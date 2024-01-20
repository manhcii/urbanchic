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


    <section class="services">
        <div class="services-wrap">
            <div class="services-human">
                <img src="{{ $image }}" alt="About us" title="About us">
            </div>

            <div class="services-list">
              @if($block_childs)
                @foreach ($block_childs as $item)
                  @php
                      $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                      $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                      $image_childs = $item->image != '' ? $item->image : null;
                  @endphp
                  <div class="services-item">
                    <img src="{{ $image_childs }}" alt="{{ $title_childs  }}" title="{{ $title_childs  }}">

                    <div class="services-item-content">
                        <h6>{{ $title_childs  }}</h6>
                        <p>{{ $brief_childs }}</p>
                    </div>
                  </div>
                @endforeach        
              @endif  
                
            </div>
        </div>
    </section>
@endif
