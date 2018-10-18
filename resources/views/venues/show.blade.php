<?php
use App\Common\Common;
use App\Common\Utils;
?>
@extends('layouts.master')
@section('title', 'Venue detail')
@section('javascript')
@stop
@section('body.breadcrumbs')
    {{--{{ Breadcrumbs::render('tipsters.show') }}--}}
@stop
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-push-8">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="upload__area-image">
                        <span><img id="imgHandle" src="@if($venue->image){{asset(Utils::$PATH__IMAGE)}}/{{$venue->image}}@endif"></span>
                    </div>
                    <p class="text-muted text-center" title="{{$venue->name}}">
                        <strong><i class="fa fa-user margin-r-5"></i> Image</strong>
                    </p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8 col-md-pull-4">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                    <span class="group__action pull-right">
                        <a href="{{route('venue.index')}}" class="btn btn-xs btn-default"><i class="fa fa-angle-left"></i> Back to list</a>
                        <a href="{{route('venue.edit', $venue->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a>
                        <a data-toggle="modal" data-target="#popup-confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    </span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row box-line">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-address-book margin-r-5"></i> Full Name
                                <span class="text-highlight">{{ $venue->name }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-building margin-r-5"></i> Venue Type
                                <span class="text-highlight">{{$venue->venue_type_name}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="row box-line">
                        <div class="col-sm-6">

                            <p class="text-muted">
                                <i class="fa fa-map-marker margin-r-5"></i> Address
                                <span class="text-highlight">{{$venue->address}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-address-card margin-r-5"></i> Ward
                                <span class="text-highlight">{{$venue->ward}}</span>
                            </p>
                        </div>
                    </div>

                    <div class="row box-line">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-address-card-o margin-r-5"></i> District
                                <span class="text-highlight">{{$venue->district}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-eercast margin-r-5"></i> City
                                <span class="text-highlight">{{$venue->city}}</span>
                            </p>
                        </div>
                    </div>

                    <div class="row box-line">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-globe margin-r-5"></i> Longitude
                                <span class="text-highlight">{{$venue->long}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-clock-o margin-r-5"></i> Latitude
                                <span class="text-highlight">{{$venue->lat}}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    {{--popup confirm--}}
    @include('inc.popup-confirm-delete',['id' => $venue->id, 'name' => $venue->name,'route_delete' => 'venue.delete'])
@endsection