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

    <section class="teams">
        <div class="container">
            <div class="module-content text-center">
                <span class="sub-title">{{ $brief }}</span>
                <h3>{{ $title }}</h3>
            </div>

            <div class="teams-wrap">
                <div class="swiper teams-info">
                    <div class="swiper-wrapper">
                      @if($block_childs)
                        @foreach ($block_childs as $item)
                          @php
                              $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                              $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                              $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                              $url_link_childs = $item->url_link ?? '';
                              $url_link_title_childs = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                              $image_childs = $item->image != '' ? $item->image : null;
                              $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                          @endphp
                          <div class="swiper-slide">
                            <p class="teams-name">{{ $title_childs }}</p>
                            <p class="teams-job">{{ $brief_childs }}</p>
                            <p class="teams-say">
                                {{ $content_childs }}
                            </p>
                        </div>
                        @endforeach
                      @endif 
                    </div>
                </div>

                <div class="teams-avatar">
                  @if($block_childs)
                      @foreach ($block_childs as $item)
                        @php
                            $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                            $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                            $url_link_childs = $item->url_link ?? '';
                            $url_link_title_childs = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                            $image_childs = $item->image != '' ? $item->image : null;
                            $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                        @endphp
                        <div class="team-avatar-item {{ $loop->index==0?"active":"" }}">
                          <img src="{{ $image_childs }}" alt="{{ $title_childs }}" title="{{ $title_childs }}">

                          <div class="team-social">
                              <a href="#" title="Instagram">
                                  <img src="{{ asset('themes/frontend/assets/image/icons/instagram.svg') }}" alt="Instagram" title="Instagram">
                              </a>

                              <a href="#" title="Facebook">
                                  <img src="{{ asset('themes/frontend/assets/image/icons/facebook.svg') }}" alt="Facebook" title="Facebook">
                              </a>

                              <a href="#" title="Twitter">
                                  <img src="{{ asset('themes/frontend/assets/image/icons/twitter.svg') }}" alt="Twitter" title="Twitter">
                              </a>
                          </div>
                        </div>
                      @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    
@endif
@push('script')
<script src="{{ asset('themes/frontend/assets/js/about-us.js') }}"></script>
@endpush
