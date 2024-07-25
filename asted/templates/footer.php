    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white pb-0">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span><?= $titleNameProject; ?> &copy; 2019, <?= date("Y") ?> <?= $astedInfo->company; ?> <br>
            Версия: <?= $astedInfo->version; ?>, Сборка: <?= $astedInfo->build; ?>, от <?= $astedInfo->date; ?></span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="<?= $astedADM ?>templates/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= $astedADM ?>templates/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= $astedADM ?>templates/js/terrancrm.js"></script>

    <!-- Page level plugins -->
    <script src="<?= $astedADM ?>templates/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= $astedADM ?>templates/js/demo/chart-area-demo.js"></script>
    <script src="<?= $astedADM ?>templates/js/lead-deal.js"></script>
    <script src="<?= $astedADM ?>templates/js/jquery.tipsy.min.js"></script>
    <script src="<?= $astedADM ?>templates/js/features.js"></script>
    <!-- Toast container -->
    <div style="position: fixed; bottom: 2rem; right: 1rem;">
      <?php
      $sql_alertfooter = "SELECT * FROM `crm_news` ORDER BY `id` DESC";
      $result_alertfooter = mysqli_query($link, $sql_alertfooter);
      while ($alertfooter = mysqli_fetch_array($result_alertfooter)) {
        $alertfooID = $alertfooter['id'];
        $alertfooType = $alertfooter['type'];
        $alertfooTitle = $alertfooter['title'];
        $alertfooData = $alertfooter['date'];
        $alertfooText = $alertfooter['text'];
        if ($alertfooType == "alert") {
      ?>
          <!-- Toast -->
          <div class="toast" id="toastBasic<?= $alertfooID ?>" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
            <div class="toast-header">
              <i data-feather="bell<?= $alertfooID ?>"></i>
              <strong class="mr-auto"><?= $alertfooTitle ?></strong>
              <small class="text-muted ml-2"><?= date("d.m.Y", $alertfooData); ?></small>
              <button class="ml-2 mb-1 close" type="button" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="toast-body">
              <?= $alertfooText ?>
            </div>
          </div>
          <script>
            $(document).ready(function() {
              $("#toastBasic<?= $alertfooID ?>").toast("show");
            });
          </script>
      <? }
      } ?>
    </div>
    <script>
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
    </script>
    <script>
      function copyCode(target) {
        let copy = target.innerText;
        const tempInput = document.createElement("textarea");
        tempInput.value = copy;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
      }

      function Delete(id, who) {
        let confirmation = confirm("Вы уверены, что хотите удалить?");
        if (confirmation) {
          let menu_id = id;
          $.ajax({
            url: '/asted/' + who + '/',
            method: 'post',
            dataType: 'html',
            data: {
              menu_id
            },
            success: function() {
              location.reload();
            }
          });
        }
      }
    </script>
    </body>
    </html>