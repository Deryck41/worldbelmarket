<!-- <script>
tinymce.init({
    selector: '#editor',
    language:'<?=$lang['lang']?>',
	toolbar: 'image',
	images_upload_url: '../core/postAcceptor.php',
plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
	'image imagetools',
    'insertdatetime media table paste imagetools wordcount'
  ],
});
</script> -->
<style>
@media (min-width: 576px){
.modal-dialog {
    max-width: 75%;
    margin: 1.75rem auto;
}
}
</style>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="Create-Task-Form">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?=$lang['create_task']?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-md-3">
                            <!-- ASTED: Основное функционал таски-->
                            <span><strong><?=$lang['theme']?>: </strong></span>
                        <input class="form-control theme" type="тема">
                        <br>
                        <span><strong><?=$lang['responsible']?>: </strong></span>
						<input type="hidden" class="form-control autor" value="<?=$_SESSION['userid']?>">
                        <select class="form-control responsible" name="" id="">
							<?php echo implode ('', $usersoption); ?>
                        </select>
                        <br>
						        <label class="small mb-1" for="inputBirthday">Крайний срок</label>
                                                    <input class="form-control enddate" id="inputBirthday" type="text" name="birthday" placeholder="" value="">
													 <br>
										<script>
                                        (function($) {
                                        

                                            $('input[name="birthday"]').daterangepicker({
                                                    singleDatePicker: true,
                                                    locale: {
                                                        format: 'DD.MM.YYYY',
                                                        applyLabel: "Ок",
                                                        cancelLabel: "Отмена",
                                                        fromLabel: "От",
                                                        toLabel: "До",
                                                        monthNames : ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                                                        daysOfWeek : ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                                                        firstDay: 1
                                                    }
                                            });
                                        })(jQuery);
                                        </script>	
                                                                <span><strong><?=$lang['Group']?>: </strong></span>
                                                                <select class="form-control group" name="" id="">
                                        <?for($newsCont = 0; $newsCont < $groupContResult; $newsCont++){
                                            ?>
                                            <option value="<?=$groupResult[$newsCont]['id']?>"><?=$groupResult[$newsCont]['group_title']?></option>
                                            <?}?>
                        </select>
                        <br>
                        <span><strong>Приоритет: </strong></span>
                        <select class="form-control warning" name="" id="">
                            <option value="1">Низкий</option>
                            <option value="2" selected>Обычный</option>
                            <option value="3">Высокий</option>
                        </select>
                        <br>
                        <span><strong>Теги (через запятую): </strong></span>
                        <input class="form-control tegs" type="тема"><br>
                        <!-- ASTED: Основное функционал таски END -->
                        </div>
                        <div class="col-md-9">
                            <!-- ASTED: Основное описание таски -->
                            <div class=""><span><strong><?=$lang['message']?>: </strong></span></div>
                        <textarea class="form-control message astededitor" name="editor" id="editor"></textarea>
                            <!-- ASTED: Основное описание таски END -->
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                        <button type="submit" class="btn btn-primary"><?=$lang['add']?></button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('.astededitor').each(function() {
                CKEDITOR.replace(this, {
                    extraPlugins: 'uploadimage',
                    extraAllowedContent: '*[*]{*}(*)'
                });
                CKEDITOR.dtd.$removeEmpty.span = false
                CKEDITOR.dtd.$removeEmpty.i = false
                CKEDITOR.config.height = '300px';
            });
</script>