<?php
include "templates/header.php";

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/asted/components/site.moderation/style.css">

<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <h3>Модерация объявлений:</h3>
        </div>
        
    </div>
    <div class="row">
        
        <div class="col-md-2">
            <h4>Список</h4>
            <select name="moderation" class="moderation-select">
            <option value="all">Все</option>
                <option value="moderation">На модерации</option>
                <option value="on-market">На маркетплейсе</option>
                <option value="rejected">Отклонённые</option>
                
            </select>


        </div>
        <div class="products">
            <?
            $products = R::find('site_products');
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
                    <div class="product-column flex-row">
                        <input style="width: 100px" type="number" min="0" value="<?= $product['extra']?>">
                        <span>%</span>
                        <button class="btn btn-primary button-extra">Ок</button>
                    </div>
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
            ?>
            </div>
    </div>
</div>
<script src="/asted/components/site.moderation/script.js"></script>
<?php include "templates/footer.php";
