<?php
include ("private/defines_inc.php");
mysql_connect (DB_HOST, DB_LOGIN, DB_PASSWD) or die ('Can\'t connect check login, password');
mysql_select_db(DB_NAME) or die ('DB not exist');
$sql = "SELECT count(*) from book";
$count_rows = mysql_query($sql) or die (mysql_error());
$count_rows = mysql_fetch_array($count_rows);
$content_per_page = 100;
$total_pages = ceil($count_rows[0]/$content_per_page);
if ($total_pages>1)
{
	for($i=1; $i<=$total_pages; $i++)
	{
		$pages[]= $_SERVER['PHP_SELF'] . "?page=" . $i;
	}
	foreach($pages as $key=> $page)
	{
		$page_num=$key+1;
		$start_row = $page_num*$content_per_page;
		$sql = "SELECT * FROM book  LIMIT $start_row, $content_per_page";
		$result = mysql_query($sql) or die (mysql_error());
		echo "<a href='" . $page . "'>" . $page_num . " // </a>";
		if($_REQUEST['page']==$page_num)
		{
	echo "<table border='1' cellspasing='1' cellpadding='1'>";
			
	for($i=0; $res = mysql_fetch_assoc($result); $i++)
	{
		echo "\t\t\t<tr>\n";
		foreach($res as $a)
		{
			echo "\t\t\t\t<td>" . $a . "</td>\n"; 
		}
		echo "\t\t\t</tr>\n";
	}
	echo '<h2>По вашему запросу найдено: ' . $i . ' док.</h2>';
	echo "</table>\n";
	}
	}
}
else
echo 'page<1';
?>
