{{-- Get menu id in component $component->json_params->menu_id --}}
@php
    $menu_childs = $menu->filter(function ($item, $key) use ($component) {
        return $item->parent_id == $component->json_params->menu_id;
    });
@endphp
<div class="offcanvas offcanvas-start menumobile" tabindex="-1" id="menumobile"
  aria-labelledby="menumobileLabel">
  <div class="offcanvas-body">
    <nav class="nav-mobile">
      <ul class="nav-list">
        @foreach ($menu_childs as $val_menu1)
        <li class="nav-item">
          <a href="{{ $val_menu1->url_link }}" class="nav-link" title="{{ $val_menu1->json_params->name->$locale ?? $val_menu1->name }}">{{ $val_menu1->json_params->name->$locale ?? $val_menu1->name }}</a>
            @if($val_menu1->sub>0) 
                @php
                    $menu_childs2 = $menu->filter(function ($item, $key) use ($val_menu1) {
                        return $item->parent_id == $val_menu1->id;
                    });
                @endphp
                <ul class="nav-list-lv0 collapse" id="collapsesubmenu">
                    @foreach ($menu_childs2 as $val_menu2)
                    <li class="nav-item">
                      <a href="{{ $val_menu2->url_link }}" class="nav-link" title="{{ $val_menu2->json_params->name->$locale ?? $val_menu2->name }}">{{ $val_menu2->json_params->name->$locale ?? $val_menu2->name }}</a>
                      <ul class="nav-list-lv1 collapse" id="collapsesubmenulv1-1">
                        @if($val_menu2->sub>0)
                        @php
                            $menu_childs3 = $menu->filter(function ($item, $key) use ($val_menu2) {
                                return $item->parent_id == $val_menu2->id;
                            });
                        @endphp
                        @foreach ($menu_childs3 as $val_menu3)
                        <li class="nav-item">
                          <a href="{{ $val_menu3->url_link }}" class="nav-link" title="{{ $val_menu3->json_params->name->$locale ?? $val_menu3->name }}">{{ $val_menu3->json_params->name->$locale ?? $val_menu3->name }}</a>
                        </li>
                        @endforeach
                        @endif
                      </ul>

                    <div class="close-sub-nav collapsed" data-bs-toggle="collapse" href="#collapsesubmenulv1-1"
                        role="button" aria-expanded="false" aria-controls="collapsesubmenulv1-1">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                          style="enable-background: new 0 0 512 512" xml:space="preserve">
                          <g>
                            <g>
                              <path
                                d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216          v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z" />
                            </g>
                          </g>
                        </svg>

                        <svg id="svg1591" height="24" viewBox="0 0 6.3499999 6.3500002" width="24"
                          xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                          <g id="layer1" transform="translate(0 -290.65)">
                            <path id="path2047"
                              d="m.79427278 293.56039a.2646485.2646485 0 0 0 0 .52917h4.76146822a.2646485.2646485 0 0 0 0-.52917z"
                              font-variant-ligatures="normal" font-variant-position="normal" font-variant-caps="normal"
                              font-variant-numeric="normal" font-variant-alternates="normal"
                              font-feature-settings="normal" text-indent="0" text-align="start"
                              text-decoration-line="none" text-decoration-style="solid"
                              text-decoration-color="rgb(0,0,0)" text-transform="none" text-orientation="mixed"
                              white-space="normal" shape-padding="0" isolation="auto" mix-blend-mode="normal"
                              solid-color="rgb(0,0,0)" solid-opacity="1" vector-effect="none" />
                          </g>
                        </svg>
                    </div>
                    </li>
                    @endforeach
                </ul>
                  <div class="close-sub-nav collapsed" data-bs-toggle="collapse" href="#collapsesubmenu" role="button"
                    aria-expanded="false" aria-controls="collapsesubmenu">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                      style="enable-background: new 0 0 512 512" xml:space="preserve">
                      <g>
                        <g>
                          <path
                            d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216          v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z" />
                        </g>
                      </g>
                    </svg>

                    <svg id="svg1591" height="24" viewBox="0 0 6.3499999 6.3500002" width="24"
                      xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                      <g id="layer1" transform="translate(0 -290.65)">
                        <path id="path2047"
                          d="m.79427278 293.56039a.2646485.2646485 0 0 0 0 .52917h4.76146822a.2646485.2646485 0 0 0 0-.52917z"
                          font-variant-ligatures="normal" font-variant-position="normal" font-variant-caps="normal"
                          font-variant-numeric="normal" font-variant-alternates="normal" font-feature-settings="normal"
                          text-indent="0" text-align="start" text-decoration-line="none" text-decoration-style="solid"
                          text-decoration-color="rgb(0,0,0)" text-transform="none" text-orientation="mixed"
                          white-space="normal" shape-padding="0" isolation="auto" mix-blend-mode="normal"
                          solid-color="rgb(0,0,0)" solid-opacity="1" vector-effect="none" />
                      </g>
                    </svg>
                  </div>
            @endif

        </li>
        @endforeach
        
      </ul>
    </nav>
  </div>
</div>
