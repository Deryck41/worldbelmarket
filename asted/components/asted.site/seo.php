<? include "templates/header.php";?>
 <div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">СЕО Сайта</h1>
            </div>
		  
		    <div class="card">
    <div class="card-header">
        Информация и настройки СЕО
    </div>
    <div class="card-body collapse show">
<?php
    print_r($_POST['hostrobots']);
    $file = "../robots.txt"; // Ссылка на файл

    if(file_exists($file)) {

        echo "<strong>robots.txt</strong> Файл существует!";
        //$fp = fopen("file.txt");
        //echo $fp;
    } else {
        if($_POST['hostrobots'] != null){
            $robotsTXT = "User-agent: *
Allow: /
Disallow: 
Sitemap: ". $_POST['hostrobots']."/sitemap.xml
Host: ". $_POST['hostrobots'];
        $fp = fopen($file, "w");
        fwrite($fp, $robotsTXT);
        fclose($fp);
        echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'seo/" />';
        }

        ?>

        <strong>robots.txt</strong> Файл отсутствует!";
        
<form action="" method="post">
  <div>
    <label for="say">Сайт для host:</label>
    <input name="hostrobots" id="hostrobots" value="https://<?=$_SERVER['SERVER_NAME']?>">
  </div>
  <div>
    <button>Создать файл robots.txt</button>
  </div>
</form>
 <?   }
?>


    </div>
    </div>  
		  </div>
 <? include "templates/footer.php"; ?>