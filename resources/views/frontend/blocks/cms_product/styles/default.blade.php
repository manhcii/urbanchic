@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : url('demos/barber/images/icons/comb3.svg');
        $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        $params['status'] = App\Consts::STATUS['active'];
        $params['is_type'] = App\Consts::TAXONOMY['product'];
        // list product
        $rows = App\Models\CmsProduct::getsqlCmsProduct($params, $locale)
            ->limit(12)
            ->get();
        $paramater = App\Models\Parameter::get();
    @endphp

    
    <section class="list-food">
      <div class="container">
        <div class="module-content text-center">
          <span class="sub-title">{{ $brief }}</span>
          <h3>{{ $title }}</h3>
          <p>
            {{ $content }}
          </p>
        </div>

        <div class="list-food-wrap">
          <div class="swiper">
            <div class="swiper-wrapper">
              @foreach ($rows as $items)
                @php
                    $title_child = $items->json_params->name->{$locale} ?? $items->name;
                    $brief_child = $items->json_params->brief->{$locale} ?? $items->brief;
                    $content_child = $items->json_params->content->{$locale} ?? $items->content;
                    $image_child = $items->image_thumb != '' ? $items->image_thumb : ($items->image != '' ? $items->image : 'data/images/no_image.jpg');
                    
                    $alias = route('frontend.page', ['taxonomy' => $items->alias ?? '']);
                    
                @endphp  
                  <div class="swiper-slide">
                    <div class="list-food-item">
                      <div class="list-food-item-image">
                        <img src="{{ $image_child }}" alt="{{ $title_child }}" title="{{ $title_child }}">
                        <a href="{{ $alias }}" class="button-main" title="Get Started">Get Started</a>
                      </div>
                      <a href="{{ $alias }}" title="{{ $title_child }}"> {{ $title_child }}</a>
                      <p>
                        {{ $brief_child }}
                      </p>
                    </div>
                  </div>
                @endforeach  
            </div>
        
          </div>

          <div class="swiper-button-prev swiper-circle"></div>
          <div class="swiper-button-next swiper-circle"></div>
        </div>
      </div>
    </section>
@endif
