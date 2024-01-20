@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        $params['status'] = App\Consts::STATUS['active'];
        $params['is_type'] = App\Consts::TAXONOMY['post'];
        $params['user_id'] = Auth::guard('web')->user()->id ?? "";
        $rows = App\Models\CmsPost::getsqlCmsPost($params)
            ->paginate(App\Consts::PAGINATE['post']);
        $paramater = App\Models\Parameter::get();
    @endphp

    <section id="fhm-blog-list-latest" class="news">
        <div class="container">
            <div class="heading-block">
                <h2 class="title">{{ $title }}</h2>
                <p class="desc">
                    {{ $brief }}
                </p>
            </div>
            <div class="latest-blog-group">
                @foreach ($rows as $items)
                    @php
                        $title_child = $items->json_params->name->{$locale} ?? $items->name;
                        $brief_child = $items->json_params->brief->{$locale} ?? $items->brief;
                        $content_child = $items->json_params->content->{$locale} ?? $items->content;
                        $image_child = $items->image != '' ? $items->image : 'data/images/no_image.jpg';
                        $time = date('M d,Y', strtotime($items->updated_at));
                        $alias = route('frontend.page', ['taxonomy' => $items->alias ?? '']);
                        $txt_tag = '';
                        if (isset($items->json_params->paramater)) {
                            foreach ($items->json_params->paramater as $keys => $value) {
                                if (isset($value->childs) && $value->name == 'type') {
                                    $tag = $paramater->first(function ($item, $key) use ($keys, $val_tag) {
                                        return $item->parent_id == $keys && $item->id == $val_tag;
                                    });
                                    $txt_tag = $tag->name ?? '';
                                }
                            }
                        }
                    @endphp
                    <div class="news-item">
                        <div class="news-item-image">
                            <img src="{{ $image_child }}" alt="{{ $title_child }}" />
                        </div>
                        <span class="news-item-publish">
                            {{ $time }}
                        </span>
                        <a href="{{ $alias }}" title="{{ $title_child }}"
                            class="news-item-title">{{ $title_child }}</a>
                    </div>
                @endforeach
            </div>
            <div class="products-list-pagination d-flex justify-content-between align-items-center">
                <p class="products-list-pagination-result">
                    @lang('Total') <strong>{{ $rows->perPage() }}</strong> @lang('of')
                    <strong>{{ number_format($rows->total()) }}</strong> @lang('Resutls')
                </p>
                {{ $rows->withQueryString()->links('frontend.pagination.default') }}
            </div>
        </div>
    </section>
@endif
