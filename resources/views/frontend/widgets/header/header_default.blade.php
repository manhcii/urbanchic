@php
    $component_setting = $widget->header->json_params->component ?? [];
    // Filter selected
    $components_selected = $components->filter(function ($item) use ($component_setting) {
        return in_array($item->id, $component_setting) ;
    });
    // Reorder selected
    $components_selected = $components_selected->sortBy(function ($item) use ($component_setting) {
        return array_search($item->id, $component_setting);
    });
    
@endphp
<header >
    <div class="topbar">
      <div class="container">
        <div class="topbar-flex">
          <div class="topbar-item-wrap">
            <div class="topbar-item">
              <img src="{{ asset('themes/frontend/assets/image/icons/phone.svg') }}" alt="Phone" title="Phone" />
              <a href="tel:{{ $setting->phone??"" }}" title="{{ $setting->phone??"" }}">{{ $setting->phone??"" }}</a>
            </div>

            <div class="topbar-item">
              <img src="{{ asset('themes/frontend/assets/image/icons/email.svg') }}" alt="Email" title="Email" />
              <a href="mailto:{{ $setting->email ??"" }}" title="{{ $setting->email ??"" }}">{{ $setting->email ??"" }}</a>
            </div>
          </div>

          <div class="topbar-item-wrap">
            <div class="topbar-item">
              <p>
                {{ $setting->title_topbar??"" }}
                <a href="/" title="Shop now!">Shop now!</a>
              </p>
            </div>
          </div>

          <div class="topbar-item-wrap">
            <div class="topbar-item">
              <img src="{{ asset('themes/frontend/assets/image/icons/trackorder.svg') }}" alt="Track Your Order" title="Track Your Order" />
              <a href="/" title="Track Your Order">Track Your Order</a>
            </div>

            <div class="topbar-item">
              <img src="{{ asset('themes/frontend/assets/image/icons/callcenter.svg') }}" alt="Help/Support" title="Help/Support" />
              <a href="tel:{{ $setting->phone??"" }}" title="Help/Support">Help/Support</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="header-main">
        @if (isset($components_selected))
            @foreach ($components_selected as $component)
                @if (
                    \View::exists(
                        'frontend.components.' . $widget->header->json_params->layout . '.' . $component->component_code . '.index'))
                    @include(
                        'frontend.components.' .
                            $widget->header->json_params->layout .
                            '.' .
                            $component->component_code .
                            '.index ')
                @else
                    {{ 'View: frontend.components.' . $widget->header->json_params->layout . '.' . $component->component_code . '.index do not exists!' }}
                @endif
            @endforeach
        @endif
        </div>
    </div>
</header>

 