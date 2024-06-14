<?php require_once 'app/views/templates/headerPublic.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
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
				.login-container {
						background-color: #fff;
						padding: 20px;
						border-radius: 8px;
						box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
						width: 300px;
						text-align: center;
				}
				.login-container h2 {
						margin-bottom: 20px;
				}
				.login-container form {
						display: flex;
						flex-direction: column;
				}
				.login-container input[type="text"],
				.login-container input[type="password"] {
						margin-bottom: 10px;
						padding: 10px;
						border: 1px solid #ccc;
						border-radius: 4px;
				}
				.login-container button {
						padding: 10px;
						background-color: #007BFF;
						color: white;
						border: none;
						border-radius: 4px;
						cursor: pointer;
				}
				.login-container button:hover {
						background-color: #0056b3;
				}
				.login-container a {
						color: #007BFF;
						text-decoration: none;
				}
				.login-container a:hover {
						text-decoration: underline;
				}
				.error {
						color: red;
				}
		</style>
</head>
<body>
		<div class="login-container">
				<h2>Login</h2>
				<form action="/login/verify" method="POST">
					<!-- Invalid Try counter and Message -->
					
					<?php if(isset($_SESSION['failedAuth'])): ?>
							<p><?php echo "Invalid Tries: "; echo $_SESSION['failedAuth']; ?></p>
					<?php endif; ?>
					
					<?php if ($_SESSION['failedAuth'] > 3) : ?>
									<p><?php echo htmlspecialchars($_SESSION['message']); ?></p>
									<?php unset($_SESSION['failedAuth']); ?>
					<?php endif; ?>


					<!-- <?php if (($_SESSION['time'] + strtotime("5 seconds"))<= date("H:i:s", $time)) : ?>
									<p>working</p
					<?php endif; ?> -->
					
					<!-- Registration Success Text  -->
					<?php if (isset($_SESSION['regSuccess'])): ?>
							<p><?php echo $_SESSION['regMessage'] ?></p>
							<p><?php unset($_SESSION['regSuccess']); ?> </p>
					<?php endif; ?>
						<input type="text" name="username" placeholder="Username" required>
						<input type="password" name="password" placeholder="Password" required>
							<p><button type="submit">Login</button></p>
				</form>
				<p><a href="/create">Don't have an account? Register here</a></p>
		</div>
</body>
</html>
