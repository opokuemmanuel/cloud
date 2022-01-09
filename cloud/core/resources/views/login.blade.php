<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

    <link href="{{ asset('./assets/img/favicon.png') }}" rel="stylesheet">



    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <link rel="stylesheet" href="sweetalert.min.css">

    <script type="text/javascript" src="sweetalert2.all.min.js"></script>

    <style>

        body{
            background-image: url({{  asset("/assets/images/cloud1.jpg") }});
        }

    </style>
</head>

<body>
<div class="loader"></div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <label id="results"></label>
                        <div class="card-body">
                            <form method="POST" action="{{ route('logs') }}">
                                <div id="app">
                                    @include('flash-message')
                                    @yield('content')
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="frist_name">Club Name</label>
                                        <input type="text" class="form-control" name="clubname" autofocus required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="password2" class="d-block">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button  id="Register" type="submit" class="btn btn-primary btn-lg btn-block">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script src="sweetalert.js"></script>
<script type="text/javascript">


    const registerBtn = document.getElementById('Register');

    registerBtn.addEventListener('click',function(event){


        var userPass = $('#password').val();

        var  userClub = $('#clubname').val();

        var output = $('#results');


        if(userPass == 0 || userClub == 0 )
        {
            Swal.fire("Ohpss","Fill out the blanks spaces","error");
        }
        if(userPass.value !== 0 && userClub.value !== 0){
            $.ajax({
                url:'http://localhost/cloud/api/AdminLogin',
                type: "POST",
                data: {
                    'clubname': userClub,
                    'password': userPass,
                },
                dataType: 'json',
                processData: true,
                beforeSend: function() {
                    output.css('background-color', 'blue');
                    output.css('color', 'white');
                    output.css('font-size', '18px');
                    output.html('Processing... Please Wait');
                    output.show();
                },
                success: function(response) {
                    if (response.status == 201) {
                        Swal.fire("Great","login successful","success");
                        setTimeout(function() {
                            //passing values to index.html
                            localStorage.setItem("clubname",userClub);
                            window.location.href = "index.html";
                        },2000);
                    } else if (response.status == 403) {
                        output.html('');
                        Swal.fire("Ohpss","Invalid club name or password","error");

                    }
                },
                error: function(xhr, status) {
                    $('#results').css('background-color', 'red');
                    $('#results').css('color', 'white');
                    $('#results').css('font-size', '18px');
                    $('#results').html(status);
                    $('#results').show();
                }
            })
        }
    });

</script>
<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/auth-register.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>
