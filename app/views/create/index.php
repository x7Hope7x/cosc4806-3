<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .registration-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .registration-container h2 {
            margin-bottom: 20px;
        }
        .registration-container form {
            display: flex;
            flex-direction: column;
        }
        .registration-container input[type="text"],
        .registration-container input[type="password"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .registration-container input[type="submit"] {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .registration-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .registration-container a {
            color: #007BFF;
            text-decoration: none;
        }
        .registration-container a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <!-- Username exists  -->
        <?php if ($_SESSION['regError'] == 1): ?>
                <p> <?php echo $_SESSION['regMessage'] ?></p>
        <?php endif; ?>
        <!-- Invalid password or username format  -->
        <?php if ($_SESSION['regError'] == 2): ?>
                <p> <?php echo $_SESSION['regMessage'] ?></p>
        <?php endif; ?>
        <h2>Create a New Account</h2>
        <form action="/create/verify" method="post">
            Username <input type="text" name="username" required><br>
            Password <input type="password" name="password" required><br>
            <input type="submit" value="Register">
        </form>
        <p><a href="/login">Already have an account? Login here</a></p>
    </div>
</body>
</html>