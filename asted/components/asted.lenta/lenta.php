<?php
include "templates/header.php";?>
<?php   
if ($_POST['submit'] == 'commentadd') {
	$idnews = $_POST['commetid'];
	$commenttonews = $_POST['comment'.$idnews];
	$commendata = date("Y-m-d");
	$sql = "INSERT INTO `".$TerranPrefix."newscomment` (fornews, whocomment, commentcontent, datacomment) VALUES ('{$idnews}','{$userID}','{$commenttonews}','{$commendata}')";
	$result = mysqli_query($link, $sql);
	echo '<meta http-equiv="refresh" content="0;URL=/asted/lenta/0513/" />';
}
if($_POST['newsdel'] != null) {
	//echo $_POST['newsdel'];
$sqlportfolio = "DELETE FROM crm_news WHERE id=".$_POST['newsdel'].""	;
mysqli_query($link, $sqlportfolio);
echo '<meta http-equiv="refresh" content="0;URL=/asted/lenta/1991/" />';
}
if ($_POST['submit'] == 'newsadd') {
	$addtitle = $_POST['titleadd'];
	$addtext = $_POST['editor'];
	$sql = "INSERT INTO `".$TerranPrefix."news` (title, text, author, date) VALUES ('{$addtitle}','{$addtext}','{$userID}', '{$timeNowUNIXFormat}')";
	$result = mysqli_query($link, $sql);
	//header('Location: http://crm.terrangroup.biz/index.php?result=1305');
	echo '<meta http-equiv="refresh" content="0;URL=/asted/lenta/1305/" />';
}
function rand_chars($c, $l, $u = FALSE) {
if (!$u) for ($s = '', $i = 0, $z = strlen($c)-1; $i < $l; $x = rand(0,$z), $s .= $c{$x}, $i++);
else for ($i = 0, $z = strlen($c)-1, $s = $c{rand(0,$z)}, $i = 1; $i != $l; $x = rand(0,$z), $s .= $c{$x}, $s = ($s{$i} == $s{$i-1} ? substr($s,0,-1) : $s), $i=strlen($s));
return $s;
}
if (is_numeric($_GET['id'])) {
    if(isset($_GET['id'])){
		if($_GET['id'] == '1305'){
			echo '<meta http-equiv="refresh" content="2;URL=/asted/lenta/" />';
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	Asted: <?=$lang['the_news_was_added_successfully']?>
	</div></div>
<?}}}
if (is_numeric($_GET['id'])) {
    if(isset($_GET['id'])){
		if($_GET['id'] == '0513'){?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	Asted: <?=$lang['comment_added_successfully']?>
	</div></div>
<?}}}
if (is_numeric($_GET['id'])) {
    if(isset($_GET['id'])){
		if($_GET['id'] == '1991'){?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	Asted: <?=$lang['the_news_was_successfully_deleted']?>
	</div></div>
<?}}}?>
<script>
tinymce.init({
    selector: '#editor',
	toolbar: 'image',
	images_upload_url: '/asted/core/postAcceptor.php',
plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
	'image imagetools',
    'insertdatetime media table paste imagetools wordcount'
  ],
});


$(document).ready(function() {
		
	$( ".card-body, .navbar, .newstitle, .align-items-center" ).click(function() {
	$(".terrannewsedit").css({'display' : 'none'});
	}); 
});

</script>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['news'];?></h1>
            <a href="#" data-toggle="modal" data-target="#myModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> <?=$lang['create_news']?></a>
          </div>

            <!--Form-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?=$lang['create_news']?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
						<form action="" method="post">
                            <span><strong><?=$lang['theme']?>: </strong></span><input placeholder="" class="form-control"  name="titleadd" id="titleadd" type="тема">
                            <br>
                            <span><strong><?=$lang['message']?></strong></span>
							

									<textarea name="editor" id="editor" rows="10" cols="80">
									<?=$lang['enter_something']?>
									</textarea>              
							<input type="submit" name="submit" style="display:none" value="newsadd" name="newsadd" id="id0"
                                           class="btn btn-primary btn-user btn-block"/>
						</form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="button" onclick="javascript:document.getElementById('id0').click();" class="btn btn-primary"><?=$lang['add']?></button>
                        </div>
                    </div>
                </div>
            </div>
    
          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
			
	<?php
	if($newsResult == null){
	?>
                <div class="card-body">
                  <p><div class="alert alert-success" role="alert">
	Asted: <?=$lang['not_one_news_has_been_created_yet']?>
	</div></p>
                </div>
	<?}?>
              <!-- Approach -->
