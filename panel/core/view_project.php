<style>
  .iconprojects_view<?= $groupResult[$newsCont]['id'] ?> {
    float: right;
    margin-top: -15px;
  }

  .ul_project_view<?= $groupResult[$newsCont]['id'] ?> {
    width: auto;
    color: rgb(98, 99, 99);
    right: 0;
    background: rgb(250, 250, 250);
    position: absolute;
    border: 1px dotted rgb(27, 27, 27);
    list-style: none;
    padding: 3px;
    margin-top: 5px;
  }

  .ul_project_view<?= $groupResult[$newsCont]['id'] ?>>li>a {
    color: rgb(98, 99, 99);
  }

  .cursoractive {
    cursor: pointer;
  }
</style>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a href="/asted/project/<?= $groupResult[$newsCont]['id'] ?>/">
      <h6 <?php if ($groupResult[$newsCont]['group_public'] == "2") {
            echo 'style="color: #858796 !important;"';
          } ?> class="m-0 font-weight-bold text-primary">
        <i class="fas
<?php
switch ($groupResult[$newsCont]['group_public']) {
  case 0:
    echo "fa-globe";
    break;
  case 1:
    echo "fa-user-secret";
    break;
  case 2:
    echo "fa-times";
    break;
} ?>"></i>
        <?php echo $groupResult[$newsCont]['group_title']; ?>
      </h6>
    </a>
    <?php if($userGroupsProjectCanEditProject['0'] == "true"){ ?>
    <div>
      <i class="fas fa-fw fa-edit iconprojects_view<?= $groupResult[$newsCont]['id'] ?>"></i>
      <ul class="ul_project_view<?= $groupResult[$newsCont]['id'] ?>" style="display: none;">
        <li><a href="/asted/project-edit/<?= $groupResult[$newsCont]['id'] ?>/"><?= $lang['edit'] ?></a></li>
        <?php if ($groupResult[$newsCont]['group_public'] != "2") { ?>
          <li class="cursoractive arhivegroup<?= $groupResult[$newsCont]['id'] ?>">Архивировать</li>
        <?php }
        if ($groupResult[$newsCont]['group_public'] == "2") { ?>
          <li class="cursoractive rearhivegroup<?= $groupResult[$newsCont]['id'] ?>">Востановить</li>
        <? } ?>
        <li class="cursoractive trashclick<?= $groupResult[$newsCont]['id'] ?>">Удалить проект</li>
      </ul>
    </div>
    <?}?>
    <script>
      document.addEventListener('click', function(event) {
        if (!event.target.closest('.iconprojects_view<?= $groupResult[$newsCont]['id'] ?>')) {
          document.querySelector('.ul_project_view<?= $groupResult[$newsCont]['id'] ?>').style.display = 'none';
        }
      });
      document.querySelector('.iconprojects_view<?= $groupResult[$newsCont]['id'] ?>').addEventListener('click', function() {
        var ul = document.querySelector('.ul_project_view<?= $groupResult[$newsCont]['id'] ?>');
        if (ul.style.display === 'block') {
          ul.style.display = 'none';
        } else {
          ul.style.display = 'block';
        }
      });
      <?php if($userGroupsProjectCanEditProject['0'] == "true"){ ?>
      $('.trashclick<?= $groupResult[$newsCont]['id'] ?>').click(function() {
        let confirmation = confirm("Вы уверены, что хотите удалить проект навсегда?");
        if (confirmation) {
          var menu_id = "<?= $groupResult[$newsCont]['id'] ?>";
          $.ajax({
            url: '/asted/projects/1991/',
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
      });
      <?}?>
      $('.arhivegroup<?= $groupResult[$newsCont]['id'] ?>').click(function() {
        let confirmation = confirm("Вы уверены, что хотите архивировать проект?");
        if (confirmation) {
          var projects_id = "<?= $groupResult[$newsCont]['id'] ?>";
          $.ajax({
            url: '/asted/projects/1997/',
            method: 'post',
            dataType: 'html',
            data: {
              projects_id
            },
            success: function() {
              location.reload();
            }
          });
        }
      });
      $('.rearhivegroup<?= $groupResult[$newsCont]['id'] ?>').click(function() {
        let confirmation = confirm("Хотите, востановить ранее архивированный проект?");
        if (confirmation) {
          var reprojects_id = "<?= $groupResult[$newsCont]['id'] ?>";
          $.ajax({
            url: '/asted/projects/0513/',
            method: 'post',
            dataType: 'html',
            data: {
              reprojects_id
            },
            success: function() {
              location.reload();
            }
          });
        }
      });
    </script>

    <? if ($cofigproject['0']['showuser'] == "on") { ?>
      Дата создания: <?= $groupResult[$newsCont]['group_datecreat'] ?>, Дата завершения: <?= $groupResult[$newsCont]['group_datefinal'] ?>
      <hr>
      <?php
      $ifUserMasGroup = count($groupsubAuthorX);
      if ($ifUserMasGroup == "1") {
        $UserMasGroup = "no";
      } else {
        $UserMasGroup = "yes";
      }
      ?>
      <div class="row">
        <div class="col-6">
          <h6>Ответственный: <a href="/asted/profile/<?= $groupResult[$newsCont]['group_users'] ?>/"><?= $userNamegroup[$newsCont] ?></a></h6>
          <h6>
            <?php if ($groupsubAuthorX != null) {
              if ($UserMasGroup == "yes") {
                echo 'Подключенные пользователи:';
              } else {
                echo 'Подключенный пользователь:';
              }
              foreach ($groupsubAuthorX as $key) {
            ?>
                <a href="/asted/profile/<?= $key ?>/"><?= $usersnameselectALL[$key - 1] ?></a><?php if ($UserMasGroup == "yes") {
                                                                                                echo ',';
                                                                                              }
                                                                                            }
                                                                                          }
                                                                                        } ?>
          </h6>
        </div>
        <div class="col-6">
        <?php if($userGroupsProjectCanviewPrice['0'] == "true"){ ?>
          <?if(!empty($groupResult[$newsCont]['group_price'])){?>
          <h6>Стоимость: <b><?= $groupResult[$newsCont]['group_price'] ?> BYN</b></h6>
          <?}}?>
          <?if(!empty($groupResult[$newsCont]['group_stage'])){?>
          <h6>Этап: <b><?= $groupResult[$newsCont]['group_stage'] ?></b></h6>
          <?}?>
        </div>
      </div>
      <?php if($userGroupsProjectCanviewDoc['0'] == "true"){ ?>
      <?php if(!empty($groupResult[$newsCont]['group_galery'])){?>
      <hr>
      <style>
        .collapse-button<?= $groupResult[$newsCont]['id'] ?> {
          background-color: transparent;
          border: none;
          cursor: pointer;
        }

        .collapse-button<?= $groupResult[$newsCont]['id'] ?> i {
          transition: transform 0.3s ease;
        }

        .collapse-content<?= $groupResult[$newsCont]['id'] ?> {
          overflow: hidden;
          height: 0;
          transition: height 0.3s ease;
        }

        .collapse-content<?= $groupResult[$newsCont]['id'] ?>.expanded<?= $groupResult[$newsCont]['id'] ?> {
          height: auto;
        }

        .collapse-button<?= $groupResult[$newsCont]['id'] ?>.expanded<?= $groupResult[$newsCont]['id'] ?> i {
          transform: rotate(180deg);
        }
      </style>
      <div class="row">
        <div class="col-11">
          <h6>Документы:</h6>
        </div>
        <div class="col-1 text-right">
          <button class="collapse-button<?= $groupResult[$newsCont]['id'] ?> ">
            <i class="fas fa-chevron-down"></i>
          </button>
        </div>
      </div>
      <div class="collapse-content<?= $groupResult[$newsCont]['id'] ?>">
        <div class="row">
          <?
          $masgalery = explode(';', $groupResult[$newsCont]['group_galery']);
          foreach ($masgalery as $key) {
            if (!empty($key)) {
              $type = pathinfo($key, PATHINFO_EXTENSION);
              $name =  explode('_', $key);
              echo '<div class="col-2">
              <div class="documents-item">
              ';
              switch ($type) {
                case "docx":
                  echo '<a class="d-flex flex-column " href="' . $key . '" download><img src="/asted/uploads/plugins/docx.webp" style="max-height: 170px;"/></div>';
                  break;
                case "doc":
                  echo '<a class="d-flex flex-column " href="' . $key . '" download><img src="/asted/uploads/plugins/docx.webp" style="max-height: 170px;"/></div>';
                  break;
                case "mov":
                  echo '<a class="d-flex flex-column " href="' . $key . '" download><img src="/asted/uploads/plugins/mov.webp" style="max-height: 170px;"/></div>';
                  break;
                case "pdf":
                  echo '<a class="d-flex flex-column " href="' . $key . '" download><img src="/asted/uploads/plugins/pdf.webp" style="max-height: 170px;"/></div>';
                  break;
                case "xlsx":
                  echo '<a class="d-flex flex-column " href="' . $key . '" download><img src="/asted/uploads/plugins/xlsx.webp" style="max-height: 170px;"/></div>';
                  break;
                default:
                  echo '<a class="d-flex flex-column " data-fancybox="images" href="' . $key . '"><img src="' . $key . '" style="max-height: 170px;"/></div>';
                  break;
              }
              echo ' <p class="text-center">'.$name[1].'</p>
              </a>
            </div>';
            }
          }
          ?>
        </div>
      </div>
       <script>
        const collapseButton<?= $groupResult[$newsCont]['id'] ?> = document.querySelector('.collapse-button<?= $groupResult[$newsCont]['id'] ?>');
        const collapseContent<?= $groupResult[$newsCont]['id'] ?> = document.querySelector('.collapse-content<?= $groupResult[$newsCont]['id'] ?>');

        collapseButton<?= $groupResult[$newsCont]['id'] ?>.addEventListener('click', function() {
          // Добавляем/удаляем классы для анимации разворачивания
          collapseButton<?= $groupResult[$newsCont]['id'] ?>.classList.toggle('expanded<?= $groupResult[$newsCont]['id'] ?>');
          collapseContent<?= $groupResult[$newsCont]['id'] ?>.classList.toggle('expanded<?= $groupResult[$newsCont]['id'] ?>');

          // Если блок разворачивается
          if (collapseContent<?= $groupResult[$newsCont]['id'] ?>.classList.contains('expanded<?= $groupResult[$newsCont]['id'] ?>')) {
            // Устанавливаем высоту блока равной его высоте контента, чтобы блок разворачивался плавно
            collapseContent<?= $groupResult[$newsCont]['id'] ?>.style.height = collapseContent<?= $groupResult[$newsCont]['id'] ?>.scrollHeight + 'px';
          } else {
            // Устанавливаем высоту блока равной 0, чтобы блок сворачивался плавно
            collapseContent<?= $groupResult[$newsCont]['id'] ?>.style.height = 0;
          }
        });
      </script>
      <?}}?>
      <?php if($userGroupsProjectVdopInform['0'] == "true"){ ?>
      <?if(!empty($groupResult[$newsCont]['group_inform'])){?>
      <hr>
      <div style="border: 1px solid; padding: 4px; border-radius: 3px;">
                        <div style="margin: 0 auto; margin-top: -15px; background-color: black; display: table; color: white; padding: 4px;">Дополнительная информация (для администраторов)</div>
                            <?=$groupResult[$newsCont]['group_inform'] ?>
                        </div>
                        <?}}?>
  </div>
  <div class="card-body" <?php if ($groupResult[$newsCont]['group_public'] == "2") { ?>style="background-image: url(/asted/templates/img/background-rep.svg)" <? } ?>>
    <p><?= $groupResult[$newsCont]['group_description'] ?></p>
  </div>


</div>