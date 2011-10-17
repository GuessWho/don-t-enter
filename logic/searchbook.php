<?php
include ("private/defines_inc.php");
include ("../smarty/libs/Smarty.class.php");
mysql_connect (DB_HOST, DB_LOGIN, DB_PASSWD) or die ('Can\'t connect check login, password');
mysql_select_db(DB_NAME) or die ('DB not exist');
$smarty = new Smarty();
$smarty->assign('self', SELF_PATH);
$sql = "SELECT count(*) from book";
$count = mysql_query($sql) or die (mysql_error());
$count = mysql_fetch_array($count);
$smarty->assign('rows_count', $count[0]);
$smarty->assign('is_post', REQ_POST);
if($_SERVER['REQUEST_METHOD']=='POST')
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
	$bbk = $_POST['bbk'];
	$lang = $_POST['lang'];
	$pubyear = $_POST['pubyear'];
	$pulisher = $_POST['publisher'];
	$sql = "SELECT author, title, rubric, keyword, person, bbk, lang, pubyear, publisher 
			FROM book WHERE author LIKE '%$author%' AND title LIKE '%$title%' AND rubric LIKE '%$rubric%'  
			AND keyword LIKE '%$keyword%' AND person LIKE '%$person%' AND bbk LIKE '%$bbk%'
			AND lang LIKE '%$lang%' AND pubyear LIKE '%$pubyear%' AND publisher LIKE '%$publisher%' LIMIT 100";
	$result = mysql_query($sql) or die (mysql_error());
	mysql_close();
	while ($row = mysql_fetch_assoc($result))
	{
		$rows[] = $row;
	}
	$smarty->assign('res_row', $rows);
	$res_count = count($rows);
	$smarty->assign('res_count', $res_count);
}
$smarty->display(BIBL_PATH . '/templates/searchbook.tpl');
?>