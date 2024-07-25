<?php
  error_reporting(E_ALL ^ E_NOTICE);  
  ini_set('display_errors', 'Off');
  ini_set('error_reporting', E_ALL );
  $RealPath = realpath($argv[1]);
    $DR = $_SERVER['DOCUMENT_ROOT'];
    $conig = $RealPath . "/core/config.php";
    if (file_exists($conig)) {
        include $conig;
$sql_taskssx = "SELECT * FROM `".$TerranPrefix."config`";
$result_taskssx = mysqli_query($link, $sql_taskssx);
$cofigius[] = mysqli_fetch_assoc($result_taskssx);
if($cofigius['0']['userreg'] == "yes"){
    if ($_POST['submit'] == 'useradd') {
      $name = $_POST['newusername'];
      $surname = $_POST['newusersurname'];
      $email = $_POST['newuseremail'];
      $usrpass = $_POST['newuserpassword'];

      // $password = hash('md5', $usrpass); //TERRAN-TAIP: Первый раз преобразовываем в md5
      // $passwordss = hash('md5', $password); //TERRAN-TAIP: Второй раз преобразовываем в md5

      $passwordss = mysqli_real_escape_string($link, password_hash($usrpass, PASSWORD_BCRYPT, array('cost' => 12)));
      $sql_useradd = "INSERT INTO `crm_users` (name, surname, email, password,divisions) VALUES ('{$name}','{$surname}','{$email}','{$passwordss}','2')";
      $result = mysqli_query($link, $sql_useradd);
      echo '<meta http-equiv="refresh" content="0;URL=/login.php" />';
    }
    if ($_SESSION['userid'] != null) {
      header('Location: index.php');
    }
}
if($cofigius['0']['userreg'] == "yes" AND $cofigius['0']['userreg'] != null){
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Asted - Register</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="templates/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="templates/css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<style>
@import url('https://fonts.googleapis.com/css?family=Exo:400,700');

*{
    margin: 0px;
    padding: 0px;
}

body{
    font-family: 'Exo', sans-serif;
}

@media (max-width: 992px) { 
        .context {
            z-index: 199;
    text-align: center;
    margin: 0 auto;
    
}

.context h1{
    text-align: center;
    color: #5972b6;
    font-size: 50px;
}

.context h3{
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

.context h1{
    text-align: center;
    color: #fff;
    font-size: 50px;
}
.context h3{
color: beige;
}

 }


.area{
    background: #4e54c8;  
    background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);  
    width: 100%;
    
   
}

.circles{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li{
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;
    
}

.circles li:nth-child(1){
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}


.circles li:nth-child(2){
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}

.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}

.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}

.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}

.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}

.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}

.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}

.circles li:nth-child(10){
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}



@keyframes animate {

    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }

}
</style>
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="area col-lg-6">
          <div class="context">
          <h1>Asted</h1>
                                    <h3>Создайте аккаунт</h3>
                                    <h3>В системе Asted CWS🚀</h3>
          </div>
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
          <div class="p-5 form-registration">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Создайте учетную запись!</h1>
              </div>
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="registerFirstName" placeholder="Имя">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="registerLastName" placeholder="Фамилия">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="registerInputEmail" placeholder="Email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="registerInputPassword" placeholder="Пароль">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="registerRepeatPassword" placeholder="Подтверждение пароля">
                  </div>
                </div>
              </form>
              <button id="btn_registration" class="btn btn-primary btn-user btn-block">Зарегистрировать учетную запись</button>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Забыли пароль?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">У вас уже есть учетная запись? Войдите в систему!</a>
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

  <!-- Custom scripts for all pages-->
  <script>
    var pattern = /^[\w]{1}[\w-\.]*@[\w-]+\.[a-z]{2,4}$/i;
$.fn.setCursorPosition = function (pos) {
  if ($(this).get(0).setSelectionRange) {
    $(this).get(0).setSelectionRange(pos, pos);
  } else if ($(this).get(0).createTextRange) {
    var range = $(this).get(0).createTextRange();
    range.collapse(true);
    range.moveEnd('character', pos);
    range.moveStart('character', pos);
    range.select();
  }
  };
$('#btn_registration').click(function () {
    var newusername =$("#registerFirstName").val().trim();
    var newusersurname =$("#registerLastName").val().trim();
    var newuseremail =$("#registerInputEmail").val().trim();
    var newuserpassword =$("#registerInputPassword").val().trim();
    var newuserconfirmpassword =$("#registerRepeatPassword").val().trim();
    var submit = 'useradd';
    if(!newusername){
        alert("Введите Имя");
    }
    else{
        if(!newusersurname){     
            alert("Введите Фамилию");
        }else{
                if(!newuseremail){     
                    alert("Введите E-mail");
                }else{
                    if(newuseremail.search(pattern) == 0){
                        if(!newuserpassword){     
                            alert("Введите Пароль");
                        }else{
                            if(!newuserconfirmpassword){     
                                alert("Поддтвердите Пароль");
                            }else{
                                if(newuserpassword != newuserconfirmpassword){     
                                    alert("Не совпадают пароли");
                                }else{
                                    $.ajax({
                                        url: './register.php',
                                        method: 'post',
                                        dataType: 'html',
                                        data: {
                                            newusername,
                                            newusersurname,
                                            newuseremail,
                                            newuserpassword,
                                            submit
                                        },
                                        success: function() {
                                            const formToReplace = document.querySelector(".form-registration");
                                            const templateToAdd = document
                                              .createRange()
                                              .createContextualFragment(
                                                ' <div class="p-5">'+
                                                ' <div class="text-center">'+
                                                '   <h1 class="h4 text-gray-900 my-auto">Вы успешно зарегистрировались!</h1>'+
                                                ' </div>'+
                                                ' <hr>'+
                                                ' <a href="login.php" class="btn btn-google btn-user btn-block">'+
                                                '     Авторизация'+
                                                ' </a>'+
                                                ' </div>'
                                              );
                                            formToReplace.replaceWith(templateToAdd);
                                          }
                                    });
                                }
                            }
                        }
                    }else{
                        alert('Почта не корректна');
                    }
                }
            }
        }  
});
  </script>


</body>

</html>
<?}else{
  ?>
Asted Cloud: Регистрация закрыта администратором системы, <a href="./login.php">авторизоваться.</a>
<?}}?>