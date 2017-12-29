@extends('admin.admin_template')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Add new model')</h3>
        </div>
        <!-- form start -->
        <form role="form" method="post" action="{{route('admin.device-models.store')}}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label>@lang('Select type')</label>
                    {!! Form::select('type_id', $types, null, ['class' => 'form-control select2', 'placeholder' => trans('Select type')]) !!}
                </div>
                <div class="form-group">
                    <label>@lang('Model name')</label>
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('Model name')]) }}
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('Add')</button>
            </div>
        </form>
    </div>
@stop