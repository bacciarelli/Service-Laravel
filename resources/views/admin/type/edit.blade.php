
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Edit type')</h3>
        </div>
        <!-- form start -->
        <form role="form" method="post" action="{{route('admin.types.update', $type->id)}}">
            <input name="_method" type="hidden" value="PUT">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label>@lang('Type name')</label>
                    {{ Form::text('name', $type->name, ['class' => 'form-control', 'placeholder' => trans('Type name')]) }}
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('Edit')</button>
            </div>
        </form>
    </div>
