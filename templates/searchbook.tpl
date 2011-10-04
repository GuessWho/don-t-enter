<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Книги</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body id='body'>
<div id='header'>
	<table align='center'>
		<tr>
			<td><img  src="images/Head.png"></td>
		</tr>
	</table>
</div>
<div id='link'><a href="{$self}">Розпочати новий пошук</a>&nbsp;&nbsp;&nbsp;
<a href="DBchoose.php">Выбрати iншу базу</a>&nbsp;&nbsp;&nbsp;
<a href="http://chobd.ck.ua">Повернутися на сайт</a></div>
<div id="num"><h2>Всього записів у базі:  {$rows_count}  </h2></div>
{if $is_post}
<div id='result'>
		<table bgcolor='#ffffff' border='1' cellspacing='1' cellpadding='1'>
			<tr bgcolor='#DC8E55'>
				<td>Автор</td>
				<td>Назва</td>
				<td>Рубрика</td>
				<td>Ключові. слова</td>
				<td>Персоналії</td>
				<td>Індекс ББК</td>
				<td>Мова</td>
				<td>Рік видання</td>
				<td>Видавництво</td>
			</tr>
			{foreach $res_row as $row}
			{strip}
			<tr>
				<td>{$row.author}</td>
				<td>{$row.title}</td>
				<td>{$row.rubric}</td>
				<td>{$row.keyword}</td>
				<td>{$row.person}</td>
				<td>{$row.bbk}</td>
				<td>{$row.lang}</td>
				<td>{$row.pubyear}</td>
				<td>{$row.publisher}</td>
			</tr>
			{/strip}
			{/foreach}
{else}
<div id='field'><form action="{$self}" method='POST'>	
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
						<td></td><td><input type='submit' value='Знайти'></td>
					</tr>
				</table>
			</form></div>
{/if}
	</body>	
</html>