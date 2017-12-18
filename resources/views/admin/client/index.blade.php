@extends('admin.admin_template')
@section('content')
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('Clients list')</h3>
                <div class="btn-group" style="margin-bottom: 10px">
                    <a href="{{route('admin.clients.create')}}">
                        <button type="button" class="btn btn-info" style="margin-left: 10px;">@lang('Add new client')</button>
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="search" class="form-control" placeholder="@lang('search by name or number')">
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body content">

            </div>
        </div>
    </section>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">@lang('Delete client')</h4>
                </div>
                <div class="modal-body">
                    @lang('Are you sure?')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                        @lang('Close')
                    </button>
                    <button type="button" class="btn btn-danger pull-right" id="continuebtn">
                        @lang('Delete')
                    </button>

                </div>
            </div>
        </div>
    </div>
@stop