<? include "templates/header.php";
if($userPreLeadType == "block"){
	        $sqlupdatetask = "UPDATE ".$TerranPrefix."users SET prelead_type='prelead' WHERE id='{$userID}'";
            $resultupdatetask = mysqli_query($link, $sqlupdatetask);
}
if($userPreLeadType == null){
		    $sqlupdatetask = "UPDATE ".$TerranPrefix."users SET prelead_type='prelead' WHERE id='{$userID}'";
}?>
    <div class="container-fluid">
        <?php
        $sql_lead = "SELECT * FROM `".$TerranPrefix."lead`";
        $sql = mysqli_query($link, $sql_lead);
        $lead =[];

		

						
						
        if($userSessionDivisions == "1"){?>
	<script>
 /* $( function() {
    
	
	$('.sortable').sortable({
    axis: 'y',
    update: function (event, ui) {
        var data = $(this).sortable('serialize');

        // POST запрос. Можно осуществить через $.post или $.ajax
        $.ajax({
            data: data,
            type: 'POST',
            url: '/core/leads_update.php',
			success: function(response) {
			var jsonData = JSON.parse(response);
                if (jsonData.success == "1")
                {
                    location.href = '/tasks.php';
                }
                else
                {
                    alert('TerranCRM: Заполните все поля!');
                }

			}
        });
    }
});
	
	
  } ); */
  </script>	
		
		
		
		
<div class="container">
 <div class="col">
  <p class="title">Proposed</p>
  <div class="cardsd">
   <ul id="col1" class="draggable sortable">
    <li id="fsfsfs" style="opacity: 0;height: 1px;padding: 1px;">[@костыль] НЕ ТРОГАТЬ</li>
    <li id="item-1">"Add Card" control on taskboard and kanban board</li>
    <li id="item-2">"Change application access policies"</li>
    <li id="item-3">Update policy to add personal access tokens for 3rd-party apps</li>
    <li id="item-4">"Load test in the cloud": Run cloud-based load tests</li>
  </ul>
</div>
</div>
<div class="col">
  <p class="title">Committed</p>
  <div class="cardsd">
   <ul id="col2" class="draggable sortable">
    <li id="fsfsfs" style="opacity: 0;height: 1px;padding: 1px;">[@костыль] НЕ ТРОГАТЬ</li>
    <li id="item-5">.NET Client API for Standards Repository</li>
    <li id="item-6">[@mentions] Adopt account wide MRU @mentioning of people</li>
    <li id="item-7">[@mentions] Email Alerts for @mentions</li>
  </ul>
</div>
</div>
<div class="col">
  <p class="title">In Progress</p>
  <div class="cardsd">
   <ul id="col3" class="draggable sortable">
   <li id="fsfsfs" style="opacity: 0;height: 1px;padding: 1px;">[@костыль] НЕ ТРОГАТЬ</li>
    <li id="item-8">[@mentions] Email Alerts for @mentions</li>
    <li id="item-9">[@mentions] People mentions rendering</li>
    <li id="item-10">[Admin] User prompted delete account</li>
    <li id="item-11">[Archive Library] MTPS</li>
    <li id="item-12">[Archive Library] MTPS - S84</li>
    <li id="item-12" class="hide">[Archive Library] Rendering: Hide archived library content in TOC and add disclaimer</li>
    <li id="item-13" class="hide">[Dev14] Team room bug & infrastructure debt</li>
    <li id="item-14" class="hide">[Dev14] Team room bug & infrastructure debt</li>

  </ul>
  <p class="loadMore">
   <a href="#">Load more</a>
  </p>
  </div>
  </div>		
		
<div class="col">
  <p class="title">In Progress</p>
  <div class="cardsd">
   <ul id="col4" class="draggable sortable">
   <li id="fsfsfs" style="opacity: 0;height: 1px;padding: 1px;">[@костыль] НЕ ТРОГАТЬ</li>
    <li id="item-15">[@mentions] Email Alerts for @mentions</li>
    <li id="item-16">[@mentions] People mentions rendering</li>
    <li id="item-17">[Admin] User prompted delete account</li>
  </ul>

  </div>
  </div>		
		
		
		
		
		
		
		
		
		
		
		
		<!--

							<?		while ($result = mysqli_fetch_assoc($sql)) {
                            $project_name = "{$result['project_name']}";
                            $iduuname = "{$result['name']}";
                            $iduusur = "{$result['surname']}";
                            ?>
							
							
							<div class="row">
								<div class="col-3">
									<?=$project_name?>
								</div>
								<div class="col-3">
									<?=$project_name?>
								</div>
								<div class="col-3">
									<?=$project_name?>
								</div>
								<div class="col-3">
									<?=$project_name?>
								</div>
							</div>
							
							
							
							<?}?>
							
							-->
             
        <?}else{?>
            <div class="alert alert-info" role="alert">
                <?=$lang['access_to_the_page_is_closed']?>
            </div>
        <?}?>

	
	
	
