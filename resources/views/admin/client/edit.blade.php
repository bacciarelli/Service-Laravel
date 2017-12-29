@extends('admin.admin_template')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Edit client')</h3>
        </div>
        <!-- form start -->
        <form role="form" method="post" action="{{route('admin.clients.update', $client->id)}}">
            <input name="_method" type="hidden" value="PUT">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label>@lang('Client name')</label>
                    {{ Form::text('name', $client->name, ['class' => 'form-control', 'placeholder' => trans('Client name')]) }}
                </div>
                <div class="form-group">
                    <label>@lang('Client number')</label>
                    {{ Form::text('number', $client->number, ['class' => 'form-control', 'placeholder' => trans('Client number')]) }}
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('Edit')</button>
            </div>
        </form>
    </div>
@stop