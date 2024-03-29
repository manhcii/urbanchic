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
    <div class="footer-bottom">
        <p class="copy-right">
          {{ $title }}
        </p>
        <ul class="footer-bottom">
          <a href="#" title="Terms & Conditions">Terms & Conditions</a>
          <a href="#" title="Privacy Policy">Privacy Policy</a>
          <a href="#" title="Cookies"></a>
        </ul>
      </div>
@endif
