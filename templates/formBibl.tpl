<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
		<title>Статті</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body id='body'>
			<div id='field'><form action=" . $_SERVER['PHP_SELF'] . " method='POST'>
				<table align='center'>
					<tr>
						<td>Автор:</td><td><input  type='text' width='200'size='50' name='author'></td></tr>
					<tr>
						<td>Назва:</td><td><input  type='text' width='200' size='50' name='title'></td></tr>
					<tr>
						<td>Рубрика:</td><td><input  type='text' width='200' size='50' name='rubric'></td></tr>
					<tr>
						<td>Ключові слова:</td><td><input  type='text' width='200' size='50' name='keyword'></td></tr>
					<tr>
						<td>Персоналії:</td><td><input  type='text' width='200' size='50' name='person'></td></tr>
					<tr>
						<td>Географічна назва:</td><td><input  type='text' width='200' size='50' name='geograf'></td></tr>
					<tr>
						<td>Джерело:</td><td><input  type='text' width='200' size='50' name='sourse'></td></tr>
					<tr>
						<td></td><td><input type='submit' value='Знайти'></td></tr></table></form></div>
	</body>	
</html>