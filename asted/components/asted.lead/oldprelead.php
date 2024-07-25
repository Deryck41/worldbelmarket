<? include "templates/header.php";?>
<div class="container-fluid">

 <?php
 $sql_lead = "SELECT * FROM `crm_lead`";
 $sql = mysqli_query($link, $sql_lead);
 $lead =[];
 $lead_leadGenerate = [];
 while ($result = $sql->fetch_assoc()) {
     if (!empty($result["manager"])) {
         $sql_lead_user = "SELECT * FROM `crm_users` WHERE id ='" . $result["manager"] . "'";
         $result_lead_user = mysqli_query($link, $sql_lead_user);
         while ($lead_user = mysqli_fetch_assoc($result_lead_user)) {
             $lead_username = "{$lead_user['name']}";
             $lead_usersurname = "{$lead_user['surname']}";
             if (!empty($lead_user["avatar"])) {
                 $lead_userAvatar = '/uploads/users/'.$lead_user["id"].'/avatar/'.$lead_user["avatar"].'';
             }else{
                 $lead_userAvatar = '/templates/object/content/ava.png';
             }

         }
         $result["managerName"] = $lead_username . " " . $lead_usersurname;
         $result["managerAvatar"] = $lead_userAvatar;
         $lead[] = $result;
     } else {
         $result["managerName"] = "";
         $result["managerAvatar"] = '/templates/object/content/ava.png';
         $lead[] = $result;
     }


 }
 function unique_multidim_array($array, $key) {
     $temp_array = array();
     $i = 0;
     $key_array = array();
     foreach($array as $val) {
         if (!in_array($val[$key], $key_array)) {
             $key_array[$i] = $val[$key];
             if(!empty($val["manager"])){
                 $temp_array[$val["manager"]] = $val["managerName"];

             }
         }
         $i++;
     }
     return $temp_array;
 }

 $details = unique_multidim_array($lead,'manager');

 foreach($lead as $val) {
     foreach($details as $key => $val2) {
         if ($val["manager"] == $key && $val["leadstatus"] == "new") {
             $leadAll[] = $val2;
         }
         if ($val["manager"] == $key && $val["leadstatus"] == "lead" ) {
             $leadLead[] = $val2;
         }
     }
 }
 $leadAll =  array_count_values($leadAll);
 $leadLead = array_count_values($leadLead);

