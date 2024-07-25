<? include "templates/header.php";?>
<div class="container-fluid">
 <?php
   if (isset($_POST["menu_id"])) {
     $menu_id = $_POST["menu_id"];
     $sql_lead_leadDeletesss = "DELETE FROM crm_site_section WHERE id={$menu_id}";
     $result_leadsss = mysqli_query($link, $sql_lead_leadDeletesss);
   }
if($userSessionDivisions == "1"){	if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
        if($_GET['result'] == '13059'){
            ?>
            <div class="container-fluid"><div class="alert alert-success" role="alert">
                    TerranCRM: Секция успешно добавлена
                </div></div>
        <?}}}?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Секции</h1>
           </div>
		  
		  
		  
		  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Список секций сайтов</h6>
                </div>
                <div class="card-body">
				<?while ($task = mysqli_fetch_assoc($result_sitesection)) {$forsite = "{$task['forwebsite']}";$websitemodule = "{$task['websitemodule']}";$namesection = "{$task['namesection']}";$id = "{$task['id']}";	
				$sql_sectionforsite = "SELECT * FROM `crm_site` WHERE id ='".$forsite."' ORDER BY `id`";
				$result_sectionforsite = mysqli_query($link, $sql_sectionforsite);
				$secsittes = mysqli_fetch_assoc($result_sectionforsite);
	?>
				<div class="p-3 bg-gray-100 websiteadd">ID Section - Сайт - Название секции - Тип секции</div>
        <div class="row">
        <div class="col-10 pr-0">
        <div class="p-3 bg-gray-100">#<?=$id?> - <?=$secsittes['crmfuncional']?> - <?=$namesection?>  - <?if($websitemodule == "news"){echo "Секция новостей";}?><?if($websitemodule == "pages"){echo "Секция страниц";}?><?if($websitemodule == "menu"){echo "Секция меню";}?><?if($websitemodule == "catalog"){echo "Секция Каталога";}?><?if($websitemodule == "custom"){echo "Секция кастомная";}?></div><br>
        </div><div class="col-2 pl-0"><div class="p-3 bg-gray-100 pb-3">
          <div class="justify-content-center d-flex" style="
    align-items: center;
">
        <i class="fas fa-fw fa-trash trashclick<?=$id?>" style="cursor: pointer;" value="<?=$id?>"></i>
        <a href="/asted/section-edit/<?=$id?>/"><i class="fas fa-fw fa-edit" style="cursor: pointer;" value="<?=$id?>"></i></a>
        </div>
        </div></div>
        </div>
        <script>
                $('.trashclick<?=$id?>').click(function() {
                  let confirmation = confirm("Вы уверены, что хотите удалить?");
                    if (confirmation) {
                  var menu_id = "<?=$id?>";
                  $.ajax({
                    url: '<?=$astedADM?>section/',
                    method: 'post',
                    dataType: 'html',
                    data: {
                      menu_id
                    },
                    success: function() {
                      location.reload();
                    }
                  });
                }});
              </script>
				<?}?>
                </div>
              </div>
			  	<?}else{?>
<div class="alert alert-info" role="alert">
<?=$lang['access_to_the_page_is_closed']?>
</div>
<?}?>
</div>

<? include "templates/footer.php"; ?>