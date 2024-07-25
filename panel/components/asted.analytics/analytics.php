<? include "templates/header.php";
if (is_numeric($_GET['id'])) {
    if(isset($_GET['id'])){
        $crmusrdefend = true;
    }
}
    $sqlnews = "SELECT * FROM `crm_analytics` WHERE `id` = ".$_GET['id']."; ";
    $resultnews = mysqli_query($link,$sqlnews);
    while ($itsnews = mysqli_fetch_assoc($resultnews)) {
        $itsNewsName = "{$itsnews['title']}";
        $itsUserSurName = "{$itsnews['text']}";
    }
?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Charts</h1>
                    <p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme.
                        The charts below have been customized - for further customization options, please visit the <a
                            target="_blank" href="https://www.chartjs.org/docs/latest/">official Chart.js
                            documentation</a>.</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the area chart can be found in the
                                    <code>/js/demo/chart-area-demo.js</code> file.
                                </div>
                            </div>



                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the donut chart can be found in the
                                    <code>/js/demo/chart-pie-demo.js</code> file.
                                </div>
                            </div>
                        </div>


 <div class="col-xl-12 col-lg-12">
                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bar Chartww</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the bar chart can be found in the
                                    <code>/js/demo/chart-bar-demo.js</code> file.
                                </div>
                            </div>

      </div>  

