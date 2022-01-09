<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Cloud</title>
    <!-- General CSS Files -->
{{--    <link rel="stylesheet" href="./assets/css/app.min.css">--}}
{{--    <!-- Template CSS -->--}}
{{--    <link rel="stylesheet" href="./assets/css/style.css">--}}
{{--    <link rel="stylesheet" href="./assets/css/components.css">--}}
{{--    <!-- Custom style CSS -->--}}

{{--    <link rel="stylesheet" href="./assets/css/custom.css">--}}

    <link href="{{ asset('./assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/css/components.css') }}" rel="stylesheet">



    <link rel='shortcut icon' type='image/x-icon' href='./assets/img/favicon.ico' />
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                    <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                            <i data-feather="maximize"></i>
                        </a></li>
                    <li>

                    </li>
                </ul>
            </div>
            <ul class="navbar-nav navbar-right">
                <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                    <div class="dropdown-header">
                        Notifications
                        <div class="float-right">
                            <a href="#">Mark All As Read</a>
                        </div>
                    </div>

                    <div class="dropdown-footer text-center">
                        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="../assets/img/user.png"
                                                                                                         class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">

                        {{--                        <div class="dropdown-divider"></div>--}}
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="get-started-btn scrollto dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i>
                            Logouts
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{route('course_content')}}"> <img alt="image" src="../assets/img/logo.png" class="header-logo" /> <span
                            class="logo-name">Cloud</span>
                    </a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    <li class="dropdown active">
                        <a href="{{route('course_content')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="briefcase"></i><span>Course</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{route('course_content')}}">Add Course Content</a></li>
                            <li>
                                <a class="nav-link">
                                    <form action="{{ route('view_course_content') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="club" value="{{ Auth::user()->clubname}}">
                                        <button type="submit"  style="background: transparent; color: black; border: white; margin-left: 10px;">View All Content</button>
                                    </form>

                                </a>
                            </li>


                        </ul>
                    </li>

                </ul>
            </aside>
        </div>
        <!-- Main Content -->
        <div class="main-content">

            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <form method="POST" action="{{ route('UpdateContents') }}" enctype="multipart/form-data">
                        <div id="app">
                            @if(!empty($successMsg))
                                <div class="alert alert-success">
                                    {{$successMsg}}
                                </div>
                            @endif
                        </div>
                        @csrf
                        <div class="card-header">
                            <h4>Upload course content</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Course Title</label>
                                <input type="text" value="{{$arr->Course_Title}}" name="title" class="form-control" required>
                                <input type="hidden" value="{{$arr->id}}" name="id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="pdf" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="clubs" value="{{$arr->club}}" class="form-control" >
                                <input type="hidden" name="course" value="{{$arr->Course_Content}}" class="form-control" >
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button id="save" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>

<!-- General JS Scripts -->

<script src="{{ asset('./assets/js/app.min.js') }}" ></script>
<script src="{{ asset('./assets/bundles/apexcharts/apexcharts.min.js') }}" ></script>
<script src="{{ asset('./assets/js/page/index.js') }}" ></script>
<script src="{{ asset('./assets/js/scripts.js') }}" ></script>
<script src="{{ asset('./assets/js/custom.js') }}" ></script>

<script src="assets/js/app.min.js"></script>

<!-- JS Libraies -->
<script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/index.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>

