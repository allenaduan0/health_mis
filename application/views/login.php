<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
    <title>LOG-IN </title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/dataTables.bootstrap4.min.css">  

    <!-- OUR CUSTOM CSS-->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/login.css">

    <!-- JS CDN  -->
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery3.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bootstrap4/bootstrap4.min.js"></script>

    <script> var base_url = '<?= BASE_URL ?>'; </script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/js/login.js"></script>
</head>

<body>
    <div id="login-one" class="login-one">
        <form class="d-xl-flex justify-content-xl-center align-items-xl-center login-one-form" onsubmit="event.preventDefault(); login()">
            <div class="col">
                <div class="login-one-ico">
                    <img src="<?= BASE_URL ?>assets/img/logo.png">
                </div>
                <div class="form-group">
                    <div>
                        <h3>LOGIN</h3>
                    </div>
                    <div class="username-pass">
                        <input type="text" name="username" id="input_username" class="form-control" placeholder="Username">

                    </div>
                    <br/>
                    <div class="form-group">
                        <input type="password" name="password" id="input_password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="type" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <small class="text-center text-danger">

                            <p id="username_error"></p>
                        </small>
                        <small class="text-center text-danger">

                            <p id="password_error"></p>
                        </small>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                        <a href="<?= BASE_URL."register" ?>">
                            <small class="text-center">
                                Register
                            </small>
                        </a>
                    </div>

                </div>
            </div>
        </form>
    </div>

   
</body>

</html>