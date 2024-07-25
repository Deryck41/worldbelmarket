<? include "templates/header.php";?>
<div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Валюты на сайте: </h1>
           </div>


           <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Настройка системы мультивалютности</h6>
                </div>
                <div class="card-body">
				<form action="" method="post" class="row">
					<div class="col-3">
                            <label for="exampleInputPassword1">Валюта</label>
                           	 </div>	
						 					<div class="col-3">
                            <label for="exampleInputPassword1">Код</label>
           </div>	
						 					<div class="col-3">
                            <label for="exampleInputPassword1">Номинал</label>
           </div>	
						 					<div class="col-3">
                            <label for="exampleInputPassword1">Активность</label>
           </div>	
					<?php
					  $sql_websiteconnection = "SELECT * FROM `crm_currency`";
					     $result_websiteconnection = mysqli_query($link, $sql_websiteconnection);
   // $websiteconnection = mysqli_fetch_assoc($result_websiteconnection);
   // print_r( $websiteconnection );
    while ($taskxxs = mysqli_fetch_assoc($result_websiteconnection)) {
    	
					  ?>
					<div class="col-3">
                         
                            <input type="text" class="form-control" name="websitesectname" id="websitesectname" value="<?=$taskxxs['currency']?>">
						 </div>	
						 					<div class="col-3">
                  
                            <input type="text" class="form-control" name="websitesectname" id="websitesectname" value="<?=$taskxxs['currencycode']?>">
						 </div>	
						 					<div class="col-3">
                       
                            <input type="text" class="form-control" name="websitesectname" id="websitesectname" value="<?=$taskxxs['currencyprice']?>">
						 </div>	
						 					<div class="col-3">
                       
                            <input type="checkbox" class="form-control" name="websitesectname" id="websitesectname" value="Активность" <?php if($taskxxs['currencydefault'] == "y"){?> checked<?}?>>
						 </div>	
					<?php }	  ?>
				
		  </div>			  	</div>


</div>

<? include "templates/footer.php"; ?>