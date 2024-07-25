<? include "templates/header.php"; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/panel/components/site.sliders/style.css">
<div class="container-fluid">
    <div class="container-slider">
        <?
            $sliders = R::find('site_sliders');
            $counter = 0;
            foreach($sliders as $slider){
                $sliderData = json_decode($slider['data'], true);
                $data = $sliderData['slides'];
                
                
                ?>
                    <div class="slider" data-id="<?= $slider['id']?>">
                        <div class="slider__header">
                            <div class="slider-info">
                                <div class="slider__name"><b><?= $slider['name']?></b></div>
                                <div class="slider__id">ID: <?= $slider['id']?></div>
                                <div class="slider__timer">Интервал прокрутки: <input type="number" value="<?= $sliderData['timer']?>" data-id="<?= $slider['id']?>" class="slider-timer-input"> мс</div>
                            </div>
                            <div class="slider-controls">
                            <i data-slider="<?= $slider['id']?>" class="fa-solid fa-plus new-slider-slide-button"></i>
                            <i data-slider="<?= $slider['id']?>" class="fa-solid fa-trash del-slider-button"></i>
                            
                            </div>
                        </div>
                       
                        <div class="slider__values">
                            <span>Значения:</span>
                            <div class="swiper swiper<?= $counter?>">
                                <div class="swiper-wrapper">
                                    <?
                                    $slidesCount = 1;
                                        foreach ($data as $slide){
                                            ?>

                                                <div class="swiper-slide">
                                                    <div class="slide_number"><?= $slidesCount?> Слайд <i data-slide="<?= $slidesCount - 1?>" class="fa-solid fa-trash del-slider-slide-button"></i></div>
                                                    
                                                    <?
                                                        
                                                        foreach($slide as $key => $prop){

                                                            ?>
                                                            <div class="prop">
                                                            <div class="slide_key">Ключ: <?= $key?></div>
                                                            <div class="slide_type">Тип: <?= $prop['type']?></div>
                                                            <div
                                                             class="slide_value" 
                                                             data-pointer=<?= json_encode(
                                                                array("id" => $slider['id'], "slide" => ($slidesCount-1), "prop" => $key, "type" => $prop['type'])
                                                                )?>
                                                             >Значение: <?
                                                                
                                                                switch($prop['type']){
                                                                    case "text":
                                                                        echo '<div class="value">' . $prop['value'] . '</div> ';
                                                                        break;
                                                                    case "link":
                                                                        echo '<div class="value">' . $prop['value'] . '</div> ' . " | " . '<div class="text">' . $prop['text'] . '</div> ';
                                                                        break;
                                                                    case "image":
                                                                        echo '<div class="value"><img src="' . $prop['value'] . '"></div>';
                                                                        break;
                                                                }

                                                            ?>
                                                            
                                                            <button class="edit-slide-prop-value">
                                                                <i class="fa-solid fa-pen"></i>
                                                            </button>
                                                            </div>
                                                            </div>
                                                            
                                                            <?

                                                        }
                                                    
                                                    ?>
                                                </div>
                                            
                                            <?

                                            $slidesCount++;
                                        }
                                    ?>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                
                <?
                $counter++;
            }
        ?>
</div>
<br>
<div class="new-slider">
    <h5>Создать новый слайдер</h5>
    <div class="slider-name">
        Название: <input class="new-slider-name" type="text">
    </div>
    <div class="slider-props">
        <div class="props-container"></div>
        <span>Добавить данные</span>
        <button class="new-prop-button"><i class="fa-solid fa-plus"></i></button>
        <button class="del-prop-button"><i class="fa-solid fa-minus"></i></button>
    </div>
    <button class="button-next">Далее</button>




</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js" integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/panel/components/site.sliders/script.js"></script>
