@extends('admin.layouts.block')
@section('title')
    {{ $module_name }}
@endsection
@php
    if (Request::get('lang') == $languageDefault->lang_locale || Request::get('lang') == '') {
        $lang = $languageDefault->lang_locale;
    } else {
        $lang = Request::get('lang');
    }
@endphp
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $module_name }}
            {{-- <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2) . '.create') }}"><i
                    class="fa fa-plus"></i> @lang('Add')</a> --}}
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @if (session('errorMessage'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('errorMessage') }}
            </div>
        @endif
        @if (session('successMessage'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('successMessage') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach

            </div>
        @endif

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('Update form')</h3>

                @isset($languages)
                    @foreach ($languages as $item)
                        @if ($item->is_default == 1 && $item->lang_locale != Request::get('lang'))
                            @if (Request::get('lang') != '')
                                <a class="text-primary pull-right"
                                    href="{{ route(Request::segment(2) . '.edit', $detail->id) }}" style="padding-left: 15px">
                                    <i class="fa fa-language"></i> {{ __($item->lang_name) }}
                                </a>
                            @endif
                        @else
                            @if (Request::get('lang') != $item->lang_locale)
                                <a class="text-primary pull-right"
                                    href="{{ route(Request::segment(2) . '.edit', $detail->id) }}?lang={{ $item->lang_locale }}"
                                    style="padding-left: 15px">
                                    <i class="fa fa-language"></i> {{ __($item->lang_name) }}
                                </a>
                            @endif
                        @endif
                    @endforeach
                @endisset
                <span class="pull-right">@lang('Translations'): </span>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-block" role="form" action="{{ route(Request::segment(2) . '.update', $detail->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                @if (Request::get('lang') != '' && Request::get('lang') != $item->lang_locale)
                    <input type="hidden" name="lang" value="{{ Request::get('lang') }}">
                @endif
                <input type="hidden" name="parent_id" value="{{ $detail->parent_id ?? '' }}">
                <input type="hidden" name="block_code" value="{{ $detail->block_code ?? '' }}">

                <div class="box-body">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab">
                                    <h5>
                                        @lang('General information')
                                        <span class="text-danger">*</span>
                                    </h5>
                                </a>
                            </li>
                            <li>
                                <a href="#tab_2" data-toggle="tab">
                                    <h5>@lang('Gallery Image Decor')</h5>
                                </a>
                            </li>

                            <button type="submit" class="btn btn-primary btn-sm pull-right">
                                <i class="fa fa-floppy-o"></i>
                                @lang('Save')
                            </button>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_1">
                                <div class="d-flex-wap">
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>
                                                @lang('Title')
                                                <small class="text-red">*</small>
                                            </label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="@lang('Title')"
                                                value="{{ old('title') ?? ($detail->json_params->title->$lang ?? $detail->title) }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Status')</label>
                                            <div class="form-control">
                                                @foreach (App\Consts::STATUS as $key => $value)
                                                    <label>
                                                        <input type="radio" name="status" value="{{ $value }}"
                                                            {{ $detail->status == $value ? 'checked' : '' }}>
                                                        <small class="mr-15">{{ __($value) }}</small>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>
                                                @lang('Block type')
                                                <small class="text-red">*</small>
                                            </label>
                                            <select name="block_code" id="block_code" class="form-control select2"
                                                style="width: 100%" required>
                                                <option value="">@lang('Please select')</option>
                                                @foreach ($blocks as $item)
                                                    <option value="{{ $item->block_code }}"
                                                        {{ $item->block_code == $detail->block_code ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Layout')</label>
                                            <select name="json_params[layout]" id="block_layout"
                                                class="form-control select2" style="width: 100%">
                                                <option value="">@lang('Please select')</option>
                                                @foreach ($blocks as $item)
                                                    @if ($item->block_code == $detail->block_code)
                                                        @php
                                                            $json_params = json_decode($item->json_params);
                                                        @endphp
                                                        @isset($json_params->layout)
                                                            @foreach ($json_params->layout as $name => $value)
                                                                <option value="{{ $value }}"
                                                                    {{ isset($detail->json_params->layout) && $value == $detail->json_params->layout ? 'selected' : '' }}>
                                                                    {{ __($value) }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Style')</label>
                                            <select name="json_params[style]" id="block_style" class="form-control select2"
                                                style="width: 100%">
                                                <option value="">@lang('Please select')</option>
                                                @foreach ($blocks as $item)
                                                    @if ($item->block_code == $detail->block_code)
                                                        @php
                                                            $json_params = json_decode($item->json_params);
                                                        @endphp
                                                        @isset($json_params->style)
                                                            @foreach ($json_params->style as $name => $value)
                                                                <option value="{{ $value }}"
                                                                    {{ isset($detail->json_params->style) && $value == $detail->json_params->style ? 'selected' : '' }}>
                                                                    {{ __($value) }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Brief')</label>
                                            <textarea name="json_params[brief][{{ $lang }}]" id="brief" class="form-control" rows="5">{{ old('json_params[brief][' . $lang . ']') ?? ($detail->json_params->brief->{$lang} ?? $detail->brief) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Description')</label>
                                            <textarea name="json_params[description][{{ $lang }}]" id="description" class="form-control" rows="5">{{ old('json_params[description][' . $lang . ']') ?? ($detail->json_params->description->{$lang} ?? ($detail->description??'')) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>@lang('Content')</label>
                                            <textarea name="json_params[content][{{ $lang }}]" id="content" class="form-control" rows="5">{{ old('json_params[content][' . $lang . ']') ?? ($detail->json_params->content->{$lang} ?? $detail->content) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Url redirect')</label>
                                            <input type="text" class="form-control" name="url_link"
                                                placeholder="@lang('Url redirect')"
                                                value="{{ old('url_link') ?? $detail->url_link }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Url redirect title')</label>
                                            <input type="text" class="form-control" name="url_link_title"
                                                placeholder="@lang('Url redirect title')"
                                                value="{{ old('url_link_title') ?? ($detail->json_params->url_link_title->$lang ?? $detail->url_link_title) }}">
                                        </div>
                                    </div>

                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Image')</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a data-input="image" data-preview="image-holder"
                                                        class="btn btn-primary lfm" data-type="cms-image">
                                                        <i class="fa fa-picture-o"></i> @lang('Select')
                                                    </a>
                                                </span>
                                                <input id="image" class="form-control" type="text" name="image"
                                                    placeholder="@lang('Image source')" value="{{ $detail->image }}">
                                            </div>
                                            <div id="image-holder" style="margin-top:15px;max-height:100px;">
                                                @if ($detail->image != '')
                                                    <img style="height: 5rem;" src="{{ $detail->image }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Background image')</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a data-input="image_background"
                                                        data-preview="image_background-holder" data-type="cms-image"
                                                        class="btn btn-primary lfm">
                                                        <i class="fa fa-picture-o"></i> @lang('Select')
                                                    </a>
                                                </span>
                                                <input id="image_background" class="form-control" type="text"
                                                    name="image_background" placeholder="@lang('Image source')"
                                                    value="{{ $detail->image_background }}">
                                            </div>
                                            <div id="image_background-holder" style="margin-top:15px;max-height:100px;">
                                                @if ($detail->image_background != '')
                                                    <img style="height: 5rem;" src="{{ $detail->image_background }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Star')</label>
                                            <input type="number" min="0" max="5" class="form-control" name="json_params[star]"
                                                placeholder="@lang('Star')"
                                                value="{{ old('json_params[star]') ?? ($detail->json_params->star??'') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab_2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="btn btn-warning btn-sm add-gallery-image" data-toggle="tooltip"
                                                title="Nhấn để chọn thêm ảnh" type="button" value="Thêm ảnh" />
                                        </div>
                                        <div class="row list-gallery-image">
                                            @isset($detail->json_params->gallery_image)
                                                @foreach ($detail->json_params->gallery_image as $key => $value)
                                                    @if ($value != null)
                                                        <div class="col-lg-2 col-md-3 col-sm-4 mb-1 gallery-image">
                                                            <div id="image-holder_{{ $key }}" style="width: 150px; height: 150px;">
                                                                <img width="150px" height="150px" class="img-width"
                                                                src="{{ $value }}">
                                                            </div>

                                                            <input type="text" name="json_params[gallery_image][]"
                                                                class="hidden" id="gallery_image_{{ $key }}"
                                                                value="{{ $value }}">
                                                            <div class="btn-action">
                                                                <span class="btn btn-sm btn-success btn-upload lfm mr-5"
                                                                    data-preview="image-holder_{{ $key }}"
                                                                    data-input="gallery_image_{{ $key }}"
                                                                    data-type="cms-image">
                                                                    <i class="fa fa-upload"></i>
                                                                </span>
                                                                <span class="btn btn-sm btn-danger btn-remove">
                                                                    <i class="fa fa-trash"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    {{-- <a class="btn btn-success btn-sm" href="{{ route(Request::segment(2) . '.index') }}">
                        <i class="fa fa-bars"></i> @lang('List')
                    </a> --}}
                    <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-floppy-o"></i>
                        @lang('Save')</button>
                </div>
            </form>
        </div>



    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#block_code', function() {
                let block_code = $(this).val();
                var _targetLayout = $(this).parents('.form-block').find('#block_layout');
                var _targetStyle = $(this).parents('.form-block').find('#block_style');
                _targetLayout.html('');
                _targetStyle.html('');
                var url = "{{ route('blocks.params') }}/";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        "block_code": block_code,
                    },
                    success: function(response) {
                        var _optionListLayout = '<option value="">@lang('Please select')</option>';
                        var _optionListStyle = '<option value="">@lang('Please select')</option>';
                        if (response.data != null) {
                            let json_params = JSON.parse(response.data);
                            if (json_params.hasOwnProperty('layout')) {
                                Object.entries(json_params.layout).forEach(([key, value]) => {
                                    _optionListLayout += '<option value="' + value +
                                        '"> ' + value + ' </option>';
                                });
                            }
                            _targetLayout.html(_optionListLayout);
                            if (json_params.hasOwnProperty('style')) {
                                Object.entries(json_params.style).forEach(([key, value]) => {
                                    _optionListStyle += '<option value="' + value +
                                        '"> ' + value + ' </option>';
                                });
                            }
                            _targetStyle.html(_optionListStyle);
                        }
                        $(".select2").select2();
                    },
                    error: function(response) {
                        // Get errors
                        var errors = response.responseJSON.message;
                        console.log(errors);
                    }
                });
            });
        });
        $('#menu-sort').nestable({
            group: 0,
            maxDepth: 3,
        });
        $('.menu-sort-save').click(function() {
            $('#loading').show();
            let serialize = $('#menu-sort').nestable('serialize');
            let menu = JSON.stringify(serialize);
            $.ajax({
                    url: '{{ route('blocks.update_sort') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        menu: menu,
                        root_id: '{{ $detail->id ?? '0' }}',
                    },
                })
                .done(function(data) {
                    $('#loading').hide();
                    if (data.error == 0) {
                        // alert('Cập nhật thành công');
                        location.reload();
                    } else {
                        // alert("Cập nhật thất bại");
                        location.reload();
                    }
                });
        });
        $('.remove_menu').click(function() {
            if (confirm("@lang('confirm_action')")) {
                let _root = $(this).closest('.dd-item');
                let id = $(this).data('id');
                $.ajax({
                    method: 'post',
                    url: '{{ route('block.delete') }}',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        if (data.error == 1) {
                            alert(data.msg);
                        } else {
                            _root.remove();
                        }
                    }
                });
            }
        });
        var no_image_link = '{{ url('themes/admin/img/no_image.jpg') }}';

        $('.add-gallery-image').click(function(event) {
            let keyRandom = new Date().getTime();
            let elementParent = $('.list-gallery-image');
            let elementAppend =
                '<div class="col-lg-3 col-md-3 col-sm-4 mb-1 gallery-image my-15">';
            elementAppend += '<div id="image-holder_' + keyRandom + '" style="width: 150px; height: 150px;"><img width="150px" height="150px" class="img-width" ';
            elementAppend += 'src="' + no_image_link + '"> </div>';
            elementAppend +=
                '<input type="text" name="json_params[gallery_image][]" class="hidden" id="gallery_image_' +
                keyRandom +
                '">';
            elementAppend += '<div class="btn-action">';
            elementAppend +=
                '<span class="btn btn-sm btn-success btn-upload lfm mr-5" data-input="gallery_image_' +
                keyRandom +
                '" data-type="cms-image" data-preview="image-holder_' + keyRandom + '">';
            elementAppend += '<i class="fa fa-upload"></i>';
            elementAppend += '</span>';
            elementAppend += '<span class="btn btn-sm btn-danger btn-remove">';
            elementAppend += '<i class="fa fa-trash"></i>';
            elementAppend += '</span>';
            elementAppend += '</div>';
            elementParent.append(elementAppend);

            $('.lfm').filemanager('image', {
                prefix: route_prefix
            });
        });
        // Change image for img tag gallery-image
        $('.list-gallery-image').on('change', 'input', function() {
            let _root = $(this).closest('.gallery-image');
            var img_path = $(this).val();
            _root.find('img').attr('src', img_path);
        });

        // Delete image
        $('.list-gallery-image').on('click', '.btn-remove', function() {
            // if (confirm("@lang('confirm_action')")) {
            let _root = $(this).closest('.gallery-image');
            _root.remove();
            // }
        });

        $('.list-gallery-image').on('mouseover', '.gallery-image', function(e) {
            $(this).find('.btn-action').show();
        });
        $('.list-gallery-image').on('mouseout', '.gallery-image', function(e) {
            $(this).find('.btn-action').hide();
        });
    </script>
@endsection
