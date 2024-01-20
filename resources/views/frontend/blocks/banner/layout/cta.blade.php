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
            return $item->parent_id == $block->id && $item->json_params->style=="info";
        });
        $block_childs_image = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style=="image";
        });
    @endphp


    <style>
        
    </style>
    <section class="warranty">
      <div class="warranty-savory">{{ $title }}</div>
      <div class="warranty-spree">{{ $brief }}</div>
      <div class="container">
        <div class="warranty-image-main">
          <img src="{{ $image }}" alt="{{ $title }}" title="{{ $title }}">
        </div>

        @if($block_childs)
          @foreach($block_childs as $item)
            @php
                $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                $block_childs_item1 = $blocks->filter(function ($item2, $key) use ($item) {
                    return $item2->parent_id == $item->id ;
                });
            @endphp
            <div class="power-warranty">
              <div class="module-content text-center">
                <span class="sub-title">{{ $brief_childs }} </span>
                <h3>{{ $title_childs }}</h3>
              </div>

              <div class="warranty-top d-flex">
                @foreach($block_childs_item1 as $item_child1)
                @php
                  $title_childs_item1 = $item_child1->json_params->title->{$locale} ?? $item_child1->title;
                @endphp
                <p class="warranty-top-item">
                  {{ $title_childs_item1 }}
                </p>
                @endforeach
              </div>
      
              <div class="warranty-list d-grid">
                @if($block_childs_image)
                  @foreach($block_childs_image as $item)
                    @php
                        $block_childs_item2 = $blocks->filter(function ($item3, $key) use ($item) {
                            return $item3->parent_id == $item->id ;
                        });
                    @endphp
                    @if($block_childs_item2)
                      @foreach($block_childs_item2 as $item)
                      @php
                          $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                          $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                          $image_childs = $item->image != '' ? $item->image : null;
                          
                      @endphp
                      <div class="warranty-item">
                        <img src="{{ $image_childs }}" alt="{{ $title_childs }}" title="{{ $title_childs }}">  
                        <div class="warranty-item-info">
                          <h5>{{ $title_childs }}</h5>
                          <p>{{ $brief_childs }}</p>
                        </div>
                      </div>
                      @endforeach
                    @endif
                  @endforeach
                @endif
              </div>
            </div>
          @endforeach
        @endif
      </div>

      <div class="warranty-leaf">
        <img src="{{ asset('themes/frontend/assets/image/icons/warranty-leaf-1.png') }}" alt="{{ $title }}" title="{{ $title }}">
      </div>

      <div class="warranty-leaf">
        <img src="{{ asset('themes/frontend/assets/image/icons/warranty-leaf-2.png') }}" alt="{{ $title }}" title="{{ $title }}">
      </div>

      <div class="warranty-leaf">
        <img src="{{ asset('themes/frontend/assets/image/icons/warranty-leaf-3.png') }}" alt="{{ $title }}" title="{{ $title }}">
      </div>

      <div class="warranty-leaf">
        <img src="{{ asset('themes/frontend/assets/image/icons/warranty-leaf-4.png') }}" alt="{{ $title }}" title="{{ $title }}">
      </div>

      <div class="warranty-leaf">
        <img src="{{ asset('themes/frontend/assets/image/icons/warranty-leaf-5.png') }}" alt="{{ $title }}" title="{{ $title }}">
      </div>

      <div class="warranty-leaf">
        <img src="{{ asset('themes/frontend/assets/image/icons/warranty-leaf-6.png') }}" alt="{{ $title }}" title="{{ $title }}">
      </div>
    </section>
@endif
