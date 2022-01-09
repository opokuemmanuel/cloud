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
                            <h4>Register</h4>
                        </div>
                        <label id="results"></label>
                        <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="frist_name">Index number</label>
                                        <input type="text" class="form-control" id="membership_id" name="membership_id" placeholder="membership_id" autofocus>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="password2" class="d-block">club name</label>
                                        <input type="text" class="form-control" id="clubname" name="clubname" placeholder="club name">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="password2" class="d-block">Password</label>
                                        <input id="password1" type="password" class="form-control"  placeholder="password">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="password2" class="d-block">Password</label>
                                        <input id="password2"  type="password" class="form-control" placeholder="confirm password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button  id="Register" type="button" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>

                            <div class="mb-4 text-muted text-center">
                                Already have an account? <a href="{{route('show_login')}}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script src="assets/js/sweetalert.js"></script>
<script type="text/javascript">

     document.getElementById("Register").addEventListener("click",function (event){
         var password1 = $('#password1').val();
         var password2 = $('#password2').val();
         var membership = $('#membership_id').val();
         var clubname = $('#clubname').val();

          if (password1 == 0 || password2 == 0 || membership == 0 || clubname == 0 )
          {
              Swal.fire("Ohpss","Fill out the blank spaces","error");
          }if (password1 != password2)
          {
              Swal.fire("Ohpss","Password do not match","error");
         }
         if(membership != 0 && clubname != 0 && password1 == password2 ){

             $.ajax({
                 url:'http://localhost/cloud_users/api/register',
                 type: "POST",
                 data: {
                     'membership_id': membership,
                     'clubname': clubname,
                     'password': password1,
                 },
                 dataType: 'json',
                 processData: true,
                 success: function(response) {
                     if (response.status == 201) {
                         Swal.fire("Ooohps","Membership id already registered","error");

                     } else if (response.status == 500) {
                         Swal.fire("Ooohps","incorrect membership or clubname","error");
                     }
                     else if(response.status == 200){
                         Swal.fire("Success","registration successful","success");

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

