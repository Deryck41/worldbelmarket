<?
session_name('terrancrm');
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if (isset($_SESSION['userid']) && $_SESSION['userid'] != null) {
    header('Location: /panel/');
} else {
    include 'core/rb.php';
    include 'core/Services/Asted.php';
    $system = new Asted();
    include "language/ru.php";
    $RealPath = getcwd();
    $DR = $_SERVER['DOCUMENT_ROOT'];
    $conig = $RealPath . "/core/config.php";
    if (file_exists($conig)) {
        include $conig;
        $sql_taskssx = "SELECT * FROM `" . $TerranPrefix . "config`";
        $result_taskssx = mysqli_query($link, $sql_taskssx);
        $cofigius[] = mysqli_fetch_assoc($result_taskssx);    
        if (isset($_POST['submit'])) {
            $passwordPost = htmlspecialchars($_POST['password']);

            // $password = hash('md5', $passwordPost);
            // $passwordss = hash('md5', $password); //ASTED: Второй раз преобразовываем в md5

            

            if(!empty($_POST['email'])){
                if(!empty($_POST['password'])){
            $query = mysqli_query($link, "SELECT * FROM crm_users WHERE email='" . $_POST['email'] . "'");
            if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                if (password_verify($passwordPost, $row["password"])) {
                    $userID = $row['id'];
                    $_SESSION['userid'] = $row['id'];
                    $logfailedUbPost = $_POST['email'];
                    $logfailedtype = "Авторизовался успешно";
                    $logfailedip = $_SERVER['REMOTE_ADDR'];
                    $logfailedPost = date("Y-m-d H:i:s");
                    $sql = "INSERT INTO `crm_logs` (eventnames, datestimes, type, ip) VALUES ('{$logfailedUbPost}','{$logfailedPost}','{$logfailedtype}', '{$logfailedip}')";
                    if (mysqli_query($link, $sql)) {
                    } else {
                        echo 'Terran: DataBase Error';
                    }
                    header('Location: /panel/');
                } else {
                    echo '<div class="container mt-4"><div class="alert alert-primary" role="alert">Вы ввели неправильный пароль</div></div>';
                    $logfailedUbPost = $_POST['email'];
                    $logfailedtype = 'Неверный пароль при авторизации';
                    $logfailedip = $_SERVER['REMOTE_ADDR'];
                    $logfailedPost = date("Y-m-d");
                    $sql = "INSERT INTO `crm_logs` (eventnames, datestimes, type, ip) VALUES ('{$logfailedUbPost}','{$logfailedPost}','{$logfailedtype}', '{$logfailedip}')";
                    if (mysqli_query($link, $sql)) {
                    } else {
                        echo 'Terran: DataBase Error';
                    }
                }
            }
        }else{
            echo '<div class="container mt-4"><div class="alert alert-primary" role="alert">Такого логина нет в системе! </div></div>';
        }
    }else{
        echo '<div class="container mt-4"><div class="alert alert-primary" role="alert">Поле пароля не должно быть пустым! </div></div>';
    }
        }else{
            echo '<div class="container mt-4"><div class="alert alert-primary" role="alert">Поле логина не должно быть пустым! </div></div>';
        }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="templates/img/logo.png">
    <title>Вход</title>

    <!-- Custom fonts for this template-->
    <link href="../templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../templates/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            font-family: 'Exo', sans-serif;
        }

        @media (max-width: 992px) {
            .context {
                z-index: 199;
                text-align: center;
                margin: 0 auto;

            }

            .context h1 {
                text-align: center;
                color: #5972b6;
                font-size: 50px;
            }

            .context h3 {
                color: #49493d;
            }
        }


        @media (min-width: 992px) {

            .context {
                z-index: 199;
                position: absolute;
                top: 20vh;
                padding: 0px 13%;

            }

            .context h1 {
                text-align: center;
                color: #fff;
                font-size: 50px;
            }

            .context h3 {
                color: beige;
            }

        }


        .area {
            background: #4e54c8;
            background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
            width: 100%;


        }

        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;

        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }


        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }



        @keyframes animate {

            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }

        }
        .login-copyright{
            text-align: center;
            font-size: 10px;
            background-color: rgb(47, 49, 50);
            color: white;
            padding: 6px;
        }
        @media (min-width: 992px){
            .login-copyright{
                margin-left: -12px;
            }
        }
    </style>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="context">
                                <h1>Панель</h1>
                                <h3>WorldBelMarket</h3>
                            </div>


                            <div class="area col-lg-6">
                                <ul class="circles">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?= $lang['welcome'] ?></h1>
                                    </div>
                                    <form action="" method="post" class="user">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Электронный адрес...">
                                            <span id="valid"></span>
                                        </div>
                                        <div class="form-group inputs">
                                            <input name="password" type="password" class="form-control form-control-user password" id="exampleInputPassword" placeholder="Пароль">
                                            <label class="mt-2 small">
                                                <input type="checkbox" class="showPassword"> Показать пароль
                                            </label>
                                        </div>
                                        <script>
                                            let showPassword = document.querySelectorAll('.showPassword');

                                            showPassword.forEach(item =>
                                                item.addEventListener('click', toggleType)
                                            );


                                            function toggleType() {
                                                let input = this.closest('.inputs').querySelector('.password');
                                                if (input.type === 'password') {
                                                    input.type = 'text';
                                                } else {
                                                    input.type = 'password';
                                                }
                                            }
                                        </script>
                                        <button type="submit" name="submit" value="login" id="id0" class="btn btn-primary btn-user btn-block" /> Авторизоваться в панели</button>
                                        </a>
                                        <!--<hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Забыли пароль?</a>
                                    </div>
                                    <?php if ($cofigius['0']['userreg'] == "yes" and $cofigius['0']['userreg'] != null) { ?>
                                        <div class="text-center">
                                            <a class="small" href="register.php">Создать аккаунт!</a>
                                        </div>
                                    <? } ?>
                                    
                                </div>
                                <div class="login-copyright"> ООО "МирБелМаркет"</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="templates/vendor/jquery/jquery.min.js"></script>
    <script src="templates/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="templates/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="templates/js/sb-admin-2.min.js"></script>
    <style>
        .errors {
            border: 1px solid #ff0034;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i; //name-_09@mail09-.ru
            var mail = $('#exampleInputEmail');

            mail.blur(function() {
                if (mail.val() != '') {
                    if (mail.val().search(pattern) == 0) {
                        //$('#valid').text('TerranCRM: Почта корректна');
                        //$('#id0').attr('disabled', false);
                        //mail.removeClass('errors').addClass('ok');
                    } else {
                        //$('#valid').text('TerranCRM: Почта не корректна');
                        //$('#id0').attr('disabled', true);
                        //mail.addClass('errors');
                    }
                } else {
                    //$('#valid').text('TerranCRM: Поле не должно быть пустым!');
                    //mail.addClass('errors');
                    //$('#id0').attr('disabled', true);
                }
            });
        });
    </script>
</body>

</html>