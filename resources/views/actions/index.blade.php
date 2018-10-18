<?php ?>
@extends('layouts.master')
@section('title', 'List Action')
@section('javascript')
    <script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/admin/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#viewList').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                'order': [],
                'columnDefs': [ { orderable: false, targets: [0]}]
            })
        });
    </script>
@stop
@section('body.breadcrumbs')
    {{--{{ Breadcrumbs::render('gifts') }}--}}
@stop
@section('content')
    <div class="box box-list">
        <div class="box-header clearfix">
            <h3 class="box-title">@yield('title')</h3>
            <a href="{{route('action.create')}}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New Action</a>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div>
                <br />
            @endif
            <div class="table-responsive">
                <table id="viewList" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Action Name</th>
                        <th>Description</th>
                        <th>Create Date</th>
                        <th>Update Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i= 0; ?>
                    @foreach($actions as $action)
                        <?php $i++ ?>
                        <tr>
                            <td width="40" align="center"><?php echo $i?></td>
                            <td>
                                {{$action->name}}
                            </td>
                            <td>
                                {{$action->description}}
                            </td>
                            <td>
                                {{$action->created_at}}
                            </td>
                            <td>
                                {{$action->updated_at}}
                            </td>
                            <td class="actions text-center" style="width: 100px">
                                <a href="{{route('action.show',['id' => $action->id])}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>
                                <a href="{{route('action.edit',['id'=>$action->id])}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    {{--<tfoot>--}}
                    {{--<tr>--}}
                        {{--<th>No.</th>--}}
                        {{--<th>Venue Type Name</th>--}}
                        {{--<th>Create Date</th>--}}
                        {{--<th>Update Date</th>--}}
                        {{--<th>Actions</th>--}}
                    {{--</tr>--}}
                    {{--</tfoot>--}}
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
