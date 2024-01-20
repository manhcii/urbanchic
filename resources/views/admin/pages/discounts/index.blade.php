@extends('admin.layouts.app')

@section('title')
  {{ $module_name }}
@endsection

@section('content-header')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $module_name }}
      <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2) . '.create') }}"><i
          class="fa fa-plus"></i> @lang('Add')</a>
    </h1>
  </section>
@endsection

@section('content')

  <!-- Main content -->
  <section class="content">
    {{-- Search form --}}
    <div class="box box-default">

      <div class="box-header with-border">
        <h3 class="box-title">@lang('Filter')</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <form action="{{ route(Request::segment(2) . '.index') }}" method="GET">
        <div class="box-body">
          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label>@lang('Keyword') </label>
                <input type="text" class="form-control" name="keyword" placeholder="@lang('keyword_note')"
                  value="{{ isset($params['keyword']) ? $params['keyword'] : '' }}">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>@lang('Status')</label>
                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                  <option value="">@lang('Please select')</option>
                  @foreach ($postStatus as $key => $value)
                    <option value="{{ $key }}"
                      {{ isset($params['status']) && $key == $params['status'] ? 'selected' : '' }}>
                      {{ __($value) }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>@lang('Filter')</label>
                <div>
                  <button type="submit" class="btn btn-primary btn-sm mr-10">@lang('Submit')</button>
                  <a class="btn btn-default btn-sm" href="{{ route(Request::segment(2) . '.index') }}">
                    @lang('Reset')
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    {{-- End search form --}}

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">@lang('List')</h3>
      </div>
      <div class="box-body table-responsive">
       <div class="content_alert">
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
        </div>

        @if (count($rows) == 0)
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @lang('not_found')
          </div>
        @else
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>@lang('Title')</th>
                <th>@lang('Code')</th>
                <th>@lang('Discount')</th>
                <th>@lang('Status')</th>
                <th>@lang('Action')</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($rows as $row)
                @if ($row->parent_id == 0 || $row->parent_id == null)
                  <form action="{{ route(Request::segment(2) . '.destroy', $row->id) }}" method="POST"
                    onsubmit="return confirm('@lang('confirm_action')')">
                    <tr class="valign-middle">
                      <td>
                        <strong style="font-size: 14px;">{{ $row->name }}</strong>
                      </td>
                     
                      <td>
                        {{ $row->coupon_code }}
                      </td>
                      <td>
                        {{ $row->discount }}{{ $row->coupon_type }}
                      </td>
                      <td>
                        <div class="box-header sw_featured d-flex-al-center">
                            <label class="switch ">
                                <input data-id="{{ $row->id }}" data-action="{{ route('status_coupon') }}" class="sw_featured_input" name="status" value="1" type="checkbox"
                                    {{ isset($row->status) && $row->status == 'active' ? 'checked' : '' }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                      </td>
                      <td>
                        <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="@lang('Update')"
                          data-original-title="@lang('Update')"
                          href="{{ route(Request::segment(2) . '.edit', $row->id) }}">
                          <i class="fa fa-pencil-square-o"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip"
                          title="@lang('Delete')" data-original-title="@lang('Delete')">
                          <i class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </form>
                @endif
              @endforeach
            </tbody>
          </table>
        @endif
      </div>

      <div class="box-footer clearfix">
        <div class="row">
          <div class="col-sm-5">
            Tìm thấy {{ $rows->total() }} kết quả
          </div>
          <div class="col-sm-7">
            {{ $rows->withQueryString()->links('admin.pagination.default') }}
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection

@section('script')
  <script>
    $('.sw_featured_input').change(function(){
      var id = $(this).attr('data-id');
      let _url = $(this).data('action');
      if ($(this).is(':checked')) var tt = 1;
      else var tt=2;
      $.ajax({
        method: 'post',
        url: _url,
        data: {
            tt:tt, 
            id:id,
            _token: '{{ csrf_token() }}',
        },
        success: function(data) {
          console.log(data.error);
            if (data.error == 0) {
                $(".content_alert").append('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" >&times;</button>'+data.msg+'</div>');
                setTimeout(function() {
                    $(".alert-success").fadeOut(1000, function() {});
                }, 2000);
            } else {
                alert(data.error);   
            }
        }
    });
    })
  </script>  
@endsection