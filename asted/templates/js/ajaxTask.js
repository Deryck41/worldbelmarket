$(document).ready(function() {
    $("#Create-Task-Form button[type=\"submit\"]").click(function () {
    // var astedEditor = tinyMCE.get('editor');
    var astedEditor = CKEDITOR.instances.editor.getData();
        jQuery.ajax({
            type: "POST",
            url: "/asted/core/core.php",
            data: {
                "Task-theme":`${$("#Create-Task-Form .theme").val()}`,
                "Task-autor":`${$("#Create-Task-Form .autor").val()}`,
                "Task-dateend":`${$("#Create-Task-Form .enddate").val()}`,
                "Task-responsible":`${$("#Create-Task-Form .responsible").val()}`,
                "Task-group":`${$("#Create-Task-Form .group").val()}`,
                "Task-warning":`${$("#Create-Task-Form .warning").val()}`,                 
                "Task-tegs":`${$("#Create-Task-Form .tegs").val()}`,
                "Task-message": astedEditor
                // "Task-message": astedEditor.getContent() это для tinyMCE
            },
            success: function(response) {
                        location.href = '/asted/tasks/';
            }
        });
    })    
    });