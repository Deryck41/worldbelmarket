<? include "templates/header.php"; ?>
<?
if ($_POST['submit'] == 'salesadd') {
	$usrPost = $userID;
	$titlePost = $_POST['message'];
	$cChatGgroup = '1';
	$dataPost = date("H:m d.m.Y");
	$sql = "INSERT INTO `crm_chat_group_messages` (datemsr, userid, chatgroup, message) VALUES ('{$dataPost}','{$usrPost}','{$cChatGgroup}','{$titlePost}')";
    if (mysqli_query($link, $sql)){
        //header('Location: http://crm.terrangroup.biz/index.php?result=1305');
	    echo '<meta http-equiv="refresh" content="0;URL='.$astedADM.'chat/post/'.date("Hms").'/" />';
  }else{
      echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
      TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: '.$sql.' <br> Ошибка: '.mysqli_error($link).'
  </div></div>';
  }
}

?>
 <link rel="stylesheet" href="<?=$astedADM?>templates/css/chat.css">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['chat']?></h1>
          </div>
    
          <!-- Content Row -->
		<div class="row">
                    <div class="col-12">
                        <div class="card m-b-0">
                            <!-- .chat-row -->
                            <div class="chat-main-box">
                                <!-- .chat-left-panel -->
                                <div class="chat-left-aside" style="width: -webkit-fill-available; width: -moz-available; width: fill-available;">
                                    <div class="open-panel"><i class="ti-angle-right"></i></div>
                                    <div class="chat-left-inner">
                                        <ul class="chatonline style-none ps ps--theme_default" data-ps-id="ba310c0f-1eac-e30c-b457-e160076bcad2">
                                            <li>
                                                <a href="javascript:void(0)"><img src="<?=$astedADM?>templates/img/logo.png" alt="user-img" class="img-circle"> <span>Глобальный чат <small class="text-success">Terran Group</small></span></a>
                                            </li>
                                            <!--<li>
                                                <a href="javascript:void(0)" class="active"><img src="/uploads/users/1/avatar/6e71cd00.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="/uploads/users/1/avatar/6e71cd00.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="/uploads/users/1/avatar/6e71cd00.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="/uploads/users/1/avatar/6e71cd00.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="/uploads/users/1/avatar/6e71cd00.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="/uploads/users/1/avatar/6e71cd00.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="/uploads/users/1/avatar/6e71cd00.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                            </li> -->
                                            <li class="p-20"></li>
                                        <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></ul>
                                    </div>
                                </div>
                                <!-- .chat-left-panel -->
                                <!-- .chat-right-panel -->
                                <div class="chat-right-aside">
                                    <div class="chat-rbox ps ps--theme_default ps--active-y" data-ps-id="5c5a644d-a308-5437-027b-20f3ca8f5851" id="parentDiv" style="overflow: overlay;">
                                        <ul class="chat-list p-20" style="height: 529px; padding: 20px;">
                                            <!--chat Row -->
											<pre><?php
						$sql_ChatGroupMSR = "SELECT * FROM `crm_chat_group_messages`";
                        $result_ChatGroupMSR = mysqli_query($link, $sql_ChatGroupMSR);
                        while ($userChatGroupMSR = mysqli_fetch_assoc($result_ChatGroupMSR)) {
                            $idChatGroupMSR = "{$userChatGroupMSR['userid']}";
							$messageChatGroupMSR = "{$userChatGroupMSR['message']}";
							$dataChatGroupMSR = "{$userChatGroupMSR['datemsr']}";
							
							
							$sql_usersalaries = "SELECT * FROM `crm_users` WHERE id ='".$idChatGroupMSR."'";
							$result_usersalaries = mysqli_query($link, $sql_usersalaries);
							$usersalaries = mysqli_fetch_array($result_usersalaries);
							
							
							if($usersalaries['avatar'] == null){
								$getUsrAvatar = $astedADM.'templates/object/content/ava.png';
							}else{
								$getUsrAvatar = $astedADM.'uploads/users/'.$idChatGroupMSR.'/avatar/'.$usersalaries['avatar'].'';
							}
							?></pre>
					<?php if($userID != $idChatGroupMSR){?>
                                            <li>
                                               <a href="<?=$astedADM?>profile/<?=$idChatGroupMSR?>/"> <div class="chat-img"><img src="<?=$getUsrAvatar?>" alt="<?=$usersalaries['name']?> <?=$usersalaries['surname']?>"></div> </a>
                                                <div class="chat-content">
                                                    <h5><?=$usersalaries['name']?> <?=$usersalaries['surname']?></h5>
                                                    <div class="box bg-light-info"><?=$messageChatGroupMSR?></div>
                                                </div>
                                                <div class="chat-time"><?=$dataChatGroupMSR?></div>
                                            </li>
					<?}if($userID == $idChatGroupMSR){?>
											 <li class="reverse">
                                                <div class="chat-content">
                                                    <h5><?=$usersalaries['name']?> <?=$usersalaries['surname']?></h5>
                                                    <div class="box bg-light-inverse"><?=$messageChatGroupMSR?></div>
                                                </div>
                                                <div class="chat-img"><img src="<?=$getUsrAvatar?>" style="height: 45px" alt="<?=$usersalaries['name']?> <?=$usersalaries['surname']?>"></div>
                                                <div class="chat-time" style="float: left;"><?=$dataChatGroupMSR?></div>
                                            </li>
					<?php }}
							?>    
                                            <!--chat Row -->
                                        </ul>
                                    <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: -46px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
									
									</div>
                                    <div class="card-body b-t">
                                        <div class="row pt-4">
                                            <div class="col-8">
											<form action="" id="astedChat" method="post">
                                                <textarea name="message" id="message" placeholder="Введите сообщение здесь" class="form-control b-0"></textarea>
                                                <div id="error" style="display: none;">Текст должен содержать не менее двух символов</div>
												<input type="submit" name="submit" style="display:none" value="salesadd" name="salesadd" id="id0"
                                           class="btn btn-primary btn-user btn-block"/>
										   </form>
                                            </div>
                                            <div class="col-4 text-right">
                                                <button onclick="javascript:document.getElementById('id0').click();"  type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-indent"></i> </button>
                                            </div>
											
                                        </div>
                                    </div>
                                </div>
                                <!-- .chat-right-panel -->
                            </div>
                            <!-- /.chat-row -->
                        </div>
                    </div>
                </div>






                <script>
  document.getElementById("astedChat").addEventListener("submit", function(event) {
    var textarea = document.getElementById("message");
    if (textarea.value.length < 2) {
      event.preventDefault();
      document.getElementById("error").style.display = "block";
    }
  });
</script>

<script>
    var chatList = document.querySelector('.chat-rbox');
var maxHeight = Math.round(window.innerHeight * 0.6); // вычисляем 40% от высоты экрана
chatList.style.maxHeight = maxHeight + 'px'; // задаем максимальную высоту в пикселях

    var chatList = document.querySelector('.chat-list');
chatList.scrollTop = chatList.scrollHeight;

    document.addEventListener("keypress", function(event) {
  if (event.keyCode === 13) {
         document.getElementById("id0").click();
    }
});


var objDiv = document.getElementById("parentDiv");
objDiv.scrollTop = objDiv.scrollHeight;
</script>
        </div>
        <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>