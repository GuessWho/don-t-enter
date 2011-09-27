<?php /* Smarty version Smarty-3.1.1, created on 2011-09-27 17:01:15
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:266304e81d6837934c2-74697888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e43b807af9cc8df7d350c3baf9e47f167c9520a0' => 
    array (
      0 => 'index.tpl',
      1 => 1317132071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '266304e81d6837934c2-74697888',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_4e81d6837e59f',
  'variables' => 
  array (
    'name' => 0,
    'address' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e81d6837e59f')) {function content_4e81d6837e59f($_smarty_tpl) {?><html>
<head>
<title>Info</title>
</head>
<body>

<pre>
User Information:

Name: <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

Address: <?php echo $_smarty_tpl->tpl_vars['address']->value;?>

</pre>

</body>
</html>
<?php }} ?>