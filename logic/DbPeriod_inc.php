<?php
set_time_limit (600);
if (file_exists($fn))
{
	mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWD);
	mysql_select_db(DB_NAME);
	$sql = "TRUNCATE TABLE period";
	mysql_query ($sql) or die (mysql_error());
	$file = arrayFromHtml($fn);
	echo '���������� ������� � PERIOD - ';
	echo count($file) . '<br />';
	foreach ($file as $k=> $item)
	{
		$item = strip_tags($item);
		$item = explode('&#31;', $item);//�������� ������ ������� �� �������
		$ind = mysql_real_escape_string(checkFieldPeriod($item, "a", "ind"));//���������� ���������� �������� ����� ������� �������
		$title = mysql_real_escape_string(checkFieldPeriod($item, "b", "title"));
		$pubyear = mysql_real_escape_string(checkFieldPeriod($item, "e", "pubyear"));
		$price = mysql_real_escape_string(checkFieldPeriod($item, "h", "price"));
		$num = mysql_real_escape_string(checkFieldPeriod($item, "z", "num"));
		$time = mysql_real_escape_string(checkFieldPeriod($item, "y", "time"));
		$sql = "INSERT INTO period (ind, title, pubyear, price, num, time)
							VALUES ('$ind', '$title', '$pubyear', '$price', '$num', '$time')";//�������� ������� ��
		mysql_query($sql) or die (mysql_error());
	}
	mysql_close();
}
else
{
	echo '���� period �� ������<br />';
}	
?>