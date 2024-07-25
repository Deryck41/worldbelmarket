<?php include "templates/header.php";
?>

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Настройки комерческого предложения</h6>
                  <a class="collapse-item" style="float: right;margin-top: -20px;" href="offer.php"><i class="fas fa-fw fa-cog"></i></a>
                </div>
                <div class="card-body">
                    <form action="offerpdf.php" method="POST" class="pdf">
<div class="p-3 bg-gray-100" >
    <label>Выводить лого:</label>
          <select id="logo" name="logo" class="selectOptions">
            <option></option>
                                <option value="Да">Да</option>
                                <option value="Нет">Нет</option>
                            </select>
    </div>

                    <button type="button" class="btn btn-light">Сохранить</button>
                    </form>
                                </div>
              </div>
            </div>
        </div>

    </div>

 
    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>