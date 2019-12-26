<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HiliteUI Admin</title>
    <!-- base:css -->
    
    <link href="{{ url('frontend') }}/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset("") }}dist/css/bootstrap-select.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->

    <style>
        .ratting {
            width: 100%;
            height: auto;
            text-align: center;
            margin: 10px auto;
        }

        .ratting ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .ratting ul li {
            display: inline;
            padding: 0 2px;
        }

        .ratting ul li i {
            font-size: 18px;
            color: #f2b01e;
        }

.attorney-social {
    text-align: left;
    border-top: none;
    margin-top: -10px;
    padding: 0;
    padding-bottom: 5px;
    margin-bottom: 5px;
}

.attorney-social li {
    display: inline-block;
}
    </style>

    @stack('styles')
    
    <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png') }}" />
</head>

<body>
    <form id="csrf">
        @csrf
        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
    </form>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-left navbar-brand-wrapper d-flex align-items-center justify-content-between">
                <a class="navbar-brand brand-logo" href="{{ url('/') }}"><img src="http://www.urbanui.com/hiliteui/template/images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('/dashboard') }}"><img src="http://www.urbanui.com/hiliteui/template/images/logo-mini.svg" alt="logo" /></a>
                <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav">
                    @yield('topbutton')
                </ul>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline mx-0"></i>
                        @if (Auth::user()->unreadNotifications()->count() > 0)
                            <p class="notification-ripple notification-ripple-bg">
                                <span class="ripple notification-ripple-bg"></span>
                                <span class="ripple notification-ripple-bg"></span>
                                <span class="ripple notification-ripple-bg"></span>
                            </p>
                        @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                          <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                          @foreach (Auth::user()->notifications()->take(5)->get() as $notification)
                          @if ($notification->type == 'App\Notifications\ModeratorNotification')
                              <a class="dropdown-item preview-item" href="{{ url('/admin/ratings') }}">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-success">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal"><b>New Lawyer Rating</b></h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </p>
                                    </div>
                                </a>
                                @elseif($notification->type == 'App\Notifications\CommentNotification')
                                <a class="dropdown-item preview-item" href="{{ url('/admin/moderations/comments') }}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="fa fa-bookmark"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal"><b>Comment on</b> {{ str_limit($notification->data['notify']['blog_title'], 20) }}</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    {{ $notification->data['notify']['user_id'] }} - {{ $notification->created_at->diffForHumans() }}
                                </p>
                                </div>
                                </a>   
                                @elseif($notification->type == 'App\Notifications\QuestionNotification')
                                <a class="dropdown-item preview-item" href="{{ url('/admin/moderations/questions') }}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="fa fa-question-circle"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">{{ $notification->data['user'] }} <b>Asked An Question</b></h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    {{ $notification->created_at->diffForHumans() }}
                                </p>
                                </div>
                                </a>   
                                @elseif($notification->type == 'App\Notifications\AnswerNotification')
                                <a class="dropdown-item preview-item" href="{{ url('/admin/moderations/answers') }}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="fa fa-pencil-square"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal"><b>Answered:</b> {{ str_limit($notification->data['advice'], 20) }}</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    {{  $notification->data['user'] }} - {{ $notification->created_at->diffForHumans() }}
                                </p>
                                </div>
                                </a>   
                                @endif
                          @endforeach
                          <a style="display: block" href="#" class="text-center">Read All</a>
                        </div>
                      </li>
                    <li class="nav-item nav-user-icon">
                        <a class="nav-link" href="#">
                            <img src="{{ asset('images/faces/face28.jpg') }}" alt="profile" />
                        </a>
                    </li>

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <div class="nav-link d-flex">
                            <div class="profile-image">
                                <img src="{{ asset('/images/faces/face28.png') }}" alt="image">
                            </div>
                            <div class="profile-name">
                                <p class="name">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="designation">
                                    {{ Auth::user()->role_check->rule_name }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a target="_blank" class="nav-link" href="{{ url('/') }}">
                            <i class="mdi  mdi-desktop-mac menu-icon"></i>
                            <span class="menu-title">Site</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                            <i class="mdi  mdi-desktop-mac menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    @if( Auth::user()->user_role == 1 )
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#manage-site" aria-expanded="false" aria-controls="manage-site">
                            <i class="mdi mdi-view-array menu-icon"></i>
                            <span class="menu-title">Manage Site</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="manage-site">
                            <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/user') }}">User</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/site') }}">Site Settings</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if ( Auth::user()->user_role <= 2 )
                      
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#lawyer-area" aria-expanded="false" aria-controls="lawyer-area">
                            <i class="mdi mdi-view-array menu-icon"></i>
                            <span class="menu-title">Lawyers</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="lawyer-area">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/lawyers') }}">Layers</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/lawyers/add') }}">Add New Lawyer</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/courts') }}">Courts</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/specialization') }}">Specialization</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/practicearea') }}">Practice Area</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif

                    @if ( Auth::user()->user_role <= 3 )
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#post-area" aria-expanded="false" aria-controls="post-area">
                            <i class="mdi mdi-view-array menu-icon"></i>
                            <span class="menu-title">Posts</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="post-area">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/services') }}">Legal Services</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/categories/services') }}">Service Categories</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/blogs') }}">Legal Blogs</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/blogs/categories') }}">Categories</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif

                    @if ( Auth::user()->user_role <= 4 )
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#moderation-area" aria-expanded="false" aria-controls="moderation-area">
                            <i class="mdi mdi-view-array menu-icon"></i>
                            <span class="menu-title">Moderation Area</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="moderation-area">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/ratings') }}">Ratings @if(App\LawyerRatings::where('status', 0)->count() > 0)<span class="badge badge-light">{{ App\LawyerRatings::where('status', 0)->count() }}</span>@endif</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/moderations/comments') }}">Comments @if(App\BlogComment::where('status', 0)->count() > 0)<span class="badge badge-light">{{ App\BlogComment::where('status', 0)->count() }}</span>@endif</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/moderations/questions') }}">Questions @if(App\Advice::where('status', 0)->count() > 0)<span class="badge badge-light">{{ App\Advice::where('status', 0)->count() }}</span>@endif</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/moderations/answers') }}">Answers @if(App\AdviceAnswer::where('status', 0)->count() > 0)<span class="badge badge-light">{{ App\AdviceAnswer::where('status', 0)->count() }}</span>@endif</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout menu-icon"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <div class="footer-wrapper">
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright &copy; {{date('Y')}}. All rights reserved. </span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Designed by: <a href="https://www.behance.net/smitexpert" target="_blank">Sujan Molla</a>. </span>
                        </div>
                    </footer>
                </div>
                <!-- partial -->
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    </div>

    <form action="{{ url('logout') }}" method="post" id="logout-form">
        @csrf
    </form>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{asset('vendors/base/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->

    <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('vendors/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('vendors/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('vendors/flot/curvedLines.js')}}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('js/template.js')}}"></script>
    <script src="{{asset('js/settings.js')}}"></script>
    <script src="{{asset('js/todolist.js')}}"></script>
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset("") }}dist/js/bootstrap-select.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('js/dashboard.js')}}"></script>
    <!-- End custom js for this page-->
    <script>
        $("#notificationDropdown").click(function(){
            var csrf = $("#csrf").serialize();
            $.ajax({
                url: '/notification/read',
                method: 'POST',
                data: csrf,
                success: function(data){
                    console.log(data);
                }
            });
        })
    </script>
    @stack('scripts')
</body>

</html>
