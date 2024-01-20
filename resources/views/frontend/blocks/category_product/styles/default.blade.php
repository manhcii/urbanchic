@if ($block)
    @php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $icon = $block->icon != '' ? $block->icon : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $map = $block->json_params->map ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
        $params['taxonomy'] = App\Consts::TAXONOMY['product'];
        $params['status'] = App\Consts::STATUS['active'];
        // list Category
        $rows = App\Models\ProductCategory::getSqlTaxonomy($params)
            ->limit(4)
            ->get();
    @endphp
    <section class="best-seller">
      <div class="container">
        <div class="module-content text-center">
          <span class="sub-title">{{ $brief }}</span>
          <h3>{{ $title }}</h3>
          <p>
            {{ $content }}
          </p>
        </div>
        
        <ul class="best-seller-tabs" role="tablist">
            @foreach($rows as $items)
              <li class="best-seller-tab" role="presentation">
                <button class="nav-link {{ $loop->index==0? 'active':"" }}" data-bs-toggle="tab" data-bs-target="#best-seller-tab-{{ $items->id }}" type="button" role="tab" aria-controls="best-seller-tab-{{ $items->id }}" aria-selected="true">{{ $items->json_params->name->{$locale} ?? $items->name }}</button>
              </li>
            @endforeach
        </ul>
    
        <div class="tab-content best-seller-tabs-content">
        @foreach($rows as $items)
        @php
        $params['status'] = App\Consts::STATUS['active'];
        $params['is_type'] = App\Consts::TAXONOMY['product'];
        $params['taxonomy_id'] = $items->id;
        // list product
        $products = App\Models\CmsProduct::getsqlCmsProduct($params, $locale)
            ->limit(6)
            ->get();
        @endphp
          <div class="tab-pane fade show {{ $loop->index==0? 'active':"" }}" id="best-seller-tab-{{ $items->id }}" role="tabpanel" aria-labelledby="best-seller-tab-{{ $items->id }}" tabindex="0">
            <div class="swiper">
              <div class="swiper-wrapper">
                @foreach($products as $product)
                @php
                $title_child = $product->json_params->name->{$locale} ?? $product->name;
                $brief_child = $product->json_params->brief->{$locale} ?? $product->brief;
                $content_child = $product->json_params->content->{$locale} ?? $product->content;
                $image_child = $product->image_thumb != '' ? $product->image_thumb : ($product->image != '' ? $product->image : 'data/images/no_image.jpg');
                $price = $product->price != '' ? $product->price : 0;
                $price_old = $product->price_old != '' ? $product->price_old : 0;
                $alias = route('frontend.page', ['taxonomy' => $product->alias ?? '']);
                @endphp
                <div class="swiper-slide">
                  <div class="product-item">
                    <div class="product-item-image">
                      <img src="{{ $image_child }}" alt="{{ $items->json_params->name->{$locale} ?? $items->name }} " title="{{ $items->json_params->name->{$locale} ?? $items->name }} ">
                    </div>
                    <div class="product-item-info">
                      <a href="{{ route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $items->alias ?? '']) }}" class="product-category" title="{{ $items->json_params->name->{$locale} ?? $items->name }} ">
                        {{ $items->json_params->name->{$locale} ?? $items->name }} 
                      </a>
        
                      <a class="product-name" href="{{ $alias }}" title="{{ $title_child }}">
                        {{ $title_child }}
                      </a>

                      <div class="star-rating" data-rating="4">
                        <div class="star-rating-item">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
              
                        <div class="star-rating-item">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                        
                        <div class="star-rating-item">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>

                        <div class="star-rating-item">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>

                        <div class="star-rating-item">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                      </div>

                      <div class="product-price">
                        <p class="product-price-current">$89.96</p>
                        <p class="product-price-old">$102.96</p>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
          
            </div>
            <div class="swiper-button-prev swiper-circle"></div>
            <div class="swiper-button-next swiper-circle"></div>
          </div>
        @endforeach
        </div>
      </div>
    </section>
  
@endif
