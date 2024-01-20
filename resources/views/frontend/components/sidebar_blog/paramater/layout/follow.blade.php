
@isset($component)
{{-- <div class="block block-product-filter">
    <div class="block-title">
        <h2>{{$component->titel}}</h2>
    </div>
    <div class="block-content">
        <div id="slider-range" class="price-filter-wrap">
            <div class="filter-item price-filter d-flex">
                <div class="layout-slider">
                    <input id="price-filter" name="price" value="{{$request['price']??'0;1000'}}" />
                </div>
                <div class="layout-slider-settings ml-4">
                    <button type="submit" class="btn btn-success">@lang('Yes')</button>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="blog-sidebar-follow">
    <div class="title-module">
      <h3>{{$component->title??""}}</h3>
    </div>

    <table class="table-social">
      <tr>
        <th>
          <img src="{{ asset('themes/frontend/assets/image/icons/bloglist-facebook.svg') }}" alt="Facebook" title="Facebook" />
        </th>
        <td>
          <p>FACEBOOK</p>
          <a href="{{ $setting->social->facebook??"" }}" title="Like">Like</a>
        </td>
      </tr>

      <tr>
        <th>
          <img src="{{ asset('themes/frontend/assets/image/icons/bloglist-instagram.svg') }}" alt="INSTAGRAM" title="INSTAGRAM" />
        </th>
        <td>
          <p>INSTAGRAM</p>
          <a href="{{ $setting->social->instagram??"" }}" title="Follow">Follow</a>
        </td>
      </tr>

      <tr>
        <th>
          <img src="{{ asset('themes/frontend/assets/image/icons/bloglist-telegram.svg') }}" alt="TELEGRAM" title="TELEGRAM" />
        </th>
        <td>
          <p>TELEGRAM</p>
          <a href="{{ $setting->social->twitter??"" }}" title="Follow">Follow</a>
        </td>
      </tr>

      <tr>
        <th>
          <img src="{{ asset('themes/frontend//assets/image/icons/bloglist-youtube.svg') }}" alt="YOUTUBE" title="YOUTUBE" />
        </th>
        <td>
          <p>YOUTUBE</p>
          <a href="{{ $setting->social->youtube??"" }}" title="Follow">Follow</a>
        </td>
      </tr>
    </table>
  </div>
@endisset
