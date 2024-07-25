<?php
$sql_leadsResult = "SELECT * FROM `".$TerranPrefix."lido` ORDER BY `id` DESC";
$result_leads = mysqli_query($link, $sql_leadsResult);
$numRowsResult = mysqli_num_rows($result_leads);

$sql_leadsResults = "SELECT * FROM `".$TerranPrefix."lido` WHERE columntable ='completed-list'";
$result_leadss = mysqli_query($link, $sql_leadsResults);
$numRowsResults = mysqli_num_rows($result_leadss);

$sql_leadsResultsx = "SELECT * FROM `".$TerranPrefix."lido` WHERE columntable ='in-progress-list'";
$result_leadssx = mysqli_query($link, $sql_leadsResultsx);
$numRowsResultsx = mysqli_num_rows($result_leadssx);

$sql_leadsResultz = "SELECT * FROM `".$TerranPrefix."lido` WHERE columntable ='refuse-list'";
$result_leadsz = mysqli_query($link, $sql_leadsResultz);
$numRowsResultz = mysqli_num_rows($result_leadsz);
?>
 <div class="container-fluid">
<div class="row">
  <div class="col-sm-12">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Всего работников добавлено в систему</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                        <?=$usercontid?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<hr>
<?php 
	if($numRowsResult == '0'){
?>
<div class="row">
  <div class="col-sm-12">
    <div class="card border-left-warning shadow h-100 py-2 pl-3">В данных момент нет добавленых в систему лидов </div>
  </div>
</div>	
<?php 
}else{ ?>

<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Показать аналитику работы с лидами
  </a>

</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">

  

  <div style="padding: 14px; background-color: rgb(244, 244, 244); border-radius: 10px;">
<h3 style="text-align: center; color: rgb(80, 74, 74);">Аналитика работы с лидами</h3>

<div class="row">
<div class="col-sm-12" style="padding-top: 10px;">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Всего добавлено лидов</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
<?=$numRowsResult?>
<?php //print_r($result_leads); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
</div>
</div>
<hr>
<div class="row">
			<div class="col-sm-6" style="padding-top: 10px;">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Принемают решения</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

<?=$numRowsResults?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-sm-6" style="padding-top: 10px;">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">CTR потенциальной конверсии</div>
                      
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

<?php $ctrLeads = 100 * $numRowsResults / $numRowsResult; echo $ctrLeads;?>%</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



</div>

<p class="pt-4" style="font-size: 12px; font-family: roboto; text-align: center;">Из <strong><?=$numRowsResult?></strong> добавленых <strong><?=$numRowsResults?></strong> принемают решения </p>
            <hr>


            <div class="row">
			<div class="col-sm-6" style="padding-top: 10px;">
              <div class="card border-left-muted shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">Нет связи</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

<?=$numRowsResultsx?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-sm-6" style="padding-top: 10px;">
              <div class="card border-left-muted shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">% тех кто не поднимает</div>
                      
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

<?php $ctrLeadsxx = 100 * $numRowsResultsx / $numRowsResult; echo $ctrLeadsxx;?>%</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



</div>
<p class="pt-4" style="font-size: 12px; font-family: roboto; text-align: center;">Из <strong><?=$numRowsResult?></strong> не вышли на связь <strong><?=$numRowsResultsx?></strong> представителей </p>
 
<hr>
<div class="row">
  
			<div class="col-sm-6" style="padding-top: 10px;">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Всего отказов</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

<?=$numRowsResultz?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ban fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
			<div class="col-sm-6" style="padding-top: 10px;">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">CTR отказов</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

<?php $ctrFailLeads = 100 * $numRowsResultz / $numRowsResult ; echo $ctrFailLeads;?>%</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ban fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>		
            
            

</div>
<div class="row">

            <p class="col-12 pt-4" style="margin: 0 auto; font-size: 12px; font-family: roboto; text-align: center;">Из <strong><?=$numRowsResult?></strong> отказались <strong><?=$numRowsResultz?></strong> компаний </p>
          




            
<div class="col-xl-12 col-lg-12 pt-4 mt-4">
<hr>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Конвертация</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myPieChart" width="288" height="245" class="chartjs-render-monitor" style="display: block; width: 288px; height: 245px;"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Принемают решения
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #9fa6ba"></i> Не взяли трубку
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Отказы
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
</div>



  </div>
</div>
<?}?>
 </div>
 <script>
$(document).ready(function(){
	 // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Не взяли трубку", "Отказы", "Принемают решения"],
    datasets: [{
      data: [<?=$numRowsResultsx?>, <?=$numRowsResultz?>, <?=$numRowsResults?>],
      backgroundColor: ['#9fa6ba', '#e74a3b', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
	
});
</script>