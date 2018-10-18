@extends('layouts.master')
@section('title', 'Action Detail')
@section('body.breadcrumbs')
    {{--{{ Breadcrumbs::render('regions.create') }}--}}
@stop
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('title')</h3>
            <span class="group__action pull-right">
                <a href="{{route('action.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
                <a href="{{route('action.edit', $action->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a>
                <a data-toggle="modal" data-target="#popup-confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </span>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-10 col-lg-12">
                    <p class="text-muted">
                        <strong><i class="fa fa-shield margin-r-5"></i> Action Name: </strong>
                        {{$action->name}}
                    </p>
                </div>
                <div class="col-lg-10 col-lg-12">
                    <p class="text-muted">
                        <strong><i class="fa fa-audio-description margin-r-5"></i> Description: </strong>
                        {{$action->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @include('inc.popup-confirm-delete',['id' => $action->id, 'name' => $action->name,'route_delete' => 'action.delete'])
@endsection
