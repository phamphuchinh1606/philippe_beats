<?php use App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Edit Venue')
@section('body.breadcrumbs')
    {{--{{ Breadcrumbs::render('leads.create') }}--}}
@stop
@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/intlTelInput.css')}}">
@endsection

@section('javascript')
    <script src="{{asset('js/admin/intlTelInput.js')}}"></script>
    <script>
        $("#phone").intlTelInput({
            allowDropdown: false,
            localizedCountries: {'de': 'Deutschland' },
            preferredCountries: ['vn', 'jp'],
            separateDialCode: true,
            utilsScript: "{{asset('js/admin/utils.js')}}"
        });
        // $("#phone").on("countrychange", function(e, countryData) {
        //     console.log(e);
        //     console.log(countryData.dialCode);
        //     // $('#phone').val();
        // });
    </script>
@endsection

@section('content')

    <form role="form" method="post" action="{{route('venue.edit',['id' => $venue->id])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <!-- create manager form -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">@yield('title')</h3>
                        <a href="{{route('venue.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Full name</label>
                                    <input name="name" value="{{$venue->name}}" type="text" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('venue_type') ? ' has-error' : '' }}">
                                    <label>Venue Type</label>
                                    <select name="venue_type" class="form-control" required>
                                        <option value="" disabled selected>Please pick a venue type</option>
                                        @foreach($venueTypes as $venueType)
                                            <option value="{{$venueType->id}}" @if($venue->venue_type_id == $venueType->id) selected @endif>{{$venueType->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('venue_type'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('venue_type') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label>Address</label>
                                    <input name="address" value="{{$venue->address}}" type="text" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <!-- text input -->
                                {{--<div class="form-group{{ $errors->has('ward') ? ' has-error' : '' }}">--}}
                                {{--<label>Ward</label>--}}
                                {{--<select name="ward" class="form-control" required>--}}
                                {{--<option value="" disabled selected>Please pick a ward</option>--}}
                                {{--@foreach($regions as $region)--}}
                                {{--<option value="{{$region->id}}" @if(old('region') == $region->id) selected @endif>{{$region->name}}</option>--}}
                                {{--@endforeach--}}
                                {{--<option value="Quận 1" @if($venue->ward == 'Quận 1') selected @endif>Quận 1</option>--}}
                                {{--<option value="Quận 2" @if($venue->ward == 'Quận 2') selected @endif>Quận 2</option>--}}
                                {{--<option value="Quận 3" @if($venue->ward == 'Quận 3') selected @endif>Quận 3</option>--}}
                                {{--<option value="Quận 4" @if($venue->ward == 'Quận 4') selected @endif>Quận 4</option>--}}
                                {{--</select>--}}
                                {{--@if ($errors->has('ward'))--}}
                                {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('ward') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                                {{--</div>--}}
                                <div class="form-group{{ $errors->has('ward') ? ' has-error' : '' }}">
                                    <label>Ward</label>
                                    <input name="ward" value="{{$venue->ward}}" type="text" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('ward'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('ward') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                    <label>District</label>
                                    <select name="district" class="form-control" required>
                                        <option value="" disabled selected>Please pick a district</option>
                                        {{--@foreach($regions as $region)--}}
                                        {{--<option value="{{$region->id}}" @if(old('region') == $region->id) selected @endif>{{$region->name}}</option>--}}
                                        {{--@endforeach--}}
                                        <option value="Phường 1" @if($venue->district == 'Phường 1') selected @endif>Phường 1</option>
                                        <option value="Phường 2" @if($venue->district == 'Phường 2') selected @endif>Phường 2</option>
                                        <option value="Phường 3" @if($venue->district == 'Phường 3') selected @endif>Phường 3</option>
                                        <option value="Phường 4" @if($venue->district == 'Phường 4') selected @endif>Phường 4</option>
                                    </select>
                                    @if ($errors->has('district'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('district') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label>City</label>
                                    <select name="city" class="form-control" required>
                                        <option value="" disabled selected>Please pick a city</option>
                                        {{--@foreach($regions as $region)--}}
                                        {{--<option value="{{$region->id}}" @if(old('region') == $region->id) selected @endif>{{$region->name}}</option>--}}
                                        {{--@endforeach--}}
                                        <option value="Hồ Chí Minh" @if($venue->city == 'Hồ Chí Minh') selected @endif>Hồ Chí Minh</option>
                                        <option value="Hà Nội" @if($venue->city == 'Hà Nội') selected @endif>Hà Nội</option>
                                        <option value="Đà Nẵng" @if($venue->city == 'Đà Nẵng') selected @endif>Đà Nẵng</option>
                                        <option value="Cần Thơ" @if($venue->city == 'Cần Thơ') selected @endif>Cần Thơ</option>
                                    </select>
                                    @if ($errors->has('region'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('region') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                                    <label>Longitude</label>
                                    <input name="longitude" value="{{$venue->long}}" type="text" class="form-control" placeholder="Enter ..."
                                           required maxlength="20">
                                    @if ($errors->has('longitude'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('longitude') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                                    <label>Latitude</label>
                                    <input name="latitude" value="{{$venue->lat}}" type="text" class="form-control" placeholder="Enter ..."
                                           maxlength="20" required>
                                    @if ($errors->has('latitude'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('latitude') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input id="imgHandleInput" name="image" type="file" value="{{$venue->image}}">
                        <a href="{{route('venue.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                </div>

                <!-- /.box -->
            </div>
            <div class="col-md-4">
                <!-- Profile Image -->
                <div class="box box-warning">
                    <div class="box-body box-profile">
                        <div class="upload__area-image">
                        <span>
                            <img id="imgHandle" src="{{asset(Utils::$PATH__IMAGE)}}/{{$venue->image}}">
                            <label for="imgAnchorInput">Upload image</label>
                        </span>
                            <p><small>(Please upload a file of type: jpeg, png, jpg, gif, svg.)</small></p>
                        </div>
                        <div class="form__upload">
                            <form action="" enctype="multipart/form-data" method="post">
                                <div class="form-inline-simple">
                                    <input type="file" class="'form-control" id="imgAnchorInput" onchange="loadFile(event)">
                                    {{--{!! Form::file('image', array('class' => 'form-control', 'id' => 'imgAnchorInput', 'onchange' =>'loadFile(event)')) !!}--}}
                                    {{--<button type="submit" class="btn btn-info">Upload</button>--}}
                                </div>
                                <script>
                                    var loadFile = function(event) {
                                        var output = document.getElementById('imgHandle');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        document.getElementById('imgHandleInput').files = event.target.files;
                                    };
                                </script>

                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>

        </div>
    </form>
@endsection
