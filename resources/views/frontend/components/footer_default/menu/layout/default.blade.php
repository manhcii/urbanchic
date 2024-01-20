@isset($menu)
    @php
        $menu_childs = $menu->filter(function ($item, $key) use ($component) {
            return $item->parent_id == $component->json_params->menu_id;
        });
    @endphp
@endisset
@if ($component)
    @php
        $title = $component->json_params->title->{$locale} ?? $component->title;
        $brief = $component->json_params->brief->{$locale} ?? $component->brief;
        $image = $component->image != '' ? $component->image : null;
        // Filter all blocks by parent_id
        $component_childs = $all_components->filter(function ($item, $key) use ($component) {
            return $item->parent_id == $component->id;
        });
    @endphp
@endif    
{{--  --}}
 <div class="footer-main">
        <div class="footer-col-logo">
          <a href="/" title="Savory Spree" class="footer-logo">
            <img src="{{ $setting->logo_footer??"" }}" alt="Savory Spree" title="Savory Spree">
          </a>
          <p class="footer-description">
            {{ $brief }}
          </p>
          <a href="tel:{{ $setting->phone??"" }}" title="{{ $setting->phone??"" }}">{{ $setting->phone??"" }}</a>
          <span class="footer-or">or</span>
          <a href="mailto:{{ $setting->email??"" }}" title="{{ $setting->email??"" }}">{{ $setting->email??"" }}</a>
          <p>{{ $setting->address??"" }}</p>
        </div>

        <div class="footer-list-col">
          @isset($menu_childs)
          @foreach ($menu_childs as $val_menu1)
            @php
                $menu_childs_0 = $menu->filter(function ($item, $key) use ($val_menu1) {
                    return $item->parent_id == $val_menu1->id;
                });
            @endphp  
              <div class="footer-col">
                <h4>{{ $val_menu1->json_params->name->$locale ?? $val_menu1->name }}</h4>
                <ul>
                    @isset($menu_childs_0)
                      @foreach ($menu_childs_0 as $val_menu0)
                        <li><a href="{{ $val_menu0->url_link }}" title="{{ $val_menu0->json_params->name->$locale ?? $val_menu0->name }}">{{ $val_menu0->json_params->name->$locale ?? $val_menu0->name }}</a></li>
                      @endforeach
                    @endisset    
                </ul>
              </div>
          @endforeach  
          @endisset
          
        </div>
      </div>