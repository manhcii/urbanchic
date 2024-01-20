@php
    $component_setting = $widget->footer->json_params->component ?? [];
    // Filter selected
    $components_selected = $components->filter(function ($item) use ($component_setting) {
        return in_array($item->id, $component_setting);
    });
    // Reorder selected
    $components_selected = $components_selected->sortBy(function ($item) use ($component_setting) {
        return array_search($item->id, $component_setting);
    });

    $components_first = $components_selected->first(function ($item) {
        return $item->json_params->layout=='custom';
    });

@endphp

<footer>
  <div class="container">
    @if (isset($components_selected))
        @foreach ($components_selected as $component)
            @if (
                \View::exists(
                    'frontend.components.' . $widget->footer->json_params->layout . '.' . $component->component_code . '.index'))
                @include(
                    'frontend.components.' .
                        $widget->footer->json_params->layout .
                        '.' .
                        $component->component_code .
                        '.index ')
            @else
                {{ 'View: frontend.components.' . $widget->footer->json_params->layout . '.' . $component->component_code . '.index do not exists!' }}
            @endif
        @endforeach
    @endif
  </div>
</footer>
