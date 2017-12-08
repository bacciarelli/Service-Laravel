<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">@lang('Add new brand')</h3>
    </div>
    <!-- form start -->
    <form role="form" method="post" action="{{route('admin.brands.store')}}">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <label>@lang('Brand name')</label>
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Brand name']) }}
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">@lang('Add')</button>
        </div>
    </form>
</div>