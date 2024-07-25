<?php include "templates/header.php";?>
<div class="container">
<div class="alert alert-warning" role="alert">  <strong> Шаблоны компонентов хранятся: </strong> тема > components > menu, news, catalog, gallery, custom<br>
</div>
<h2 style="color: black;">Общие правила</h2>
<h4>Работа от корня в системе</h4>
<pre><code data-language="php"><link href="{$THEME_URL}css/styles.css" rel="stylesheet"></code></pre>
<h4>Вывести массив</h4>
<pre><code data-language="php">{$nameArr|print_r}</code></pre>
<h2 style="color: black;">Автоматическая подгрузка контента страниц из папки parts с обработкой 404 страницы (вставляем в pages.acws)</h2>
<pre><code data-language="php">{if $CONTENT == null}
    {if $URL2 == null}
        {if $URL == "product"}
            {include "parts/headergen.acws"}
            {catalog forcatalog="3" style="catalog"}  
        {else}
            {* Формируем относительный путь к файлу в папке parts/ *}
            {$filePath = "{$THEME}/parts/{$URL}.acws"}
            {* Проверяем, существует ли файл, прежде чем подключить его *}
            {if file_exists($filePath)}
                {include file=$filePath}
            {else}
                {* Обработка случая, когда файла не существует *}
                {header("HTTP/1.0 404 Not Found")}
                <div style="text-align: center;">ASTED CMS: Error 404, page {$URL} not found!</div>
            {/if}
        {/if}
    {else}
        {if $URL == "prem"}
            {news type="detail" product=$URL2 style="prem"}
        {/if}
        {if $URL == 'product'}
            {catalog type="detail" product=$URL2 style="detail"}
        {/if}
    {/if}
{else}
    {$CONTENT}
{/if}
</code></pre>
<h2 style="color: black;">Подключение компонента меню</h2>
<h4>В теме прописываем</h4>
<pre><code data-language="html">{menu forsection='1' style="header"}
</code></pre>
<h4>Подключения мультименю</h4>
<pre><code data-language="html">{menu forsection="1" type="multi" style="header"}
</code></pre>

<h4>В шаблоне компонента прописываем <span style="color: #468c4b;">youtheme > components > menu > header.acws</span></h4>
<pre><code data-language="php">{foreach from=$menuArr item=menu}
    <li>
	    <a href="/{$menu.link}/"><span>{$menu.title}</span></a>
    </li>
{/foreach}</code></pre>
<h4>Подменю пимер</h4>
<pre><code data-language="php">
  <!--Начала основного цикла-->
{foreach from=$menuArr item=menu}
{assign var="hasMatchingPodmenu" value=false}
{foreach from=$podmenuArr item=podmenu}
{if $podmenu.parent == $menu.id}
{assign var="hasMatchingPodmenu" value=true}
{/if}
{/foreach}
{if !$hasMatchingPodmenu}<!--Проверка если не подменю-->
     <li class="current-menu-item">
                          <a href="/{$menu.link}/""><span>{$menu.title}</span></a>
                        </li>
{else}<!--Если подменю -->
    <li>
         <a href="/{$menu.link}/">
            <span>{$menu.title}</span>
         </a>
                <ul>
                <!--Цикл пунктов подменю-->
                {foreach from=$podmenuArr item=podmenu}
                    {if $podmenu.parent == $menu.id}  
                    <!--само подменю-->
                    <li><a href="/{$podmenu.link}/">{$podmenu.title}</a></li>
                    {/if}
                {/foreach}
                <!--Конец цикла пунктов подменю-->
               </ul>
    </li>
{/if}            
{/foreach}
<!--Конец основного цикла-->

</code></pre>
<h4>Мобильное Подменю</h4>
<pre><code data-language="php">
{foreach from=$menuArr item=menu}
{if $menu.pageurl != null}
<li class="burger-item"><a href="/{$menu.pageurl}/">{$menu.title}</a></li>
{/if}
{/foreach}
{foreach from=$podmenuArr item=podmenu}
<li class="burger-item"><a href="/{$podmenu.pageurl}/">{$podmenu.title}</a></li>
{/foreach}
</code></pre>

<h4>АКТИВНЫЕ ССЫЛКИ, Пример главной</h4>
<pre><code data-language="php">{if $URL == null}
                class="current-menu-item page_item current_page_item"
                {/if}
                </code></pre>
                <h4>И для компонента</h4>
                <pre><code data-language="php">{foreach from=$menuArr item=menu}
{if $menu.link == $URL} class="current-menu-item page_item current_page_item" {/if}
{/foreach}</code></pre>
<h2 style="color: black;">Подключение компонента новостей</h2>
<h4>В теме прописываем</h4>
<pre><code data-language="html">{news forsection="5" style="main"}
</code></pre>
<div style="color: blue;">Стандартные новости имеют тип сортировки ORDER BY id DESC, однако есть модификатор: <br></div>
<span style="color: red;">type="asc"</span> - меняет сортировку в обратном порядке<br>
<h4>Для деталки пример</h4>
<pre><code data-language="html">{if $URL == 'news' and $URL2 != null}
{news type="detail" product=$URL2 style="newsDetail"}
{/if}
</code></pre>

