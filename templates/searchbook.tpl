<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>�����</title>
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
<div id='link'><a href="{$self}">��������� ����� �����</a>&nbsp;&nbsp;&nbsp;
<a href="DBchoose.php">������� i��� ����</a>&nbsp;&nbsp;&nbsp;
<a href="http://chobd.ck.ua">����������� �� ����</a></div>
<div id="num"><h2>������ ������ � ���:  {$rows_count}  </h2></div>
{if $is_post}
<div id='result'>
		<table bgcolor='#ffffff' border='1' cellspacing='1' cellpadding='1'>
			<tr bgcolor='#DC8E55'>
				<td>�����</td>
				<td>�����</td>
				<td>�������</td>
				<td>������. �����</td>
				<td>�������볿</td>
				<td>������ ���</td>
				<td>����</td>
				<td>г� �������</td>
				<td>�����������</td>
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
						<td>�����:</td><td><input  type='text' width='200' size='50' name='author'></td></tr>
					<tr>
						<td>�����:</td><td><input  type='text' width='200' size='50' name='title'></td></tr>
					<tr>
						<td>�������:</td><td><input  type='text' width='200' size='50' name='rubric'></td></tr>
					<tr>
						<td>������ �����:</td><td><input  type='text' width='200' size='50' name='keyword'></td></tr>
					<tr>
						<td>�������볿:</td><td><input  type='text' width='200' size='50' name='person'></td></tr>
					<tr>
						<td>���� �������:</td><td><input  type='text' width='200' size='50' name='pubyear'></td></tr>
					<tr>
						<td>�����������:</td><td><input  type='text' width='200' size='50' name='publisher'></td></tr>
					<tr>
						<td></td><td><input type='submit' value='������'></td>
					</tr>
				</table>
			</form></div>
{/if}
	</body>	
</html>