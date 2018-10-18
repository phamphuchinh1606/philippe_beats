<?php
use App\Common\Common;
use App\Common\Utils;
//use App\Model\Role;
use \Carbon\Carbon;
use \App\User;
$auth = Auth::user();
?>
<header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>BCY</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">BeatsCity</span>
    </a>

    <!-- Header Navbar -->
    <!-- Right Side Of Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                <!-- Messages: style can be found in dropdown.less-->
                {{--<li class="dropdown messages-menu">--}}
                    {{--<!-- Menu toggle button -->--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-envelope-o"></i>--}}
                        {{--<span class="label label-success">{{Common::getAmountNewMessage()}}</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li>--}}
                            {{--<!-- inner menu: contains the messages -->--}}
                            {{--<ul class="menu">--}}

                            {{--</ul>--}}
                            {{--<!-- /.menu -->--}}
                        {{--</li>--}}
                        {{--<li class="footer"><a href="{{route('messages.index')}}">See All Messages</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <!-- /.messages-menu -->

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="@if($auth->image_profile){{$auth->image_profile}}@else{{ asset(Utils::$PATH__DEFAULT__AVATAR) }}@endif" class="user-image" alt="{{$auth->username}}">
                        {{--<img src="{{ asset(Utils::$PATH__IMAGE) }}/1536166244.png" class="user-image" alt="{{$auth->fullname}}">--}}
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{$auth->username}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="@if($auth->image_profile){{$auth->image_profile}}@else{{asset(Utils::$PATH__DEFAULT__AVATAR)}}@endif" class="img-circle" alt="User Image">
                            {{--<img src="{{asset(Utils::$PATH__IMAGE) }}/1536166244.png" class="img-circle" alt="User Image">--}}
                            <p>
                                @if($auth->fullname) {{ $auth->fullname }} @else {{ $auth->username }} @endif
                                <small>Member since {{ Carbon::parse($auth->create_at)->format('F. Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                {{--<a href="{{route('users.show', $auth->id)}}" class="btn btn-default btn-flat">Profile</a>--}}
                                <a href="" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
