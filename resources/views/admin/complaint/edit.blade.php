<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">@lang('Edit complaint')</h3>
    </div>
    <!-- form start -->
    <form role="form" method="post" action="{{route('admin.complaints.update', $complaint->id)}}">
        <input name="_method" type="hidden" value="PUT">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <label>@lang('Complaint number')</label>
                {{--@TODO add js functionality of auto selecting client based on the entered number --}}
                {{ Form::text('number', $complaint->number, ['id' => 'complaint-number', 'class' => 'form-control', 'placeholder' => trans('Complaint number')]) }}
            </div>
            <div class="form-group">
                <label>@lang('Select client')</label>
                {!! Form::select('client_id', $clients, $complaint->client->name, ['class' => 'form-control select2', 'placeholder' => trans('Select client')]) !!}
            </div>
            <div class="form-group">
                <label>@lang('Select brand')</label>
                {!! Form::select('brand_id', $brands, $complaint->brand->name, ['class' => 'form-control select2', 'placeholder' => trans('Select brand')]) !!}
            </div>
            <div class="form-group">
                <label>@lang('Select device model')</label>
                {!! Form::select('device_model_id', $deviceModels, $complaint->deviceModel->name, ['class' => 'form-control select2', 'placeholder' => trans('Select device model')]) !!}
            </div>
            <div class="form-group">
                <label>@lang('Select complaint status')</label>
                {!! Form::select('status', $statuses, $complaint->status, ['class' => 'form-control select2', 'placeholder' => trans('Select complaint status')]) !!}
            </div>
            <div class="form-group">
                <label>@lang('Fault description')</label>
                {{ Form::textarea('fault_description', $complaint->fault_description, ['class' => 'form-control', 'placeholder' => trans('Fault description')]) }}
            </div>
            <div class="form-group">
                <label>@lang('Notes')</label>
                {{ Form::textarea('notes', $complaint->notes, ['class' => 'form-control', 'placeholder' => trans('Notes')]) }}
            </div>
            <div class="form-group">
                <label>@lang('Repair description')</label>
                {{ Form::textarea('repair_description', $complaint->repair_description, ['class' => 'form-control', 'placeholder' => trans('Repair description')]) }}
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">@lang('Edit')</button>
        </div>
    </form>
</div>
