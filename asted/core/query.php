<?
$sql_config = "SELECT * FROM `".$TerranPrefix."config`";
$result_config = mysqli_query($link, $sql_config);
while ($conf = mysqli_fetch_assoc($result_config)) {
    $titleNameProject = "{$conf['title']}";
	$lang = "{$conf['lang']}";
}

$sql_user = "SELECT * FROM `".$TerranPrefix."users` WHERE id ='".$_SESSION['userid']."'";
$result_user = mysqli_query($link, $sql_user);
while ($user = mysqli_fetch_assoc($result_user)) {
    $username = "{$user['name']}";
	$usersurname = "{$user['surname']}";
	$usersavatar = "{$user['avatar']}";
	$userAvatar = "{$user['avatar']}";
    $usersEmployee = "{$user['employee']}";
    $usersRegData = "{$user['regdate']}";
    $usersOnline = "{$user['online']}";
	$userTaskType = "{$user['task_type']}";
	$userPreLeadType = "{$user['prelead_type']}";
	$userSessionDivisions = "{$user['divisions']}";
	$userSessionLang = "{$user['mylang']}";
	$userSessionThemes = "{$user['themes']}";
	$sql_userGroups = "SELECT * FROM `".$TerranPrefix."usergroup` WHERE id ='".$userSessionDivisions."'";
	$result_userGroups = mysqli_query($link, $sql_userGroups);
	while ($userGroups = mysqli_fetch_assoc($result_userGroups)) {
		$userGroupsName[] = "{$userGroups['usergroup']}";
		$userGroupsSuperadmin[] = "{$userGroups['superadmin']}";
		$userGroupsWoked[] = "{$userGroups['userwoked']}";
		$userGroupsCanviewprelead[] = "{$userGroups['canviewprelead']}";
		$userGroupsCandeletoldlead[] = "{$userGroups['candeletoldlead']}";
		$userGroupsCanviewlead[] = "{$userGroups['canviewlead']}";
		$userGroupsCanviewconfig[] = "{$userGroups['canviewconfig']}";
		$userGroupsCaneditusr[] = "{$userGroups['caneditusr']}";
		$userGroupsCanviewsalaries[] = "{$userGroups['canviewsalaries']}";
		$userGroupsCanviewWebsite[] = "{$userGroups['cancontrolwebsite']}";
		//User Control
		$userGroupsCanforusrauth[] = "{$userGroups['canforusrauth']}";
		$userGroupsCanAddUser[] = "{$userGroups['canadduser']}";
		$userGroupsCanPersonalGroup[] = "{$userGroups['personalgroup']}";
		//User Project
		$userGroupsCanviewProject[] = "{$userGroups['canviewsallgroup']}";
		$userGroupsProjectCanviewDoc[] = "{$userGroups['projectpdoc']}";
		$userGroupsProjectCanviewPrice[] = "{$userGroups['projectprice']}";
		$userGroupsProjectCanEditProject[] = "{$userGroups['projectedit']}";
		$userGroupsProjectVdopInform[] = "{$userGroups['projectdopinfo']}";
	}
}

$sql_taskssx = "SELECT * FROM `".$TerranPrefix."config`";
$result_taskssx = mysqli_query($link, $sql_taskssx);
$cofigius[] = mysqli_fetch_assoc($result_taskssx);

$sql_taskssxpr = "SELECT * FROM `".$TerranPrefix."configproject`";
$result_taskssxpr = mysqli_query($link, $sql_taskssxpr);
$cofigproject[] = mysqli_fetch_assoc($result_taskssxpr);


$sql_siteallcat = "SELECT * FROM `".$TerranPrefix."site_catalog_category`";
$result_catsiteall = mysqli_query($link, $sql_siteallcat);
while ($catcat = mysqli_fetch_assoc($result_catsiteall)) {
	$categoryId = "{$catcat['id']}";
	$categoryName = "{$catcat['name']}";
	$sitecatoption[] = '<option value="'.$categoryId.'">'.$categoryName.'</option>';
}



$sql_news = "SELECT * FROM `".$TerranPrefix."news` ORDER BY `id` DESC";
$result_news = mysqli_query($link, $sql_news);
$newsContResult = mysqli_num_rows($result_news);
while ($news = mysqli_fetch_array($result_news)){
	$newsforcid = $news['id'];
	$newsAuthor = $news['author'];
	$newsResult[] = $news;
	$sql_userNews = "SELECT * FROM `".$TerranPrefix."users` WHERE id ='".$newsAuthor."'";
	$result_userNews = mysqli_query($link, $sql_userNews);
	while ($userNews = mysqli_fetch_assoc($result_userNews)) {
		$userNameNews[] = "{$userNews['name']}";
	}
	$sql_commentNews = "SELECT * FROM `".$TerranPrefix."newscomment` WHERE fornews ='".$newsforcid."'";
	$result_commentNews = mysqli_query($link, $sql_commentNews);
	$commentContResult = mysqli_num_rows($result_commentNews);
	while ($commentNews = mysqli_fetch_assoc($result_commentNews)) {
		$commentNameNews[] = "{$commentNews['commentcontent']}";
		$commentNewsUsrID[] = "{$commentNews['whocomment']}";
		$commentNewsData[] = "{$commentNews['datacomment']}";
		$forneews[] = "{$commentNews['fornews']}";
	}
};

