<?php require_once 'app/views/templates/header.php' ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        <style>
            body {
                /* font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                display: flex;
                
                height: 100vh; */
            }
            .welcome-container {
                
                background-color: #ffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .welcome-container h2 {
                /* margin-bottom: 20px; */
                
            }
            .welcome-container p {
                /* Add any styling for the paragraphs here */
                margin: 10px 0;
                
                font-family: Arial, sans-serif;
                font-size: 16px;
            }
            .welcome-container a {
                color: #007BFF;
                text-decoration: none;
            }
            .welcome-container a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="flex-container" style="display: flex; align-items: center; justify-content: center; flex-direction: column " >
            <h2 >Welcome, <span style="color: red; font-style: italic;"><?= $_SESSION['username'] ?>!             </span></h2>
            <p >Today's date is: <?php echo date("Y/m/d") . "<br>"; ?></p>
            <p><a href="/logout">Logout</a></p>
        </div>
    </body>
    </html>
