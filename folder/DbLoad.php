<?php
include 'defines_inc.php'; 
include '../func_inc.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$fn = $_POST['kffd'];
	include '../DbKffd_inc.php';
	$fn = $_POST['kray'];
	include '../DbKray_inc.php';
	$fn = $_POST['method'];
	include '../DbMethod_inc.php';
	$fn = $_POST['period'];
	include '../DbPeriod_inc.php';
	$fn = $_POST['bibl'];
	include '../DbBibl_inc.php';
	$fn = $_POST['retr'];
	include '../DbRetr_inc.php';
	$fn = $_POST['obrb'];
	include '../DbObrb_inc.php';
}
?>
<form method="POST" action="<?$_SERVER['PHP_SELF']?>">
<table>
	<tr>
		<td>KFFD:</td><td><input type='text' name='kffd' value='kffd.html'><p></td></tr>
	<tr>	
		<td>KRAY:</td><td><input type='text' name='kray' value='kray.html'><p></td></tr>
	<tr>
		<td>METHOD:</td><td><input type='text' name='method' value='method.html'><p></td></tr>
	<tr>	
		<td>PERIOD:</td><td><input type='text' name='period' value='period.html'><p></td></tr>
	<tr>	
		<td>BIBL:</td><td><input type='text' name='bibl' value='bibl.html'><p></td></tr>
	<tr>
		<td>RETR:</td><td><input type='text' name='retr' value='retr.html'><p></td></tr>
	<tr>	
		<td>OBRB:</td><td><input type='text' name='obrb' value='obrb.html'><p></td></tr>
	<tr>
		<td><a href='DbDrop.php'>Удалить БД</a><br />
			<a href='dbCreate.php'>Создать БД</a></td><td><input type="submit" value="Загрузить базы"></td>
	
</form>
