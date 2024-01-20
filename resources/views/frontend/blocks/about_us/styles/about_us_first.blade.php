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
    <section class="about-us-first">
        <div class="container">
            <div class="module-content text-center">
                <span class="sub-title">{{ $brief }}</span>
                <h3>{{ $title }}</h3>
            </div>
            <div class="about-us-main">
                <div class="about-us-images">
                    <img src="{{ $image }}" alt="About us"  title="About us" class="about-us-image-main">

                    <div class="about-us-image-sub">
                        <img src="{{ asset('themes/frontend/assets/image/page-about-apple.png') }}" alt="About us" title="About us">
                    </div>
    
                    <div class="about-us-image-sub">
                        <img src="{{ asset('themes/frontend/assets/image/page-about-strawberry.png') }}" alt="About us" title="About us">
                    </div>
                    
                    <div class="about-us-image-sub">
                        <img src="{{ asset('themes/frontend/assets/image/page-about-strawberry-2.png') }}" alt="About us" title="About us">
                    </div>
                    

                    <div class="about-us-image-sub">
                        <img src="{{ asset('themes/frontend/assets/image/page-about-blueberry.png') }}" alt="About us" title="About us">
                    </div>         
                </div>

                <div class="icon-leaf">
                    <img src="{{ asset('themes/frontend/assets/image/icons/page-about-leaf-1.png') }}" alt="Leaf" title="Leaf">
                </div>

                <div class="icon-leaf">
                    <img src="{{ asset('themes/frontend/assets/image/icons/page-about-leaf-2.png') }}" alt="Leaf" title="Leaf">
                </div>

                <div class="icon-leaf">
                    <img src="{{ asset('themes/frontend/assets/image/icons/page-about-leaf-4.png') }}" alt="Leaf" title="Leaf">
                </div>

                <div class="icon-leaf">
                    <img src="{{ asset('themes/frontend/assets/image/icons/page-about-leaf-5.png') }}" alt="Leaf" title="Leaf">
                </div>
            </div>

            <p>
                {{ $content }}
            </p>
        </div>
    </section>
@endif
