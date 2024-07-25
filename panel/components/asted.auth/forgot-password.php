<?
session_name('terrancrm');
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
session_start();
function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}
$error = $complete = null;
if (!empty($_SESSION['userid'])) {
    header('Location: /');
} else {
    $conig = __DIR__ . "/core/config.php";
    if (file_exists($conig)) {
        include $conig;
        if (isset($_POST['restore'])) {
            $query = mysqli_fetch_assoc(mysqli_query($link, "SELECT id, email FROM crm_users WHERE email='" . $_POST['email'] . "' LIMIT 0,1"));
            if ($query){
                $token = base64_encode(json_encode($query));
                $restore_link = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/forgot-password.php?token='.$token;
                $headers = array(
                    'From'=>'Administrator <webmaster@'.$_SERVER['HTTP_HOST'].">",
                    'Content-type'=>'text/html; charset=UTF-8',
                );
                $message = '
                    <html>
                        <head>
                            <title>TerranCRM - Восстановление пароля</title>
                        </head>
                        <body>
                            <h4>Вы запросили смену пароля</h4>
                            <p>Для завершения операции смены пароля воспользуйтесь <a href="'.$restore_link.'">ссылкой</a>, или скопируйте содержимое кавычек, &laquo;<strong>'.$restore_link.'</strong>&raquo;, и встевьте в адресную строку браузера.</p>
                            <p>Если это были не Вы проигнорируйте данное сообщение</p>
                        </body>
                    </html>
                ';
                $complete = "На указанный EMail отправленно письмо с сылкой для смены пароля. <spall>Если письма нету во входящих, проверьте папку спам</spall>";
                mail($query['email'], 'Восстановление пароля', $message, $headers, '-fwebmaster@'.$_SERVER['HTTP_HOST']);
            }
            else
            {
                $error = 'Пользователь не найден';
            }
        }
        elseif(isset($_GET['token'])){
            $token = json_decode(base64_decode($_GET['token']), true);
            $query = mysqli_fetch_assoc(mysqli_query($link, "SELECT id, email FROM crm_users WHERE email='" . $token['email'] . "' AND id = '".$token['id']."' LIMIT 0,1"));
            if ($query){
                if (isset($_POST['new_pass'])){
                    if ($_POST['new_password'] != $_POST['re_new_password']){
                        $error = "Пароли не совпадают";
                    }
                    else
                    {
                        // Чувак, это отстойный способ хэширования
						// $password = hash('md5',$_POST['new_password']);//TERRAN-TAIP: Первый раз преобразовываем в md5
						// $passwordss = hash('md5',$password);//TERRAN-TAIP: Второй раз преобразовываем в md5

                        
                        $passwordss = password_hash($_POST['new_password'], PASSWORD_BCRYPT, array('cost' => 12));

                        if (mysqli_query($link, "UPDATE `crm_users` SET `password` = '".mysqli_real_escape_string($link, $passwordss)."' WHERE `id` = '".$token['id']."'")){
                            header('Location: /');
                        }
                        else
                        {
                            $error = 'Ошибка сохранениея';
                        }
                        print_r($_POST);
                    }
                }
            }
            else
            {
                $error = 'Пользователь не найден';
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

    <title>TerranCRM - Forgot password</title>

    <!-- Custom fonts for this template-->
    <link href="templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="templates/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                                        <?php if ($error){ ?>
                                        <p class="mb-4 text-danger"><?=$error?></p>
                                        <?php } elseif ($complete){?>
                                        <p class="mb-4 text-success"><?=$complete?></p>
                                        <?php } ?>
                                    </div>
                                    <form class="user" method="POST" action="">
                                        <?php if (!isset($_GET['token'])){ ?>
                                        <div class="form-group">
                                            <input required="" name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <button type="submit" name="restore" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                        <?php } else { ?>
                                        <div class="form-group">
                                            <input required="" name="new_password" type="password" class="form-control form-control-user" id="" placeholder="Новый пароль">
                                        </div>
                                        <div class="form-group">
                                            <input required="" name="re_new_password" type="password" class="form-control form-control-user" id="" placeholder="Повтор пароля">
                                        </div>
                                        <button type="submit" name="new_pass" class="btn btn-primary btn-user btn-block">
                                            Save Password
                                        </button>
                                        <?php }?>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have an account? Login!</a>
                                    </div>
                                </div>
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

</body>

</html>