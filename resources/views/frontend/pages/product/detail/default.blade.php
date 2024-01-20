@extends('frontend.layouts.default')

@section('content')
    @php
        $seo_title = $seo_title ?? ($detail->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($detail->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($detail->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($detail->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $link = route('frontend.page', ['taxonomy' => $detail->alias ?? '']);

        $page_title = $detail->json_params->name->{$locale} ?? $detail->name;
        $page_brief = $detail->json_params->brief->{$locale} ?? $detail->brief;
        $page_description = $detail->json_params->description->{$locale} ?? $detail->description;
        $page_content = $detail->json_params->content->{$locale} ?? $detail->content;
        $page_image = $detail->image != '' ? $detail->image : $setting->background_breadcrumbs;
        $page_backgroud = $detail->image_thumb != '' ? $detail->image_thumb : $setting->background_breadcrumbs;
        $gallery_image = $detail->json_params->gallery_image ?? [];
        $price = $detail->price != '' ? $detail->price : 0;
        $price_old = $detail->price_old != '' ? $detail->price_old : 0;
// dd($detail);
    @endphp
    <section class="page-banner page-banner-product-detail">
        <picture>
          <source media="(max-width:767px)" srcset="{{ $page_backgroud }}" />
          <img src="{{ $page_backgroud }}"
          alt="{{ $page_brief }}"
          title="{{ $page_brief }}" />
        </picture>

        <div class="module-content">
          <div class="container">
            <span class="sub-title">{{ $detail->taxonomy_name??"" }}</span>
            <h3>{{ $page_brief }}</h3>
            <a href="#detail-info" class="button-main" title="Buy Now">
              <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.8532 4.69763C11.5442 4.69763 12.2082 4.69763 12.8653 4.69763C13.3802 4.69763 13.4751 4.77893 13.536 5.2735C13.9832 8.67452 14.4303 12.0688 14.8775 15.4698C14.9181 15.7814 14.9859 16.0863 14.9994 16.398C15.0062 16.5538 14.952 16.7367 14.8639 16.8587C14.7284 17.0484 14.5455 17.211 14.3626 17.3532C14.2677 17.4277 14.1187 17.4752 13.99 17.4752C9.66078 17.4819 5.33159 17.4819 1.0024 17.4752C0.866903 17.4752 0.69753 17.4074 0.595906 17.3194C-0.0680385 16.7367 -0.0544892 16.7367 0.0606848 15.8898C0.379107 13.5186 0.68398 11.1406 0.995627 8.7626C1.15145 7.57698 1.30727 6.39814 1.4631 5.21253C1.52407 4.77893 1.63247 4.69086 2.07962 4.69086C2.74356 4.69086 3.40073 4.68408 4.06468 4.68408C4.07823 4.68408 4.09177 4.67053 4.1392 4.65698C4.1392 4.43341 4.1392 4.20306 4.1392 3.96594C4.14597 2.10283 5.43999 0.686868 7.28955 0.531044C9.09168 0.375221 10.7854 1.89281 10.8464 3.71527C10.8599 4.02691 10.8532 4.33856 10.8532 4.69763ZM12.7366 5.5174C12.6485 5.51063 12.6147 5.51063 12.5808 5.51063C9.21363 5.51063 5.83971 5.51063 2.47256 5.50385C2.25577 5.50385 2.22867 5.60548 2.20834 5.77485C1.98477 7.52278 1.74765 9.26394 1.5173 11.0119C1.28695 12.7327 1.06338 14.4535 0.839803 16.1744C0.792378 16.5131 0.948202 16.6825 1.28695 16.6825C5.42644 16.6825 9.56593 16.6825 13.7054 16.6825C14.0238 16.6825 14.1932 16.5064 14.1526 16.1947C14.0103 15.1107 13.868 14.0335 13.7257 12.9495C13.4615 10.9645 13.2041 8.97262 12.9398 6.98757C12.8721 6.49299 12.8043 6.0052 12.7366 5.5174ZM4.93187 4.67053C6.66625 4.67053 8.34644 4.67053 10.0402 4.67053C10.0402 4.34534 10.0537 4.03369 10.0402 3.72204C9.99275 2.46868 8.95618 1.42534 7.67572 1.33726C6.41558 1.24919 5.21641 2.16381 5.01994 3.39685C4.95219 3.81012 4.95897 4.23016 4.93187 4.67053Z" fill="#121212"/>
              </svg>

              Buy Now
            </a>
          </div>
        </div>
    </section>
    <main class="page-product-detail">
      <!--Product Detail info-->
      <section id="detail-info" class="detail-info">
        <div class="container">
          <div class="detail-info-wrap">
            <div class="detail-info-images">
              <div class="swiper">
                <div class="swiper-wrapper">
                @if (count((array) $gallery_image) > 0)
                    @foreach ($gallery_image as $val)
                        <div class="swiper-slide">
                            <img src="{{ $val->img }}" alt="{{ $page_title }}" title="{{ $page_title }}">
                          </div>
                    @endforeach
                @endif
                  
                  
                </div>
              
                <div class="swiper-button-prev">
                  <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 11L2 6L7 1" stroke="#6D8434" stroke-width="2" stroke-linecap="round"/>
                  </svg>
                </div>
                <div class="swiper-button-next">
                  <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 11L6 6L1 1" stroke="#6D8434" stroke-width="2" stroke-linecap="round"/>
                  </svg>
                </div>
              </div>

              <div class="product-info-image-base">
                <img src="{{ asset('themes/frontend/assets/image/product/product-detail-base.png') }}" alt="{{ $page_title }}" title="{{ $page_title }}">
              </div>
            </div>

            <div class="detail-info-product">
              <div class="detail-info-heading">
                <a href="" class="product-category" title="{{ $detail->taxonomy_name??"" }}">{{ $detail->taxonomy_name??"" }}</a>
                <h1 class="product-name">{{ $page_title }}</h1>
              </div>

              

              <p class="detail-info-des">
                {{ $page_brief }}
              </p>

              <div class="detail-info-price">
                <span class="price-current">{{ $lang_default == $locale ? $setting->currency_unit : $setting->{$locale . '-currency_unit'} }}
                                    {{ number_format($price, 2) }}</span>
                <span class="price-old">{{ $lang_default == $locale ? $setting->currency_unit : $setting->{$locale . '-currency_unit'} }}
                                        {{ number_format($price_old, 2) }}</span>
              </div>

              <div class="detail-info-rating">
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

                <span>Reviews ({{ count($review) }})</span>
              </div>

              <a href="#" class="button-main detail-add-cart" title="Get Started">Get Started</a>

              <p class="detail-question">Have a Question?  <a href="" title="Contact Us">Contact Us</a></p>
            </div>
          </div>
        </div>
      </section>

      <!--Product Detail Overview-->
      <section class="detail-overview">
        <div class="detail-overview-image">
          <img src="{{ asset('themes/frontend/assets/image/product/product-detail-4.png') }}" alt="{{ $page_title }}" title="{{ $page_title }}">
        </div>

        <div class="detail-overview-main">
          <div class="detail-overview-heading">
            <span class="sub-title">OVERVIEW</span>
            <h3>{{ $page_title }}</h3>
            <p>
              {{ $page_brief}}
            </p>
          </div>

          <div class="detail-overview-list">
            {!! $page_content !!}
          </div>
        </div>
      </section>

      <!--Product Detail Reviews-->
     {{--  <section class="detail-reviews">
        <div class="container">
          <h3>Reviews</h3>
          <div class="reviews-wrap">
          @if(isset($review) && count($review)>0)
            <div class="reviews-statistic">
              <div class="reviews-statistic-item">
                <h6>Total Reviews</h6>
                <p class="reviews-total">{{ count($review) }}</p>
                <span>Growth in reviews on this year</span>
              </div>
              <div class="reviews-statistic-item">
                <h6>Average Rating</h6>
                <div class="reviews-total-wrap">
                    @php
                    $sum=0;
                    @endphp
                    @foreach($review as $rev)
                    @php
                    $sum+=$rev->rating;
                    @endphp
                    @endforeach
                  <p class="reviews-total">{{ round($sum/count($review),2) }}</p>
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
                </div>
                <span>Avarage rating on this year</span>
              </div>

              <div class="reviews-statistic-item reviews-statistic-filter">
                <div class="reviews-statistic-filter-item">
                  <span>5</span>
                  <div class="reviews-statistic-filter-point" style="--point: 5"></div>
                  <span class="reviews-point-total">2.5k</span>
                </div>

                <div class="reviews-statistic-filter-item">
                  <span>4</span>
                  <div class="reviews-statistic-filter-point" style="--point: 4"></div>
                  <span class="reviews-point-total">1.2k</span>
                </div>

                <div class="reviews-statistic-filter-item">
                  <span>3</span>
                  <div class="reviews-statistic-filter-point" style="--point: 3"></div>
                  <span class="reviews-point-total">500</span>
                </div>

                <div class="reviews-statistic-filter-item">
                  <span>2</span>
                  <div class="reviews-statistic-filter-point" style="--point: 2"></div>
                  <span class="reviews-point-total">200</span>
                </div>

                <div class="reviews-statistic-filter-item">
                  <span>1</span>
                  <div class="reviews-statistic-filter-point" style="--point: 1"></div>
                  <span class="reviews-point-total">100</span>
                </div>
              </div>
            </div>
          @endif

            <div class="reviews-list">
              <div class="reviews-item">
                <div class="reviews-item-heading">
                  <img src="./assets/image/product/review-avatar-1.png" alt="August Marchen" title="August Marchen">
                  <div class="reviews-item-info">
                    <p class="reviews-item-name">August Marchen</p>
                    <div class="star-rating" data-rating="5">
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
                  </div>
                </div>

                <p class="reviews-item-content">
                  Lorem ipsum dolor sit amet consectetur. Sit porttitor non amet accumsan mattis arcu velit lacinia. Vulputate lectus amet nunc purus est velit. Vitae phasellus volutpat ac urna vitae ac molestie sed dignissim. Etiam mattis vitae nisi posuere nulla venenatis.
                </p>

                <div class="reviews-item-images">
                  <img src="./assets/image/product/review-item-1.png" alt="Review" title="Review">
                  <img src="./assets/image/product/review-item-2.png" alt="Review" title="Review">

                  <div class="reviews-item-video">
                    <img src="./assets/image/product/review-item-3.png" alt="Video review" title="Video review">

                    <button class="button-play-video" data-video="4LWH8PbDGx0" data-bs-target="#popupWatchVideo" data-bs-toggle="modal">
                      <div class="button-play-video-icon">
                        <img src="./assets/image/icons/play-video.png" alt="Watch Video" title="Watch Video">
                      </div>
                    </button>
                  </div>
                </div>

                <div class="reviews-item-like">
                  <button class="button-like">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.6 20H6.4V9.05263H5.6C5.17565 9.05263 4.76869 9.23007 4.46863 9.54593C4.16857 9.86178 4 10.2902 4 10.7368V18.3158C4 18.7625 4.16857 19.1909 4.46863 19.5067C4.76869 19.8226 5.17565 20 5.6 20ZM18.4 9.05263H12.8L13.6976 6.21642C13.7777 5.9633 13.7995 5.69376 13.7613 5.43003C13.723 5.16629 13.6258 4.91589 13.4776 4.69945C13.3294 4.48301 13.1345 4.30673 12.9089 4.18512C12.6833 4.06352 12.4335 4.00007 12.18 4H12L8 8.57937V20H16.8L19.9296 12.7613L20 12.4211V10.7368C20 10.2902 19.8314 9.86178 19.5314 9.54593C19.2313 9.23007 18.8243 9.05263 18.4 9.05263Z" fill="#D1D3D5"/>
                    </svg>        
                    <p class="button-like-quantity">0</p>              
                  </button>

                  <button class="button-reply">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M17.1429 5C18.7208 5 20 6.38568 20 8.09499V14.285C20 15.9943 18.7208 17.38 17.1429 17.38H16.5714V19.7844C16.5714 20.8268 15.4381 21.3839 14.7139 20.6974L11.2139 17.38H6.85714C5.2792 17.38 4 15.9943 4 14.285V8.09499C4 6.38568 5.2792 5 6.85714 5H17.1429Z" fill="#D1D3D5"/>
                      </svg>
                      <p class="button-reply-quantity">
                        0 <span>reply</span>
                      </p>                      
                  </button>
                </div>
              </div>

              <div class="reviews-item">
                <div class="reviews-item-heading">
                  <img src="./assets/image/product/review-avatar-2.png" alt="August Marchen" title="August Marchen">
                  <div class="reviews-item-info">
                    <p class="reviews-item-name">August Marchen</p>
                    <div class="star-rating" data-rating="5">
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
                  </div>
                </div>

                <p class="reviews-item-content">
                  Lorem ipsum dolor sit amet consectetur. Sit porttitor non amet accumsan mattis arcu velit lacinia. Vulputate lectus amet nunc purus est velit. Vitae phasellus volutpat ac urna vitae ac molestie sed dignissim. Etiam mattis vitae nisi posuere nulla venenatis.
                </p>

                <div class="reviews-item-images">
                  <img src="./assets/image/product/review-item-4.png" alt="Review" title="Review">
                  <img src="./assets/image/product/review-item-5.png" alt="Review" title="Review">

                  <div class="reviews-item-video">
                    <img src="./assets/image/product/review-item-6.png" alt="Video review" title="Video review">

                    <button class="button-play-video" data-video="4LWH8PbDGx0" data-bs-target="#popupWatchVideo" data-bs-toggle="modal">
                      <div class="button-play-video-icon">
                        <img src="./assets/image/icons/play-video.png" alt="Watch Video" title="Watch Video">
                      </div>
                    </button>
                  </div>
                </div>

                <div class="reviews-item-like">
                  <button class="button-like">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.6 20H6.4V9.05263H5.6C5.17565 9.05263 4.76869 9.23007 4.46863 9.54593C4.16857 9.86178 4 10.2902 4 10.7368V18.3158C4 18.7625 4.16857 19.1909 4.46863 19.5067C4.76869 19.8226 5.17565 20 5.6 20ZM18.4 9.05263H12.8L13.6976 6.21642C13.7777 5.9633 13.7995 5.69376 13.7613 5.43003C13.723 5.16629 13.6258 4.91589 13.4776 4.69945C13.3294 4.48301 13.1345 4.30673 12.9089 4.18512C12.6833 4.06352 12.4335 4.00007 12.18 4H12L8 8.57937V20H16.8L19.9296 12.7613L20 12.4211V10.7368C20 10.2902 19.8314 9.86178 19.5314 9.54593C19.2313 9.23007 18.8243 9.05263 18.4 9.05263Z" fill="#D1D3D5"/>
                    </svg>        
                    <p class="button-like-quantity">0</p>              
                  </button>

                  <button class="button-reply">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M17.1429 5C18.7208 5 20 6.38568 20 8.09499V14.285C20 15.9943 18.7208 17.38 17.1429 17.38H16.5714V19.7844C16.5714 20.8268 15.4381 21.3839 14.7139 20.6974L11.2139 17.38H6.85714C5.2792 17.38 4 15.9943 4 14.285V8.09499C4 6.38568 5.2792 5 6.85714 5H17.1429Z" fill="#D1D3D5"/>
                      </svg>
                      <p class="button-reply-quantity">
                        0 <span>reply</span>
                      </p>                      
                  </button>
                </div>
              </div>

              <button class="load-more">
                  See More
                  <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.41699 15.5832L15.5837 6.4165M15.5837 6.4165H6.41699M15.5837 6.4165V15.5832" stroke="#121212" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
              </button>
            </div>
          </div>
        </div>
      </section> --}}

      <!--Product Detail Watch-->
      <section class="detail-watch-video">
    
        <picture>
            <source media="(max-width:991px)" srcset="{{ asset('themes/frontend/assets/image/page-product-detail-video-mb.png') }}">
            <img class="video-image-back" src="{{ asset('themes/frontend/assets/image/page-product-detail-video.png') }}" alt="Watch video" title="Watch video">
        </picture>
          <div class="video-wrap text-center">
              <span class="sub-title">#AMAZING EXPERIENCE</span>
              <h3>WATCH OUR VIDEO</h3>

            <button class="button-play-video" data-video="4LWH8PbDGx0" data-bs-target="#popupWatchVideo" data-bs-toggle="modal" title="Watch Video">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 28C6.73478 28 6.48043 27.8947 6.29289 27.7071C6.10536 27.5196 6 27.2652 6 27V5.00001C6.00003 4.82624 6.04534 4.65548 6.13147 4.50455C6.21759 4.35363 6.34156 4.22775 6.49115 4.13933C6.64074 4.0509 6.8108 4.00299 6.98455 4.0003C7.1583 3.99762 7.32975 4.04025 7.482 4.12401L27.482 15.124C27.6388 15.2103 27.7695 15.3372 27.8606 15.4912C27.9517 15.6453 27.9997 15.821 27.9997 16C27.9997 16.179 27.9517 16.3547 27.8606 16.5088C27.7695 16.6629 27.6388 16.7897 27.482 16.876L7.482 27.876C7.33435 27.9573 7.16855 28 7 28Z" fill="white"/>
              </svg>
            </button>
        </div>
      </section>

      <!--Menual-->
      <section class="menual">
        <div class="container">
          <div class="menual-wrap">
            <div class="menual-item">
              <img src="{{ asset('themes/frontend/assets/image/icons/menual-1.png') }}" alt="STEP 1" title="STEP 1">
              <p class="menual-step">STEP 1</p>
              <p class="menual-des">Fill cup to top with your preferred liquid.</p>
            </div>

            <div class="menual-item">
              <img src="{{ asset('themes/frontend/assets/image/icons/menual-2.png') }}" alt="STEP 2" title="STEP 2">
              <p class="menual-step">STEP 2</p>
              <p class="menual-des">Pour into a blender and blend.</p>
            </div>

            <div class="menual-item">
              <img src="{{ asset('themes/frontend/assets/image/icons/menual-3.png') }}" alt="STEP 3" title="STEP 3">
              <p class="menual-step">STEP 3</p>
              <p class="menual-des">Pour back into your cup and enjoy.</p>
            </div>
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
      <!--Recomment Product Product Detail-->
      {{-- <section class="recomment-product">
        <div class="container">
          <div class="module-content text-center">
            <h3>Recommender For You</h3>
          </div>

          <div class="recomment-product-wrap">
            <div class="swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="product-item">
                    <div class="product-item-image">
                      <img src="./assets/image/product/home-product-1.png" alt="Smoothie" title="Smoothie">
                    </div>
                    <div class="product-item-info">
                      <a href="product-detail.html" class="product-category" title="Smoothie">
                        Smoothie
                      </a>
        
                      <a class="product-name" href="product-detail.html" title="Strawberry + Peach">
                        Strawberry + Peach
                      </a>

                      <div class="star-rating" data-rating="5">
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

                <div class="swiper-slide">
                  <div class="product-item">
                    <div class="product-item-image">
                      <img src="./assets/image/product/home-product-2.png" alt="Strawberry + Peach" title="Strawberry + Peach">
                    </div>
                    <div class="product-item-info">
                      <a href="product-detail.html" class="product-category" title="Forager Bowls">
                        Forager Bowls
                      </a>
        
                      <a class="product-name" href="product-detail.html" title="Strawberry + Peach">
                        Strawberry + Peach
                      </a>

                      <div class="star-rating" data-rating="5">
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
                        <p class="product-price-current">$93.96</p>
                        <p class="product-price-old">$99.00</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="product-item">
                    <div class="product-item-image">
                      <img src="./assets/image/product/home-product-3.png" alt="Strawberry + Peach" title="Strawberry + Peach">
                    </div>
                    <div class="product-item-info">
                      <a href="product-detail.html" class="product-category" title="Harvest Bowls">
                        Harvest Bowls
                      </a>
        
                      <a class="product-name" href="product-detail.html" title="Strawberry + Peach">
                        Strawberry + Peach
                      </a>

                      <div class="star-rating" data-rating="5">
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
                        <p class="product-price-current">$99.22</p>
                        <p class="product-price-old">$112.98</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="product-item">
                    <div class="product-item-image">
                      <img src="./assets/image/product/home-product-4.png" alt="Strawberry + Peach" title="Strawberry + Peach">
                    </div>
                    <div class="product-item-info">
                      <a href="product-detail.html" class="product-category" title="Harvest Bowls">
                        Harvest Bowls
                      </a>
        
                      <a class="product-name" href="product-detail.html" title="Strawberry + Peach">
                        Strawberry + Peach
                      </a>

                      <div class="star-rating" data-rating="5">
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
                        <p class="product-price-current">$99.22</p>
                        <p class="product-price-old">$112.98</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="product-item">
                    <div class="product-item-image">
                      <img src="./assets/image/product/home-product-1.png" alt="Strawberry + Peach" title="Strawberry + Peach">
                    </div>
                    <div class="product-item-info">
                      <a href="product-detail.html" class="product-category" title="Forager Bowls">
                        Forager Bowls
                      </a>
        
                      <a class="product-name" href="product-detail.html" title="Strawberry + Peach">
                        Strawberry + Peach
                      </a>

                      <div class="star-rating" data-rating="5">
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
                        <p class="product-price-current">$93.96</p>
                        <p class="product-price-old">$99.00</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          
            </div>
            <div class="swiper-button-prev swiper-circle"></div>
            <div class="swiper-button-next swiper-circle"></div>
          </div>
        </div>
      </section> --}}
    </main>
@endsection
@push('script')
    <script src="{{ asset('themes/frontend/assets/js/product-detail.js') }}"></script>
@endpush
