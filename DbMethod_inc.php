<?php
set_time_limit (600);
if (file_exists($fn))
{
	mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWD);
	mysql_select_db(DB_NAME);
	$sql = "TRUNCATE TABLE method";
	mysql_query ($sql) or die (mysql_error());
	$file = arrayFromHtml($fn);
	echo ' оличество записей в METHOD - ';
	echo count($file) . '<br />';
	foreach ($file as $k=> $item)
	{
		$item = strip_tags($item);
		$item = explode('&#30;', $item);//разбиваю €чейки массива на массивы
		array_shift($item); //удал€ю из второго массива 3 первых €чейки
		array_shift($item);
		array_shift($item);
		$author = mysql_real_escape_string(checkField($item, "100", "author"));//присваеваю переменным значени€ €чеек второго массива
		$title = mysql_real_escape_string(checkField($item, "245", "title"));
		$rubric = mysql_real_escape_string(checkField($item, "650", "rubric"));
		$keyword = mysql_real_escape_string(checkField($item, "653", "keyword"));
		$person = mysql_real_escape_string(checkField($item, "600", "person"));
		$geograf = mysql_real_escape_string(checkField($item, "651", "geograf"));
		$sourse = mysql_real_escape_string(checkField($item, "773", "sourse"));
		$rubric = str_replace('&#31;a', '; ', $rubric);//мен€ю символы на розделительные знаки
		$rubric = str_replace('&#31;x', '-', $rubric);
		$rubric = str_replace('&#31;z', ' ', $rubric);
		$rubric = str_replace('&#31;y', ' ', $rubric);
		$title = str_replace('&#31;b', ' ', $title);
		$title = str_replace('&#31;h', ' ', $title);
		$keyword = str_replace('&#31;a', ' ', $keyword);
		$person = str_replace('&#31;x', ' ', $person);
		$person = str_replace('&#31;z', ' ', $person);
		$geograf = str_replace('&#31;x', ' ', $geograf);
		$geograf = str_replace('&#31;z', ' ', $geograf);
		$sourse = str_replace('&#31;d', '.-', $sourse);
		$sourse = str_replace('&#31;g', '.-', $sourse);
		$person = str_replace('31;a', '', $person);
		$author = str_replace('31;a', '', $author);
		$keyword = str_replace('31;a', '', $keyword);
		$title = str_replace('31;a', '', $title);
		$rubric = str_replace('31;a', '', $rubric);
		$geograf = str_replace('31;a', '', $geograf);
		$sourse = str_replace('31;', '', $sourse);		
		$sql = "INSERT INTO method (author, title, rubric, keyword, person, geograf, sourse)
							VALUES ('$author', '$title', '$rubric', '$keyword', '$person', '$geograf', '$sourse')";//формирую запросс бд
		mysql_query($sql) or die ('Add error!');
	}
	mysql_close();
}
else
{
	echo '‘айл method не выбран<br />';
}
?>