
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Edit brand')</h3>
        </div>
        <!-- form start -->
        <form role="form" method="post" action="{{route('admin.brands.update', $brand->id)}}">
            <input name="_method" type="hidden" value="PUT">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label>@lang('Brand name')</label>
                    {{ Form::text('name', $brand->name, ['class' => 'form-control', 'placeholder' => trans('Brand name')]) }}
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
