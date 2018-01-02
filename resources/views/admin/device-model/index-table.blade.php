<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th> @lang('Model name') </th>
        <th> @lang('Model type') </th>
        <th style="width: 200px"> @lang('Actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($deviceModels as $model)
        <tr>
            <td> {{ $model->name }} </td>
            <td> {{ $model->type->name }} </td>
            <td>
                <a href="{{route('admin.device-models.edit', ['id' => $model->id])}}"
                   class="btn btn-warning btn-sm">@lang('Edit')</a>
                {{ Form::open(['method' => 'DELETE', 'id' => $model->id, 'style' => "display: inline", 'route' => ['admin.device-models.destroy', $model->id]]) }}
                {{ Form::button(trans('Delete'), ['class' => "btn btn-danger btn-sm submit", 'data-formId' => $model->id, 'data-toggle' => "modal", 'data-target' => "#myModal"]) }}
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-10">
        <div>
            @lang('Total results:') <strong>{{$deviceModels->total()}}</strong>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-10">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{$deviceModels->links()}}
        </div>
    </div>
</div>
