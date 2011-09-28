<a href="<?$SERVER['PHP_SELF']?>">Розпочати новий пошук</a><br />
<?php
include 'folder/defines_inc.php';
mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWD) or die ('DB connect error');
mysql_select_db (DB_NAME) or die ('DB not exist');
$sql = "SELECT * 
			FROM period";
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
	$ind = $_POST['ind'];
	$title = $_POST['title'];
	$pubyear = $_POST['pubyear'];
	$sql = "SELECT ind, title, pubyear, price, num, time 
			FROM period WHERE ind LIKE '%$ind%' AND title LIKE '%$title%' AND pubyear LIKE '%$pubyear%'";
	//echo $sql;		
	$result = mysql_query($sql) or die (mysql_error());		
	mysql_close();
	//header("Location:" . $_SERVER['PHP_SELF']);
	echo "<div id='result'><table bgcolor='#ffffff' border='1' cellspasing='1' cellpadding='1'>
			<tr bgcolor='#DC8E55'>
				<td>Індекс</td>
				<td>Назва</td>
				<td>Рік видання</td>
				<td>Ціна</td>
				<td>Номери отриманих видань</td>
				<td>Період передплати</td>\n";
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
		<title>Тег FORM</title>
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
						<td>Індекс:</td><td><input  type='text' width='200' size='50' name='ind'></td></tr>
				<tr>
						<td>Назва:</td><td><input  type='text' width='200' size='50' name='title'></td></tr>
				<tr>
						<td>Дата видання:</td><td><input type='text' width='200' size='50' name='pubyear'></td></tr>
				<tr>
						<td></td><td><input type='submit' value='Знайти'></td></tr></table></form></div>";}?>
	</body>	
</html>