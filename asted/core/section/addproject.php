<script>
    tinymce.init({
        selector: '#editor',
        language: '<?= $lang['lang'] ?>',
        toolbar: 'image',
        images_upload_url: '../core/postAcceptor.php',
        height: 'calc(100% - 35px)',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'image imagetools',
            'insertdatetime media table paste imagetools wordcount'
        ],
    });
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width:80%" class="modal-dialog" role="document">
        <div class="modal-content" id="Create-Group-Form">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><?= $lang['add_project'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-6">
                            <label for="titleadd"><?= $lang['nameOfProject'] ?>:</label>
                            <input class="form-control theme" name="titleadd" id="titleadd" type="тема">
                            <label for="grouppublic">Публичный проект:</label>
                            <select class="form-control responsible" name="grouppublic" id="grouppublic">
                                <option value="0">Публичный</option>
                                <option value="1">Только для участвующих</option>
                            </select>
                            <label for="inputBirthday">Крайний срок</label>
                            <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="" value="">
                            <input type="hidden" class="form-control autor" value="<?= $_SESSION['userid'] ?>">
                            <label for="usergroup"><?= $lang['responsible'] ?>:</label>
                            <select class="form-control responsible" name="usergroup" id="usergroup">
                                <?php echo implode('', $usersoptionfrom); ?>
                            </select><?= $toUserSelectedRank ?>
                            <label for="subuser">Участвуют в проекте <br><span style="font-size:10px">(Вы можете выбрать несколько сотрудников, зажмите <b>Ctrl(или Command)+Сотрудник</b>)</span></label>
                            <select class="form-control" name="subuser[]" id="subuser" multiple>
                                <?php echo implode('', $usersoption); ?>
                            </select>
                        </div>
                        <style>
                            .tox.tox-tinymce{
                                height: calc(80% - 35px) !important;
                            }
                        </style>
                        <div class="col-6">
                            <label for="editor"><?= $lang['description'] ?>:</label>
                            <textarea  style="height: calc(80% - 35px);" name="editor" id="editor" rows="10" cols="80" placeholder="<?= $lang['enter_something'] ?>"></textarea>
                            <label for="editor">Доп информация (для админов) номера телефонов, контакты и т.д:</label>

                            <textarea style="width: -webkit-fill-available; width: -moz-available; width: fill-available; height: calc(20% - 35px);" name="editor2" id="editor2" rows="10" cols="80" placeholder="<?= $lang['enter_something'] ?>, Например: +375 ХХ ХХХ Иван Иванов"></textarea>
                        </div>
                        <script>
                            (function($) {
                                $('input[name="birthday"]').daterangepicker({
                                    singleDatePicker: true,
                                    locale: {
                                        format: 'DD.MM.YYYY'
                                    }
                                });

                            })(jQuery);
                        </script>
                    </div>
                    <input type="submit" name="submit" style="display:none" value="newsadd" name="newsadd" id="id0" class="btn btn-primary btn-user btn-block" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $lang['close'] ?></button>
                <button type="button" onclick="javascript:document.getElementById('id0').click();" class="btn btn-primary"><?= $lang['add'] ?></button>
            </div>
        </div>
    </div>
</div>