<h4>В шаблоне компонента для цикла превью прописываем <span style="color: #468c4b;">youtheme > components > news > news.acws</span></h4>
<pre><code data-language="php">{foreach from=$newsArr item=news}
<div class="post-item-wrap">
    <div class="post-item-description"> <span class="post-meta-date"><i
                class="fa fa-calendar-o"></i>{$news.datepush}</span>
        <h2><a href="/news/{$news.pageurl}/">{$news.title}</a></h2>
        <div class="text-blog-item">
        <img alt="" src="{$news.images}">
            {$news.content}
        </div>
        <a href="/news/{$news.pageurl}/" class="item-link">Читать <i class="icon-chevron-right"></i></a>
    </div>
</div>
{/foreach}</code></pre>
<h4>В шаблоне компонента для деталки <span style="color: #468c4b;">youtheme > components > news > newsDetal.acws</span></h4>
<pre><code data-language="php"><div class="post-item-description">
                                <h2 class="text-center">{$newsArr.title}</h2>
                                {$newsArr.content}
                            </div>
                            <div class="blog-wrapper col-lg-12 d-flex flex-wrap">
                                {$galery = explode(';', $newsArr.galery)}
                                {foreach $galery as $key => $value}
                                <div class="col-lg-3 blog-img-wrapper">
                                    <img alt="" src="{$value}" data-fancybox="gallery" data-caption="{$newsArr.title}">
                                </div>
                                {/foreach}
                            </div></code></pre>



<h2 style="color: black;">Подключение компонента каталога</h2>
<h4>Пример простого подключения каталога</h4>
<pre><code data-language="html">{catalog forcatalog="3" style="catalog"}
</code></pre>
<h4>Для деталки пример</h4>
<pre><code data-language="html">{if $URL == 'catalog' and $URL3 != null}
{catalog type="detail" product=$URL3 style="detail"}
{/if}
</code></pre>
<h4>Пример подключения каталога с категориями</h4>
<pre><code data-language="php">{if $URL2 == null}
                  <div class="section mcb-section" style="padding-bottom: 90px">
                    <div class="section_wrapper mcb-section-inner">
                      {category forcatalog="3" style="category"}
                    </div>
                  </div>
                  {else}
                  {catalog type="category" category=$URL2 forcatalog="3" style="catalog"}
                  {/if}</code></pre>
<h4>В шаблоне компонента для вывода товаров <span style="color: #468c4b;">youtheme > components > catalog > catalog.acws</span></h4>
<pre><code data-language="php">{foreach from=$catalogArr item=catalog}
<div class="porduct-card">
    <div class="porduct-card-img-wrapper"><img src="{$catalog.images}" alt=""
            data-fancybox data-caption="" /></div>

    <a href="/products/{$catalog.category}/{$catalog.pageurl}/">{$catalog.title}</a>
</div>
{/foreach}
</code></pre>
<h4>Для деталки товара <span style="color: #468c4b;">youtheme > components > catalog > detal.acws</span></h4>
<pre><code data-language="php">	<div class="detail-content">
		<div class="detail-img"><img src="{$catalogArr.images}" alt=""></div>
			<div class="detail-text">
				<h4>{$catalogArr.title}</h4>
				<div class="detail-desciption"><span>Описание:</span>
				    {$catalogArr.content}
				</div>
        <div class="swiper-wrapper">
								{$galery = explode(';',$catalogArr.galery)}
								{foreach $galery as $value}
								<div class="swiper-slide my-cover">
									<a class="product-img">
										<img src="{$value}" class="small-main-img">
									</a>

								</div>
								{/foreach}

							</div>
				<div class="btn-wrapper-detail"><button class="action_button btn-detail" data-title="{$catalogArr.title}">Заказать</button></div>
				</div>
			</div>
</code></pre>

<h4>Для вывод категорий <span style="color: #468c4b;"> youtheme > components > catalog > category.acws</span></h4>
<pre><code data-language="php">
{foreach from=$categoryArr item=category}
<div
  class="wrap mcb-wrap one-second column-margin-0px valign-middle clearfix"
  style="padding: 0 1%"
>
  <div class="mcb-wrap-inner">
    <div class="column mcb-column one column_image">
      <div class="image_frame image_item scale-with-grid no_border">
        <div class="image_wrapper img-center">
          <a href="/products/{$category.pageurl}/">
            <div class="mask"></div>
            <img class="scale-with-grid" src="{$category.images}" />
          </a>
          <div class="image_links">
            <a href="/products/{$category.pageurl}/" class="link"
              ><i class="icon-link"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
    <div class="column mcb-column one column_column">
      <div
        class="column_attr clearfix"
        style="
          background-color: rgb(255, 255, 255);
          background-repeat: no-repeat;
          background-position: right center;
          padding: 20px 20px 5px;
        "
      >
        <h4 class="card-title">{$category.name}</h4>
      </div>
    </div>
    <div class="column mcb-column one column_divider">
      <hr class="no_line" style="margin: 0 auto 30px" />
    </div>
  </div>
</div>
{/foreach}</code></pre>
<h2 style="color: black;">Подключение компонента галереи</h2>
<h4>Пример подключения галереи в шаблоне</h4>
<pre><code data-language="html">{gallery code="gallery" style="gallery"}</code></pre>
<h4>В шаблоне компонента для вывода галереи <span style="color: #468c4b;">youtheme > components > gallery > gallery.acws</span></h4>
<pre><code data-language="php">{$galery = explode(';',$galleryArr.galery)}
{foreach $galery as $index => $value}
<div class="swiper-slide"><img src="{$value}"></div>
{/foreach}

</code></pre>



</div>
<link rel="stylesheet" href="/asted/components/site.devdoc/style.css">
<script src="/asted/components/site.devdoc/rainbow-custom.min.js"></script>
<?php include "templates/footer.php";?>