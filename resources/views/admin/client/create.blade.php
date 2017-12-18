<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">@lang('Add new client')</h3>
    </div>
    <!-- form start -->
    <form role="form" method="post" action="{{route('admin.clients.store')}}">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <label>@lang('Client name')</label>
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('Client name')]) }}
            </div>
            <div class="form-group">
                <label>@lang('Client number')</label>
                {{ Form::text('number', null, ['class' => 'form-control', 'placeholder' => trans('Client number')]) }}
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">@lang('Add')</button>
        </div>
    </form>
</div>