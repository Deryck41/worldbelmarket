$(document).ready(function() {
    $(".tasks .tasks-title").click(function () {
        $(this).hide();
        $(this).siblings(".tasks-title-edit").find(".tasks-title-value").val($(this).text())
        $(this).siblings(".tasks-title-edit").css({"display":"flex"})
    })
    $(".tasks .tasks-title-edit-save").click(function () {
        let value = $(this).parent().parent().parent().find(".tasks-title-value").val()
         $(this).parent().parent().parent().parent().find(".tasks-title").text(value);
         $(this).parent().parent().parent().parent().find(".tasks-title").show();
         $(this).parent().parent().parent().hide();
    })
     $(".tasks .tasks-title-edit-cancel").click(function () {
         $(this).parent().parent().parent().parent().find(".tasks-title").show();
         $(this).parent().parent().parent().hide();
     })
    $(".tasks .tasks-title-edit-delete").click(function () {
        $(this).parent().parent().parent().parent().parent().parent().remove();

    })
    $(document).click( function(event){
        if( $(event.target).closest(".tasks-column-title").length )
            return;
        $(".tasks-title-edit").hide();
        $(".tasks-title").show();
        event.stopPropagation();
    });
})