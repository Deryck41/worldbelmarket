<!--
=========================================
==========ASTED CWS-MULTI-END============
=========================================
---------------Description---------------
Appointment: Работа с мульти сайтом
-->	  
	  <?if($cofigius['0']['module_multisite'] == "true"){?> 
<li class="nav-item nav-item_terran_wmenu">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span><?=$lang['websites']?></span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <strong style="padding-left: 5%;color: #6c2f6d">Управление сайтами</strong>
                <a class="collapse-item" href="./site_add.php"><i><i class="fas fa-fw fa-plus-square"></i><?=$lang['add_site']?></i></a>
                <a class="collapse-item" href="./site_section.php"><i><i class="fas fa-fw fa-bars"></i>Секции сайтов</i></a>
            </div>
			<?while ($task = mysqli_fetch_assoc($result_sites)) {$title = "{$task['namesite']}";$id = "{$task['id']}";$crmfuncs = "{$task['crmfuncional']}";$sslserf = "{$task['websitessl']}";$urlwebsi = "{$task['siteurl']}";
			$sitetheme = "{$task['webtemplate']}";$modmenu = "{$task['modulemenu']}";$modpages = "{$task['modulepages']}";$modcustom = "{$task['modulecustom']}";$modnews = "{$task['modulenews']}";
    ?>
          <div class="bg-white py-2 collapse-inner rounded">
              <strong style="padding-left: 5%;"><?=$title?></strong>
			  <?php if($modnews == "1" or $modmenu == "1" or $modpages == "1" or $modcustom == "1"){
				  	$sql_sitesectionforv = "SELECT * FROM `crm_site_section` WHERE forwebsite ='".$id."' ORDER BY `id`";
					$result_sitesectionforv = mysqli_query($link, $sql_sitesectionforv);
				  ?>
				  
				  <?while ($task = mysqli_fetch_assoc($result_sitesectionforv)) {$forsite = "{$task['forwebsite']}";
				  $websitemodule = "{$task['websitemodule']}";$namesection = "{$task['namesection']}";$idmod = "{$task['id']}";?>
                  <?if($websitemodule == "menu"){?>
				  <h6 class="collapse-header">Секции: тип меню:</h6>
				  <a href="site_menu.php?id=<?=$idmod?>"><div class="p-3 bg-gray-100"><?=$namesection?></div></a><br><?}?>
				                    <?if($websitemodule == "news"){?>
				  <h6 class="collapse-header">Секции: тип новости:</h6>
				  <a href="site_news.php?id=<?=$idmod?>"><div class="p-3 bg-gray-100"><?=$namesection?></div></a><br><?}?>
				  				                    <?if($websitemodule == "pages"){?>
				  <h6 class="collapse-header">Секции: тип страницы:</h6>
				  <a href="site_pages.php?id=<?=$idmod?>"><div class="p-3 bg-gray-100"><?=$namesection?></div></a><br><?}?>
				  <?if($websitemodule == "catalog"){?>
				  <h6 class="collapse-header">Секции: тип каталог:</h6>
				  <a href="site_pages.php?id=<?=$idmod?>"><div class="p-3 bg-gray-100"><?=$namesection?></div></a><br><?}?>
				  <?if($websitemodule == "custom"){?>
				  <h6 class="collapse-header">Секции: тип кастом:</h6>
				  <a href="site_custom.php?id=<?=$idmod?>"><div class="p-3 bg-gray-100"><?=$namesection?></div></a><br><?}?>
				<?}?>
			  <hr>
			  <h5 class="website_sectiontitle">УПРАВЛЕНИЕ СЕКЦИЯМИ САЙТА</h5>
			  <?}?>
			<?php if($modnews == "1"){?>
            <a class="collapse-item" href="site_section_news.php?id=<?=$id?>">Добавить <br> секцию новостей.</a>
			<?}?>
			<?php if($modmenu == "1"){?>
            <a class="collapse-item" href="site_section_menu.php?id=<?=$id?>">Добавить <br> секцию меню.</a>
			<?}?>
			<?php if($modpages == "1"){?>
            <a class="collapse-item" href="site_section_pages.php?id=<?=$id?>">Добавить <br> секции страницы.</a>
		   <?}?>
		   <?php if($modcatalog == "1"){?>
            <a class="collapse-item" href="site_section_pages.php?id=<?=$id?>">Добавить <br> секции каталога.</a>
		   <?}?>
		   <?php if($modcustom == "1"){?>
            <a class="collapse-item" href="site_section_custom.php?id=<?=$id?>">Добавить <br> секции кастом.</a>
		   <?}?>
          </div>
			<?}?>
        </div>
      </li>
	  
	<?}?>  
	  
<!--
=========================================
==========ASTED CWS-MULTI-END============
=========================================
---------------Description---------------
Appointment: Работа с мульти сайтом
-->	  