<style class="cp-pen-styles">
  body {
  font-family: Segoe UI, Helvetica Neue, Helvetica, Arial, Verdana, sans-serif;
  font-size: 12px;
  color: #222;
}

.container {
  width: 100%;
  padding-top: 40px;
  margin: 0 auto;
  display: flex;
}

.col {
  width: 325px;
  margin-right: 10px;
}

.title {
  margin: 0;
  padding-bottom: 10px;
  font-size: 14px;
  border-bottom: 2px solid #c6c6c6;
}

.cardsd {
  margin: 0;
  padding: 10px;
  min-height: 500px;
  height: 100%;
  list-style-type: none;
  background-color: #f1f1f1;
}
.cardsd ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
.cardsd li {
  z-index: 1;
  margin-bottom: 10px;
  padding: 10px;
  background-color: white;
  border-bottom: 1px solid #ccc;
  border-top: 1px solid #ccc;
  border-right: 1px solid #ccc;
  border-left: 4px solid #009ccc;
}

.loadMore {
  opacity: 1 !important;
  background-color: transparent;
  border: none;
  padding: 8px 6px;
}
.loadMore a {
  color: #006FCD;
}

.hover {
  background-color: #d4e5f5;
}

.highlight {
  min-height: 18px;
  border: 1px dashed #9E9E9E !important;
  background-color: transparent !important;
}

@-webkit-keyframes animateLoadMore {
  0% {
    opacity: 0.5;
  }
  33% {
    opacity: 0;
  }
  66% {
    opacity: 0.5;
  }
  100% {
    opacity: 1;
  }
}
.animateLoadMore {
  background-color: #d4e5f5;
  -webkit-animation: animateLoadMore 0.3s infinite;
  -moz-animation: animateLoadMore 0.3s infinite;
  -o-animation: animateLoadMore 0.3s infinite;
  animation: animateLoadMore 0.3s infinite;
}
</style>	
<script >
 var obj = '#col1,#col2,#col3,#col4',
    timer;

function loadMore(){
  $('.loadMore').addClass('animateLoadMore');
  setTimeout(function(){
    $('.loadMore').removeClass('animateLoadMore').hide();
    $('.hide').show().removeClass('hide');
    $(obj).sortable('refresh');
  }, 600)
}


$(obj + ', .cards').sortable({
  connectWith: '.draggable,.cards',
  placeholder: 'highlight',
  opacity: 0.5,
  revert: true,
  
  
  update: function (event, ui) {
	    //var result = $(this).sortable('toArray', {attribute: "data-item"});
		//var result = $(this).sortable('serialize',{key:'string'});
		//console.log(result);
		$(obj).each(function(){
              console.log($(this).attr('id')+':'+$(this).sortable("serialize"));
          });
        //ui.sender is the list the item comes from
        //ui.item is the current item that moved
        //ui.position is the current position
    

        // POST запрос. Можно осуществить через $.post или $.ajax
        /*$.ajax({
            data: data,
            type: 'POST',
            url: '/core/leads_update.php',
			success: function(response) {
			var jsonData = JSON.parse(response);
                if (jsonData.success == "1")
                {
                    location.href = '/tasks.php';
                }
                else
                {
                    alert('TerranCRM: Заполните все поля!');
                }

			}
        }); */
    },
	
	
	
  start(event,ui){
	$(obj).sortable('refresh');
  },
  over(event,ui){
    $(this).parent().find('.cards').addClass('columnHover');
	
  },
  out(event,ui){
    $(this).parent().find('.cards').removeClass('columnHover');
  }
  
      
  
  
  
  
}).disableSelection();
 
        
$('.loadMore').droppable({
  hoverClass: 'hover',
  over(event, ui){
    console.log('Over!')
    if (!timer) {
      timer = window.setTimeout(function() {
        timer = null;
        loadMore();
      }, 300);
    }
  },
  out(event, ui){
    window.clearTimeout(timer);
    timer = null;
  }
});

$('.hide').hide();

$('.loadMore').click(function(){
  $('.hide').show().removeClass('hide');
  $(this).hide();
});
//# sourceURL=pen.js
</script>	
	
	<? include "templates/footer.php"; ?>