<?php use App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Create Event')
@section('body.breadcrumbs')
    {{--{{ Breadcrumbs::render('leads.create') }}--}}
@stop
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="{{asset('css/admin/intlTelInput.css')}}">
@endsection

@section('javascript')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('js/admin/intlTelInput.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var date_input=$('input.date'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'dd/mm/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            });

            $("#phone").intlTelInput({
                allowDropdown: false,
                localizedCountries: {'de': 'Deutschland' },
                preferredCountries: ['vn', 'jp'],
                separateDialCode: true,
                utilsScript: "{{asset('js/admin/utils.js')}}"
            });
        })
    </script>
@endsection

@section('content')

    <form role="form" method="post" action="{{route('event.create')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <!-- create manager form -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">@yield('title')</h3>
                        <a href="{{route('event.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
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
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label>Title</label>
                                    <input name="title" value="{{old('title')}}" type="text" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                                    <label>Sub Title</label>
                                    <input name="sub_title" value="{{old('sub_title')}}" type="text" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('sub_title'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('sub_title') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('venue_id') ? ' has-error' : '' }}">
                                    <label>Venue</label>
                                    <select name="venue_id" class="form-control" required>
                                        <option value="" disabled selected>Please pick a venue type</option>
                                        @foreach($venues as $venue)
                                            <option value="{{$venue->id}}" @if(old('venue_id') == $venue->id) selected @endif>{{$venue->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('venue_id'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('venue_id') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group group__gender">
                                    <label style="width: 100%">Status</label>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="Public" name="status" checked>
                                            Public
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="Un Public" name="status">
                                            Un Public
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input class="form-control date" name="start_date" value="{{old('start_date')}}"
                                           placeholder="dd/mm/yyyyy" type="text" autocomplete="off" required/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input class="form-control date" name="end_date" value="{{old('end_date')}}"
                                           placeholder="dd/mm/yyyyy" type="text" autocomplete="off" required/>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter...." rows="5">{{old('description')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input id="imgHandleInput" name="image" type="file" value="">
                        <a href="{{route('event.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Create</button>
                    </div>
                </div>

                <!-- /.box -->
            </div>
            <div class="col-md-4">
                <!-- Profile Image -->
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="upload__area-image">
                        <span>
                            <img id="imgHandle" src="{{asset(Utils::$PATH__IMAGE)}}/no_image_available.jpg">
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
