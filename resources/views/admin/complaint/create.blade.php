@extends('admin.admin_template')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Add new complaint')</h3>
        </div>
        <!-- form start -->
        <form role="form" method="post" action="{{route('admin.complaints.store')}}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label>@lang('Complaint number')</label>
                    {{ Form::text('number', null, ['id' => 'complaint-number', 'class' => 'form-control', 'placeholder' => trans('Complaint number')]) }}
                </div>
                <div class="form-group">
                    <label>@lang('Select client')</label>
                    {!! Form::select('client_id', $clients, null, ['id' => 'client_id', 'class' => 'form-control select2', 'placeholder' => trans('Select client')]) !!}
                </div>
                <div class="form-group">
                    <label>@lang('Select brand')</label>
                    {!! Form::select('brand_id', $brands, null, ['class' => 'form-control select2', 'placeholder' => trans('Select brand')]) !!}
                </div>
                <div class="form-group">
                    <label>@lang('Select type')</label>
                    {!! Form::select('type', $types, null, ['class' => 'form-control select2', 'id' => 'type-select', 'placeholder' => trans('Select type')]) !!}
                </div>
                <div class="form-group">
                    <label>@lang('Select device model')</label>
                    {!! Form::select('device_model_id', [], null, ['class' => 'form-control select2', 'placeholder' => trans('Select device model')]) !!}
                </div>
                <div class="form-group">
                    <label>@lang('Select complaint status')</label>
                    {!! Form::select('status', $statuses, null, ['class' => 'form-control select2', 'placeholder' => trans('Select complaint status')]) !!}
                </div>
                <div class="form-group">
                    <label>@lang('Fault description')</label>
                    {{ Form::textarea('fault_description', null, ['class' => 'form-control', 'placeholder' => trans('Fault description')]) }}
                </div>
                <div class="form-group">
                    <label>@lang('Notes')</label>
                    {{ Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => trans('Notes')]) }}
                </div>
                <div class="form-group">
                    <label>@lang('Repair description')</label>
                    {{ Form::textarea('repair_description', null, ['class' => 'form-control', 'placeholder' => trans('Repair description')]) }}
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('Add')</button>
            </div>
        </form>
    </div>
@stop