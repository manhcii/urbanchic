@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        $params['status'] = App\Consts::STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::TAXONOMY['post'];
        $rows = App\Models\CmsPost::getsqlCmsPost($params)
            ->limit(4)
            ->get();

    @endphp

    <section class="news">
      <div class="container">
        <div class="module-content text-center">
          <span class="sub-title">{{ $brief }}</span>
          <h3>{{ $title }}</h3>
        </div>

        <div class="blog-list">
          <div class="swiper">
            <div class="swiper-wrapper">
              @if($rows)  
               @foreach ($rows as $item)
                @php
                    $title_child = $item->json_params->name->{$locale} ?? $item->name;
                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                    $image_child = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : 'data/images/no_image.jpg');
                    $time = date('M d, Y', strtotime($item->updated_at));
                    $alias = $item->alias ?? '';

                @endphp
                  <div class="swiper-slide">
                    <div class="blog-item">
                      <a href="{{ $alias }}" class="blog-item-image">
                        <img src="{{ $image_child }}" alt="{{ $title_child }}" title="{{ $title_child }}">
                      </a>
          
                      <div class="blog-item-info">
                        <div class="blog-item-post">
                          <span class="blog-item-topic" style="color: #0BA360">{{$item->taxonomy_name??""}}</span>
                          <span>{{ $time }}</span>
                        </div>
          
                        <a class="blog-item-name" href="{{$alias}}" title="{{ $title_child }}">{{ $title_child }}</a>

                        <div class="blog-item-line"></div>
          
                        <p class="blog-item-des">
                          {{ $brief_child }}
                        </p>
                      </div>
                    </div>
                  </div>
              @endforeach
              @endif
            </div>
          </div>

          <div class="swiper-button-prev swiper-circle"></div>
          <div class="swiper-button-next swiper-circle"></div>
        </div>
      </div>
    </section>
@endif
