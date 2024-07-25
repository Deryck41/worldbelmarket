<? include "templates/header.php";
if (is_numeric($_GET['id'])) {
    if (isset($_GET['id'])) {
        $crmusrdefend = true;
    }
}
$getidtogroup = $_GET['id'];
$idgrouptoview = $_GET['id'];
$newsContsy = $getidtogroup -= 1;
$sqlnews = "SELECT * FROM `".$TerranPrefix."group` WHERE `id` = " . $_GET['id'] . "; ";
$resultnews = mysqli_query($link, $sqlnews);
while ($itsnews = mysqli_fetch_assoc($resultnews)) {
    $itsGroupUsers = "{$itsnews['group_users']}";
    $itsNewsName = "{$itsnews['group_title']}";
    $itsUserSurName = "{$itsnews['group_description']}";
    $itsGroupViews = "{$itsnews['group_views']}";
    $itsGroupWiki = "{$itsnews['group_wiki']}";
	$itsDateGroup = "{$itsnews['group_datecreat']}";
	
	
}
$newvisit = $itsGroupViews + 1;
$sqlUloadAvaz = "UPDATE ".$TerranPrefix."group SET group_views='{$newvisit}' WHERE id='{$idgrouptoview}'";
$resultUloadAvaz = mysqli_query($link, $sqlUloadAvaz);
?>
    <script>
        tinymce.init({
            selector: '#wiki'
        });

        $(document).ready(function () {
            let wikiactive = false;
            $(".wikiedit").click(function () {
                if (wikiactive == false) {
                    $(".wikieditbody").css("display", "block");
                    $(".wikicontent").css("display", "none");
                    wikiactive = true;
                } else {
                    $(".wikieditbody").css("display", "none");
                    $(".wikicontent").css("display", "block");
                    wikiactive = false;
                }
            });
        })
    </script>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $lang['projects'] ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus fa-sm text-white-50"></i> Создать задачу</a>
        </div>
		<?include "core/section/addtask.php";?>

        <?include "core/section/addproject.php";?>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $itsNewsName ?></h6>
                        <div class="project_titleinform" style="padding-top: 10px;padding-bottom: 20px;">
                            <img src="/asted/templates/img/views.png" style="float: left;padding-right: 8px;margin-top: 2px;">
                            <span class="newsdata" style="padding-right: 8px;"><?= $itsGroupViews ?></span>
                            <img src="/asted/templates/img/event.png" style="float: left;padding-right: 8px;"> <span
                                    class="newsdata"><?=$itsDateGroup?></span>
                            <a class="newsautor" href="/asted/profile/<?= $itsGroupUsers ?>/"><img src="/asted/templates/img/person.png"> <span><?= $userNamegroup[$newsContsy] ?> </span>
                            </a>
                        </div>
                        <hr>
                        <p><?= $itsUserSurName ?></p>
                        <hr>
                        <!--<button type="button" style="margin-top: 10px;" class="btn terranbtnadd btngroup_news">Живая лента</button> -->
                        <button type="button" style="margin-top: 10px;" class="btn terranbtnadd btngroup_task"><?=$lang['task_list']?>
                        </button>
						<?if($cofigproject['0']['showwiki'] == "on"){?>
                        <button type="button" style="margin-top: 10px;" class="btn terranbtnadd btngroup_wiki"><?=$lang['project_Wiki']?>
                        </button>
						<?}?>
                        <!--<h6><?= $lang['users'] ?>: <a href="/profile.php?id=<?= $itsGroupUsers ?>"><?= $userNamegroup[$newsContsy] ?></a></h6> -->
                    </div>
                    <div class="card-body group_news" style="display: none">
                        <p>Example news</p>
                    </div>
                    <div class="card-body group_task" style="display: block">


                        <? while ($task = mysqli_fetch_assoc($result_task)) {
                            $title = "{$task['task_name']}";
                            $idtotask = "{$task['task_togroup']}";
                            $id = "{$task['id']}";
                            $taskStatus = "{$task['task_status']}";
                            $text = "{$task['task_text']}";
                            $taskCreat = "{$task['task_datacreat']}";
                            $taskCompletion = "{$task['task_datacompletion']}";
                            $taskAutor = "{$task['task_autor']}";
                            $taskExecutor = "{$task['task_executor']}";
                            if ($taskStatus == 0) {
                                $statuttask = "Открыта";
                                $statustaskstule = "task_status__open";
                            }
                            if ($taskStatus == 1) {
                                $statuttask = "Закрыта";
                                $statustaskstule = "task_status__clouse";
                            }
                            if ($taskStatus != 13) {

                                if ($_GET['id'] == $idtotask) {
                                    ?>
                                    <div class="card shadow mb-4">
                                    <div class="card-header py-3">

                                    <div class="row">
    <div class="col-md-6">
    <?php
$taskWho = R::load('crm_users', $taskAutor);
$taskTo = R::load('crm_users', $taskExecutor);
?>
                                        <a href="/asted/task/<?= $id ?>/"  <h6
                                                class="m-0 font-weight-bold text-primary"><?= $title; ?></h6></a> 
                                                <div>Постановщик: <a href="/asted/profile/<?=$taskWho->id?>/"><?=$taskWho->name?></a>,
            Исполнитель: <a href="/asted/profile/<?=$taskTo->id?>/"><?=$taskTo->name?></a></div> 
                                </div>    
                                                
                                <div class="col-md-3">
        
<!-- Asted: время задачи -->
<div><span class="card-date"><span class="card-number">Дата создания: 
                                <?php
                                $restt = substr($taskCreat, 0, 10);
                                echo date('d.m.Y', strtotime($restt));
                                ?>
                                </span> <br> 
                                <span class="card-mounth">Крайний срок: <?php
                                $rest = substr($taskCompletion, 0, 10);
                                echo $rest;
                                ?></span></span></div>
<!-- Asted: время задачи END -->
</div>   
<div class="col-md-3">       
<a
                                                href="/asted/task-edit/<?= $id ?>/"><i class="fas fa-fw fa-edit"
                                                                                     style="float: right;    float: right;margin-top: 3px;margin-left: 20px;"></i></a><span
                                                class="<?= $statustaskstule ?>"
                                                style="float: right;padding: 0 10px 0 10px;border-radius: 10px;"> <?= $statuttask ?> </span>
                                                </div>                         
                                                </div>                               

                                    
                                            </div>
                                    <div class="card-body">
                                        <p><?= $text ?></p>
                                    </div>
                                    </div><? }
                            }
                        } ?>


                    </div>
                    <div class="card-body group_wiki" style="display: none">
                        <i class="fas fa-fw fa-edit wikiedit"
                           style="float: right;    float: right;margin-top: 3px;margin-left: 20px;"></i>
                        <p class="wikicontent"><?= $itsGroupWiki ?></p>
                        <div class="wikieditbody" style="display:none;">
                            <input class="wikiid" style="display: none" value="<?=$_GET['id']?>">
                            <script>
                                $(document).ready(function () {
                                    $(".savewiki").click(function () {
                                        var eds = tinyMCE.get('wiki');
                                        $(".wikicontent").html(eds.getContent());
                                        //alert(eds.getContent());
                                        jQuery.ajax({
                                            type: "POST",
                                            url: "/asted/core/core.php",
                                            data: {
                                                "Wiki-group":`${$(".wikiid").val()}`,
                                                "Wiki-message": eds.getContent()
                                            },
                                            success: function(response) {
                                                var jsonData = JSON.parse(response);
                                                if (jsonData.success == "1")
                                                {
                                                    alert("Asted: Wiki успешно обновлена")
                                                }
                                                else
                                                {
                                                    alert('Asted: не удалось обновить Wiki!');
                                                }

                                            }
                                    });
                                })
                                })
                            </script>
                            <textarea name="wiki" id="wiki" rows="10" cols="80">
										<?= $itsGroupWiki ?>
					</textarea>
                            <button class="savewiki"><?=$lang['save']?></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>