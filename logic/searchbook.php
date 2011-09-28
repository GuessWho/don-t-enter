<?php
include 'folder/defines_inc.php';
mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWD) or die ('DB connect error');
mysql_select_db (DB_NAME) or die ('DB not exist');
$sql = "SELECT author, title, rubric, keyword, person, bbk, lang, pubyear, publisher 
			FROM book";
$result = mysql_query($sql) or die(mysql_error());
for($i=0; $row = mysql_fetch_row($result); $i++)
{
	$i=$i;
}
echo '<div id="num"><h2>Всього записів у базі: ' . $i . '</h2></div>';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	foreach ($_POST as $k=> $s)
	{
		if (!$s)
		{
			$_POST['$k'] = '';
			//echo $k . ' - ' . $_POST['k'] .  ' - false</br>';
		}
		else
		{
			$_POST['$k'] = mysql_real_escape_string(strip_tags(trim($s)));
			//echo $k . ' - ' . $_POST['$k'] . '<br>'; 
		}
	}
	$author = $_POST['author'];
	$title = $_POST['title'];
	$rubric = $_POST['rubric'];
	$keyword = $_POST['keyword'];
	$person = $_POST['person'];
	$bbk = $_POST['bbk'];
	$lang = $_POST['lang'];
	$pubyear = $_POST['pubyear'];
	$publisher = $_POST['publisher'];
	$sql = "SELECT author, title, rubric, keyword, person, bbk, lang, pubyear, publisher 
			FROM book WHERE author LIKE '%$author%' AND title LIKE '%$title%' AND rubric LIKE '%$rubric%'  
			AND keyword LIKE '%$keyword%' AND person LIKE '%$person%' AND bbk LIKE '%$bbk%'
			AND lang LIKE '%$lang%' AND pubyear LIKE '%$pubyear%' AND publisher LIKE '%$publisher%'";
	//echo $sql;		
	$result = mysql_query($sql) or die (mysql_error());		
	mysql_close();
	//header("Location:" . $_SERVER['PHP_SELF']);
	echo "<div id='result'><table bgcolor='#ffffff' border='1' cellspasing='1' cellpadding='1'>
			<tr bgcolor='#DC8E55'>
				<td>Автор</td>
				<td>Назва</td>
				<td>Рубрика</td>
				<td>Ключові. слова</td>
				<td>Персоналії</td>
				<td>Індекс ББК</td>
				<td>Мова</td>
				<td>Рік видання</td>
				<td>Видавництво</td>\n";
	for($i=0; $res = mysql_fetch_assoc($result); $i++)
	{
		$i = $i;
		echo "\t\t\t<tr>\n";
		foreach($res as $a)
		{
			echo "\t\t\t\t<td>" . $a . "</td>\n"; 
		}
		echo "\t\t\t</tr>\n";
	}
	echo '<h2>На ваш запит знайдено: ' . $i . ' записів</h2>';
	echo "</table></div>\n";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
		<title>Книги</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body id='body'>
	<div id='header'><table align='center'><tr><td><img  src="images/Head.png"></td></tr></table></div>
	<div id='link'><a href="<?$SERVER['PHP_SELF']?>">Розпочати новий пошук</a>&nbsp;&nbsp;&nbsp;<a href="DBchoose.php">Выбрати iншу базу</a>&nbsp;&nbsp;&nbsp;<a href="http://chobd.ck.ua">Повернутися на сайт</a></div>
		<?php
			if ($_SERVER['REQUEST_METHOD'] !== 'POST')
			{ echo "
			<div id='field'><form action=" . $_SERVER['PHP_SELF'] . " method='POST'>	
				<table align='center'>
					<tr>
						<td>Автор:</td><td><input  type='text' width='200' size='50' name='author'></td></tr>
					<tr>
						<td>Назва:</td><td><input  type='text' width='200' size='50' name='title'></td></tr>
					<tr>
						<td>Рубрика:</td><td><input  type='text' width='200' size='50' name='rubric'></td></tr>
					<tr>
						<td>Ключові слова:</td><td><input  type='text' width='200' size='50' name='keyword'></td></tr>
					<tr>
						<td>Персоналії:</td><td><input  type='text' width='200' size='50' name='person'></td></tr>
					<tr>
						<td>Дата видання:</td><td><input  type='text' width='200' size='50' name='pubyear'></td></tr>
					<tr>
						<td>Видавництво:</td><td><input  type='text' width='200' size='50' name='publisher'></td></tr>
					<tr>
						<td></td><td><input type='submit' value='Знайти'></td></tr></table></form></div>";}?>
	</body>	
</html>