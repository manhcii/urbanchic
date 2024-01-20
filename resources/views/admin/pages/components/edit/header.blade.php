@extends('admin.layouts.app')
@section('style')
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
@endsection
@php
    if (Request::get('lang') == $languageDefault->lang_locale || Request::get('lang') == '') {
        $lang = $languageDefault->lang_locale;
    } else {
        $lang = Request::get('lang');
    }
@endphp
@section('title')
    {{ $module_name }}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $module_name }}
            <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2) . '.create') }}">
                <i class="fa fa-plus"></i> @lang('Add')
            </a>
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
                    <div class="collapse navbar-collapse pull-right">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-language"></i>
                                    {{ Request::get('lang') && Request::get('lang') != $languageDefault->lang_code
                                        ? $languages->first(function ($item, $key) use ($lang) {
                                            return $item->lang_code == $lang;
                                        })['lang_name']
                                        : $languageDefault->lang_name }}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach ($languages as $item)
                                        @if ($item->lang_code != $languageDefault->lang_code)
                                            <li>
                                                <a href="{{ route(Request::segment(2) . '.edit', $detail->id) }}?lang={{ $item->lang_locale }}"
                                                    style="padding-top:10px; padding-bottom:10px;">
                                                    <i class="fa fa-language"></i>
                                                    {{ $item->lang_name }}
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route(Request::segment(2) . '.edit', $detail->id) }}"
                                                    style="padding-top:10px; padding-bottom:10px;">
                                                    <i class="fa fa-language"></i>
                                                    {{ $item->lang_name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <span class="pull-right" style="padding: 15px">@lang('Language'): </span>
                @endisset
            </div>
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
                        <a class="btn btn-success btn-sm pull-right" href="{{ route(Request::segment(2) . '.index') }}">
                            <i class="fa fa-bars"></i> @lang('List')
                        </a>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <form role="form" action="{{ route(Request::segment(2) . '.update', $detail->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                @if (Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale)
                                    <input type="hidden" name="lang" value="{{ Request::get('lang') }}">
                                @endif
                                <div class=" d-flex-wap">
                                    <div class="col-xs-12 col-md-6">
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

                                    @isset($component_configs)
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Layout')</label>
                                                <select name="json_params[layout]" id="component_layout"
                                                    class="form-control select2" style="width: 100%">
                                                    <option value="">@lang('Please select')</option>
                                                    @foreach ($component_configs as $item)
                                                        @if ($item->component_code == $detail->component_code)
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
                                    @endisset
                                    @isset($component_configs)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Style')</label>
                                                <select name="json_params[style]" id="component_style"
                                                    class="form-control select2" style="width: 100%">
                                                    <option value="">@lang('Please select')</option>
                                                    @foreach ($component_configs as $item)
                                                        @if ($item->component_code == $detail->component_code)
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
                                    @endisset
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Order')</label>
                                            <input type="number" class="form-control" name="iorder"
                                                placeholder="@lang('Order')"
                                                value="{{ old('iorder') ?? $detail->iorder }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
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

                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group">
                                            <label>@lang('Brief')</label>
                                            <textarea name="brief" id="brief" class="form-control" rows="5">{{ old('brief') ?? ($detail->json_params->brief->$lang ?? $detail->brief) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-12">
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
                                    <div class="col-xs-12 col-md-12">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-floppy-o"></i>
                                            @lang('Save')
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                                </div>

                                <div class="col-xs-12 col-md-6 box-body">
                                    <div class="box box-primary ">
                                        <form action="{{ route(Request::segment(2) . '.store') }}" method="POST"
                                            class="form-component" id="form-main" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="parent_id" value="{{ $detail->id }}">
                                            @if (Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale)
                                                <input type="hidden" name="lang" value="{{ Request::get('lang') }}">
                                            @endif
                                            <div class="box-header with-border">
                                                <h3 class="box-title" id="item-title">
                                                    @lang('Add new item to component')
                                                </h3>
                                            </div>
                                            <div class=" d-flex-wap">

                                                <div class="col-xs-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>
                                                            @lang('Title')
                                                            <small class="text-red">*</small>
                                                        </label>
                                                        <input type="text" class="form-control" name="title"
                                                            placeholder="@lang('Title')"
                                                            value="{{ old('title') ?? '' }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>@lang('Status')</label>
                                                        <div class="form-control">
                                                            @foreach (App\Consts::STATUS as $key => $value)
                                                                <label>
                                                                    <input type="radio" name="status"
                                                                        value="{{ $value }}"
                                                                        {{ $loop->index == 0 ? 'checked' : '' }}>
                                                                    <small class="mr-15">{{ __($value) }}</small>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-md-12">
                                                    <div class="form-group">
                                                        <label>@lang('Brief')</label>
                                                        <textarea row="3" class="form-control" id="item-brief" placeholder="@lang('Brief')" name="brief">{{ old('brief') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>@lang('Url redirect')</label>
                                                        <input type="text" class="form-control" id="item-url_link"
                                                            placeholder="@lang('Url redirect')" name="json_params[url_link]"
                                                            value="{{ old('json_params[url_link]') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>@lang('Url redirect title')</label>
                                                        <input type="text" class="form-control"
                                                            id="item-url_link_title" placeholder="@lang('Url redirect title')"
                                                            name="json_params[url_link_title]"
                                                            value="{{ old('json_params[url_link_title][' . $lang . ']') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="item-image">
                                                            @lang('Image')
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <a data-input="image_child" data-preview="image-holder_child"
                                                                    class="btn btn-primary lfm" data-type="cms-image">
                                                                    <i class="fa fa-picture-o"></i> @lang('Select')
                                                                </a>
                                                            </span>
                                                            <input id="image_child" class="form-control" type="text"
                                                                name="image" placeholder="@lang('Image source')"
                                                                value="{{ old('image') }}">
                                                        </div>
                                                        <div id="image-holder_child" style="margin-top:15px;max-height:100px;">
                                                            @if (old('image') != '')
                                                                <img style="height: 5rem;" src="{{ old('image') }}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-footer">

                                                <button type="submit" class="btn btn-success btn-sm submit_form">
                                                    @lang('Add new')
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">
                                                @lang('Component items')
                                            </h3>
                                        </div>
                                        <div class="box-body table-responsive">
                                            @if (count($items) > 0)
                                                <div class="box-body">
                                                    <div class="table-responsive">
                                                        <div class="dd" id="menu-sort">
                                                            <ol class="dd-list">
                                                                @foreach ($items as $item)
                                                                    <li class="dd-item dd3-item "
                                                                        data-id="{{ $item->id }}">
                                                                        <div class="dd-handle dd3-handle"></div>
                                                                        <div class="dd3-content">
                                                                            <span class="text float-start"
                                                                                data-update="title">{{ $item->json_params->title->$lang ?? $item->title }}</span>

                                                                            <a data-toggle="collapse"
                                                                                href="#item-details-{{ $item->id }}"
                                                                                role="button" aria-expanded="false"
                                                                                aria-controls="item-details-{{ $item->id }}"
                                                                                class="show-item-details">
                                                                                <i class="fa fa-angle-down"></i>
                                                                            </a>
                                                                            <div class="clearfix"></div>
                                                                        </div>

                                                                        <div class="item-details collapse multi-collapse"
                                                                            id="item-details-{{ $item->id }}">
                                                                            <form role="form"
                                                                                action="{{ route(Request::segment(2) . '.update', $item->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <input type="hidden" name="parent_id"
                                                                                    value="{{ $detail->id }}">
                                                                                @if (Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale)
                                                                                    <input type="hidden" name="lang"
                                                                                        value="{{ Request::get('lang') }}">
                                                                                @endif
                                                                                <div class="box-body">
                                                                                    <div class="nav-tabs-custom">
                                                                                        <div class="tab-content">
                                                                                            <div class="tab-pane active"
                                                                                                id="tab_1">
                                                                                                <div class="d-flex-wap">

                                                                                                    <div class="col-xs-12 col-md-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label>
                                                                                                                @lang('Title')
                                                                                                                <small
                                                                                                                    class="text-red">*</small>
                                                                                                            </label>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="title"
                                                                                                                placeholder="@lang('Title')"
                                                                                                                value="{{ old('title') ?? ($item->json_params->title->$lang ?? $item->title) }}"
                                                                                                                required>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-xs-12 col-md-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label>@lang('Status')</label>
                                                                                                            <div
                                                                                                                class="form-control">
                                                                                                                @foreach (App\Consts::STATUS as $key => $value)
                                                                                                                    <label>
                                                                                                                        <input
                                                                                                                            type="radio"
                                                                                                                            name="status"
                                                                                                                            value="{{ $value }}"
                                                                                                                            {{ $item->status == $value ? 'checked' : '' }}>
                                                                                                                        <small
                                                                                                                            class="mr-15">{{ __($value) }}</small>
                                                                                                                    </label>
                                                                                                                @endforeach
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-xs-12 col-md-12">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label>@lang('Brief')</label>
                                                                                                            <textarea name="brief" class="form-control" rows="5">{{ old('brief') ?? ($item->json_params->brief->{$lang} ?? $item->brief) }}</textarea>
                                                                                                        </div>
                                                                                                    </div>


                                                                                                    <div class="col-xs-12 col-md-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label>@lang('Url redirect')</label>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="json_params[url_link]"
                                                                                                                placeholder="@lang('Url redirect')"
                                                                                                                value="{{ old('json_params[url_link]') ?? $item->json_params->url_link }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-xs-12 col-md-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label>@lang('Url redirect title')</label>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="json_params[url_link_title]"
                                                                                                                placeholder="@lang('Url redirect title')"
                                                                                                                value="{{ old('json_params[url_link_title]') ?? ($item->json_params->url_link_title->$lang ?? $item->json_params->url_link_title) }}">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-xs-12 col-md-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label>@lang('Image')</label>
                                                                                                            <div
                                                                                                                class="input-group">
                                                                                                                <span
                                                                                                                    class="input-group-btn">
                                                                                                                    <a data-input="image{{ $item->id }}"
                                                                                                                        data-preview="image-holder{{ $item->id }}"
                                                                                                                        class="btn btn-primary lfm"
                                                                                                                        data-type="cms-image">
                                                                                                                        <i
                                                                                                                            class="fa fa-picture-o"></i>
                                                                                                                        @lang('Select')
                                                                                                                    </a>
                                                                                                                </span>
                                                                                                                <input
                                                                                                                    id="image{{ $item->id }}"
                                                                                                                    class="form-control"
                                                                                                                    type="text"
                                                                                                                    name="image"
                                                                                                                    value="{{ $item->image }}"
                                                                                                                    placeholder="@lang('Image source')">
                                                                                                            </div>
                                                                                                            <div id="image-holder{{ $item->id }}"
                                                                                                                style="margin-top:15px;max-height:100px;">
                                                                                                                @if ($item->image != '')
                                                                                                                    <img style="height: 5rem;"
                                                                                                                        src="{{ $item->image }}">
                                                                                                                @endif
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <div class="text-end mt-2">
                                                                                    <button
                                                                                        class="btn btn-primary btn-sm">@lang('Save')</button>
                                                                                    <p class="btn btn-danger remove_menu btn-sm"
                                                                                        data-id="{{ $item->id }}">
                                                                                        @lang('Remove') </p>

                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </li>
                                                                @endforeach
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <a class="btn btn-warning btn-flat menu-sort-save btn-sm"
                                                        title="@lang('Save')">
                                                        <i class="fa fa-floppy-o"></i>
                                                        @lang('Save sort')
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">

            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
