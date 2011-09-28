<?php
set_time_limit (600);
if (file_exists($fn))
{
	mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWD);
	mysql_select_db(DB_NAME);
	$sql = "TRUNCATE TABLE kffd";
	mysql_query ($sql) or die (mysql_error());
	$file = file("$fn"); //делаю из файла массив
	echo ' оличество записей в KFFD - ';
	echo count($file) . '<br />';
	foreach ($file as $k=> $item)
	{
		$item = explode('', $item);//разбиваю €чейки массива на массивы
		array_shift($item); //удал€ю из второго массива 3 первых €чейки
		//array_shift($item);
		//array_shift($item);
		$author = mysql_real_escape_string(checkField($item, "100", "author"));//присваеваю переменным значени€ €чеек второго массива
		$title = mysql_real_escape_string(checkField($item, "245", "title"));
		$rubric = mysql_real_escape_string(checkField($item, "650", "rubric"));
		$keyword = mysql_real_escape_string(checkField($item, "653", "keyword"));
		$rubric = str_replace('a', '; ', $rubric);//мен€ю символы на розделительные знаки
		$rubric = str_replace('x', '-', $rubric);
		$rubric = str_replace('z', ' ', $rubric);
		$rubric = str_replace('y', ' ', $rubric);
		$title = str_replace('b', ' ', $title);
		$title = str_replace('h', ' ', $title);
		$keyword = str_replace('a', ' ', $keyword);
		$person = str_replace('x', ' ', $person);
		$person = str_replace('z', ' ', $person);
		$sql = "INSERT INTO kffd (author, title, rubric, keyword)
							VALUES ('$author', '$title', '$rubric', '$keyword')";//формирую запросс бд
		mysql_query($sql) or die ('Add error!');
	}
	mysql_close();
}
else
{
	echo '‘айл kffd не выбран<br />';
}
?>