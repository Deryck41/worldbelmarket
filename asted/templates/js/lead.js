class Lead_Ajax {
    constructor(options){
        this.status = options.status
        this.type = options.type
        this.leadStatus= options.leadStatus
        this.leadStatusCall = options.leadStatusCall
        this.dateCall = options.dateCall
        this.dateLead = options.dateLead
        this.name = options.name
        this.project = options.project
        this.tel = options.tel
        this.comment = options.comment
        this.id = options.id
        this.email = options.email
        this.data = options.data
        this.lang=options.lang
        this.$element = options.$element
        this.manager = options.manager
        this.projectName = options.projectName
    }
    ajax(){
        let Data = new Date(),
            Year = Data.getFullYear(),
            Month = Data.getMonth(),
            Day = Data.getDate(),
            Data_lead = `${Month}/${Day}/${Year}`;
        jQuery.ajax({
            type: "POST",
            url: "core/core.php",
            data: {
                "status": `${this.status}`,
                "lead_type":`${this.type}`,
                "lead_manager":`${this.manager}`,
                "lead_leadStatus": `${this.leadStatus}`,
                "lead_statusCall": `${this.leadStatusCall}`,
                // "lead_date": `${Data_lead}`,
                "lead_dateCall":`${this.dateCall}`,
                "lead_name": `${this.name}`,
                "lead_project": `${this.project}`,
                "lead_projectName": `${this.projectName}`,
                "lead_tel": `${this.tel}`,
                "lead_comment": `${this.comment}`,
                "lead_id": `${this.id}`,
                "lead_email":`${this.email}`,

            },
            success:(html)=> {
                if(html !== null && html.length !== 0){
                        setTimeout(() => location.reload(), 500)
                    if(this.status === "lead_add" && this.type === "lead_table") {
                        let project_url,
                            project_name
                        if (this.project.indexOf("http://") > -1 || this.project.indexOf("https://") > -1) {
                            project_url = this.project;
                            project_name = this.project.replace(/^http?:\/\//, '').replace(/^https?:\/\//, '')
                        } else {
                            project_url = "http://" + this.project;
                            project_name = this.project
                        }
                        $(`<tr class="lead_table">
                            <input name="lead_id" type="hidden" value="${this.id}" \/>
                            <td name="lead_data">${Data_lead}<\/td>
                            <td name="lead_name">${this.name}<\/td>
                            <td name="lead_email">${this.email}<\/td>
                            <td name="lead_project"><a href="${project_url}">${project_name}<\/a><\/td>
                            <td name="lead_tel"><a href="tel:${this.tel}">${this.tel}<\/a><\/td>
                            <td name="lead_comment"><\/td>
                            <td class="text-primary d-flex align-items-center" name="lead_status">${this.lang.call_new}
                                   <div class="input-group-append pl-2">
                                            <i class="fa fa-cog pointer lead_edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-hidden="true"><\/i>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item lead_table-callNew pointer" >${this.lang.call_new}<\/a>
                                                <a class="dropdown-item lead_table-callBack pointer" >${this.lang.call_back}<\/a>
                                                <input type="text" name="lead_dataRecall"  value="<?=$data_lead?>" class="ml-4" \/>
                                                <a class="dropdown-item lead_table-feedback pointer" >${this.lang.call_feedback}<\/a>
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
                    if(this.status === "lead_feedback") {
                        this.$element.parent().parent().parent().parent().find('td[name="lead_status"]').find("span").text(`${this.lang.call_feedback}`)
                        $(".lead_dateRecallValue").remove()
                    }
                    if(this.status === "lead_callNew") {
                        this.$element.parent().parent().parent().parent().find('td[name="lead_status"]').find("span").text(`${this.lang.call_new}`)
                        $(".lead_dateRecallValue").remove()
                    }
                    if(this.status === "lead_callBack") {
                        this.$element.parent().parent().parent().parent().find('td[name="lead_status"]').find("span").text(`${this.lang.call_back}`)
                    }
                    if(this.status === "lead_old"){
                        $(".alert-project-name").text(`${$('.activeID').parent().find('td[name="lead_project"]').text()}`)
                        $(".alert-lead").slideDown(300);
                        $('.activeID').parent().remove()
                        $(".alert-lead").delay(4200).slideUp(300);
                    }

                }else{
                    alert("error")
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        })
    }
}