<?for($newsCont = 0; $newsCont < $newsContResult; $newsCont++){
$dataTimeNews = $newsResult[$newsCont]['date'];	

$randunicueid = rand_chars("abcdsqwer", 10);
	?>
<div class="card shadow mb-4" style="<?if($newsResult[$newsCont]['type'] == "alert"){?>background: #ffebeb;<?}?>">
                <div class="news-header">
                 <a class="newstitle" href="detalnews.php?id=<?=$newsResult[$newsCont]['id']?>"> <h6 class="m-0 font-weight-bold text-primary newstitle"><?=$newsResult[$newsCont]['title']?></h6> </a> 
<style>
</style>		
<script>
$(document).ready(function() {
		$(".terrannewsedit<?=$randunicueid?>").css({'display' : 'none'});
	$( ".newscontrol<?=$randunicueid?>" ).click(function() {
	$(".terrannewsedit<?=$randunicueid?>").css({'display' : 'block'});
	}); 
	$( ".opencomment<?=$newsResult[$newsCont]['id']?>" ).click(function() {
		$(".showcomment<?=$newsResult[$newsCont]['id']?>").css({'display' : 'block'});
		$(".opencomment<?=$newsResult[$newsCont]['id']?>").css({'display' : 'none'});
		$(".terranbtnlike<?=$newsResult[$newsCont]['id']?>").css({'display' : 'none'});
	}); 	
});


tinymce.init({
    selector: '#comment<?=$newsResult[$newsCont]['id']?>'
});
</script>		
		<i class="newscontrol newscontrol<?=$randunicueid?> fas fa-fw fa-edit" style="float: right;">
		<a href="editnews.php?id=<?=$newsResult[$newsCont]['id']?>" style="color: #4148a0;"> <div style="color: #4148a0;" class="terrannewsedit terrannewsedit<?=$randunicueid?>">
		 <?=$lang['edit']?>
		 </div> </a>
		<form action="" method="post"><input type="submit" name="newsdel" style="display:none" value="<?=$newsResult[$newsCont]['id']?>" name="deletenews" id="deletenews<?=$newsResult[$newsCont]['id']?>"> <div style="color: #4148a0;cursor :pointer;margin-top: 37px;" onclick="javascript:document.getElementById('deletenews<?=$newsResult[$newsCont]['id']?>').click();" class="terrannewsedit terrannewsedit<?=$randunicueid?>" style="margin-top: 38px;">
		 <?=$lang['delete']?>
		 </div></form>
		</i>
		
		
				<div class="newsicones"> <img src="/asted/templates/img/event.png"> <span class="newsdata"><?=date("d.m.Y",$dataTimeNews);?></span>  <a class="newsautor" href="/asted/profile/<?=$newsResult[$newsCont]['author']?>/"><img src="/asted/templates/img/person.png"> <span><?=$userNameNews[$newsCont]?> </span> </a></div>
				
                </div>
                <div class="card-body">
                  <p><?=$newsResult[$newsCont]['text']?></p>
                </div>
				<hr>
				<div class="card-body">
				<? 
				//print_r($forneews);
				for($commentCont = 0; $commentCont < 100; $commentCont++){
				if($forneews[$commentCont] == $newsResult[$newsCont]['id']){
					if($commentCont <= 0){?>
					
					<i style="background: antiquewhite;border-radius: 40px;padding: 6px;"><?=$lang['comments']?>:</i> <br><br>
					<?}?>
					<?php 
						if($commentNameNews[$commentCont] != null){
							?>
							<div style="background-color: #efefef;
    padding-top: 1px;
    border-radius: 3px;
    padding-left: 25px;">
	<?php 
	 $sql_lead_user = "SELECT * FROM `crm_users` WHERE id ='" . $commentNewsUsrID[$commentCont] . "'";
            $result_lead_user = mysqli_query($link, $sql_lead_user);
            while ($lead_user = mysqli_fetch_assoc($result_lead_user)) {
				$lead_username = "{$lead_user['name']}";
				$lead_usernameid = "{$lead_user['id']}";
                $lead_usersurname = "{$lead_user['surname']}";
				if (!empty($lead_user["avatar"])) {
                    $lead_userAvatar = '/asted/uploads/users/'.$lead_user["id"].'/avatar/'.$lead_user["avatar"].'';
                }else{
                    $lead_userAvatar = '/asted/templates/object/content/ava.png';
                }
			}
	?>
		<a href="/asted/profile/<?=$lead_usernameid?>/"> <img class="img-profile rounded-circle" style="height: 25px;
    padding-right: 10px;
    float: left;" src="<?=$lead_userAvatar?>"><strong><?=$lead_username;?> <?=$lead_usersurname;?></strong></a> <i><?=$commentNewsData[$commentCont];?> </i>
						<?=$commentNameNews[$commentCont]?>
						</div>
						<?}
				?>
					
				<?}}?></div><?if($newsResult[$newsCont]['type'] == "alert"){?></div><?}?>
				<span class="mewsfooter">
				<button type="button" class="btn terranbtnadd addcommentnews opencomment<?=$newsResult[$newsCont]['id']?>"><?=$lang['add_comment']?></button>
				<button type="button" class="btn terranbtnlike terranbtnlike<?=$newsResult[$newsCont]['id']?>"><i class="fas fa-heart"></i></button>
				</span>
				<form style="display: none;" action="" class="showcomment<?=$newsResult[$newsCont]['id']?>" method="post">
				<textarea name="comment<?=$newsResult[$newsCont]['id']?>" id="comment<?=$newsResult[$newsCont]['id']?>" rows="10" cols="80">
										<?=$lang['enter_something']?>
									</textarea>    
						<input type="text" name="commetid" style="display:none" value="<?=$newsResult[$newsCont]['id']?>" name="commetid" id="<?=$newsResult[$newsCont]['id']?>"	class="btn btn-primary btn-user btn-block"/>						
							<input type="submit" name="submit" style="display:none" value="commentadd" name="commentadd" id="id<?=$newsResult[$newsCont]['id']?>"
                                           class="btn terranbtnadd	 btn-user btn-block"/>
										    <button type="button" onclick="javascript:document.getElementById('id<?=$newsResult[$newsCont]['id']?>').click();" class="btn terranbtnadd sendcommentsnews"><?=$lang['add']?></button>
						</form>
              </div><?}?>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
<?php include "templates/footer.php"; ?>