<? include "templates/header.php";?>
 <div class="container-fluid">
 <?php
if($userSessionDivisions == "1"){?>
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['domain_name']?></h1>
            </div>
		  
		    <div class="card">
    <div class="card-header">
        <?=$lang['domain_list']?>
    </div>
    <div class="card-body collapse show">
     <h5><a href="https://test.by">test.by</a></h5>
	 <strong><?=$lang['registrar']?>:</strong> hoster.by <br>
	 <strong><?=$lang['regData']?>:</strong> 24.05.2010 <br>
	 <strong><?=$lang['closing_date']?>:</strong> 14.06.2020 <br><br>
	 <strong><?=$lang['status']?>:</strong> <span style="color: green;"><?=$lang['active_project']?></span>
	 <hr>
	 <h5><a href="https://test.it">test.it</a></h5>
	 <strong><?=$lang['registrar']?>:</strong> internet.bs <br>
	 <strong><?=$lang['regData']?>:</strong> 16.03.2019 <br>
	 <strong><?=$lang['closing_date']?>:</strong> 16.03.2021 <br><br>
	 <strong><?=$lang['status']?>:</strong> <span style="color: green;"><?=$lang['active_project']?></span>
	 <hr>
	 <h5><a href="https://test.ru">test.ru</a></h5>
	 <strong><?=$lang['registrar']?>:</strong> reg.ru <br>
	 <strong><?=$lang['regData']?>:</strong> 17.02.2017 <br>
	 <strong><?=$lang['closing_date']?>:</strong> 17.02.2021 <br><br>
	 <strong><?=$lang['status']?>:</strong> <span style="color: green;"><?=$lang['active_project']?></span>
	 <hr>
	 <h5><a href="https://test.ru">test.ru</a></h5>
	 <strong><?=$lang['registrar']?>:</strong> reg.ru <br>
	 <strong><?=$lang['regData']?>:</strong> 15.05.2018 <br>
	 <strong><?=$lang['closing_date']?>:</strong> 15.05.2020 <span style="color: red;">(<?=$lang['RENEWAL_REQUIRED']?>) </span><br><br>
	 <strong><?=$lang['status']?>:</strong> <span style="color: blue;"><?=$lang['deferred']?></span>
	 <hr>
	 <h5><a href="https://test.ru">test.ru</a></h5>
	 <strong><?=$lang['registrar']?>:</strong> reg.ru <br>
	 <strong><?=$lang['regData']?>:</strong> 29.08.2019 <br>
	 <strong><?=$lang['closing_date']?>:</strong> 29.08.2020 <br><br>
	 <strong><?=$lang['status']?>:</strong> <span style="color: blue;"><?=$lang['deferred']?></span>
	 <hr>
    </div>
    </div>  
	<?}else{?>
<div class="alert alert-info" role="alert">
<?=$lang['access_to_the_page_is_closed']?>
</div>
<?}?>
		  </div>
 <? include "templates/footer.php"; ?>