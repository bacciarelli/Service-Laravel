@extends('admin.admin_template')
@section('content')
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('Complaints list')</h3>
                <div class="btn-group" style="margin-bottom: 10px">
                    <a href="{{route('admin.complaints.create')}}">
                        <button type="button" class="btn btn-info" style="margin-left: 10px;">@lang('Add new complaint')</button>
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="search" class="form-control" placeholder="@lang('search by number')">
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body content">

            </div>
        </div>
    </section>
@stop