<? include "templates/header.php";

$sql_bl = "SELECT * FROM `crm_seobacklink` WHERE `forproject` = ".$_GET['id']." ORDER BY `id` DESC; ";
$result_bl = mysqli_query($link, $sql_bl);


$sql_bls = "SELECT * FROM `crm_seolink` WHERE `id` = ".$_GET['id']."; ";
$result_bls = mysqli_query($link, $sql_bls);
$backlinks = mysqli_fetch_assoc($result_bls);


if ($_POST['submit'] == 'newsadd') {
	$addtitle = $_POST['titleadd'];
	$addtext = $_GET['id'];
	$dataLink = date("Y-n-j G:i:s");
	$sql = "INSERT INTO `crm_seobacklink` (link, forproject, data) VALUES ('{$addtitle}','{$addtext}','{$dataLink}')";
	$result = mysqli_query($link, $sql);
	//header('Location: http://crm.terrangroup.biz/index.php?result=1305');
	echo '<meta http-equiv="refresh" content="0;URL=seo_backlinkview.php?id='.$_GET['id'].'&result=1305" />';
}
if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '1305'){
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: <?=$lang['link_added_successfully']?>
	</div></div>
<?}}}?>


    <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$backlinks["name"]?></h1>
          <p class="mb-4"><?=$lang['list_of_backlinks_for_the_project']?> <?=$backlinks["name"]?>.</p>



          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" data-toggle="modal" data-target="#myModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> <?=$lang['add_link']?></a>
          </div>
		  
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?=$lang['adding_a_link']?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
						<form action="" method="post">
                            <span><strong><?=$lang['write_link']?>: </strong></span><input placeholder="Ссылка..." class="form-control"  name="titleadd" id="titleadd" type="тема">
                          
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
		  
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?=$backlinks["name"]?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><?=$lang['nameOfProject']?></th>
                      <th><?=$lang['link']?></th>
					  <th><?=$lang['date']?></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th><?=$lang['nameOfProject']?></th>
                      <th><?=$lang['link']?></th>
					  <th><?=$lang['date']?></th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?while ($backlink = mysqli_fetch_assoc($result_bl)) {$title = "{$backlink['link']}";$titledata = "{$backlink['data']}";?>
                    <tr>
                      <td><?=$backlinks["name"]?></td>
                      <td><a href="<?=$title?>"><?=$title?></a></td>
                      <td><?=$titledata?></td>
                    </tr>
					<?}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>






		
 <? include "templates/footer.php"; ?>
   <script src="templates/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="templates/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready(function() {
  $('#dataTable').DataTable();
});
  </script>