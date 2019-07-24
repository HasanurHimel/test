<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Himel Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    @yield('css')


    <link rel="stylesheet" href="{{ asset('/') }}backend/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->


    <link rel="stylesheet" href="{{ asset('/') }}backend/dist/css/skins/_all-skins.min.css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>HI</b>MEL</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Himel's </b> Dashboard</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('/') }}backend/dist/img/user2-160x160.jpeg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('/') }}backend/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('/') }}backend/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('/') }}backend/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>

                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('/') }}backend/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->


                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            @if(auth()->user()->unreadNotifications->count())
                            <span class="label label-success">{{ auth()->user()->unreadNotifications->count() }}</span>
                                @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have {{ auth()->user()->readNotifications->count() }} Notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">


                                    <!-- start message -->
                                    @foreach (auth()->user()->unreadNotifications   as $notification)
                                    <li style="background-color: #89E6C4;">
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('/') }}backend/dist/img/unreadnotification.png" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                {{ $notification->data['author_name'] }}
                                                <small><i class="fa fa-clock-o"></i> {{ $notification->created_at->diffForHumans() }}</small>
                                            </h4>
                                            <p>Created a Blog which title <span style="color: #1c94c4">{{ $notification->data['blog_title'] }}</span></p>
                                        </a>
                                    </li>
                                        {{ $notification->markAsRead() }}
                                    @endforeach
                                    @foreach (auth()->user()->readNotifications as $notification)
                                    <li>

                                        <a>
                                            <div class="pull-left">
                                                <img src="{{ asset('/') }}backend/dist/img/notification.png" class="img-circle" alt="User Image">

                                            </div>
                                            <h4>
                                                {{ $notification->data['author_name'] }}

                                            </h4>
                                            <p>Created a Blog which title <span style="color: #1b886f"><b>{{ $notification->data['blog_title'] }}</b></span></p>



                                        <small class="pull-right"><i class="fa fa-clock-o"></i> {{ $notification->created_at->diffForHumans() }}</small>
                                        </a>
                                    </li>

                                    @endforeach
                                    <!-- end message -->

                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Notifications</a></li>
                        </ul>
                    </li>


                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Admin Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('/') }}backend/dist/img/user2-160x160.jpeg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Admin image -->
                            <li class="user-header">
                                <img src="{{ asset('/') }}backend/dist/img/user2-160x160.jpeg" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->name }} - Web Developer
                                    <small>Admin since {{ auth()->user()->created_at->toFormattedDateString() }}</small>
                                </p>
                            </li>


                            <!-- Menu Footer-->


                            <li class="user-footer" style="background-color: #191f17ab">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-block btn-success btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-block btn-danger btn-flat">{{ __('Logout') }}</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


                                </div>
                            </li>

                            <li class="user-footer" style="background-color: #9f191f">

                                @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a href="{{ route('password.request') }}" class="btn btn-block btn-bitbucket btn-flat">{{ __('Change Your Password') }}</a>
                                    </div>
                                @endif




                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('/') }}backend/dist/img/user2-160x160.jpeg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    @foreach(auth()->user()->roles as $role)
                        <small ><i class="text-success"></i> {{ $role->name }}</small><br><br>
                    @endforeach
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>


                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->



            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>




                @can('seo.create', auth()->user())
        <li class="treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>SEO</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(\App\Models\Seo::find(1))
                            <li><a href="{{ route('seo.show', 2) }}"><i class="fa fa-circle-o"></i>Manage Seo essential</a></li>

                        @else
                            <li class="active"><a href="{{ route('seo.create') }}"><i class="fa fa-circle-o"></i> create Seo essential</a></li>
                            @endif
                    </ul>
                </li>
                @endcan

                <li class="treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Profile</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">

                        @can('profile.create', auth()->user())
                        <li class="active"><a href="{{ route('profile.create') }}"><i class="fa fa-circle-o"></i> Create Profile</a></li>
                        @endcan
                        @can('profile.view', auth()->user())
                        <li><a href="{{ route('profile.show', 1) }}"><i class="fa fa-circle-o"></i>Edit Profile</a></li>
                        @endcan
                    </ul>
               </li>

                <li class="treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Advertise</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">

