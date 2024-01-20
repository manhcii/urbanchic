@php
    $component_setting = $widget->header->json_params->component ?? [];
    // Filter selected
    $components_selected = $components->filter(function ($item) use ($component_setting) {
        return in_array($item->id, $component_setting) && $item->json_params->style != 'header-wrapper';
    });
    // Reorder selected
    $components_selected = $components_selected->sortBy(function ($item) use ($component_setting) {
        return array_search($item->id, $component_setting);
    });

    $components_wrapper = $components->filter(function ($item) use ($component_setting) {
        return in_array($item->id, $component_setting) && $item->json_params->style == 'header-wrapper';
    });
    $components_wrapper = $components_wrapper->sortBy(function ($item) use ($component_setting) {
        return array_search($item->id, $component_setting);
    });
@endphp
<header id="fhm-header" class="light">
    <div class="container">
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
        @if (isset($components_wrapper))
            <div class="header-wrapper">
                @foreach ($components_wrapper as $component)
                    @if (\View::exists('frontend.components.' . $widget->header->json_params->layout . '.' . $component->component_code. '.index'))
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
            </div>
        @endif
    </div>
</header>
