<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th> @lang('Client name') </th>
        <th> @lang('Client number') </th>
        <th style="width: 200px"> @lang('Actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($clients as $client)
        <tr>
            <td> {{ $client->name }} </td>
            <td> {{ $client->number }} </td>
            <td>
                <a href="{{route('admin.clients.edit', ['id' => $client->id])}}"
                   class="btn btn-warning btn-sm">@lang('Edit')</a>
                {{ Form::open(['method' => 'DELETE', 'id' => $client->id, 'style' => "display: inline", 'route' => ['admin.clients.destroy', $client->id]]) }}
                {{ Form::button(trans('Delete'), ['class' => "btn btn-danger btn-sm submit", 'data-formId' => $client->id, 'data-toggle' => "modal", 'data-target' => "#myModal"]) }}
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-10">
        <div>
            @lang('Total results:') <strong>{{$clients->total()}}</strong>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-10">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{$clients->links()}}
        </div>
    </div>
</div>
