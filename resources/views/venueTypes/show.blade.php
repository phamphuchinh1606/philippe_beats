@extends('layouts.master')
@section('title', 'Venue Type Detail')
@section('body.breadcrumbs')
    {{--{{ Breadcrumbs::render('regions.create') }}--}}
@stop
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('title')</h3>
            <span class="group__action pull-right">
                <a href="{{route('venue_type.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
                <a href="{{route('venue_type.edit', $venueType->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a>
                <a data-toggle="modal" data-target="#popup-confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </span>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-10 col-lg-12">
                    <p class="text-muted">
                        <strong><i class="fa fa-shield margin-r-5"></i> Type Name: </strong>
                        {{$venueType->name}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @include('inc.popup-confirm-delete',['id' => $venueType->id, 'name' => $venueType->name,'route_delete' => 'venue_type.delete'])
@endsection
