<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th> @lang('Complaint number') </th>
        <th> @lang('Client') </th>
        <th> @lang('Brand') </th>
        <th> @lang('Type') </th>
        <th> @lang('Model') </th>
        <th style="width: 200px"> @lang('Actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($complaints as $complaint)
        <tr>
            <td> {{ $complaint->number }} </td>
            <td> {{ $complaint->client->name }} </td>
            <td> {{ $complaint->brand->name }} </td>
            <td> {{ $complaint->deviceModel->type->name }} </td>
            <td> {{ $complaint->deviceModel->name }} </td>
            <td>
                <a href="{{route('admin.complaints.edit', ['id' => $complaint->id])}}" class="btn btn-warning btn-sm">
                    @lang('Edit')
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-10">
        <div>
            @lang('Total results:') <strong>{{$complaints->total()}}</strong>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-10">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{$complaints->links()}}
        </div>
    </div>
</div>
