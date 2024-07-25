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
        while($result= $sql->fetch_assoc()){
            $lead[] = $result;
        }
        $last = count($lead)-1;

        if($userSessionDivisions == "1"){?>
            <div class="container-fluid">
                <div class="alert alert-success  alert-lead hidden" role="alert" >
                    <?=$lang["Project"]?>:<span class="alert-project-name"></span><?=$lang["Project_event_archive"]?>
                </div>
							<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['tasks']?></h1>
				<a href="prelead_block.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white-50"></i> Блоки</a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus fa-sm text-white-50"></i> <?=$lang['create_task']?></a>
			</div>
            </div>
            <form class="modal fade" id="lead-form_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?=$lang['create_task']?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span><strong><?=$lang['firstName']?>: </strong></span>
                            <input class="form-control theme lead-form_name" required type="тема">
                            <br>
                            <span><strong> <?=$lang['Project']?>: </strong></span>
                            <input class="form-control theme lead-form_project" required type="тема">
                            <br>
                            <span><strong><?=$lang['mail']?>: </strong></span>
                            <input type="email" class="form-control theme lead-form_email"  type="tel">
                            <br>
                            <span><strong><?=$lang['phonenumber']?>: </strong></span>
                            <input class="form-control theme lead-form_phone" required type="tel">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary lead-form_close" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="submit" class="btn btn-primary"><?=$lang['add']?></button>
                        </div>
                    </div>
                </div>
            </form>
            <form class="modal fade" id="lead-form_old" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?=$lang['lead_old']?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span><strong><?=$lang['lead_comment']?>: </strong></span>
                            <textarea class="form-control theme lead-form_comment" required type="text"></textarea>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary lead-form_close" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="submit" class="btn btn-primary"><?=$lang['add']?></button>
                        </div>
                    </div>
                </div>
            </form>
            <form class="modal fade" id="lead-form_edit-comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?=$lang['lead_comment_edit']?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span><strong><?=$lang['firstName']?>: </strong></span>
                            <input class="form-control theme lead-form_name-edit" required type="тема">
                            <br>
                            <span><strong> <?=$lang['Project']?>: </strong></span>
                            <input class="form-control theme lead-form_project-edit" required type="тема">
                            <br>
                            <span><strong> <?=$lang['mail']?>: </strong></span>
                            <input class="form-control theme lead-form_mail-edit"  type="тема">
                            <br>
                            <span><strong><?=$lang['phonenumber']?>: </strong></span>
                            <input class="form-control theme lead-form_phone-edit" required type="tel">
                            <br>
                            <span><strong><?=$lang['lead_comment']?>: </strong></span>
                            <textarea class="form-control theme lead-form_comment-edit" required type="text"></textarea>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary lead-form_close" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="submit" class="btn btn-primary"><?=$lang['add']?></button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="container-fluid" style="font-size: 14px;">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <a href="#" data-toggle="modal" data-target="#lead-form_add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> <?=$lang['add_a_potential_lead']?></a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary"><br>
                                <h4 class="card-title "><?=$lang['lead_generation']?></h4>
                                <p class="card-category"> <?=$lang['list_of_potential_leads']?>:</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="dataTable">
                                        <thead class=" text-primary">
                                        <tr>
                                            <th name="lead_date">
                                                <?=$lang['date']?>:
                                            </th>
                                            <th >
                                                <?=$lang['firstName']?>:
                                            </th>
                                            <th>
                                                <?=$lang['mail']?>:
                                            </th>
                                            <th>
                                                <?=$lang['Project']?>:
                                            </th>
                                            <th>
                                                <?=$lang['phonenumber']?>:
                                            </th>
                                            <th>
                                                <?=$lang['comments']?>:
                                            </th>
                                            <th>
                                                <?=$lang['status']?>:
                                            </th>

                                            <th>
                                                <?=$lang['management']?>:
                                            </th>
                                        </tr></thead>
                                        <tbody id="table_lead">

                                        <? foreach($lead as $key => $value):?>
                                            <? if($value["leadstatus"] == "new"):?>
                               
                                                <tr class="lead_table <?if(!empty(date("d.m.Y", strtotime($value["dateCall"])))&& date("d.m.Y") >= date("d.m.Y", strtotime($value["dateCall"]))):?><?elseif (date("Y", strtotime($value["dateCall"]))!=="1970" && date("d") == date("d", strtotime($value["dateCall"]))-"1"):?><?endif;?>">
                                                    <? foreach($value as $key => $leadValue):?>
                                                        <?if($key==="id"):?>
                                                            <input name="lead_id" type="hidden" value="<?echo $leadValue?>">
                                                        <?endif;?>
                                                        <?if($key==="date"):?>
                                                            <td name="lead_data">
                                                                <?echo date("d.m.Y", strtotime($leadValue));?>
                                                                <?$data_lead =  date("d.m.Y", strtotime($leadValue))?>
                                                            </td>
                                                        <?endif;?>
                                                        <?if($key==="email"):?>
                                                            <td name="lead_email">
                                                                <?echo $leadValue?>
                                                            </td>
                                                        <?endif;?>
                                                        <?if($key==="name"):?>
                                                            <td name="lead_name">
                                                                <?echo $leadValue?>
                                                            </td>
                                                        <?endif;?>
                                                        <?if($key==="project"):?>
                                                            <td name="lead_project">
                                                                <?
                                                                $find = strpos($leadValue, 'http://');
                                                                if ($find === false) {
                                                                    $leadValue= $findme.$leadValue;
                                                                }?>
                                                                <a href="<?=$leadValue;?>"><?php
                                                                    $leadValueHTTP = str_replace("http://", "", $leadValue);
                                                                    $leadValueHTTPS = str_replace("https://", "", $leadValueHTTP);
                                                                    $leadValueSlash = str_replace("/", "", $leadValueHTTPS);
                                                                    echo $leadValueSlash;
                                                                    ?></a>
                                                            </td>
                                                        <?endif;?>

                                                        <?if($key==="tel"):?>
                                                            <td name="lead_tel">
                                                                <a href="tel:<?=$leadValue?>"><?=$leadValue?></a>
                                                            </td>
                                                        <?endif;?>
                                                        <?if($key==="dateCall"):?>
                                                            <?$lead_dareRecall = $leadValue?>
                                                        <?endif;?>

                                                        <?if($key==="status"):?>
                                                            <td class="text-primary d-flex  align-items-center" name="lead_status">
                                                                <?if($leadValue==="newcall"):?>
                                                                    <span><?echo $lang['call_new'];?></span>
                                                                <?elseif ($leadValue==="recall"):?>
                                                                <div class="d-flex flex-column">
                                                                    <span><?echo $lang['call_back'];?></span>
                                                                    <div class="lead_dateRecallValue"><?=$lead_dareRecall?></div>
                                                                </div>
                                                                <?elseif ($leadValue==="feedback"):?>
                                                                    <span><?echo $lang['call_feedback'];?></span>
                                                                <?endif;?>
                                                                <div class="input-group-append pl-2">
                                                                    <i class="fa fa-cog pointer lead_edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-hidden="true"></i>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item lead_table-callNew pointer" ><?=$lang['call_new'];?></a>
                                                                        <a class="dropdown-item lead_table-callBack pointer" ><?=$lang['call_back']?></a>
                                                                        <input  type="text" name="lead_dataRecall"  value="<?=$lead_dareRecall?>" class="ml-4" />
                                                                        <a class="dropdown-item lead_table-feedback pointer" ><?=$lang['call_feedback']?></a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <?endif;?>
                                                        <?if($key==="comment"):?>
                                                            <td  name="lead_comment">
                                                                <span><?echo $leadValue?></span>
                                                            </td>
                                                        <?endif;?>
                                                    <?endforeach;?>
                                                    <td>
                                                        <i class="fa fa-check pointer" aria-hidden="true"></i>
                                                        <i class="fa fa-ban lead_old pointer" data-toggle="modal" data-target="#lead-form_old "aria-hidden="true"></i>
                                                        <i class="fa fa-cog lead_comment-edit pointer" data-toggle="modal" data-target="#lead-form_edit-comment"aria-hidden="true"></i>

                                                    </td>
                                                </tr>
                                            <?endif;?>
                                        <?endforeach;?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?}else{?>
            <div class="alert alert-info" role="alert">
                <?=$lang['access_to_the_page_is_closed']?>
            </div>
        <?}?>
    </div>
    <script>
        $(document).ready(function() {
            $('td[name="lead_comment"] span').each(function (index,element) {
                if($(element).width()>= 400){
                    $(element).addClass("scroll")
                }
            })

            $( "#lead-form_edit-comment" ).submit(function( event ) { // задаем функцию при срабатывании события "submit" на элементе <form>
                event.preventDefault()
                ajax_lead("lead_edit",$(this))
            })
            $('body').on('click', '.lead_edit', function() {
                $('input[name="lead_dataRecall"]').daterangepicker({
                    singleDatePicker: true,
                    locale: {
                        format: 'DD.MM.YYYY'
                    }
                });
            })

            $('body').on('click', '.lead_comment-edit', function() {
                $('input[name="lead_id"]').removeClass('activeID')
                $('.lead_table').removeClass('active')
                $(this).parent().parent().find('input[name="lead_id"]').addClass('activeID')
                $(this).parent().parent().addClass('active')
                let comment_text = $(this).parent().parent().find('td[name="lead_comment"] span').text().trim(),
                    lead_name = $(this).parent().parent().find('td[name="lead_name"]').text().trim(),
                    lead_project = $(this).parent().parent().find('td[name="lead_project"]').text().trim(),
                    lead_tel = $(this).parent().parent().find('td[name="lead_tel"] a').text().trim(),
                    lead_email= $(this).parent().parent().find('td[name="lead_email"]').text().trim()
                if(comment_text  !==null && comment_text !==undefined
                    && lead_name  !==null && lead_name !==undefined
                    && lead_project  !==null && lead_project !==undefined
                    && lead_tel  !==null && lead_tel !==undefined){
                    $(".lead-form_name-edit").val(`${lead_name}`)
                    $(".lead-form_project-edit").val(`${lead_project}`)
                    $(".lead-form_phone-edit").val(`${lead_tel}`)
                    $(".lead-form_comment-edit").val(`${comment_text}`)
                    $(".lead-form_mail-edit").val(`${lead_email}`)
                }
            })
            //status feedback
            $('body').on('click', '.lead_table-feedback', function() {
                const lead_feedback = new Lead_Ajax({
                    status:"lead_feedback",
                    $element:$(this),
                    leadStatusCall:"feedback",
                    id:$(this).parent().parent().parent().parent().find('input[name="lead_id"]').val(),
                    lang:{
                        call_feedback:'<?=$lang['call_feedback']?>'
                    }
                })
                lead_feedback.ajax()
            })
            //lead add
            $( "#lead-form_add" ).submit(function( event ) {
                event.preventDefault()
                const add_lead = new Lead_Ajax({
                    status:"lead_add",
                    type:"lead_table",
                    leadStatusCall:"newcall",
                    name:$(this).find(".lead-form_name").val(),
                    project:$(this).find(".lead-form_project").val(),
                    tel:$(this).find(".lead-form_phone").val(),
                    email:$(this).find(".lead-form_email").val(),
                    id:<?if (empty($lead[$last]["id"])){echo "1";}else{echo $lead[$last]["id"];}?>,
                    dateLead:"<?=$data_lead?>",
                    lang:{call_new:'<?echo $lang['call_new']?>',
                        call_back:'<?=$lang['call_back']?>',
                        call_feedback:'<?=$lang['call_feedback']?>'
                    }
            })
                add_lead.ajax()
                $(this).find(".lead-form_close").trigger('click');
            })
            // lead status newcall
            $('body').on('click', '.lead_table-callNew', function() {
                const lead_callNew = new Lead_Ajax({
                    status:"lead_callNew",
                    $element:$(this),
                    leadStatusCall:"newcall",
                    id:$(this).parent().parent().parent().parent().find('input[name="lead_id"]').val(),
                    lang:{
                        call_new:'<?echo $lang['call_new']?>'
                    }
                })
                lead_callNew.ajax()
            })
            // lead status recall
            $('body').on('click', '.lead_table-callBack', function() {
                const lead_callBack = new Lead_Ajax({
                    status:"lead_callBack",
                    $element:$(this),
                    leadStatusCall:"recall",
                    dateCall:$(this).parent().find('input[name="lead_dataRecall"]').val(),
                    id:$(this).parent().parent().parent().parent().find('input[name="lead_id"]').val(),
                    lang:{
                        call_back:'<?=$lang['call_back']?>',
                    }
                })
                lead_callBack.ajax()
            })
            //lead  add archive
            $('body').on('click', '.lead_old', function() {
                $('input[name="lead_id"]').removeClass('activeID')
                $(this).parent().parent().find('input[name="lead_id"]').addClass('activeID')
                let comment_text = $(this).parent().parent().find('td[name="lead_comment"] span').text().trim()
                if(comment_text  !==null && comment_text !==undefined){
                    $(".lead-form_comment").val(`${comment_text}`)
                }
            })
            $( "#lead-form_old" ).submit(function( event ) { // задаем функцию при срабатывании события "submit" на элементе <form>
                event.preventDefault()
                const lead_old = new Lead_Ajax({
                    status:"lead_old",
                    $element:$(this),
                    leadStatus:'old',
                    comment:$(this).find(".lead-form_comment").val(),
                    id:$('.activeID').val()
                })
                lead_old .ajax()
                $(this).find(".lead-form_close").trigger('click');
            })

            function ajax_lead(event,element){
                var Data_lead,
                    lead_name,
                    lead_project,
                    lead_tel,
                    lead_status,
                    lead_leadStatus,
                    lead_comment,
                    lead_id,
                    lead_email,
                    lead_dateCall
                if(event === "lead_edit"){
                    lead_id = $('.activeID').val()
                    lead_name = element.find(".lead-form_name-edit").val()
                    var lead_type = "lead_table";
                    let project_url
                    if (element.find(".lead-form_project-edit").val().indexOf("http://") > -1 || element.find(".lead-form_project-edit").val().indexOf("https://") > -1) {
                        project_url = element.find(".lead-form_project-edit").val();

                    }else{
                        project_url = "http://"+element.find(".lead-form_project-edit").val();
                    }
                    lead_project= project_url
                    lead_tel = element.find(".lead-form_phone-edit").val()
                    lead_comment = element.find(".lead-form_comment-edit").val()
                    lead_email = element.find(".lead-form_mail-edit").val()
                }
                jQuery.ajax({
                    type: "POST",
                    url: "core/core.php",
                    data: {
                        "status": `${event}`,
                        "lead_type":`${lead_type}`
                        "lead_date": `${Data_lead}`,
                        "lead_dateCall": `${lead_dateCall}`,
                        "lead_name": `${lead_name}`,
                        "lead_project": `${lead_project}`,
                        "lead_tel": `${lead_tel}`,
                        "lead_status": `${lead_status}`,
                        "lead_leadStatus": `${lead_leadStatus}`,
                        "lead_comment": `${lead_comment}`,
                        "lead_id": `${lead_id}`,
                        "lead_email":`${lead_email}`
                    },
                    success: function(html) {
                        let array = html
                        console.log(html)
                        if(array !== null && array.length !== 0){


                            if(event === "lead_comment-edit"){
                                $('.lead_table.active').find('td[name="lead_tel"] a').text(element.find(".lead-form_phone-edit").val())
                                $('.lead_table.active').find('td[name="lead_tel"] a').attr(`"href":"tel:${element.find(".lead-form_phone-edit").val()}`)
                                $('.lead_table.active').find('td[name="lead_name"]').text(element.find(".lead-form_name-edit").val())
                                let project_url,
                                    project_name
                                if (element.find(".lead-form_project-edit").val().indexOf("http://") > -1 || element.find(".lead-form_project-edit").val().indexOf("https://") > -1) {
                                    project_name = element.find(".lead-form_project-edit").val().replace(/^http?:\/\//,'').replace(/^https?:\/\//,'')
                                    project_url = element.find(".lead-form_project-edit").val();
                                }else{
                                    project_url = "http://"+element.find(".lead-form_project-edit").val();
                                    project_name = element.find(".lead-form_project-edit").val()
                                }
                                $('.lead_table.active').find('td[name="lead_project"] a').attr(`"href":${project_url}`)
                                $('.lead_table.active').find('td[name="lead_project"] a').text(`${project_name}`)
                                $('.lead_table.active').find('td[name="lead_comment"] span').text(element.find(".lead-form_comment-edit").val())
                                $('.lead_table.active').find('td[name="lead_email"]').text(element.find(".lead-form_mail-edit").val())
                            }
                        }else{
                            alert("error")
                        }

                    }
                });
            }
        })
    </script>
<? include "templates/footer.php"; ?>
<script src="templates/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="templates/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
