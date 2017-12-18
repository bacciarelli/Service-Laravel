<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th> @lang('Type name') </th>
        <th style="width: 200px"> @lang('Actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($types as $type)
        <tr>
            <td> {{ $type->name }} </td>
            <td>
                <a href="{{route('admin.types.edit', ['id' => $type->id])}}"
                   class="btn btn-warning btn-sm">@lang('Edit')</a>
                {{ Form::open(['method' => 'DELETE', 'id' => $type->id, 'style' => "display: inline", 'route' => ['admin.types.destroy', $type->id]]) }}
                {{ Form::button(trans('Delete'), ['class' => "btn btn-danger btn-sm submit", 'data-formId' => $type->id, 'data-toggle' => "modal", 'data-target' => "#myModal"]) }}
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-10">
        <div>
            @lang('Total results:') <strong>{{$types->total()}}</strong>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-10">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{$types->links()}}
        </div>
    </div>
</div>
