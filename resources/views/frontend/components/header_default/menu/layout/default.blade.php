{{-- Get menu id in component $component->json_params->menu_id --}}
@isset($menu)
    @php
        $menu_childs = $menu->filter(function ($item, $key) use ($component) {
            return $item->parent_id == $component->json_params->menu_id;
        });
    @endphp
    
    <nav class="header-nav">
        @isset($menu_childs)
            <ul class="nav-list">
                @php
                $k = 0;
                @endphp
                @foreach ($menu_childs as $val_menu1)
                    @php
                    $url = $val_menu1->url_link;
                    $active = $url == url()->full() ? 'active' : '';$k++;
                    @endphp
                    @if($k==4)
                    <li class="nav-item header-logo">
                        <a class="nav-link {{ $active }}" href="/" title="Savory Spree">
                          <img src="{{ $setting->logo_header??"" }}" alt="Savory Spree" title="Savory Spree">
                        </a>
                    </li>
                    @endif
                    <li class="nav-item ">
                        <a class="nav-link {{ $active }}" href="{{ $val_menu1->url_link }}"
                            title="{{ $val_menu1->json_params->name->$locale ?? $val_menu1->name }}">
                            {{ $val_menu1->json_params->name->$locale ?? $val_menu1->name }}</a>
                        @if($val_menu1->sub>0) 
                        @php
                            $menu_childs2 = $menu->filter(function ($item, $key) use ($val_menu1) {
                                return $item->parent_id == $val_menu1->id;
                            });
                        @endphp
                        <div class="mega-menu">
                          <div class="container">
                            <div class="mega-menu-main">
                              <div class="mega-menu-list">
                                @foreach ($menu_childs2 as $val_menu2)
                                <div class="mega-menu-col">
                                  <img src="{{ $val_menu2->json_params->image ?? "" }}" alt="Smoothies" title="Smoothies">
                                  <a href="{{ $val_menu2->url_link }}" title="{{ $val_menu2->json_params->name->$locale ?? $val_menu2->name }}">{{ $val_menu2->json_params->name->$locale ?? $val_menu2->name }}</a>
                                    @if($val_menu2->sub>0)
                                    @php
                                        $menu_childs3 = $menu->filter(function ($item, $key) use ($val_menu2) {
                                            return $item->parent_id == $val_menu2->id;
                                        });
                                    @endphp
                                        <ul class="mega-menu-col-child">
                                            @foreach ($menu_childs3 as $val_menu3)
                                            <li class="nav-item">
                                              <a href="{{ $val_menu3->url_link }}" title="{{ $val_menu3->json_params->name->$locale ?? $val_menu3->name }}">{{ $val_menu3->json_params->name->$locale ?? $val_menu3->name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    @endif 
                                </div>
                                @endforeach
                                
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif  
                    </li>
                @endforeach
            </ul>
        @endisset
    </nav>
    <div class="header-account" data-bs-toggle="modal" data-bs-target="#fhm-login-popup"
        aria-controls="fhm-login-popup">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.67817 17.9537C9.23692 17.9537 8.79568 17.9537 8.35885 17.9537C8.11175 17.9184 7.86466 17.8919 7.62197 17.8522C5.44665 17.4815 3.58902 16.502 2.19028 14.7899C-0.126245 11.9528 -0.629261 8.7714 0.795952 5.40472C2.49915 1.385 6.72184 -0.706493 10.9887 0.215704C14.4083 0.952579 17.1837 3.79418 17.8235 7.21381C17.8897 7.58004 17.9426 7.95069 18 8.31692C18 8.75816 18 9.1994 18 9.63623C17.9647 9.88333 17.9382 10.1304 17.8985 10.3731C17.5235 12.5749 16.4998 14.4061 14.7966 15.8533C13.6935 16.7888 12.4315 17.4198 11.0195 17.7286C10.5783 17.8257 10.1238 17.8786 9.67817 17.9537ZM6.7439 11.6439C4.55975 10.0951 4.4715 7.20499 6.04674 5.51062C7.56903 3.87361 10.1591 3.77653 11.7961 5.31647C12.5727 6.04452 13.0051 6.95348 13.0625 8.01687C13.1419 9.53033 12.5198 10.7261 11.2931 11.6395C12.7713 12.1778 13.9273 13.0956 14.7878 14.384C17.6647 11.3615 17.7529 6.34015 14.4524 3.21615C11.1828 0.118631 5.95408 0.356902 2.98452 3.85154C0.160563 7.1741 0.725353 11.8292 3.25809 14.3796C3.67727 13.7486 4.17587 13.1971 4.76714 12.7338C5.36281 12.266 6.01585 11.9086 6.7439 11.6439ZM4.04791 15.1076C6.86304 17.5212 11.324 17.4374 13.9891 15.0988C12.7757 13.2721 11.0857 12.2837 8.87952 12.3278C6.79244 12.3763 5.19073 13.3647 4.04791 15.1076ZM12.0123 8.26838C12.0123 6.62255 10.6577 5.27234 9.0163 5.27234C7.37929 5.27676 6.0335 6.61813 6.02909 8.25514C6.02026 9.89657 7.37488 11.2556 9.0163 11.26C10.6533 11.2688 12.0123 9.91422 12.0123 8.26838Z" fill="#121212"/>
        </svg>
    </div>
    <div class="show-menu-mobile d-block d-xl-none d-lg-none" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#menumobile" aria-controls="menumobile">
          <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="0.953613" width="18" height="2" rx="1" fill="#121212"/>
            <rect y="6.95361" width="18" height="2" rx="1" fill="#121212"/>
            <rect y="12.9536" width="18" height="2" rx="1" fill="#121212"/>
          </svg>
        </div>
@endisset

