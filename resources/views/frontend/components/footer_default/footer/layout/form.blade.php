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
    <div class="subscribe">
        <div class="subscribe-content">
          <h4>{{ $title }}</h4>
          <p>
            {{ $brief }}
          </p>
        </div>
        <form action="{{ route('frontend.contact.store') }}" method="post"class="form_ajax subscribe-form " id="subscribe">
            @csrf
          <input type="hidden" name="is_type" value="contact">
          <input type="text"  name="email" requiredplaceholder="Your email address">
          <button type="submit" form="subscribe" title="Subscribe">Subscribe</button>
        </form>
      </div>
      <div class="footer-social">
        <a href="#" title="Facebook">
          <img src="{{ asset('themes/frontend/assets/image/icons/facebook.svg') }}" alt="Facebook" title="Facebook">
        </a>

        <a href="#" title="Twitter">
          <img src="{{ asset('themes/frontend/assets/image/icons/twitter.svg') }}" alt="Twitter" title="Twitter">
        </a>

        <a href="#" title="Pinterest">
          <img src="{{ asset('themes/frontend/assets/image/icons/pinterest.svg') }}" alt="Pinterest" title="Pinterest">
        </a>

        <a href="#" title="Instagram">
          <img src="{{ asset('themes/frontend/assets/image/icons/instagram.svg') }}" alt="Instagram" title="Instagram">
        </a>
      </div>
@endif
