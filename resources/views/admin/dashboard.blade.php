<?php
    use App\Common\BeatsCityCommon;
    use App\Common\Utils;
?>
@extends('layouts.master')
@section('title', 'Events Listing')
{{--@section('body.breadcrumbs')--}}
{{--{{ Breadcrumbs::render('dashboard') }}--}}
{{--@stop--}}
@section('styles')
    <link href="{{asset('css/jquery.scrollbar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/home.css')}}" rel="stylesheet" type="text/css">
@stop
@section('javascript')
    <script>
        $(document).ready(function() {
            $('.event-item').mouseenter(function(){
                $(this).addClass('background-mouse-enter');
                $(this).find('.item-descript1').removeClass('des-detail');
            });
            $('.event-item').mouseleave(function(){
                $(this).removeClass('background-mouse-enter');
                $(this).find('.item-descript1').addClass('des-detail');
            });
        });
    </script>
@stop
@section('content')
    <!-- Main row -->
    <div class="box box-list">
        <div class="row dashboard">
            <div class="box-header clearfix">
                <h3 class="box-title">@yield('title')</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    @foreach($listEvent as $eventItem)
                        <div class="col-xs-6">
                            <div class="col-xs-12 event-item well">
                                <div class="date-content">
                                    <div class="big-calendar-icon">
                                        <div class="day">
                                            {{BeatsCityCommon::getDayOnDate($eventItem->created_at)}}
                                        </div>
                                        <div class="month">
                                            {{BeatsCityCommon::getMonthOnDate($eventItem->created_at)}}
                                        </div>

                                    </div>
                                    <span style="font-size: 11px;clear: both; margin-top: 5px;color: #080808; white-space: nowrap; display: block; margin-top: 5px;">
                                    {{BeatsCityCommon::dateFormat($eventItem->created_at,'h:i')}}
                                </span>
                                </div>
                                <div class="image-content">
                                    <div class="img-wrap">
                                        <a title="{{$eventItem->title}}"
                                           href="#">
                                            <img class="item-thumb1"
                                                 src="{{asset(Utils::$PATH__IMAGE)}}/{{$eventItem->image}}"
                                                 alt="{{$eventItem->title}}">
                                        </a>
                                    </div>
                                    <div class="industry-line">
                                        Venue: <a title="Tourism / Hospitality / Entertainment / Travel" class="vtip greyout"
                                                  href="#">{{$eventItem->venue_name}}</a>
                                    </div>
                                    <div class="type-line">
                                        Venue Type: <a title="Exhibitions" class="vtip greyout"
                                                       href="#">{{$eventItem->venue_type_name}}</a>
                                    </div>
                                </div>
                                <div class="des-content">
                                    <h4>
                                        <a class="item-title1"
                                           href="#"
                                           title="{{$eventItem->title}}">
                                            {{$eventItem->title}} </a>
                                    </h4>
                                    <p class="item-descript1 des-detail">
                                        {{$eventItem->description_text}}
                                    </p>
                                    <p class="des-place">
                                        <a class="blue" href="#"
                                           title="{{$eventItem->sub_title}}">
                                            {{$eventItem->sub_title}} </a>
                                    </p>
                                </div>
                                <div class="gobtn share-content">
                                    @foreach($eventItem->actions as $action)
                                        @if($action['action_name'] == \App\Common\Utils::$ACTION_NAME_IM_GOING)
                                            <a rev="" class="sharebtn button-silver-style green-check btn" href="javascript:void(0)"
                                               rel="international-travel-expo-ho-chi-minh-city-2018-september-6th-2018">
                                                I'm going
                                            </a>
                                        @endif
                                        @if($action['action_name'] == \App\Common\Utils::$ACTION_NAME_POST_VIDEO_INSTAGRAM)
                                            <a rev="" class="sharebtn button-silver-style green-check btn" href="javascript:void(0)"
                                               rel="international-travel-expo-ho-chi-minh-city-2018-september-6th-2018">
                                                Post video Instagram
                                            </a>
                                        @endif
                                        @if($action['action_name'] == \App\Common\Utils::$ACTION_NAME_POST_VIDEO_BEATS_CITY)
                                            <a rev="" class="sharebtn button-silver-style green-check btn" href="javascript:void(0)"
                                               rel="international-travel-expo-ho-chi-minh-city-2018-september-6th-2018">
                                                Post video Beats City
                                            </a>
                                        @endif
                                        @if($action['action_name'] == \App\Common\Utils::$ACTION_NAME_SHARE_INSTAGRAM)
                                            <a class="fb-share-btn button-silver-style share-button btn" href="javascript:void(0)"
                                               rel="1">
                                                <i class="fa fa-instagram pull-left pull-left"></i>Share
                                            </a>
                                        @endif
                                        @if($action['action_name'] == \App\Common\Utils::$ACTION_NAME_SHARE_FB)
                                            <a class="fb-share-btn button-silver-style share-button btn" href="javascript:void(0)"
                                               rel="1">
                                                <i class="fa fa-facebook-square pull-left"></i>Share
                                            </a>
                                        @endif

                                    @endforeach


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
