<? include "templates/header.php";?>
    <div class="container-fluid">
        <?php
        $sql_lead = "SELECT * FROM `crm_lead`";
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
            <div class="container-fluid">
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

                                                        <?if($key==="status"):?>
                                                            <td class="text-primary d-flex align-items-center" name="lead_status">
                                                                <?if($leadValue==="newcall"):?>
                                                                    <span><?echo $lang['call_new'];?></span>
                                                                <?elseif ($leadValue==="recall"):?>
                                                                    <span><?echo $lang['call_back'];?></span>
                                                                <?elseif ($leadValue==="feedback"):?>
                                                                    <span><?echo $lang['call_feedback'];?></span>
                                                                <?endif;?>
                                                                <div class="input-group-append pl-2">
                                                                    <i class="fa fa-cog pointer lead_edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-hidden="true"></i>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item lead_table-callNew pointer" ><?=$lang['call_new'];?></a>
                                                                        <a class="dropdown-item lead_table-callBack pointer" ><?=$lang['call_back']?></a>

                                                                        <input  type="text" name="lead_dataRecall"  value="<?=$data_lead?>" class="ml-4" />
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


            $( "#lead-form_add" ).submit(function( event ) { // задаем функцию при срабатывании события "submit" на элементе <form>
                event.preventDefault()
                ajax_lead("lead_add",$(this))
            })
            $( "#lead-form_old" ).submit(function( event ) { // задаем функцию при срабатывании события "submit" на элементе <form>
                event.preventDefault()
                ajax_lead("lead_old",$(this))
            })
            $( "#lead-form_edit-comment" ).submit(function( event ) { // задаем функцию при срабатывании события "submit" на элементе <form>
                event.preventDefault()
                ajax_lead("lead_comment-edit",$(this))
            })
            $('body').on('click', '.lead_table-callNew', function() {
                ajax_lead("lead_callNew",$(this))
            })

            $('body').on('click', '.lead_table-feedback', function() {
                ajax_lead("lead_feedback",$(this))
            })
            $('body').on('click', '.lead_old', function() {
                $('input[name="lead_id"]').removeClass('activeID')
                $(this).parent().parent().find('input[name="lead_id"]').addClass('activeID')
                let comment_text = $(this).parent().parent().find('td[name="lead_comment"] span').text().trim()
                if(comment_text  !==null && comment_text !==undefined){
                    $(".lead-form_comment").val(`${comment_text}`)
                }
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

            function ajax_lead(event,element){
                var Data_lead,
                    lead_name,
                    lead_project,
                    lead_tel,
                    lead_status,
                    lead_leadStatus,
                    lead_comment,
                    lead_id,
                    lead_email
                if(event === "lead_add"){
                    let Data = new Date(),
                        Year = Data.getFullYear(),
                        Month = Data.getMonth(),
                        Day = Data.getDate();
                    Data_lead = `${Month}/${Day}/${Year}`
                    lead_name = element.find(".lead-form_name").val()
                    lead_project = element.find(".lead-form_project").val()
                    lead_tel = element.find(".lead-form_phone").val()
                    lead_status = "newcall"
                    lead_email= element.find(".lead-form_email").val()
                    lead_id = <?if (empty($lead[$last]["id"])){echo "1";}else{echo $lead[$last]["id"];}?>
                }
                if(event === "lead_old"){
                    lead_id = $('.activeID').val()
                    lead_comment = element.find(".lead-form_comment").val()
                    lead_leadStatus = "old"
                }
                if(event === "lead_feedback"){
                    lead_id= element.parent().parent().parent().parent().find('input[name="lead_id"]').val()
                    lead_status="feedback"
                }
                if(event === "lead_callNew"){
                    lead_id= element.parent().parent().parent().parent().find('input[name="lead_id"]').val()
                    lead_status="newcall"
                }
                if(event === "lead_comment-edit"){
                    lead_id = $('.activeID').val()
                    lead_name = element.find(".lead-form_name-edit").val()
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
                        "lead_date": `${Data_lead}`,
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
                            $(element).find(".lead-form_close").trigger('click');
                            if(event === "lead_add"){
                                let project_url,
                                    project_name
                                if (lead_project.indexOf("http://") > -1 || lead_project.indexOf("https://") > -1) {
                                    project_url = lead_project;
                                    project_name = lead_project.replace(/^http?:\/\//,'').replace(/^https?:\/\//,'')
                                }else{
                                    project_url = "http://"+lead_project;
                                    project_name = lead_project
                                }
                                $(`<tr class="lead_table">
                            <input name="lead_id" type="hidden" value="<?if (empty($lead[$last]["id"])){echo "1";}else{echo $lead[$last]["id"]+1;}?>" \/>
                            <td name="lead_data">${Data_lead}<\/td>
                            <td name="lead_name">${lead_name}<\/td>
                            <td name="lead_email">${lead_email}<\/td>
                            <td name="lead_project"><a href="${project_url}">${project_name}<\/a><\/td>
                            <td name="lead_tel"><a href="tel:${lead_tel}">${lead_tel}<\/a><\/td>
                            <td name="lead_comment"><\/td>
                            <td class="text-primary d-flex align-items-center" name="lead_status"><?echo $lang['call_new']?>
                                   <div class="input-group-append pl-2">
                                            <i class="fa fa-cog pointer lead_edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-hidden="true"><\/i>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item lead_table-callNew pointer" ><?=$lang['call_new'];?><\/a>
                                                <a class="dropdown-item lead_table-callBack pointer" ><?=$lang['call_back']?><\/a>
                                                <input type="text" name="lead_dataRecall"  value="<?=$data_lead?>" class="ml-4" \/>
                                                <a class="dropdown-item lead_table-feedback pointer" ><?=$lang['call_feedback']?><\/a>
                                            <\/div>
                                        <\/div>
                                        <\/td>
                            <td>
                            <i class="fa fa-check" aria-hidden="true"><\/i>
                            <i class="fa fa-ban lead_old" data-toggle="modal" data-target="#lead-form_old "aria-hidden="true"><\/i>
                            <i class="fa fa-cog lead_comment-edit" data-toggle="modal" data-target="#lead-form_edit-comment"aria-hidden="true"><\/i>
                            <\/td>
                            <\/tr>`).appendTo('#table_lead')
                            }
                            if(event === "lead_feedback"){
                                element.parent().parent().parent().parent().find('td[name="lead_status"]').find("span").text('<?echo $lang['call_feedback']?>')
                            }
                            if(event === "lead_callNew"){
                                element.parent().parent().parent().parent().find('td[name="lead_status"]').find("span").text('<?echo $lang['call_new']?>')
                            }
                            if(event === "lead_old"){
                                $(".alert-project-name").text(`${$('.activeID').parent().find('td[name="lead_project"]').text()}`)
                                $(".alert-lead").slideDown(300);
                                $('.activeID').parent().remove()
                                $(".alert-lead").delay(4200).slideUp(300);
                            }
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