<?php
use App\Common\Common;
use App\Common\Utils;
$auth = Auth::user();
//$authInfo = Common::userInfo($auth->id);
?>
<aside class="main-sidebar">
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img @if($auth->image_profile) src="{{$auth->image_profile}}" @else src="{{asset(Utils::$PATH__DEFAULT__AVATAR)}}" @endif class="img-circle" alt="{{$auth->username}} Avatar">
                {{--<img src="{{asset(Utils::$PATH__IMAGE)}}/1536166244.png" class="img-circle"/>--}}
            </div>
            <div class="pull-left info">
                <p>@if($auth->fullname) {{ $auth->fullname }} @else {{ $auth->username }} @endif</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ (Request::is('*dashboard*') || Request::is('/') ? 'active' : '') }}">
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-home"></i><span>HOME</span>
                </a>
            </li>
            <li class="{{ (Request::is('*venue-type*') ? 'active' : '') }}">
                <a href="{{route('venue_type.index')}}"><i class="fa fa-street-view"></i><span>Venue Type</span></a>
            </li>
            <li class="{{ (Request::is('*venues*') ? 'active' : '') }}">
                <a href="{{route('venue.index')}}"><i class="fa fa-eye"></i><span>Venues</span></a>
            </li>
            <li class="{{ (Request::is('*events*') ? 'active' : '') }}">
                <a href='{{route('event.index')}}'><i class="fa fa-users"></i><span>Events</span></a>
            </li>
            {{--Product--}}
            <li class="{{ (Request::is('*actions*') ? 'active' : '') }}">
                <a href="{{route('action.index')}}"><i class="fa fa-shield"></i><span>Actions</span></a>
            </li>
            <li class="{{ (Request::is('*event-beat*') ? 'active' : '') }}">
                <a href="{{route('event_beat.index')}}"><i class="fa fa-calendar" aria-hidden="true"></i><span>Event Beats</span></a>
            </li>


        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
