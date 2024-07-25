<? include "templates/header.php"; ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Меню</h1>
        </div>

        <style>
.menublockcat{
        background-color: #979797;
    color: aliceblue;
    display: inline-block;
    padding: 10px;
    border-radius: 2px;
}
.menuinputs{
    float: right;
    position: sticky;
    margin-left: 6px;
    margin-top: 5px;
}
        </style>
<script>
  $( function() {
    $( "#sortable" ).sortable();
	
	
	$('#sortable').sortable({
    axis: 'y',
    update: function (event, ui) {
        var data = $(this).sortable('serialize');

        // POST запрос. Можно осуществить через $.post или $.ajax
        $.ajax({
            data: data,
            type: 'POST',
            url: 'menu_update.php',
			success: function(response) {
			var jsonData = JSON.parse(response);
                if (jsonData.success == "1")
                {
                    location.href = $astedADM.'menu/';
                }
                else
                {
                    alert('TerranCRM: Заполните все поля!');
                }

			}
        });
    }
});
	
	
  } );
  </script>
        <!-- Content Row -->
        <div class="row">
<? print_r($_GET); ?>
            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Редактировать категории</h6>
                    </div>
                    <div class="card-body">
						<ul>
                            <?php
                            
                        $sql_userSalar = "SELECT * FROM `crm_components_section` ";
                        $result_userSalar = mysqli_query($link, $sql_userSalar);
                        while ($userSalar = mysqli_fetch_assoc($result_userSalar)) {
                            $catid = "{$userSalar['id']}";
                            $catname = "{$userSalar['name']}";
                            ?>
                                <a href="<?=$astedADM?>menu/<?=$catid?>/"><li class="menublockcat"><?=$lang[$catname]?> <input class="form-cat menuinputs" 
                                data-id="<?=$catid?>" type="checkbox" checked="checked"></li></a>
                            
                        <?}?>
		
						</ul>
                    </div>
                </div>
				
				
                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Текущие элементы меню</h6>
                    </div>
                    <div class="card-body">
<ul id="sortable">
                        <?
						if($_GET['id'] == null){echo 'Выберите категорию для редактирования';}
						if($_GET['id'] != null){
                            $idsecti = $_GET['id'];
                        $sql_userSalar = "SELECT * FROM `crm_components` where section='{$idsecti}' ORDER BY position";
                        $result_userSalar = mysqli_query($link, $sql_userSalar);
                        while ($userSalar = mysqli_fetch_assoc($result_userSalar)) {
                            $menuid = "{$userSalar['id']}";
                            $menupos = "{$userSalar['position']}";
                            $menuname= "{$userSalar['title']}";
							$menucat= "{$userSalar['category']}";
						       $menuactive= "{$userSalar['active']}";
                            ?>
							<li class="ui-state-default" id="item-<?=$menuid?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?=$lang[$menuname]?>
                            <span style="float: right;padding-left: 10px;">- активность</span><input class="form-check-input" id="<?=$menuid?>" type="checkbox" style="float: right;position: sticky;" <?php if($menuactive == "y"){?> checked="checked"<?}?>></li>
                        <?}}?>
</ul>
 

<script>
$('.ui-state-default input:checkbox').click(function(){
    var clickId = $(this).attr('id');
if ($('#'+clickId).is(':checked')){
    $.ajax({
  url: "menu_show.php",
  type: "POST",
  data: {id : clickId,
    status : 'y'},
  dataType: "html"
    });
} else {
    $.ajax({
  url: "menu_show.php",
  type: "POST",
  data: {id : clickId,
    status : 'n'},
  dataType: "html"
    });
}
    //alert(clickId);
});
</script>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>


