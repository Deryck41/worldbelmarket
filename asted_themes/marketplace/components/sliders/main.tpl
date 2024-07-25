<div id="main-slider" data-autoplay="{$slider.timer}" class="slider-bg2 owl-carousel owl-theme product-review slider-cat" style="background-image: url('{$BLOCKPizo1}')">
{foreach from=$slider.slides item=slide}
    <div class="item d-flex slider-bg align-items-center">
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="slider-text flex-block order-2 order-sm-1 col-sm-6 col-xl-4 col-md-6 center-block-main">
                    <h6 class="sub-title">{$slide['1']['value']}</h6>
                    <h1 class="slider-title">
                        <strong class="highlights-text">{$slide['2']['value']}</strong>
                    </h1>

                    <a href="{$slide['3']['value']}" class="btn btn-primary wd-shop-btn slider-btn">
                    {$slide['3']['text']}<i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 order-1 order-sm-2 col-xl-6 slider-img">
                    <img src="{$slide['4']['value']}" alt="" />
                </div>
            </div>
        </div>
    </div>
    
{/foreach}
    
