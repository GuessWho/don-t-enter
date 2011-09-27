<?php
set_time_limit (600);
if (file_exists($fn))
{
	mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWD);
	mysql_select_db(DB_NAME);
	$file = arrayFromHtml($fn);  //функци€  делает из *.html массив по ключевому слову </TD>
	$sql = "TRUNCATE TABLE book";//очищаю таблицу
	mysql_query ($sql) or die (mysql_error());
	echo ' оличество записей в RETR(добавл€етьс€ в таблицу book) - ';
	echo count($file) . '<br />';
	foreach ($file as $k=> $item)
	{
		$item = strip_tags($item);
		$item = explode('&#30;', $item);//разбиваю €чейки массива на массивы
		array_shift($item); //удал€ю из второго массива 3 первых €чейки
		array_shift($item);
		array_shift($item);
		$author = mysql_real_escape_string(checkFieldBook($item, "100", "author"));//присваеваю переменным значени€ €чеек второго массива
		$title = mysql_real_escape_string(checkFieldBook($item, "245", "title"));
		$rubric = mysql_real_escape_string(checkFieldBook($item, "650", "rubric"));
		$keyword = mysql_real_escape_string(checkFieldBook($item, "653", "keyword"));
		$person = mysql_real_escape_string(checkFieldBook($item, "600", "person"));
		$bbk = mysql_real_escape_string(checkFieldBook($item, "084", "bbk"));
		$lang = mysql_real_escape_string(checkFieldBook($item, "546", "lang"));
		$pubyear = mysql_real_escape_string(checkFieldBook($item, "260", "pubyear"));
		$publisher = mysql_real_escape_string(checkFieldBook($item, "260", "publisher"));
		$rubric = str_replace('&#31;a', '; ', $rubric);//мен€ю символы на розделительные знаки
		$rubric = str_replace('&#31;x', '-', $rubric);
		$rubric = str_replace('&#31;z', ' ', $rubric);
		$rubric = str_replace('&#31;y', ' ', $rubric);
		$rubric = str_replace('31;v', '; ', $rubric);
		$title = str_replace('&#31;b', ' ', $title);
		$title = str_replace('&#31;h', ' ', $title);
		$title = str_replace('&#31;p', '<br />', $title);
		$title = str_replace('&#31;c', '<br />', $title);
		$keyword = str_replace('&#31;a', ' ', $keyword);
		$person = str_replace('&#31;x', ' ', $person);
		$person = str_replace('&#31;z', ' ', $person);
		$author = str_replace('&#31;d', '<br />', $author);
		$author = str_replace('&#31;q', '<br />', $author);
		$publisher = str_replace('&#31;b', '<br />', $publisher);
		$person = str_replace('31;a', '', $person);
		$author = str_replace('31;a', '', $author);
		$keyword = str_replace('31;a', ';', $keyword);
		$title = str_replace('31;a', '', $title);
		$title = str_replace('31;n', '', $title);
		$rubric = str_replace('31;a', '', $rubric);
		$lang = str_replace('31;a', '', $lang);
		$pubyear = str_replace('31;', '', $pubyear);
		$pubyear = str_replace('&#b', '<br />', $pubyear);
		$bbk = str_replace('31;', '', $bbk);
		$publisher = str_replace('31;', '', $publisher);
		$publisher = str_replace('a', '', $publisher);
		$bbk = str_replace('a', '', $bbk);
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
			$sql = "INSERT INTO book (author, title, rubric, keyword, person, bbk, lang, pubyear, publisher)
								VALUES ('$author', '$title', '$rubric', '$keyword', '$person', '$bbk', 
								'$lang', '$pubyear', '$publisher')";//формирую запросс бд
			mysql_query($sql) or die (mysql_error());
		}
	}
	mysql_close();
}
else
{
	echo '‘айл retr не выбран<br />';
}
?>