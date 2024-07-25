<? include "templates/header.php"; ?>
    <!-- Asted Begin Page Content -->
    <div class="container-fluid">
<?php
$modinclude = $_GET['mod'];
include "modules/".$modinclude ."/index.php";

?>
    </div>
<? include "templates/footer.php"; ?>