<?php
include 'private/defines_inc.php';
include '../smarty/libs/Smarty.class.php';
mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWD) or die ('DB connect error');
mysql_select_db (DB_NAME) or die ('DB not exist');
$smarty = new Smarty();
$smarty->assign('self', SELF_PATH);
$sql = "SELECT count(*) from kffd";
$count = mysql_query($sql) or die (mysql_error());
$count = mysql_fetch_array($count);
$smarty->assign('rows_count', $count[0]);
$smarty->assign('if_post', REQ_POST);
if($_SERVER['REQUEST_METHOD']=='POST')
{
	foreach($_POST as $key=> $s)
	{
		$_POST['$k'] = mysql_real_escape_string(strip_tags(trim($s)));
	}
	$author = $_POST['author'];
	$title = $_POST['title'];
	$rubric = $_POST['rubric'];
	$keyword = $_POST['keyword'];
	$sql = "SELECT  author, title, rubric, keyword 
			FROM kffd WHERE author LIKE '%$author%' AND title LIKE '%$title%' AND rubric LIKE '%$rubric%'  
			AND keyword LIKE '%$keyword%'";
	$result = mysql_query($sql) or die (mysql_error());
	while($row = mys)
	mysql_close();
}	
?>