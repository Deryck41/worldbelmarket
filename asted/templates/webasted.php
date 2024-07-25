<!--
=========================================
==========ASTED CWS-MENU-START===========
=========================================
---------------Description---------------
Appointment: Работа с сайтом
-->

<?php if ($userGroupsCanviewWebsite['0'] == "true") { ?>
  <!-- Sidebar - Brand -->
  <li class="nav-item nav-item_terran_wmenu <? if ($getUrl == "add" or $getUrl == "site") echo "active"; ?>">
    <?php if ($sitecontid == null) { ?><a class="nav-link" href="<?= $astedADM ?>add/"><? } else { ?>
        <a class="nav-link" href="<?= $astedADM ?>site/1/">
        <? } ?>
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span class="leftmenu__text"><?php if ($sitecontid == null) { ?>Создать сайт<? } else { ?>Настройки сайта<? } ?></span></a>
  </li>
  <li class="nav-item nav-item_terran_wmenu <? if ($getUrl == "moderation") echo "active"; ?>">
      <a class="nav-link" href="<?= $astedADM ?>moderation/">
        <i class="fas fa-search"></i>
        
        <span class="leftmenu__text">Модерация</span></a>
    </li>
    <li class="nav-item nav-item_terran_wmenu <? if ($getUrl == "payment") echo "active"; ?>">
      <a class="nav-link" href="<?= $astedADM ?>payment/">
        <i class="fas fa-money-bill"></i>
        
        <span class="leftmenu__text">Оплата</span></a>
    </li>
  <?php
  $site = R::load('crm_site', 1);
  if ($sitecontid != null) { ?>
    <li class="nav-item nav-item_terran_wmenu <? if ($getUrl == "themeseditor") echo "active"; ?>">
      <a class="nav-link" href="<?= $astedADM ?>themeseditor/?theme=<?= $site['webtemplate'] ?>">
        <i class="fas fa-fw fa-file"></i>
        <span class="leftmenu__text">Редактор тем</span></a>
    </li>
<?if ($userGroupsCanviewWebsite['0'] == "true") {?>
  <li class="nav-item nav-item_terran_wmenu <? if ($getUrl == "devdoc") echo "active"; ?>">
      <a class="nav-link" href="<?= $astedADM ?>devdoc/">
        <i class="fas fa-fw fa-file"></i>
        <span class="leftmenu__text">Документация</span></a>
    </li>
  <?}?>
    <li class="nav-item nav-item_terran_wmenu <? if ($getUrl == "currency") echo "active"; ?>">
      <a class="nav-link" href="<?= $astedADM ?>currency/">
        <i class="fas fa-fw fa-credit-card"></i>
        <span class="leftmenu__text">Валюты сайта</span></a>
    </li>
    <li class="nav-item nav-item_terran_wmenu <? if ($getUrl == "galery") echo "active"; ?>">
      <a class="nav-link" href="<?= $astedADM ?>galery/">
        <i class="fas fa-photo-video"></i>
        <span class="leftmenu__text">Галереи</span></a>
    </li>
    <li class="nav-item nav-item_terran_wmenu <? if ($getUrl == "library") echo "active"; ?>">
      <a class="nav-link" href="<?= $astedADM ?>library/">
        <i class="fas fa-photo-video"></i>
        <span class="leftmenu__text">Файлы медиа</span></a>
    </li>
    <li class="nav-item nav-item_terran_wmenu <? if ($getUrl == "seo") echo "active"; ?>">
      <a class="nav-link" href="<?= $astedADM ?>seo/">
        <i class="fas fa-award"></i>
        <span class="leftmenu__text">SEO сайта</span></a>
    </li>
  <? } ?>






  <style>
    .acws_catalog {
      background: #eeeeee;
      border: solid 1px #d8d4d4;
      margin: 6px;
      padding: 2px;
    }
  </style>

  <? while ($astedsites = mysqli_fetch_assoc($result_sitesAsted)) {
    $title = "{$astedsites['namesite']}";
    $id = "{$astedsites['id']}";
    $crmfuncs = "{$astedsites['crmfuncional']}";
    $sslserf = "{$astedsites['websitessl']}";
    $urlwebsi = "{$astedsites['siteurl']}";
    $sitetheme = "{$astedsites['webtemplate']}";
    $modmenu = "{$astedsites['modulemenu']}";
    $modpages = "{$astedsites['modulepages']}";
    $modcustom = "{$astedsites['modulecustom']}";
    $modnews = "{$astedsites['modulenews']}";
    $modcatalog = "{$astedsites['modulecatalog']}";
    if ($_COOKIE["webasteshow"] == "clouse") { ?>
      <script type="text/javascript">
        function astedshowbox(id) {
          display = document.getElementById(id).style.display;
          console.log(document.cookie);
          if (display == 'none') {
            document.getElementById(id).style.display = 'block';
            document.cookie = "webasteshow=open";
            document.getElementById('btnshowc').innerHTML = '-Скрыть управления сайта-';
          } else {
            document.getElementById(id).style.display = 'none';
            document.cookie = "webasteshow=clouse";
            document.getElementById('btnshowc').innerHTML = '-Показать управления сайтом-';
          }
        }
      </script>
      <div id="btnshowc" onclick="astedshowbox('astedwebbox'); return false" style="font-size: 13px; text-align: center; margin: 10px; border: 1px dashed rgb(189, 189, 189); cursor: pointer;">-Показать управления сайтом-</div>
    <? } else { ?>
      <script type="text/javascript">
        function astedopenbox(id) {
          display = document.getElementById(id).style.display;
          console.log(document.cookie);
          if (display == 'none') {
            document.getElementById(id).style.display = 'block';
            document.cookie = "webasteshow=open";
            document.getElementById('btnshowx').innerHTML = '-Скрыть управления сайта-';
          } else {
            document.getElementById(id).style.display = 'none';
            document.cookie = "webasteshow=clouse";
            document.getElementById('btnshowx').innerHTML = '-Показать управления сайтом-';
          }
        }
      </script>
      <div id="btnshowx" onclick="astedopenbox('astedwebbox'); return false" style="font-size: 13px; text-align: center; margin: 10px; border: 1px dashed rgb(189, 189, 189); cursor: pointer;">-Скрыть управления сайта-</div>
    <? } ?>
    <div <?php if ($_COOKIE["webasteshow"] == "clouse") { ?> style="display: none;" <? } ?> id="astedwebbox" class="bg-white collapse-inner rounded">

      <?php if ($modnews == "1" or $modmenu == "1" or $modpages == "1" or $modcustom == "1") {
        $site_objects = R::findAll('crm_site_section');
        $groupedSections = [];
        foreach ($site_objects as $section) {
          $parent = $section->parent;
          if (!empty($parent)) {
            if (!isset($groupedSections[$parent])) {
              $groupedSections[$parent] = [];
            }
            $groupedSections[$parent][] = $section;
          }
        }
        foreach ($site_objects as $site_object) {
          $forsite = $site_object['forwebsite'];
          $websitemodule = $site_object['websitemodule'];
          $namesection = $site_object['namesection'];
          $idmod = $site_object['id'];
          if (empty($site_object['parent'])) {
      ?>

            <? if ($websitemodule == "menu") { ?>
              <h6 class="collapse-header" style="font-size: 13px;"><i class="fas fa-wind" style="
    margin-right: 10px;
    font-size: 10px;
"></i>Секции: <span style="color: #1a1a1a;">тип меню</span></h6>
              <a href="<?= $astedADM ?>menu/<?= $idmod ?>/">
                <div class="p-3 bg-gray-100"><?= $namesection ?></div>
              </a><br><? } ?>
            <? if ($websitemodule == "news") { ?>
              <h6 class="collapse-header" style="font-size: 13px;"><i class="fas fa-receipt" style="
    margin-right: 10px;
    font-size: 10px;
"></i>Секции: <span style="color: #1a1a1a;">тип новости</span></h6>
              <a href="<?= $astedADM ?>news/<?= $idmod ?>/">
                <div class="p-3 bg-gray-100"><?= $namesection ?></div>
              </a><br><? } ?>
            <? if ($websitemodule == "pages") { ?>
              <h6 class="collapse-header" style="font-size: 13px;"> <i class="fas fa-scroll" style="
    margin-right: 10px;
    font-size: 10px;
"></i> Секции: <span style="color: #1a1a1a;">тип страницы</span></h6>
              <a href="<?= $astedADM ?>pages/<?= $idmod ?>/">
                <div class="p-3 bg-gray-100"><?= $namesection ?></div>
              </a><br><? } ?>
            <? if ($websitemodule == "catalog") { ?>
              <div class="acws_catalog">
                <h6 class="collapse-header" style="font-size: 13px;"><i class="fas fa-cash-register" style="
    margin-right: 10px;
    font-size: 10px;
"></i> Секция: <span style="color: #1a1a1a;">тип каталог</span></h6>
                <a href="<?= $astedADM ?>catalog/<?= $idmod ?>/">
                  <div class="p-3 bg-gray-100"><?= $namesection ?></div>
                </a>

                <?php 
                // Ищем записи в таблице crm_site_catalog_config с указанным forsection
$catalogConfigs = R::find('crm_site_catalog_config', 'forsection = ?', [$idmod]);

// Обрабатываем результаты
foreach ($catalogConfigs as $catalogConfig) {
    $idWebAsted = $catalogConfig->id;
    $forsectionWebAsted = $catalogConfig->forsection;
    $categoryWebAsted = $catalogConfig->category;

    // // Ваши дальнейшие действия с данными
    // echo "ID: $id, forsection: $forsection, category: $category\n";
}
if($categoryWebAsted == "true"){
                ?>
                <h6 class="collapse-header" style="font-size: 12px;padding-top: 2px;">Категории:</h6>
                <a href="<?= $astedADM ?>category/<?= $idmod ?>/">
                  <div class="p-3 bg-gray-100">Категории</div>
                  <?}?>
                </a><br>
                <!-- <h6 class="collapse-header">Секция:</h6>
              <a href="<?= $astedADM ?>category-filter/">
                <div class="p-3 bg-gray-100">Фильтры</div>
              </a><br> -->
              </div>
            <? } ?>
            <? if ($websitemodule == "custom") { ?>
              <h6 class="collapse-header">Секции: тип кастом:</h6>
              <a href="<?= $astedADM ?>custom/<?= $idmod ?>/">
                <div class="p-3 bg-gray-100"><?= $namesection ?></div>
              </a><br><? } ?>
        <? }
        }
        foreach ($groupedSections as $parent => $sections) {
          echo '<br><div class="acws_catalog">
          <h6 class="collapse-header">Секции: ' . $parent . ':</h6>';
          foreach ($sections as $section) {
            echo '<a href="/asted/' . $section['websitemodule'] . '/' . $section['id'] . '/">
            <div class="p-3 bg-gray-100">' . $section['namesection'] . '</div>
          </a><br>';
          }
          echo '</div>';
        }  ?>
        <h5 class="website_sectiontitleasted">УПРАВЛЕНИЕ СЕКЦИЯМИ САЙТА <br><?= $title ?></h5>
      <? } ?>
      <div class="containastededit">
        <?php if ($modnews == "1") { ?>
          <a class="collapse-item" href="<?= $astedADM ?>section-news/<?= $id ?>/">Добавить секцию новостей.</a>
        <? } ?>
        <?php if ($modcatalog == "1") { ?>
          <a class="collapse-item" href="<?= $astedADM ?>section-catalog/<?= $id ?>/">Добавить секцию каталог.</a>
        <? } ?>
        <?php if ($modmenu == "1") { ?>
          <a class="collapse-item" href="<?= $astedADM ?>section-menu/<?= $id ?>/">Добавить секцию меню.</a>
        <? } ?>
        <?php if ($modpages == "1") { ?>
          <a class="collapse-item" href="<?= $astedADM ?>section-pages/<?= $id ?>/">Добавить секции страницы.</a>
        <? } ?>
        <?php if ($modcustom == "1") { ?>
          <a class="collapse-item" href="<?= $astedADM ?>section-custom/<?= $id ?>/">Добавить секции кастом.</a>
        <? } ?>
      </div>

      <a class="collapse-item" href="<?= $astedADM ?>section/ "><i><i class="fas fa-fw fa-bars"></i>Список всех секций</i></a>

      <div style="padding: 10px; text-align: center; background: black; border: 4px dashed rgb(215, 102, 134);">
        <a href="<?= $astedADM ?>content/">Контентные блоки</a>
      </div>
    </div>

  <? } ?>

  <style>
    .containastededit {
      display: grid;
      text-align: center;
      font-size: 10px;
      background: #1f1f20;

    }

    .containastededit>a {
      color: white;
      border-bottom: 1px solid #d8cccc;
    }


    .website_sectiontitleasted {
      background: #b46297;
      color: #fff;
      border-radius: 15px;
      padding: 6px;
      margin: 5px;
      font-size: 11px;
      text-align: center;
    }
  </style>


<? } ?>

<!--
=========================================
==========ASTED CWS-MENU-END=============
=========================================
---------------Description---------------
Appointment: Работа с сайтом
-->