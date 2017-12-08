
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th> @lang('Brand name') </th>
                        <th  style="width: 200px"> @lang('Actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td> {{ $brand->name }} </td>
                            <td>
                                <a href="{{route('admin.brands.edit', ['id' => $brand->id])}}"
                                   class="btn btn-warning btn-sm">@lang('Edit')</a>
                                {{ Form::open(['method' => 'DELETE', 'id' => $brand->id, 'style' => "display: inline", 'route' => ['admin.brands.destroy', $brand->id]]) }}
                                {{ Form::button(trans('Delete'), ['class' => "btn btn-danger btn-sm submit", 'data-formId' => $brand->id, 'data-toggle' => "modal", 'data-target' => "#myModal"]) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-10">
                        <div>
                            @lang('Total resaults:') <strong>{{$brands->total()}}</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            {{$brands->links()}}
                        </div>
                    </div>
                </div>
