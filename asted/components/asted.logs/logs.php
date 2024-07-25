<? include "templates/header.php"; ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['log_of_activity']?></h1>
        </div>


        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?=$lang['report']?></h6>
                    </div>
                    <div class="card-body">
                       <?php $sqluser = "SELECT * FROM `".$TerranPrefix."logs`";
							$resultuser = mysqli_query($link, $sqluser);
							while ($itsuser = mysqli_fetch_assoc($resultuser)) {
							$itsLogid = "{$itsuser['id']}";
							$itsLogeventnames = "{$itsuser['eventnames']}";
							$itsLogdatestimes = "{$itsuser['datestimes']}";	
							$itsLogtype = "{$itsuser['type']}";
							$itsLogip = "{$itsuser['ip']}";									?>
							<p><strong>Время:</strong> <?=$itsLogdatestimes?> <strong>Кто:</strong> <?=$itsLogeventnames?>  <strong>Событие:</strong> <?=$itsLogtype?> <strong>IP Адрес:</strong> <?=$itsLogip?></p> <hr>
							<?}?>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>