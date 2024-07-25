<?
if ( !R::testConnection() )
{
    exit ('Asted: Нет соединения с базой данных');
}
$sql_site = "SELECT * FROM `".$TerranPrefix."site` ORDER BY `id`";
$result_site = mysqli_query($link, $sql_site);
$site[] = mysqli_fetch_assoc($result_site);
            $sql_siteblocks = "SELECT * FROM `crm_site_block`";
            $resultBlocks = mysqli_query($link, $sql_siteblocks);
            while ($blockstosite = mysqli_fetch_assoc($resultBlocks)) {
            	$blockToWebAstedIn = "{$blockstosite['block']}";
            	$blockToWebAsted = 'BLOCK'.$blockToWebAstedIn;
            	$contentToWebAsted = "{$blockstosite['content']}";
				$arrayAstedBlock[] = array($blockToWebAsted  => $contentToWebAsted);
}

if (!empty($_SESSION['userid'])){
    $sql_user = "SELECT * FROM `".$TerranPrefix."users` WHERE id ='".$_SESSION['userid']."'";
    $result_user = mysqli_query($link, $sql_user);
    while ($user = mysqli_fetch_assoc($result_user)) {
        $username = "{$user['name']}";
        $usersurname = "{$user['surname']}";
        $userSessionDivisions = "{$user['divisions']}";
        $sql_userGroups = "SELECT * FROM `".$TerranPrefix."usergroup` WHERE id ='".$userSessionDivisions."'";
        $result_userGroups = mysqli_query($link, $sql_userGroups);
        while ($userGroups = mysqli_fetch_assoc($result_userGroups)) {
            $userGroupsCanviewWebsite[] = "{$userGroups['cancontrolwebsite']}";
        }
    }
}
?>