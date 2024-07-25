<? include "templates/header.php";?>
<div class="container">
<div class="card card-header-actions mb-4">
                            <div class="card-header">
                                Список оповещений
                            </div>
                            <div class="card-body px-0">
                                <!-- Payment method 1-->
                                <?php 
$notices = R::findAll('crm_notice', 'userid = ?', [$userID]);

// Вывод данных
foreach ($notices as $notice) {?>
                                <div class="d-flex align-items-center justify-content-between px-4">
                                    <div class="d-flex align-items-center">

                                        <div class="ms-4">
                                            <div class="small"><?=$notice->title?></div>
                                            <div class="text-xs text-muted">ID: <?=$notice->id?> Дата: <?=$notice->data?></div>
                                        </div>
                                    </div>
                                    <?if($notice->uri != null){?>
                                    <div class="ms-4 small">
                                        <a href="<?=$notice->uri?>">Подробнее</a>
                                    </div>
                                    <?}?>
                                </div>
                                <hr>
                                <?}?>
                            </div>
                        </div>

</div>
<? include "templates/footer.php";?>