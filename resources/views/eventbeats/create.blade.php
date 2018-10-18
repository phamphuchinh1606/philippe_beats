@extends('layouts.master')
@section('title', 'Create Event Beat')
@section('body.breadcrumbs')
    {{--{{ Breadcrumbs::render('regions.create') }}--}}
@stop
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('title')</h3>
            <a href="{{route('event_beat.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6 col-sm-push-3">
                    <form role="form" method="post" action="{{route('event_beat.create')}}" enctype = "multipart/form-data">
                        {{ csrf_field() }}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @if (count($errors) > 0)
                                    <strong>Whoops!</strong> There were some problems with your input.
                                @endif
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        <div class="form-group{{ $errors->has('event_id') ? ' has-error' : '' }}">
                            <label>Event</label>
                            <select name="event_id" class="form-control" required>
                                <option value="" disabled selected>Please pick a event</option>
                                @foreach($events as $event)
                                    <option value="{{$event->id}}" @if(old('event_id') == $event->id) selected @endif>{{$event->title}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('event_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('event_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('action_id') ? ' has-error' : '' }}">
                            <label>Action</label>
                            <select name="action_id" class="form-control" required>
                                <option value="" disabled selected>Please pick a action</option>
                                @foreach($actions as $action)
                                    <option value="{{$action->id}}" @if(old('action_id') == $action->id) selected @endif>{{$action->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('action_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('action_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('points') ? ' has-error' : '' }}">
                            <label>Point</label>
                            <input name="points" type="number" class="form-control" value="{{ old('points') }}" required autofocus style="width: 100px;" min="0" placeholder="Enter ...">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('points') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                            <label>Comments</label>
                            <textarea name="comments" class="form-control" placeholder="Enter..." rows="5">{{old('comments')}}</textarea>
                        </div>

                        <div class="form-action">
                            <a href="{{route('event_beat.index')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Create</button>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col -->

    </div>
    {{--@endif--}}
@endsection
