<? include "templates/header.php";
if($userPreLeadType == null){?>
<meta http-equiv="refresh" content="0;URL=prelead_block.php" />
<?}
if($userPreLeadType == "prelead"){?>
<meta http-equiv="refresh" content="0;URL=prelead.php" />
<?}
if($userPreLeadType == "block"){?>
<meta http-equiv="refresh" content="0;URL=prelead_block.php" />
<?}
?>
<? include "templates/footer.php"; ?>