<div class="col-xl-12 col-lg-12">
<div class="card ">
                                <div class="card-header header-elements-sm-inline">
                                    <h6 class="card-title">Marketing campaigns</h6>
                                    <div class="header-elements">
                                        <span class="badge badge-success badge-pill">28 active</span>
                                        <div class="list-icons ml-3">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
                                    <div class="d-flex align-items-center mb-3 mb-sm-0">
                                        <div id="campaigns-donut"><svg width="42" height="42"><g transform="translate(21,21)"><g class="d3-arc d3-slice-border" style="cursor: pointer;"><path style="fill: rgb(102, 187, 106);" d="M1.1634144591899855e-15,19A19,19 0 0,1 -14.050144241469582,12.790365389381929L-7.025072120734791,6.3951826946909645A9.5,9.5 0 0,0 5.817072295949927e-16,9.5Z"></path></g><g class="d3-arc d3-slice-border" style="cursor: pointer;"><path style="fill: rgb(149, 117, 205);" d="M-14.050144241469582,12.790365389381929A19,19 0 0,1 0.6493373977393208,-18.988900993577726L0.3246686988696604,-9.494450496788863A9.5,9.5 0 0,0 -7.025072120734791,6.3951826946909645Z"></path></g><g class="d3-arc d3-slice-border" style="cursor: pointer;"><path style="fill: rgb(255, 112, 67);" d="M0.6493373977393208,-18.988900993577726A19,19 0 0,1 5.817072295949928e-15,19L2.908536147974964e-15,9.5A9.5,9.5 0 0,0 0.3246686988696604,-9.494450496788863Z"></path></g></g></svg></div>
                                        <div class="ml-3">
                                            <h5 class="font-weight-semibold mb-0">38,289 <span class="text-success font-size-sm font-weight-normal"><i class="icon-arrow-up12"></i> (+16.2%)</span></h5>
                                            <span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">May 12, 12:30 am</span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-3 mb-sm-0">
                                        <div id="campaign-status-pie"><svg width="42" height="42"><g transform="translate(21,21)"><g class="d3-arc d3-slice-border" style="cursor: pointer;"><path style="fill: rgb(41, 182, 246);" d="M1.1634144591899855e-15,19A19,19 0 0,1 -10.035763324841723,-16.133302652828462L-5.017881662420861,-8.066651326414231A9.5,9.5 0 0,0 5.817072295949927e-16,9.5Z"></path></g><g class="d3-arc d3-slice-border" style="cursor: pointer;"><path style="fill: rgb(239, 83, 80);" d="M-10.035763324841723,-16.133302652828462A19,19 0 0,1 17.35205039879773,-7.739919053684189L8.676025199398865,-3.8699595268420945A9.5,9.5 0 0,0 -5.017881662420861,-8.066651326414231Z"></path></g><g class="d3-arc d3-slice-border" style="cursor: pointer;"><path style="fill: rgb(129, 199, 132);" d="M17.35205039879773,-7.739919053684189A19,19 0 0,1 14.540850859600345,12.229622082421841L7.270425429800173,6.1148110412109205A9.5,9.5 0 0,0 8.676025199398865,-3.8699595268420945Z"></path></g><g class="d3-arc d3-slice-border" style="cursor: pointer;"><path style="fill: rgb(153, 153, 153);" d="M14.540850859600345,12.229622082421841A19,19 0 0,1 5.817072295949928e-15,19L2.908536147974964e-15,9.5A9.5,9.5 0 0,0 7.270425429800173,6.1148110412109205Z"></path></g></g></svg></div>
                                        <div class="ml-3">
                                            <h5 class="font-weight-semibold mb-0">2,458 <span class="text-danger font-size-sm font-weight-normal"><i class="icon-arrow-down12"></i> (-4.9%)</span></h5>
                                            <span class="badge badge-mark border-danger mr-1"></span> <span class="text-muted">Jun 4, 4:00 am</span>
                                        </div>
                                    </div>

                                    <div>
                                        <a href="#" class="btn btn-indigo"><i class="icon-statistics mr-2"></i> View report</a>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Campaign</th>
                                                <th>Client</th>
                                                <th>Changes</th>
                                                <th>Budget</th>
                                                <th>Status</th>
                                                <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-active table-border-double">
                                                <td colspan="5">Today</td>
                                                <td class="text-right">
                                                    <span class="progress-meter" id="today-progress" data-progress="30"><svg width="20" height="20"><g transform="translate(10,10)"><g class="progress-meter"><path d="M0,8A8,8 0 1,1 0,-8A8,8 0 1,1 0,8Z" style="fill: none; stroke: rgb(121, 134, 203); stroke-width: 1.5;"></path><path style="fill: rgb(121, 134, 203);" d="M4.898587196589413e-16,-8A8,8 0 0,1 7.608452130361228,2.472135954999579L0,0Z"></path></g></g></svg></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <a href="#">
                                                                <img src="../../../../global_assets/images/brands/facebook.svg" class="rounded-circle" width="32" height="32" alt="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-body font-weight-semibold">Facebook</a>
                                                            <div class="text-muted font-size-sm">
                                                                <span class="badge badge-mark border-primary mr-1"></span>
                                                                02:00 - 03:00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-muted">Mintlime</span></td>
                                                <td><span class="text-success"><i class="icon-stats-growth2 mr-2"></i> 2.43%</span></td>
                                                <td><h6 class="font-weight-semibold mb-0">$5,489</h6></td>
                                                <td><span class="badge badge-primary">Active</span></td>
                                                <td class="text-center">
                                                    <div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <a href="#">
                                                                <img src="../../../../global_assets/images/brands/youtube.svg" class="rounded-circle" width="32" height="32" alt="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-body font-weight-semibold">Youtube videos</a>
                                                            <div class="text-muted font-size-sm">
                                                                <span class="badge badge-mark border-danger mr-1"></span>
                                                                13:00 - 14:00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-muted">CDsoft</span></td>
                                                <td><span class="text-success"><i class="icon-stats-growth2 mr-2"></i> 3.12%</span></td>
                                                <td><h6 class="font-weight-semibold mb-0">$2,592</h6></td>
                                                <td><span class="badge badge-danger">Closed</span></td>
                                                <td class="text-center">
                                                    <div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <a href="#">
                                                                <img src="../../../../global_assets/images/brands/spotify.svg" class="rounded-circle" width="32" height="32" alt="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-body font-weight-semibold">Spotify ads</a>
                                                            <div class="text-muted font-size-sm">
                                                                <span class="badge badge-mark border-secondary mr-1"></span>
                                                                10:00 - 11:00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-muted">Diligence</span></td>
                                                <td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> - 8.02%</span></td>
                                                <td><h6 class="font-weight-semibold mb-0">$1,268</h6></td>
                                                <td><span class="badge badge-secondary">On hold</span></td>
                                                <td class="text-center">
                                                    <div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <a href="#">
                                                                <img src="../../../../global_assets/images/brands/twitter.svg" class="rounded-circle" width="32" height="32" alt="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-body font-weight-semibold">Twitter ads</a>
                                                            <div class="text-muted font-size-sm">
                                                                <span class="badge badge-mark border-secondary mr-1"></span>
                                                                04:00 - 05:00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-muted">Deluxe</span></td>
                                                <td><span class="text-success"><i class="icon-stats-growth2 mr-2"></i> 2.78%</span></td>
                                                <td><h6 class="font-weight-semibold mb-0">$7,467</h6></td>
                                                <td><span class="badge badge-secondary">On hold</span></td>
                                                <td class="text-center">
                                                    <div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="table-active table-border-double">
                                                <td colspan="5">Yesterday</td>
                                                <td class="text-right">
                                                    <span class="progress-meter" id="yesterday-progress" data-progress="65"><svg width="20" height="20"><g transform="translate(10,10)"><g class="progress-meter"><path d="M0,8A8,8 0 1,1 0,-8A8,8 0 1,1 0,8Z" style="fill: none; stroke: rgb(121, 134, 203); stroke-width: 1.5;"></path><path style="fill: rgb(121, 134, 203);" d="M4.898587196589413e-16,-8A8,8 0 1,1 -6.472135954999579,4.702282018339786L0,0Z"></path></g></g></svg></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <a href="#">
                                                                <img src="../../../../global_assets/images/brands/bing.svg" class="rounded-circle" width="32" height="32" alt="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-body font-weight-semibold">Bing campaign</a>
                                                            <div class="text-muted font-size-sm">
                                                                <span class="badge badge-mark border-success mr-1"></span>
                                                                15:00 - 16:00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-muted">Metrics</span></td>
                                                <td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> - 5.78%</span></td>
                                                <td><h6 class="font-weight-semibold mb-0">$970</h6></td>
                                                <td><span class="badge badge-success">Pending</span></td>
                                                <td class="text-center">
                                                    <div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <a href="#">
                                                                <img src="../../../../global_assets/images/brands/amazon.svg" class="rounded-circle" width="32" height="32" alt="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-body font-weight-semibold">Amazon ads</a>
                                                            <div class="text-muted font-size-sm">
                                                                <span class="badge badge-mark border-danger mr-1"></span>
                                                                18:00 - 19:00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-muted">Blueish</span></td>
                                                <td><span class="text-success"><i class="icon-stats-growth2 mr-2"></i> 6.79%</span></td>
                                                <td><h6 class="font-weight-semibold mb-0">$1,540</h6></td>
                                                <td><span class="badge badge-primary">Active</span></td>
                                                <td class="text-center">
                                                    <div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <a href="#">
                                                                <img src="../../../../global_assets/images/brands/dribbble.svg" class="rounded-circle" width="32" height="32" alt="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-body font-weight-semibold">Dribbble ads</a>
                                                            <div class="text-muted font-size-sm">
                                                                <span class="badge badge-mark border-primary mr-1"></span>
                                                                20:00 - 21:00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-muted">Teamable</span></td>
                                                <td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> 9.83%</span></td>
                                                <td><h6 class="font-weight-semibold mb-0">$8,350</h6></td>
                                                <td><span class="badge badge-danger">Closed</span></td>
                                                <td class="text-center">
                                                    <div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
   </div>  



                    </div>

                </div>
                <!-- /.container-fluid -->

          
    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>
<script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Direct", "Referral", "Social"],
    datasets: [{
      data: [55, 30, 15],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
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
</script>
<script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [4215, 5312, 6251, 7841, 9821, 14984],
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
          max: 15000,
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