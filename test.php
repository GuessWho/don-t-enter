<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	echo '<pre>';
	print_r ($_POST['combobox']);
	echo '</pre>';
}
?>
<form action='<?$_SERVER["PHP_SELF"]?>' method='POST'>
        <select name="ComboBox" style="width : 200">
        <option value="1">Штукатурка</option>
        <option value="2">Полы</option>
        <option value="3" selected>Потолки</option>
        <option value="4">Стены</option>
        <option value="5">Окна</option>
        <option value="6">Полировка</option>
        </select>
		<input type='submit'>
</form>