if($userGroupsCandeletoldlead['0'] == "true"){?>
    <form class="modal fade" id="lead-form_edit-comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="Create-Task-Form">
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
                    <span><strong><?=$lang['phonenumber']?>: </strong></span>
                    <input class="form-control theme lead-form_phone-edit" required type="tel">
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
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary"><br>
                        <h4 class="card-title "><?=$lang['lead_generation']?></h4>
                        <p class="card-category"> <?=$lang['list_of_potential_leads']?>:</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <tr>
                                    <th name="lead_date">
                                        <?=$lang['date']?>:
                                    </th>
                                    <th >
                                        <?=$lang['firstName']?>:
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
                                    <th >
                                        <?=$lang['manager']?>:
                                    </th>
                                    <th>
                                        <?=$lang['management']?>:
                                    </th>
                                </tr></thead>
                                <tbody id="table_lead">

                                <? foreach($lead as $key => $value):?>
                                    <? if($value["leadstatus"] == "old"):?>
                                        <tr class="lead_table">
                                            <? foreach($value as $key => $leadValue):?>
                                                <?if($key==="id"):?>
                                                    <input name="lead_id" type="hidden" value="<?echo $leadValue?>">
                                                <?endif;?>
                                                <?if($key==="date"):?>
                                                    <td name="lead_data">
                                                        <?echo $leadValue?>
                                                        <?$data_lead = $leadValue?>
                                                    </td>
                                                <?endif;?>
                                                <?if($key==="managerName"):?>
                                                    <td name="lead_manager">
                                                        <div class="d-flex align-items-center">
                                                            <img width="50px" height="auto" style="min-height: 45px;" class="img-profile rounded-circle mr-2" src="<?=$value["managerAvatar"]?>"/>
                                                            <span class="manager-name  line"
                                                                  name="manager-name"><? echo !empty($value["managerName"]) ? $value["managerName"] : "Не указан"; ?></span>
                                                        </div>
                                                    </td>
                                                <?endif;?>
                                                <?if($key==="name"):?>
                                                    <td name="lead_name" style="overflow-x: scroll; max-width: 150px;">
                                                        <?echo $leadValue?>
                                                    </td>
                                                <?endif;?>
                                                <?if($key==="project"):?>
                                                    <td name="lead_project">
                                                        <?echo $leadValue?>
                                                    </td>
                                                <?endif;?>
                                                <?if($key==="tel"):?>
                                                    <td name="lead_tel" style="overflow-x: scroll; max-width: 150px;">
                                                        <?echo $leadValue?>
                                                    </td>
                                                <?endif;?>
                                                <?if($key==="comment"):?>
                                                    <td class="text-light bg-dark" name="lead_comment" style="overflow-x: scroll; max-width: 150px;">
                                                        <?echo $leadValue?>
                                                    </td>
                                                <?endif;?>

                                            <?endforeach;?>
                                            <td>
                                                <i class="fa fa-reply-all lead_return" aria-hidden="true"></i>
                                                <i class="fa fa-cog lead_comment-edit" data-toggle="modal" data-target="#lead-form_edit-comment"aria-hidden="true"></i>

                                            </td>
                                           <?php if($userGroupsCandeletoldlead['0'] == "true"){?> <td>
                                                <i class="fa fa-times lead_delete aria-hidden="true"></i>
										   </td><?}?>
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
            $( "#lead-form_edit-comment" ).submit(function( event ) { // задаем функцию при срабатывании события "submit" на элементе <form>
                event.preventDefault()
                ajax_lead("lead_comment-edit",$(this))
            })
            $('body').on('click', '.lead_return', function() {
                $('input[name="lead_id"]').removeClass('activeID')
                $(this).parent().parent().find('input[name="lead_id"]').addClass('activeID')
                ajax_lead("lead_return",$(this))
            })
            $('body').on('click', '.lead_delete', function() {
                $('input[name="lead_id"]').removeClass('activeID')
                $(this).parent().parent().find('input[name="lead_id"]').addClass('activeID')
                let confirmation =  confirm("Удалить?")
                if(confirmation== true){
                    ajax_lead("lead_delete",$(this))
                }
            })
            $('body').on('click', '.lead_comment-edit', function() {
                $('input[name="lead_id"]').removeClass('activeID')
                $(this).parent().parent().find('input[name="lead_id"]').addClass('activeID')
                let comment_text = $(this).parent().parent().find('td[name="lead_comment"]').text().trim(),
                    lead_name = $(this).parent().parent().find('td[name="lead_name"]').text().trim(),
                    lead_project = $(this).parent().parent().find('td[name="lead_project"]').text().trim(),
                    lead_tel = $(this).parent().parent().find('td[name="lead_tel"] a').text().trim()
                if(comment_text  !==null && comment_text !==undefined
                    && lead_name  !==null && lead_name !==undefined
                    && lead_project  !==null && lead_project !==undefined
                    && lead_tel  !==null && lead_tel !==undefined){
                    $(".lead-form_name-edit").val(`${lead_name}`)
                    $(".lead-form_project-edit").val(`${lead_project}`)
                    $(".lead-form_phone-edit").val(`${lead_tel}`)
                    $(".lead-form_comment-edit").val(`${comment_text}`)
                }
            })
            function ajax_lead(event,element){
                var Data_lead,
                    lead_name,
                    lead_project,
                    lead_tel,
                    lead_status,
                    lead_leadStatus,
                    lead_comment,
                    lead_id

                if(event === "lead_old"){
                    lead_id = $('.activeID').val()
                    lead_comment = element.find(".lead-form_comment").val()
                    lead_leadStatus = "old"
                }
                if(event === "lead_return"){
                    lead_id = $('.activeID').val()
                    lead_leadStatus = "new"
                }
                if(event === "lead_delete"){
                    lead_id = $('.activeID').val()
                    lead_leadStatus = "delete"
                }
                if(event === "lead_comment-edit"){
                    lead_id = $('.activeID').val()
                    lead_name = element.find(".lead-form_name-edit").val()
                    lead_project= element.find(".lead-form_project-edit").val()
                    lead_tel = element.find(".lead-form_phone-edit").val()
                    lead_comment = element.find(".lead-form_comment-edit").val()
                }
                jQuery.ajax({
                    type: "POST",
                    url: "core/core.php",
                    data: {
                        "status": `${event}`,
                        "lead_date": `${Data_lead}`,
                        "lead_name": `${lead_name}`,
                        "lead_project": `${lead_project}`,
                        "lead_tel": `${lead_tel}`,
                        "lead_status": `${lead_status}`,
                        "lead_leadStatus": `${lead_leadStatus}`,
                        "lead_comment": `${lead_comment}`,
                        "lead_id": `${lead_id}`,
                    },
                    success: function(html) {
                        let array = html
                        console.log(html)
                        if(array !== null && array.length !== 0){
                            $(element).find(".lead-form_close").trigger('click');

                            if(event === "lead_feedback"){
                                element.parent().parent().parent().parent().find('td[name="lead_status"]').val('<?echo $lang['call_feedback']?>')
                            }
                            if(event === "lead_old"|| event === "lead_return" || event === "lead_delete"){
                                $('.activeID').parent().remove()
                            }
                            if(event === "lead_return"){
                                $('.activeID').parent().remove()
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