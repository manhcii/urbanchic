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
    <section class="watch-video">
        <div class="container">
            <div class="module-content text-center">
                <h3>Producing healthy products means choosing <span>healthy methods</span></h3>
            </div>
    
            <div class="video-wrap">
                <picture>
                    <source media="(max-width:991px)" srcset="{{ $image }}">
                    <img class="video-image-back" src="{{ $image }}" alt="Watch video" title="Watch video" />
                </picture>

                <button class="button-play-video" 
                data-video="{{ $url_link }}" 
                data-bs-target="#popupWatchVideo" data-bs-toggle="modal">
                    <div class="button-play-video-icon">
                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.858058 0.394211C1.0788 0.259237 1.34772 0.270026 1.55927 0.422342L11.1843 7.35234C11.381 7.49402 11.5 7.73805 11.5 8.00005C11.5 8.26205 11.381 8.50608 11.1843 8.64776L1.55927 15.5778C1.34772 15.7301 1.0788 15.7409 0.858058 15.6059C0.63732 15.4709 0.5 15.2117 0.5 14.93V1.07005C0.5 0.788378 0.63732 0.529185 0.858058 0.394211Z" fill="#121212"/>
                        </svg>
                    </div>
               {{ $url_link_title }}
                </button>
            </div>
        </div>
    </section>
    <div class="modal fade popup-watch-video" id="popupWatchVideo" aria-labelledby="popupWatchVideoLabel" tabindex="-1"
    aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="button-close">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="popup-video-iframe">
              <iframe width="100%" height="" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
@endif
