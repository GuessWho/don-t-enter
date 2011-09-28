<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<title>Статті</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id='body'>
	<div id='header'><table align='center'><tr><td><img  src="images/Head.png"></td></tr></table></div>
	<div id='link'><a href="formBibl.tpl">Розпочати новий пошук</a>&nbsp;&nbsp;&nbsp;
	<a href="../index.html">Выбрати iншу базу</a>&nbsp;&nbsp;&nbsp;
	<a href="http://chobd.ck.ua">Повернутися на сайт</a></div>
	<div id="num"><h2>Всього записів у базі:{$i}</h2></div>
	<div id='result'><table bgcolor='#ffffff' border='1' cellspacing='1' cellpadding='1'>
				<tr bgcolor='#DC8E55'>
					<td>Автор</td>
					<td>Назва</td>
					<td>Рубрика</td>
					<td>Ключові слова</td>
					<td>Персоналії</td>
					<td>Географічна назва</td>
					<td>Джерело</td></tr>
				<tr>
					<td>{$a}</td> 
				</tr>
	<h2>На ваш запит знайдено: {$i} записів</h2>
	</table></div>
</body>	
</html>