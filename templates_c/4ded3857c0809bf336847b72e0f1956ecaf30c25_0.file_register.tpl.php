<?php
/* Smarty version 5.3.1, created on 2024-07-16 14:03:01
  from 'file:register.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_66966175509210_32223456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ded3857c0809bf336847b72e0f1956ecaf30c25' => 
    array (
      0 => 'register.tpl',
      1 => 1721131377,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66966175509210_32223456 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\YIP\\templates';
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
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

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <h1>Register</h1>

    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('username'), ENT_QUOTES, 'UTF-8', true);?>
">
        <?php if ((null !== ($_smarty_tpl->getValue('errors')['username'] ?? null))) {?>
            <div class="error"><?php echo $_smarty_tpl->getValue('errors')['username'];?>
</div>
        <?php }?>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('email'), ENT_QUOTES, 'UTF-8', true);?>
">
        <?php if ((null !== ($_smarty_tpl->getValue('errors')['email'] ?? null))) {?>
            <div class="error"><?php echo $_smarty_tpl->getValue('errors')['email'];?>
</div>
        <?php }?>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <?php if ((null !== ($_smarty_tpl->getValue('errors')['password'] ?? null))) {?>
            <div class="error"><?php echo $_smarty_tpl->getValue('errors')['password'];?>
</div>
        <?php }?>
        <br>
        <button type="submit">Register</button>
    </form>
</body>

</html><?php }
}
