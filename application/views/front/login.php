<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="<?php echo base_url(); ?>source/main.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="app-logo-inverse mx-auto mb-3">

                        </div>
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Selamat Datang,</div>
                                        </h4>
                                    </div>

                                    <div class="divider"></div>
                                    <form method="POST" action="Login/check_login">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><input name="username" placeholder="Masukan Email" type="text" class="form-control"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><input name="password" id="examplePassword" placeholder="Masukan Password" type="password" class="form-control"></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer clearfix">

                                <div class="float-right">
                                    <button type="submit" name="submit" class="btn btn-outline-primary btn-lg"><span class="pe-7s-key"></span> Masuk</button>
                                    </user
                                    <div class="">
                                        <button class="btn btn-outline-dark btn-lg"><span class="pe-7s-add-user"></span> Daftar </button>
                                    </div>
                                    <div class="float-left"><a href="javascript:void(0);" class="btn-lg btn btn-link">Lupa Password</a></div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="text-center text-white opacity-8 mt-3">Design By © ArchitectUI 2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/main.cba69814a806ecc7945a.js">

    </script>
</body>
</html>
