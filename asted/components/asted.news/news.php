<? include "templates/header.php";
if (is_numeric($_GET['id'])) {
    if(isset($_GET['id'])){
        $crmusrdefend = true;
    }
}
    $sqlnews = "SELECT * FROM `crm_news` WHERE `id` = ".$_GET['id']."; ";
    $resultnews = mysqli_query($link,$sqlnews);
    while ($itsnews = mysqli_fetch_assoc($resultnews)) {
        $itsNewsName = "{$itsnews['title']}";
        $itsUserSurName = "{$itsnews['text']}";
    }
?>
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
                        <span><strong><?=$lang['theme']?>: </strong></span><input class="form-control" type="тема">
                        <br>
                        <span><strong><?=$lang['message']?></strong></span>
                        <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                        <button type="button" class="btn btn-primary"><?=$lang['add']?></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

                <!-- Approach -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?=$itsNewsName;?></h6>
                    </div>
                    <div class="card-body">
                        <p><?=$itsUserSurName;?></p>
                    </div>
					                <div class="card-body">
                  <p><?=$text?></p>
                    <hr>
                    <div class="col">
                        <div class="comment_user">
                            <a href="#"><i><?=$username?></i></a>
                            <img style="width: 30px;height: 30px;border-radius: 50%" src="<?=$userAvatar?>" alt="">
                            <a href="#"><i style="float: right">12.22.2999</i></a>
                        </div>
                        <div class="comment">
                            <p><?=$lang['version']?> #1 RC</p>
                        </div>
                    </div>
                    <hr>

                    <div class="container">
                        <input class="form-control" type="text" placeholder="<?=$lang['add_comment']?>">
                        <button class="btn btn-success" style="margin-top: 1%"><?=$lang['add']?></button>
                    </div>
                </div>
                    </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>