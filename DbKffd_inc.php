<?php
set_time_limit (600);
if (file_exists($fn))
{
	mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWD);
	mysql_select_db(DB_NAME);
	$file = arrayFromHtml($fn);
	$sql = "TRUNCATE TABLE kffd";
	mysql_query ($sql) or die (mysql_error());
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
		$rubric = str_replace('&#31;a', '; ', $rubric);//мен€ю символы на розделительные знаки
		$rubric = str_replace('&#31;x', '-', $rubric);
		$rubric = str_replace('&#31;z', ' ', $rubric);
		$rubric = str_replace('&#31;y', ' ', $rubric);
		$title = str_replace('&#31;b', ' ', $title);
		$title = str_replace('&#31;h', ' ', $title);
		$title = str_replace('&#31;', '; ', $title);
		$title = str_replace('c', ' ', $title);
		$title = str_replace('o', ' ', $title);
		$title = str_replace('n', ' ', $title);
		$title = str_replace('p', ' ', $title);
		$keyword = str_replace('&#31;a', ' ', $keyword);
		$person = str_replace('&#31;x', ' ', $person);
		$person = str_replace('31;a', '', $person);
		$author = str_replace('31;a', '', $author);
		$keyword = str_replace('31;a', '', $keyword);
		$title = str_replace('31;a', '', $title);
		$rubric = str_replace('31;a', '', $rubric);
		$author = str_replace('d', '', $author);
		$author = str_replace('q', '', $author);
		if ($author == 'author' and $title == 'title' and $rubric == 'rubric' and $keyword == 'keyword')
		{
			continue;
		}
		elseif ($author == '&nbsp;' and $title == '&nbsp;' and $rubric == '&nbsp;' and $keyword == '&nbsp;')
		{
			continue;
		}
		else
		{
			$sql = "INSERT INTO kffd (author, title, rubric, keyword)
								VALUES ('$author', '$title', '$rubric', '$keyword')";//формирую запросс бд
			mysql_query($sql) or die ('Add error!');
		}	
	}
	echo ' оличество записей в KFFD - ';
	echo count($file) . '<br />';
	mysql_close();
}
else
{
	echo '‘айл kffd не выбран<br />';
}
?>








