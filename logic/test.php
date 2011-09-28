<?php
include('../smarty/libs/Smarty.class.php');
define ('BIBL_PATH', 'Z:/home/localhost/www/db/forHost');
$smarty = new Smarty;
$smarty->assign('name', 'george smith');
$smarty->assign('address', '45th & Harris');
$smarty->display(BIBL_PATH . '/templates/index.tpl');
?>
