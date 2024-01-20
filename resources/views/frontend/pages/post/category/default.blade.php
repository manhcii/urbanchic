{{-- Check và gọi template tương ứng --}}
@extends('frontend.layouts.default')

@section('content')
    @php
        $seo_title = $seo_title ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($page->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($page->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($page->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $background_breadcrumbs = json_decode($setting->image)->background_breadcrumbs ?? '';

        $category_title = $page->json_params->name->{$locale} ?? $page->name;
        $category_brief = $page->json_params->brief->{$locale} ?? $page->brief;
        $category_description = $page->json_params->description->{$locale} ?? $page->description;
        $category_content = $page->json_params->content->{$locale} ?? $page->content;
        $category_image = $page->json_params->image != '' ? $page->json_params->image : $setting->background_breadcrumbs;
        $category_backgroud = $page->json_params->image_thumb != '' ? $page->json_params->image_thumb : $setting->background_breadcrumbs;
        


    @endphp

  <div class="page-bloglist">
      <div class="container">
          <div class="page-title text-center">
            <h1>{{ $category_title }}</h1>
            <p>
              {{ $category_brief }}
            </p>
          </div>
          @if($page->sub_taxonomy_id != 0 && $page->sub_taxonomy_id != null)
          @php
          $list_sub_taxonomy_id=explode(',', $page->sub_taxonomy_id);
          $count=0;
          @endphp
          <ul class="bloglist-tabs" role="tablist">
            @foreach($list_sub_taxonomy_id as $item)
                @php
                $params['id']= $item;
                $params['status']=App\Consts::TAXONOMY_STATUS['active'];
                $params['taxonomy'] = App\Consts::TAXONOMY['post'];
                $taxo= App\Models\PostCategory::getSqlTaxonomy($params)->first();
                @endphp
                @if($taxo)
                @php
                  $count++;
                @endphp
                <li class="bloglist-tab " role="presentation">
                  <button class="nav-link {{ $count==1 ?" active": ""}}" data-bs-toggle="tab" data-bs-target="#bloglist-tab-{{ $item }}" type="button" role="tab"
                    aria-controls="bloglist-tab-{{ $item }}" aria-selected="true">
                    {{  $taxo->name ??"" }}
                  </button>
                </li>
                @endif
            @endforeach
          </ul>
          @endif
          <div class="page-bloglist-wrap">
            <div class="page-bloglist-main">
              <div class="title-module">
                <h3>Recent posts</h3>
              </div>

              <div class="tab-content bloglist-tabs-content">
                @php
                $list_sub_taxonomy_id=explode(',', $page->sub_taxonomy_id);
                $count=0;
                @endphp
                 @foreach($list_sub_taxonomy_id as $item)
                    @php
                    $params['id']= $item;
                    $params['status']=App\Consts::TAXONOMY_STATUS['active'];
                    $params['taxonomy'] = App\Consts::TAXONOMY['post'];
                    $taxo= App\Models\PostCategory::getSqlTaxonomy($params)->first();
                    @endphp
                    @if($taxo)
                    @php
                      $count++;
                    @endphp
                    <div class="tab-pane fade {{ $count==1 ?"show active": ""}}" id="bloglist-tab-{{ $item }}" role="tabpanel" aria-labelledby="bloglist-tab-{{ $item }}" tabindex="0">
                      <div class="blog-list">
                        @if (count($rows) > 0)
                            @foreach ($rows as $items)
                            @php
                            $title_child = $items->json_params->name->{$locale} ?? $items->name;
                            $brief_child = $items->json_params->brief->{$locale} ?? $items->brief;
                            $content_child = $items->json_params->content->{$locale} ?? $items->content;
                            $image_child = $items->image != '' ? $items->image : 'data/images/no_image.jpg';
                            
                            $time = date('M d, Y', strtotime($items->updated_at));
                            $alias = route('frontend.page', ['taxonomy' => $items->alias ?? '']);
                            @endphp
                                @if(in_array($item." ",explode(',', $items->taxonomy_id)))
                                <div class="blog-item">
                                  <a href="{{ $alias }}" class="blog-item-image">
                                    <img src="{{ $image_child }}" alt="{{ $title_child }}"
                                      title="{{ $title_child }}" />
                                  </a>

                                  <div class="blog-item-info">
                                    <div class="blog-item-post">
                                      <a class="blog-item-topic" href="" title="Drinks" style="--color: #EA2828">{{ $items->taxonomy_name??"" }}</a>
                                      <span>{{ $time }}</span>
                                    </div>

                                    <a class="blog-item-name" href="{{ $alias }}" title="{{ $title_child }}">{{ $title_child }}</a>

                                    <div class="blog-item-line"></div>

                                    <p class="blog-item-des">
                                      {{ $brief_child }}
                                    </p>

                                    <a class="blog-item-share" href="#" title="Share">
                                      <img src="{{ asset('themes/frontend/assets/image/icons/bloglist-icon-share.svg') }}" alt="Share" title="Share">
                                      Share
                                    </a>
                                  </div>
                                </div>
                                @endif

                            @endforeach
                        @endif
                      </div>
                    </div>
                    @endif
                @endforeach
              </div>
            </div>
            <aside class="blog-sidebar">
            @isset($widget->sidebar)
                @if (\View::exists('frontend.widgets.sidebar.' . $widget->sidebar->json_params->layout))
                    @include('frontend.widgets.sidebar.' . $widget->sidebar->json_params->layout)
                @else
                    {{ 'View: frontend.widgets.sidebar.' . $widget->sidebar->json_params->layout . ' do not exists!' }}
                @endif
            @endisset
            </aside>
            {{ $rows->withQueryString()->links('frontend.pagination.default') }}
          </div>
      </div>
  </div>



@endsection
@push('script')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0"
    nonce="6qFDskaj"></script>
@endpush
