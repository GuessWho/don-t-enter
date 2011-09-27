<?php
include('Smarty.class.php');
$smarty = new Smarty;
$smarty->assign('name', 'george smith');
$smarty->assign('address', '45th & Harris');
$smarty->display('index.tpl');
?>
