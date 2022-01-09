<!DOCTYPE html>
<html lang="en">


<!-- blog.html  21 Nov 2019 03:50:31 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
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
                        <form class="form-inline mr-auto">
                            <div class="search-element">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav navbar-right">

                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">  <img alt="image" src="assets/img/user.png"
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
                    <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                            class="logo-name">Otika</span>
                    </a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    <li  class="dropdown">
                        <form action="{{route('view_materials')}}" method="get">
                            @csrf
                            <input type="hidden" name="club" value="{{ Auth::user()->clubname}}">
                            <button type="submit"  style="background: transparent; color: black; border: white; margin-left: 10px;"> <i data-feather="monitor"></i> View All Content</button>
                        </form>
                    </li>
                    <li  class="dropdown">
                        <form action="{{route('show_announcement')}}" method="get">
                            @csrf
                            <input type="hidden" name="club" value="{{ Auth::user()->clubname}}">
                            <button type="submit"  style="background: transparent; color: black; border: white; margin-left: 10px;"> <i data-feather="monitor"></i> Announcements</button>
                        </form>
                    </li>

                </ul>
            </aside>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <div class="row">
                        @foreach($mat as $materials)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <article class="article">
                                <div class="article-header">
                                    <div class="article-image" data-background="assets/img/blog/img08.png">
                                    </div>
                                    <div class="article-title">
                                        <h2><a href="#">{{$materials->club}}</a></h2>
                                    </div>
                                </div>
                                <div class="article-details">
                                    <p><b>Course Title :</b> {{$materials->Course_Title}}</p>
                                    <p><b>Course Content :</b> {{$materials->Course_Content}}</p>
                                    <div class="article-cta">
                                        <a href="{{url('download/'.$materials->Course_Content)}}" class="btn btn-primary">Download</a>

{{--                                        <a href="{{url('/download/'.$materials->Course_Content)}}" class="btn btn-outline-primary float-right"><i class="fa fa-pencil"></i></a>--}}

                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>

        </div>
        <footer class="main-footer">
            <div class="footer-left">
                <a href="templateshub.net">Templateshub</a>
            </div>
            <div class="footer-right">
            </div>
        </footer>
    </div>
</div>
<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>
</body>


<!-- blog.html  21 Nov 2019 03:50:52 GMT -->
</html>
