<?
session_name('terrancrm');
session_start();
session_set_cookie_params(2 * 7 * 24 * 60 * 60);

include $_SERVER['DOCUMENT_ROOT'] ."/asted/core/core.php";


if (isset($_SESSION['userid'])){
    $user = R::findOne('crm_users', 'id = ?', [$_SESSION['userid']]);

    if (!empty($user)){
        if ($user['divisions'] === "1"){
            $products = array();
            switch ($_GET['filter']){
                case "moderation":
                    $products = R::find('site_products', 'status = ?', ['moderation']);
                    break;
                case "on-market":
                    $products = R::find('site_products', 'status = ?', ['active']);
                    break;
                case "rejected":
                    $products = R::find('site_products', 'status = ?', ['rejected']);
                    break;
                default:
                    $products = R::find('site_products');
                    break;
            }

            foreach ($products as $product) {
                ?>
                <div class="product-item" data-id="<?= $product['id']?>">
                    <div class="product-title product-column"><?= $product['title']?></div>
                    <div class="product-image product-column"><img src="<?= $product['photo'] === "" || $product['photo'] === null ? '/asted/uploads/20240406030217_no.jpg': $product['photo']?>" alt=""></div>
                    <div class="product-column product-status"><? 
                    
                    switch ($product['status']){
                        case "moderation":
                            echo '<i class="fas fa-clock"></i> <span style="padding-left: 10px">На модерации</span>';
                            break;
                        case "active":
                            echo '<i class="fa-solid fa-cart-shopping" style="color: green;"></i> <span style="padding-left: 10px; color: green;">На маркетплейсе</span>';
                            break;
                        case "rejected":
                            echo '<i class="fa-solid fa-times" style="color: red;"></i> <span style="padding-left: 10px; color: red;">Отклонено</span>';
                            break;
                    }
                    ?></div>
                    <div class="product-link product-column"><a target="_blank" href="/view-product/?id=<?= $product['id']?>" class="btn btn-primary">Посмотеть</a></div>
                    <div class="product-action product-column">
                        <? switch($product['status']){
                            case "moderation": ?>
                                <button class="btn btn-primary accept-button">Принять</button>
                                <button class="btn btn-primary reject-button">Отклонить</button>
                                <?
                                break;
                            case "active":
                                ?>
                                    <button class="btn btn-primary delete-button">Удалить</button>
                                <?
                                break;
                            case "rejected": ?>
                                <button class="btn btn-primary restore-button">Восстановить</button>
                                <button class="btn btn-primary clear-button">Очистить</button>
                                <?
                        }
                        
                        ?>
                    </div>

                </div> 
                <?
            }
            
            
        }
    }
}


           