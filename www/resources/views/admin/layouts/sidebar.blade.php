<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{route('root')}}" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{--                <li>--}}
                {{--                    <a href="javascript: void(0);" class="waves-effect">--}}
                {{--                        <i class="mdi mdi-airplay"></i><span class="badge badge-pill badge-info float-right">2</span>--}}
                {{--                        <span>Dashboard</span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="sub-menu" aria-expanded="false">--}}
                {{--                        <li><a href="index">Dashboard 1</a></li>--}}
                {{--                        <li><a href="index-2">Dashboard 2</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}



                @can('setting.index')
                    <li class="menu-title">Settings</li>
                    @can('usermanagements.index')
                        <li>
                            <a href="{{route('usermanagements.index')}}" class="waves-effect">
                                <i class="mdi mdi-account"></i>
                                <span>Users</span>
                            </a>
                        </li>
                    @endcan
                    @can('roles.index')
                        <li>
                            <a href="{{route('roles.index')}}" class="waves-effect">
                                <i class="bx bx-user-circle"></i>
                                <span>Role</span>
                            </a>
                        </li>
                    @endcan
                    @can('emailtemplate.index')
                        <li>
                            <a href="{{route('emailtemplate.index')}}" class="waves-effect">
                                <i class="mdi mdi-email"></i>
                                <span>Email Template</span>
                            </a>
                        </li>
                    @endcan
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
