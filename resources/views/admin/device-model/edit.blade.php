
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Edit model')</h3>
        </div>
        <!-- form start -->
        <form role="form" method="post" action="{{route('admin.device-models.update', $model->id)}}">
            <input name="_method" type="hidden" value="PUT">
            {{ csrf_field() }}
            <div class="box-body">
                <div>
                    {!! Form::text('type_id', $types, $model->type_id, ['class' => 'form-control select2', 'placeholder' => trans('Select type')]) !!}
                </div>
                <div class="form-group">
                    <label>@lang('Model name')</label>
                    {{ Form::text('name', $model->name, ['class' => 'form-control', 'placeholder' => trans('Model name')]) }}
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('Edit')</button>
            </div>
        </form>
    </div>
