@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link ?? null;
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $galary_img = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    @endphp
    <section id="fhm-home-instagram">
        <div class="container">
            <div class="heading-block">
                <span class="badge">{{$brief }}</span>
                <h2 class="title">{{$title }}</h2>
            </div>
        </div>
        <ul class="instagram-list">
            @if (count($galary_img) >0)
                @foreach ($galary_img as $val)
                    <li class="instagram-item">
                        <div  class="instagram-item-post">
                            <img src="{{$val}}" alt="Instagram" />
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </section>



@endif
