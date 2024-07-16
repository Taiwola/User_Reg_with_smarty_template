<?php
/* Smarty version 5.3.1, created on 2024-07-16 13:07:44
  from 'file:confirmation.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_669654805c7322_04366094',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f89ec56053dbe27ebd706c426fa31af6a3b8c673' => 
    array (
      0 => 'confirmation.tpl',
      1 => 1721128061,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_669654805c7322_04366094 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\YIP\\templates';
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <h1>Registration Successful</h1>
    <p>Thank you, <strong><?php echo $_smarty_tpl->getValue('username');?>
</strong>, for registering!</p>
</body>

</html><?php }
}
