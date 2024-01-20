@php
    $name = 'post_search';
    $detail_component = $components->first(function ($item) use ($name) {
        return $item->component_code == $name;
    });
@endphp
@isset($component)
    
    <div class="recent-blog">
        <div class="title-module">
          <h3>{{$component->title}}</h3>
        </div>
       
        <div class="blog-list">
          @foreach ($rows as $item)
            @php
                $title = $item->json_params->name->{$locale} ?? $item->name;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $price = $item->price ?? '0';
                $price_old = $item->price_old ?? '0';
                $image = $item->image ?? url('data/images/no_image.jpg');
                $image_thumb = $item->image_thumb ?? url('data/images/no_image.jpg');
                $alias = route('frontend.page', ['taxonomy' => $item->alias ?? '']);
                $time = date('M d, Y', strtotime($item->created_at));
            @endphp  
            @if($loop->index>=0&&$loop->index<=1)
              <div class="blog-item">
                <div href="{{ $alias }}" class="blog-item-image">
                  <img src="{{ $image }}"
                    alt="{{ $title }} "
                    title="{{ $title }} " />
                </div>

                <div class="blog-item-info">
                  <a class="blog-item-name" href="{{ $alias }}"
                    title="{{ $title }} ">{{ $title }}
                  </a>
                  <div class="blog-item-post">{{ $time }}</div>
                </div>
              </div>
            @endif  
            @endforeach
        </div>
      </div>

      <div class="sidebar-fanpage">
        <div class="fb-page" data-href="https://www.facebook.com/fhmvietnamm" data-tabs="" data-width=""
          data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
          data-show-facepile="false">
          <blockquote cite="https://www.facebook.com/fhmvietnamm" class="fb-xfbml-parse-ignore">
            <a href="https://www.facebook.com/fhmvietnamm">FHM Việt Nam</a>
          </blockquote>
        </div>
      </div>
@endisset
