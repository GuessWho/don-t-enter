<h1>DB DROP!!!!</h1>
<?php
include 'defines_inc.php';
mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWD);
$sql = "DROP DATABASE katalog";
mysql_query ($sql) or die ('Db not exist');
mysql_close();
?>