<?php
include('private/defines_inc.php');
include('../smarty/libs/Smarty.class.php');
mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWD) or die ('DB connect error');
mysql_select_db (DB_NAME) or die ('DB not exist');
$smarty = new Smarty();
$smarty->assign("self", $_SERVER['PHP_SELF']);
$sql = "SELECT count(*) from bibl";
$count = mysql_query($sql) or die (mysql_error());
$count = mysql_fetch_array($count);
$smarty->assign("rows_count", $count[0]);
$smarty->assign("is_post", $_SERVER['REQUEST_METHOD']=="POST");
if($_SERVER['REQUEST_METHOD']=="POST")
{
	foreach ($_POST as $key=> $s)
	{
		$_POST['$key'] = mysql_real_escape_string(strip_tags(trim($s)));
	}
	$author = $_POST['author'];
	$title = $_POST['title'];
	$rubric = $_POST['rubric'];
	$keyword = $_POST['keyword'];
	$person = $_POST['person'];
	$geograf = $_POST['geograf'];
	$sourse = $_POST['sourse'];
	$sql = "SELECT author, title, rubric, keyword, person, geograf, sourse 
			FROM bibl WHERE author LIKE '%$author%' AND title LIKE '%$title%' AND rubric LIKE '%$rubric%'  
			AND keyword LIKE '%$keyword%' AND person LIKE '%$person%' AND geograf LIKE '%$geograf%'
			AND sourse LIKE '%$sourse%' LIMIT 100";	
	$result = mysql_query($sql) or die (mysql_error());
	mysql_close();
	while ($row = mysql_fetch_assoc($result))
	{
	$rows[] = $row;
	}
	/*echo "<pre>";
	var_dump ($rows);
	echo "</pre>";*/
	$smarty->assign('res_row', $rows);
}
$smarty->display(BIBL_PATH . "/templates/searchbibl.tpl");
?>