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
        <option value="1">����������</option>
        <option value="2">����</option>
        <option value="3" selected>�������</option>
        <option value="4">�����</option>
        <option value="5">����</option>
        <option value="6">���������</option>
        </select>
		<input type='submit'>
</form>