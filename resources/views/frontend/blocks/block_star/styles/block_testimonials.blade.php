@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $gallery_image = $block->json_params->gallery_image ?? null;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    @endphp

    <section class="how-work">
      <div class="container">
        <h3>{{ $title }}</h3>

        <div class="how-work-list">
        @if ($block_childs)
            @foreach ($block_childs as $item)
                @php
                    $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                    $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image_childs = $item->image != '' ? $item->image : null;
                @endphp  
                <div class="how-work-item">
                    <img src="{{ $image_childs }}" alt="CHOOSE WHAT YOU WANT" title="CHOOSE WHAT YOU WANT">

                    <h5>{{ $title_childs }}</h5>
                    <p>
                      {{ $brief_childs }}
                    </p>
                </div>
            @endforeach
        @endif    
        </div>
        <div class="view-more">
          <a href="{{ $url_link }}" class="button-main" title="Let’s Go">
            {{ $url_link_title }}
            <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.91699 15.5834L16.0837 6.41669M16.0837 6.41669H6.91699M16.0837 6.41669V15.5834" stroke="white" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>

          <p class="how-work-skip">{{ $brief }}</p>
        </div>
      </div>
    </section>
@endif
