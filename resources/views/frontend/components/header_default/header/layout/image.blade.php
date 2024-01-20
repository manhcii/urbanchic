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
    <a href="{{ route('home.default') }}" class="header-logo-mb" title="{{ $title }}">
      <img src="{{ $setting->logo_header??"" }}" alt="{{ $title }}" title="{{ $title }}">
    </a>
@endif
