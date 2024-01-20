@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = $block->json_params->style ?? '';
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });

    @endphp

    <style>
     
    </style>
    <section class="slide-product">
      <div class="container">
        <div class="module-content text-center">
          <span class="sub-title">{{ $brief }}</span>
          <h1>{!! $title !!}</h1>
          <p>
            {{ $content }}  
          </p>

          <a href="{{ $url_link }}" class="button-main" title="{{ $url_link_title }}">
            {{ $url_link_title }}
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.41699 15.5832L15.5837 6.4165M15.5837 6.4165H6.41699M15.5837 6.4165V15.5832" stroke="white" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>

          <div class="icon-leaf">
            <img src="{{ asset('themes/frontend/assets/image/icons/slide-product-leaf-1.svg') }}" alt="savory Spree" title="savory Spree">
          </div>

          <div class="icon-leaf">
            <img src="{{ asset('themes/frontend/assets/image/icons/slide-product-leaf-2.svg') }}" alt="savory Spree" title="savory Spree">
          </div>

          <div class="icon-leaf">
            <img src="{{ asset('themes/frontend/assets/image/icons/slide-product-leaf-3.svg') }}" alt="savory Spree" title="savory Spree">
          </div>

          <div class="icon-leaf">
            <img src="{{ asset('themes/frontend/assets/image/icons/slide-product-leaf-4.svg') }}" alt="savory Spree" title="savory Spree">
          </div>

          <div class="icon-leaf">
            <img src="{{ asset('themes/frontend/assets/image/icons/slide-product-leaf-5.svg') }}" alt="savory Spree" title="savory Spree">
          </div>
        </div>
      </div>

      <div class="slide-product-list">
        @php
        $params['status'] = App\Consts::STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::TAXONOMY['product'];
        $params['user_id'] = $user_auth->id ?? '';
        // list product
        $rows = App\Models\CmsProduct::getsqlCmsProduct($params, $locale)
            ->limit(10)
            ->get();
        @endphp
        @foreach ($rows as $items)
        @php
            $title_child = $items->json_params->name->{$locale} ?? $items->name;
            $brief_child = $items->json_params->brief->{$locale} ?? $items->brief;
            $content_child = $items->json_params->content->{$locale} ?? $items->content;
            $image_child = $items->image_thumb != '' ? $items->image_thumb : ($items->image != '' ? $items->image : 'data/images/no_image.jpg');
            $alias = route('frontend.page', ['taxonomy' => $items->alias ?? '']);
        @endphp
        <div class="slide-product-item">
          <a href="{{ $alias }}" class="slide-product-item-wrap">
            <img src="{{ $image_child }}" alt="{{ $title_child }}" title="{{ $title_child }}">
            <div class="slide-product-item-info">
              <span>{{ $items->taxonomy_name??"" }}</span>
              <p>{{ $title_child }}</p>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </section>
@endif