{{--                        @can('profile.create', auth()->user())--}}
                        <li class="active"><a href="{{ route('ad-position.create') }}"><i class="fa fa-circle-o"></i> Create Ad position</a></li>
                        <li class="active"><a href="{{ route('ad-position.index') }}"><i class="fa fa-circle-o"></i> Manage Ad position</a></li>
                        <li class="active"><a href="{{ route('advertise.create') }}"><i class="fa fa-circle-o"></i> Create advertise</a></li>
{{--                        @endcan--}}
{{--                        @can('profile.view', auth()->user())--}}
                        <li><a href="{{ route('advertise.index') }}"><i class="fa fa-circle-o"></i>Manage Advertise</a></li>
{{--                        @endcan--}}
                    </ul>
               </li>

                @can('profile.create', auth()->user())
                <li class="treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Notice</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">


                        @if(\App\Models\Notice::find(1))

                            <li><a href="{{ route('notice.show', 1) }}"><i class="fa fa-circle-o"></i>Manage Notice</a></li>

                        @else

                            <li class="active"><a href="{{ route('notice.create') }}"><i class="fa fa-circle-o"></i> Create Notice</a></li>



                            @endif
                    </ul>
               </li>
                @endcan


                @can('admins.create',auth()->user())
                    <li class="treeview menu-open">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>New Admin</span>
                            <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.create') }}"><i class="glyphicon glyphicon-forward"></i> Admin Create</a></li>
                            <li class="active"><a href="{{ route('admin.index') }}"><i class="glyphicon glyphicon-forward"></i> Admin Manage</a></li>
                        </ul>
                    </li>
                @endcan



                @can('admins.create',auth()->user())
                <li class="treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Admin Role</span>
                        <span class="pull-right-container">
                       <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="{{ route('permission-for.index') }}"><i class="glyphicon glyphicon-forward"></i>Admin Permission-for</a></li>
                        <li class="active"><a href="{{ route('permission.index') }}"><i class="glyphicon glyphicon-forward"></i>Admin Permission</a></li>
                        <li><a href="{{ route('role.index') }}"><i class="glyphicon glyphicon-forward"></i>Admin Role</a></li>
                    </ul>
                </li>
                @endcan



                @can('categories.create', auth()->user())
                <li class="treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Category</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('category.create') }}"><i class="fa fa-circle-o"></i> Category Create</a></li>
                        <li class="active"><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Category Manage</a></li>
                    </ul>
                </li>
                @endcan


                @can('sub_categories.create', auth()->user())
                <li class="treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Sub-Category</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('subCategory.create') }}"><i class="fa fa-circle-o"></i> Sub-Category Create</a></li>
                        <li class="active"><a href="{{ route('subCategory.index') }}"><i class="fa fa-circle-o"></i> Sub-Category Manage</a></li>
                    </ul>
                </li>

                @endcan

                @can('carousels.create', auth()->user())
                <li class="treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Carousel Photo</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('carousel.create') }}"><i class="glyphicon glyphicon-forward"></i> Carousel Create</a></li>
                        <li class="active"><a href="{{ route('carousel.index') }}"><i class="glyphicon glyphicon-forward"></i> Carousel Manage</a></li>
                    </ul>
                </li>
                @endcan


                @can('blogs.viewAny', auth()->user())
                <li class="treeview menu-open">

                    <a href="#">
                        <i class="fa fa-dashboard"></i><span>Blog</span>
                        <span class="pull-right-container">
                       <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>

                    <ul class="treeview-menu">
                        @can('blogs.create', auth()->user())
                        <li><a href="{{ route('blog-section.index') }}"><i class="glyphicon glyphicon-forward"></i> Blog Section</a></li>
                        <li><a href="{{ route('blog.create') }}"><i class="glyphicon glyphicon-forward"></i> Blog Create</a></li>
                        @endcan
                            @can('blogs.viewAny', auth()->user())
                            <li class="active"><a href="{{ route('blog.index') }}"><i class="glyphicon glyphicon-forward"></i> Blog Manage</a></li>
                            @endcan
                    </ul>
                </li>
                @endcan






                @can('photographies.create', auth()->user())
                <li class="treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Photography</span>
                        <span class="pull-right-container">
                       <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('photography.create') }}"><i class="glyphicon glyphicon-forward"></i> Photo Create</a></li>
                        <li class="active"><a href="{{ route('photography.index') }}"><i class="glyphicon glyphicon-forward"></i> Photo Manage</a></li>
                    </ul>
                </li>
                @endcan




                <li>
                    <a href="#">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                        <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
                    </a>
                </li>



                <li>
                    <a href="#">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                        <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
                    </a>
                </li>




                <li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->





    @yield('content')






    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Designer &copy; <a href="#">By Himel</a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->

            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="{{ asset('/') }}backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/') }}backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('/') }}backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}backend/dist/js/adminlte.min.js"></script>




<!-- Sparkline -->
<script src="{{ asset('/') }}backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="{{ asset('/') }}backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="{{ asset('/') }}backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('/') }}backend/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/') }}backend/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/') }}backend/dist/js/demo.js"></script>

@yield('js')

</body>
</html>
