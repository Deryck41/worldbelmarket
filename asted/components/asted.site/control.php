<? include "templates/header.php";?>
<div class="container-fluid">
 <?php
if($userSessionDivisions == "1"){?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['property']?></h1>
            <a href="#" data-toggle="modal" data-target="#myModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> <?=$lang['create_divisions']?></a>
          </div>
		  
		  
		  
		  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$lang['property_inventory']?></h6>
                </div>
                <div class="card-body">
				<?while ($task = mysqli_fetch_assoc($result_divisions)) {$title = "{$task['title']}";$id = "{$task['id']}";
	?>
                  <div class="p-3 bg-gray-100">#<?=$id?> - <?=$title?></div><br>
				<?}?>
                </div>
              </div>
			  	<?}else{?>
<div class="alert alert-info" role="alert">
<?=$lang['access_to_the_page_is_closed']?>
</div>
<?}?>
</div>

<? include "templates/footer.php"; ?>