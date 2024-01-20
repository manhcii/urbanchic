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
        $style = $block->json_params->style ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    @endphp
    <style>
        
        }
    </style>
    <section class="commitment">
        <div class="container">
            <div class="commitment-wrap">
                <div class="commitment-content">
                    <span class="sub-title">{{ $brief }}</span>
                    <h3>{{ $title }} </h3>
                    <p>
                        {{$content}}
                    </p>
                </div>

                <div class="commitment-images">
                    @if (count($gallery_image) >0)
                          @foreach ($gallery_image as $val)  
                            <img src="{{ $val }}" alt="Commitment" class="{{ ($loop->index >0) ?'commitment-images-sub':"" }} " title="Commitment">
                          @endforeach
                      @endif    
                    
                </div>

                <div class="icon-leaf">
                    <img src="{{ asset('themes/frontend/assets/image/icons/page-services-commitment-leaf-1.png') }}" alt="Commitment" title="Commitment">
                </div>

                <div class="icon-leaf">
                    <img src="{{ asset('themes/frontend/assets/image/icons/page-services-commitment-leaf-2.png') }}" alt="Commitment" title="Commitment">
                </div>

                <div class="icon-leaf">
                    <img src="{{ asset('themes/frontend/assets/image/icons/page-services-commitment-leaf-3.png') }}" alt="Commitment" title="Commitment">
                </div>
            </div>
        </div>
    </section>
@endif
