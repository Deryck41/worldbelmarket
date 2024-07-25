<? include "templates/header.php";?>
 <div class="container-fluid">
  <?php
if($userSessionDivisions == "1"){?>
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['backlink_projects']?></h1>
            <a href="#" data-toggle="modal" data-target="#myModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> <?=$lang['add_project']?></a>
          </div>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?=$lang['add_project']?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span><strong><?=$lang['nameOfProject']?>: </strong></span><input class="form-control" type="тема">
                            <br>
                            <span><strong><?=$lang['select_a_group']?>: </strong></span>
                            <select class="form-control" name="" id="">
							<?for($newsCont = 0; $newsCont < $groupContResult; $newsCont++){?>
                                <option value="<?=$groupResult[$newsCont]['id']?>">><?=$groupResult[$newsCont]['group_title']?></option>
								<?}?>
                            </select>
							<br>
                            <span><strong><?=$lang['responsible']?>: </strong></span>
                            <select class="form-control" name="" id="">
                                <option value="1"><?=$lang['Arthur']?></option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="button" class="btn btn-primary"><?=$lang['add']?></button>
                        </div>
                    </div>
                </div>
            </div>


     <p class="mb-4"><?=$lang['a_list_of']?></p>

 <div class="row">

            <!-- Content Column -->
          <div class="col-lg-12 mb-4">
<?for($newsCont = 0; $newsCont < $groupbkContResult; $newsCont++){
	?>
	<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="<?=$getLink?>/seo_backlinkview.php?id=<?=$groupbkResult[$newsCont]['id']?>">   <h6 class="m-0 font-weight-bold text-primary"><?=$groupbkResult[$newsCont]['name']?></h6> </a>
                    <hr>
                  <a href=""></a><h6><?=$lang['extender']?>: <a href="<?=$getLink?>/profile.php?id=<?=$groupbkResult[$newsCont]['whodoit']?>"><?=$userNamegroupbk[$newsCont]?></a> </div>
              </div>
	
	<?}?>
              <!-- Approach -->


            </div>
          </div>
			  	<?}else{?>
<div class="alert alert-info" role="alert">
<?=$lang['access_to_the_page_is_closed']?>
</div>
<?}?>
       </div>
 <? include "templates/footer.php"; ?>