$sql_clock = "SELECT * FROM `".$TerranPrefix."timeuser` WHERE id_user ='".$_SESSION['userid']."' ORDER BY `id` DESC";
$result_clock = mysqli_query($link, $sql_clock);
$newsclockResult = mysqli_num_rows($result_clock);
$ArrUserClock = mysqli_fetch_array($result_clock);

$sql_task = "SELECT * FROM `".$TerranPrefix."task` ORDER BY `id` DESC";
$result_task = mysqli_query($link, $sql_task);

$sql_salaries = "SELECT * FROM `".$TerranPrefix."salaries` ORDER BY `id` DESC";
$result_salaries = mysqli_query($link, $sql_salaries);

$sql_divisions = "SELECT * FROM `".$TerranPrefix."usergroup` ORDER BY `id`";
$result_divisions = mysqli_query($link, $sql_divisions);

$sql_sitesection = "SELECT * FROM `".$TerranPrefix."site_section` ORDER BY `id`";
$result_sitesection = mysqli_query($link, $sql_sitesection);

$sql_site = "SELECT * FROM `".$TerranPrefix."site` ORDER BY `id`";
$result_site = mysqli_query($link, $sql_site);
$sitecontid = mysqli_num_rows($result_site);

$sql_alertcount = "SELECT * FROM `".$TerranPrefix."news` WHERE type ='alert'";
$result_alertcount = mysqli_query($link, $sql_alertcount);
$numRowsalertcount = mysqli_num_rows($result_alertcount);

$sql_sites = "SELECT * FROM `".$TerranPrefix."site` ORDER BY `id`";
$result_sites = mysqli_query($link, $sql_sites);

$sql_sitesAsted = "SELECT * FROM `".$TerranPrefix."site` ORDER BY `id`";
$result_sitesAsted = mysqli_query($link, $sql_sitesAsted);

$sql_tasks = "SELECT * FROM `".$TerranPrefix."task` ORDER BY `id` DESC";
$result_tasks = mysqli_query($link, $sql_tasks);

$sql_users = "SELECT * FROM `".$TerranPrefix."users`";
$result_users = mysqli_query($link, $sql_users);
$usercontid = mysqli_num_rows($result_users);

$sql_usersselect = "SELECT * FROM `".$TerranPrefix."users`";
$result_usersselect = mysqli_query($link, $sql_usersselect);
while ($usersselect = mysqli_fetch_assoc($result_usersselect)) {
$usersidselect = "{$usersselect['id']}";
$usersnameselect = "{$usersselect['name']}";
$usersnameselectALL[] = "{$usersselect['name']}";
$userssurnamenameselect = "{$usersselect['surname']}";
$usersdivisionsselect = "{$usersselect['divisions']}";
$userdeveloperSkill = "{$usersselect['employee']}";
if($usersidselect == $userID){
	$toUserSelected = 'selected';
}
if($usersidselect != $userID){
	$toUserSelected = '';
}
//if($usersdivisionsselect != '2'){
		$usersoption[] = '<option value="'.$usersidselect.'">'.$usersnameselect.' '.$userssurnamenameselect.'</option>';
		$usersoptionfrom[] = '<option value="'.$usersidselect.'" '.$toUserSelected.'>'.$usersnameselect.' '.$userssurnamenameselect.'</option>';
		
		
		
		if(!empty($userdeveloperSkill)){
            $userDeveloper[] = '<option value="'.$userdeveloperSkill.'">'.$usersnameselect.' '.$userssurnamenameselect.'</option>';
        }
	 $userManager[] = '<option value="'.$usersidselect.'">'.$usersnameselect.' '.$userssurnamenameselect.'</option>';
	}
//}

$sql_group = "SELECT * FROM `".$TerranPrefix."group`";
$result_group = mysqli_query($link, $sql_group);



$sql_group = "SELECT * FROM `".$TerranPrefix."group` ORDER BY `id` DESC";
$result_group= mysqli_query($link, $sql_group);
$groupContResult = mysqli_num_rows($result_group);
while ($news = mysqli_fetch_array($result_group)){
	$groupAuthor = $news['group_users'];
	$groupResult[] = $news;
	$sql_usergroup = "SELECT * FROM `".$TerranPrefix."users` WHERE id ='".$groupAuthor."'";
	$result_usergroup = mysqli_query($link, $sql_usergroup);
	while ($usergroup = mysqli_fetch_assoc($result_usergroup)) {
		$userNamegroup[] = "{$usergroup['name']}";
	}
};

$sql_groupbk = "SELECT * FROM `".$TerranPrefix."seolink` ORDER BY `id` DESC";
$result_groupbk= mysqli_query($link, $sql_groupbk);
$groupbkContResult = mysqli_num_rows($result_groupbk);
while ($news = mysqli_fetch_array($result_groupbk)){
	$groupbkAuthor = $news['whodoit'];
	$groupbkResult[] = $news;
	$sql_usergroupbk = "SELECT * FROM `".$TerranPrefix."users` WHERE id ='".$groupbkAuthor."'";
	$result_usergroupbk = mysqli_query($link, $sql_usergroupbk);
	while ($usergroupbk = mysqli_fetch_assoc($result_usergroupbk)) {
		$userNamegroupbk[] = "{$usergroupbk['name']}";
	}
};
?>