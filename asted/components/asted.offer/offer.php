<?php include "templates/header.php";
include "core/config.php";
$sql = "SELECT * FROM `crm_users` WHERE id ='" . $_SESSION['userid'] . "'";
$result = mysqli_query($link, $sql);
while ($agreements = mysqli_fetch_assoc($result)) {
$mail = "{$agreements['email']}";
$phone = "{$agreements['phone_number']}";
$name = "{$agreements['name']}";
$surname = "{$agreements['surname']}";
}
$sql_kp = "SELECT * FROM `crm_kp`";
$result_kp = mysqli_query($link, $sql_kp);
while ($kp = mysqli_fetch_assoc($result_kp)) {
$author = "{$kp['author']}";
$title = "{$kp['title']}";
$price = "{$kp['price']}";
$download = "{$kp['download']}";
$tablekp[]='<tr>
<td>'.$author.'</td>
<td>'.$title.'</td>
<td>'.$price.'</td>
<td><a href="/asted/uploads/'.$download.'" download>Скачать<br>'.$download.'</a></td>
</tr>';
}
?>

    <div class="container-fluid">

        <div class="row">





            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Создать комерческое предложение</h6>
                  <a class="collapse-item" style="float: right;margin-top: -20px;" href="offerconfig.php"><i class="fas fa-fw fa-cog"></i></a>
                </div>
                <div class="card-body">
                    <form action="offerpdf.php" method="POST" class="pdf">
                                  <div class="p-3 bg-gray-100"><input name="client_name" placeholder="Имя клиента">
                          
</div>
 <div class="p-3 bg-gray-100"><input name="client_price" placeholder="Стоимость проекта">
                          
</div>
<div class="p-3 bg-gray-100" >
    <label>Клиент:</label><br>
          <select id="sitetype" name="sitetype">
                                <option value="sitegost">Государственный сайт</option>
                                <option value="sitebisnes">Частный бизенес</option>
                            </select>
    </div>
        <div class="p-3 bg-gray-100" >
    <label>Разбивка платежей:</label><br>
          <select id="paytype" name="paytype">
                                <option value="onepay">Один платеж</option>
                                <option value="twopay">Два платежа</option>
                                <option value="freepay">Три платежа</option>
                                <option value="forpay">Четыре платежа</option>
                                <option value="paysprint">По спринтам</option>
                                <option value="payold">По завершению проекта</option>
                            </select>
    </div>
    <div class="p-3 bg-gray-100" >
    <label>Срок реализации:</label><br>
          <select id="sitedev" name="sitedev">
                                <option value="days12">12 рабочих дней</option>
                                <option value="deys20">20 рабочих дней</option>
                                <option value="deys26">26 рабочих дней</option>
                                <option value="mount">Месяц</option>
                                <option value="twomout">Два месяца</option>
                                <option value="themout">Три месяца</option>
                            </select>
    </div>
       <div class="p-3 bg-gray-100" >
    <label>Публиковать отзыв + гост:</label><br>
          <select id="sitegost" name="sitegost">
                                <option value="yes">Да</option>
                                <option value="no">Нет</option>
                            </select>
    </div>
           <div class="p-3 bg-gray-100" >
    <label>Публиковать два отзыва:</label><br>
          <select id="siteotzivy" name="siteotzivy">
                                <option value="yes">Да</option>
                                <option value="no">Нет</option>
                            </select>
    </div>
       <div class="p-3 bg-gray-100" >
    <label>Публиковать с кем мы работали:</label><br>
          <select id="weworkedcomp" name="weworkedcomp">
                                <option value="yes">Да</option>
                                <option value="no">Нет</option>
                            </select>
    </div>

           <div class="p-3 bg-gray-100" >
    <label>Контакты из профиля:</label><br>
          <select id="mycotacts" name="mycotacts">
                                <option value="yes">Да</option>
                                <option value="no">Нет</option>
                            </select>
                            <input style="display: none;" id="contactPhone" name="contactPhone" type="text" value="<?= $phone ?>">
                            <input style="display: none;" id="contactMail" name="contactMail" type="text" value="<?= $mail ?>">
                            <input style="display: none;" id="contactname" name="contactname" type="text" value="<?= $name ?>">
                            <input style="display: none;" id="contactsurname" name="contactsurname" type="text" value="<?= $surname ?>">
    </div>
                    <button type="submit" name="pdfdownload" class="btn btn-light">Скачать PDF</button>
                    <button type="submit" name="pdfviews" class="btn btn-light">Просмотр PDF</button>
                    </form>
                    <script>
function Download(url) {
    document.getElementById('my_iframe').src = url;
};
</script>
                                </div>
              </div>
            </div>
        </div>

    </div>
    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Автор</th>
                                            <th>Имя клиента</th>
                                            <th>Цена</th>
                                            <th>Скачать</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($tablekp as $row) {
                                        echo $row;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
<script> 
    $("#tovar").change(function(){
   if($(this).val() == 'Редизайн'){
    $('#sel2').removeAttr('style');
     $('#red1').removeAttr('disabled');
      $('#sel5').attr('style', 'display: none;'); 
         $('#site3').attr('disabled', 'disabled'); 
      $('#sel6').attr('style', 'display: none;'); 
     $('#site4').attr('disabled', 'disabled'); 
           // $('#sel4').attr('style', 'display: none;'); 
        // $('#site2').attr('disabled', 'disabled'); 
    } else {
          $('#sel2').attr('style', 'display: none;'); 
        $('#red1').attr('disabled', 'disabled'); 
    }

   
});    

     $("#tovar").change(function(){
   if($(this).val() == 'Создание сайта'){
    $('#sel3').removeAttr('style');
     $('#sel4').removeAttr('style');
     $('#site1').removeAttr('disabled');
      $('#site2').removeAttr('disabled');
    } else {
          $('#sel3').attr('style', 'display: none;'); 
          $('#sel4').attr('style', 'display: none;'); 
        $('#site1').attr('disabled', 'disabled'); 
         $('#site2').removeAttr('disabled');
    }

   
});    


        $("#site1").change(function(){
   if($(this).val() == 'Лендинг' || $(this).val() == 'Корпоративный'){
    $('#sel5').removeAttr('style');
     $('#site3').removeAttr('disabled');
    } else {
          $('#sel5').attr('style', 'display: none;'); 
        $('#site3').attr('disabled', 'disabled'); 
    }

   
});
    $("#site1").change(function(){
   if($(this).val() == 'Интернет магазин'){
    $('#sel6').removeAttr('style');
     $('#site4').removeAttr('disabled');
    } else {
          $('#sel6').attr('style', 'display: none;'); 
        $('#site4').attr('disabled', 'disabled'); 
    }

   
});
    </script>
 
    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>
<script src="templates/js/demo/chart-area-demo.js"></script>
<script src="templates/js/lead-deal.js"></script>
<script src="templates/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="templates/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
  $('#dataTable').DataTable();
});
  </script>