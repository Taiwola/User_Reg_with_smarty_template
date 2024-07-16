<!DOCTYPE html>
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
        <input type="text" id="username" name="username" required value="{$username|escape}">
        {if isset($errors.username)}
            <div class="error">{$errors.username}</div>
        {/if}
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="{$email|escape}">
        {if isset($errors.email)}
            <div class="error">{$errors.email}</div>
        {/if}
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        {if isset($errors.password)}
            <div class="error">{$errors.password}</div>
        {/if}
        <br>
        <button type="submit">Register</button>
    </form>
</body>

</html>