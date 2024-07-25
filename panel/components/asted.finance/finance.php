<? include "templates/header.php";

$sql_finance = "SELECT * FROM `crm_finance`";
$sql = mysqli_query($link,  $sql_finance);
$finance =[];
while($result= $sql->fetch_assoc()){
    $finance[] = $result;
}
$last = count($finance)-1;




if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '1305'){
	?>
	<div class="container-fluid">
	<div class="alert alert-success" role="alert">
	TerranCRM: <?=$lang['finance_successfully_added']?>
	</div></div>
<?}}}?>
<script src="templates/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: '#editor'
});
</script>
<div class="container-fluid">

 <?php

if($userSessionDivisions == "1" ){?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['finance']?></h1>
            <a href="#" data-toggle="modal" data-target="#myModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> <?=$lang['add_finance']?></a>
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
                            <span><strong><?=$lang['theme']?>: </strong></span><input placeholder="Заголовок..." class="form-control"  name="titleadd" id="titleadd" type="тема">
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


<div class="row">
<div class="col-sm-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?=$lang['total_revenue']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

$</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<div class="col-sm-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Общие расходы</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

$</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
</div>
			<div class="col-sm-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Остаток</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

$</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<br>
<div class="row">
<div class="col">

<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$lang['receipt_of_finance']?></h6>
                </div>
				<div class="card-body">
                    <div class="table-responsive">
                    <? foreach($finance as $key => $value):?>
                        <div class="row w-100">
                            <div class="col-sm-6">
                                Вид работ:<select class="form-control work-type" name="" id="">
                                    <option value="service">Послупление услуги</option>
                                    <option value="site">Разработка сайта</option>
                                    <option value="design">Дизайн</option>
                                    <option value="mm">SMM</option>
                                    <option value="seo">SEO</option>
                                </select>
                                <div class="finance-developer hidden">
                                Исполнитель:<select class="form-control responsible" name="" id="">
                                    <?php echo implode ('', $userDeveloper); ?>
                                </select>
                                    <div class="finance-design hidden">
                                        Исполнитель:<select class="form-control responsible" name="" id="">
                                            <?php echo implode ('', $userDeveloper); ?>
                                        </select>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-center justify-content-lg-end">
                                <span class="finance-data mr-2"> <?=$value["time"];?></span>
                                <span class="finance-score"> <?=$value["score"];?> BYN</span>
                                <button class="ml-2 mr-2 btn print_finance btn-primary " ></button>
                            </div>
                        </div>
                    <hr/>
                    <?endforeach;?>

                        <table class="table">

                            <tbody id="table_finance">

                            </tbody>
                        </table>
                    </div>
				</div>
			</div>	
</div>
</div>
<div class="row">
<div class="col">
	<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$lang['dynamics_of_receipts']?></h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
                  <hr>
                  Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
                </div>
              </div>
		</div>	</div>	
		
<?}else{?>
<div class="alert alert-info" role="alert">
<?=$lang['access_to_the_page_is_closed']?>
</div>
<?}?>
</div>			
 <? include "templates/footer.php"; ?>
 
 <script>

     $(document).ready(function() {
         $(".work-type").change(function(){
             if($(this).val() === "site"){
                $(this).parent().find(".finance-developer").slideDown()
             }else{
                 $(this).parent().find(".finance-developer").slideUp()
             }
         })

         $('body').on('click', '.print_finance', function() {
          let score  = $(this).parent().find(".finance-score").text()
          let developer =$(this).parent().parent().find(".responsible").val()
          let data = $(this).parent().find(".finance-data").text()
         if($(".work-type").val() === "service"){
             ajax_finance(developer,score,$(this),data,"service")
         }
         if($(".work-type").val() === "site"){
             ajax_finance(developer,score,$(this),data,"site")
         }

     }
     )

         function ajax_finance(developer,score,element,finance_data,event){
             jQuery.ajax({
                 type: "POST",
                 url: "core/financer.php",
                 data: {
                     "event":`${event}`,
                     "score": `${score}`,
                     "developer": `${developer}`,
                     "data":`${finance_data}`
                 },
                 success: function(html) {
                     let array = html
                     console.log(html)
                     if(array !== null && array.length !== 0){
                         $(element).parent().parent().parent().find("#table_finance").html(JSON.parse(html))
                     }else{
                         alert("error")
                     }

                 }
             });
         }
     })
 // Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Январь 2020", "Февраль 2020", "Март 2020", "Апрель 2020", "Май 2020", "Июнь 2020"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [51, 0, 0, 0, 0, 0],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 500,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});
 </script>