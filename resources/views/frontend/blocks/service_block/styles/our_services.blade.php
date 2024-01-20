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
        $i = 0;
        // dd($block_childs);
    @endphp
    <div class="page-services">
    <section class="work-together">
        <div class="container">
            <div class="module-content text-center">
                <span class="sub-title">{{ $brief }}</span>
                <h1>{{ $title }}</h1>
                <p>
                    {{ $content }} 
                </p>
            </div>

            <div class="work-together-wrap">
                <div class="work-together-images">
                    @if (count($gallery_image) >0)
                          @foreach ($gallery_image as $val)  
                            <img src="{{ $val }}" alt="Work Together" title="Work Together">
                          @endforeach
                      @endif    
              
                </div>
    
                <ul class="work-together-content">
                    
    
                    @if($block_childs)
                        @foreach ($block_childs as $item)
                          @php
                              $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                              $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                              $image_childs = $item->image != '' ? $item->image : null;
                          @endphp
                          <li class="work-together-content-item">
                                <h5>{{ $title_childs }}</h5>
                                <p>
                                    {{ $brief_childs }}
                                </p>
                            </li>
                        @endforeach        
                      @endif  
                </ul>

                <div class="icon-leaf">
                    <img src="{{ asset('themes/frontend/assets/image/icons/page-about-leaf-5.png') }}" alt="Work Together" title="Work Together">
                </div>
        
                <div class="icon-leaf">
                    <img src="{{ asset('themes/frontend/assets/image/icons/page-services-leaf-2.png') }}" alt="Work Together" title="Work Together">
                </div>
            </div>
        </div>

        <div class="work-together-icon">
            <img src="{{ asset('themes/frontend/assets/image/icons/page-services-together-icon-1.png') }}" alt="Work Together" title="Work Together">
        </div>

        <div class="work-together-icon">
            <img src="{{ asset('themes/frontend/assets/image/icons/page-services-together-icon-3.png') }}" alt="Work Together" title="Work Together">
        </div>

        <div class="work-together-icon">
            <img src="{{ asset('themes/frontend/assets/image/icons/page-services-together-icon-2.png') }}" alt="Work Together" title="Work Together">
        </div>
    </section>
    </div>
@endif
