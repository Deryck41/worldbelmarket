<? 	
	$curURL = $_SERVER['REQUEST_URI'];
	$urls = explode('/', $curURL);
 	if($urls["2"] != null){
		$getUrl = $urls["2"];
	}
	else{
		$getUrl = $urls["1"];
	}

	?>   <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion template_bg template_text" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=$astedADM?>index.php">
        <div class="sidebar-brand-icon">
        <?php 
        if($userSessionThemes == null){
        if ($cofigius['0']['constpalitretheme'] == "dark") { ?>
            <img src="<?=$astedADM?>templates/img/logo-dark.png"  style="filter: drop-shadow(1px 1px 20px red) invert(75%); width: 30px;">
          <?} if ($cofigius['0']['constpalitretheme'] == "white") {?>
            <img src="<?=$astedADM?>templates/img/logo-white.png" style="width: 30px;">
          <?}}else{
if($userSessionThemes == "dark"){
  ?>
  <img src="<?=$astedADM?>templates/img/logo-white.png"  style="filter: drop-shadow(1px 1px 20px red) invert(75%); width: 30px;">
  <?
}else{?>
  <img src="<?=$astedADM?>templates/img/logo-dark.png"  style=" width: 30px;">
<?}
          }?>
        </div>
        <div class="sidebar-brand-text mx-3">
        <?=$titleNameProject;?>
          <div style="
    font-size: 10px;
">demo version</div>
          <sup></sup></div>
      </a>

<?php
	  	if($indexDefPage == "news"){?>
		<li class="nav-item nav-item_terran_wmenu <?if($getUrl == "index.php")echo "active";?>">
        <a class="nav-link" href="./index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span class="leftmenu__text"><?=$lang['news'];?></span></a>
      </li>
	<?}else{?>
		<li class="nav-item nav-item_terran_wmenu <?if($getUrl == "".$astedADM."lenta/")echo "active";?>">
        <a class="nav-link" href="<?= $astedADM ?>lenta/">
          <i class="fas fa-fw fa-bullhorn"></i>
          <span class="leftmenu__text"><?=$lang['news'];?></span></a>
      </li>
<?}?>


<?php
$comsidebar = "on";
if($comsidebar == "on"){
$sql_componets_section = "SELECT * FROM `crm_menu_category` ORDER BY catposition";
                        $result_componets_section = mysqli_query($link, $sql_componets_section);
                        while ($componets__section = mysqli_fetch_assoc($result_componets_section)) {
                        	$componetnsSecID = "{$componets__section['id']}";
                            $componetnsSecName = "{$componets__section['catname']}";
                            $componetnsSecActive = "{$componets__section['catactive']}";
                            //echo $componetnsSecActive;
                            if ($componetnsSecActive == "y"){
                            ?>
	  <hr class="sidebar-divider">
      <div class="sidebar-heading">
        <?=$lang[$componetnsSecName];?>
      </div>
<?php
}

	  $sql_componets_menu = "SELECT * FROM `crm_menu`  where category='{$componetnsSecID}' and active='y' ORDER BY position";
                        $result_componets_menu = mysqli_query($link, $sql_componets_menu);
                        while ($componets__menu = mysqli_fetch_assoc($result_componets_menu)) {

                          if ($componetnsSecActive == "y"){
                            $componetnsSecActiveMeny = "y";
                          }else{
                            $componetnsSecActiveMeny = "n";
                          }
  if ($componetnsSecActiveMeny == "y"){
                        	$componetnsID = "{$componets__menu['id']}";
                            $componetnsUri = "{$componets__menu['link']}";
                            $componetnsTitle = "{$componets__menu['name']}";
                            $componetnsIcon = "{$componets__menu['icon']}";
							            $componetnsType = "{$componets__menu['type']}";


  ?>  
<?php 
if($componetnsType == "include") {
	include $componetnsUri;
}
 if($componetnsType == "parent") {?>
  	  <li class="nav-item nav-item_terran_wmenu">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages<?=$componetnsID?>" aria-expanded="false" aria-controls="collapsePages">
          <i class="fas fa-fw <?=$componetnsIcon ?>"></i>
          <span><?=$lang[$componetnsTitle];?></span>
        </a>
        <div id="collapsePages<?=$componetnsID?>" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
            	<?php
				$sql_componets_menuParent = "SELECT * FROM `crm_menu`  where category='{$componetnsID}' and type='postparent' ORDER BY position";
                        $result_componets_menuParent = mysqli_query($link, $sql_componets_menuParent);
                        while ($componets__menuParent = mysqli_fetch_assoc($result_componets_menuParent)) {
                        	$componetnsIDParent = "{$componets__menuParent['id']}";
                            $componetnsUriParent = "{$componets__menuParent['link']}";
                            $componetnsTitleParent = "{$componets__menuParent['name']}";
?>
<a class="collapse-item" href="<?=$astedADM?><?=$componetnsUriParent?><?php if (strpos($componetnsUriParent, "php") === false) {echo '/';}?>"><i class="fas fa-fw fa-address-book"></i> <?=$lang[$componetnsTitleParent];?></a>
                       <? }
            	?>
            </div>
        </div>
      </li>
<?}else{
  if ($componetnsID != "13") { ?>
		<li class="nav-item nav-item_terran_wmenu <?if($getUrl == "".$componetnsUri."")echo "active";?>">
<?php
 }
$urlToMenu = $_SERVER['REQUEST_URI'];

if (strpos($urlToMenu, "php") === false) { //Текущий URL не содержит 'php'?>
	<?php if($componetnsType == "component") {?><a class="nav-link" href="<?=$astedADM?><?=$componetnsUri?>/"><?}?>
    <?php if($componetnsType == "custom") {?><a class="nav-link" href="<?=$astedADM?><?=$componetnsUri?>"><?}?>
    
<?} else { //Текущий URL содержит 'php'?>
  	<?php if($componetnsType == "component") {?><a class="nav-link" href="<?=$astedADM?><?=$componetnsUri?>/"><?}?>
    <?php if($componetnsType == "custom") {?><a class="nav-link" href="<?=$componetnsUri?>"><?}?>  
<?}

?>
         <i class="fas fa-fw <?=$componetnsIcon ?>"></i>
          <span class="leftmenu__text"><?=$lang[$componetnsTitle];?></span></a>
      </li>
<?}}}}}else{
	echo '<hr class="sidebar-divider">';
}
?>

	  
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->