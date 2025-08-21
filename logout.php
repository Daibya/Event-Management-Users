<?php
session_start();
session_destroy();
header("Location: login.php"); // or homepage
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Reset & Base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: #e0e0e0;
        }

        .main {
            padding: 40px 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .logout-box {
            background-color: rgba(255, 255, 255, 0.06); /* transparent box */
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .logout-box h1 {
            font-size: 1.8em;
            margin-bottom: 30px;
            color: #ffffff;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .btn {
            padding: 12px 28px;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            min-width: 100px;
            transition: background-color 0.3s;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .btn-yes {
            background-color: #00bcd4;
            color: white;
        }

        .btn-yes:hover {
            background-color: #0097a7;
        }

        .btn-no {
            background-color: #f44336;
            color: white;
        }

        .btn-no:hover {
            background-color: #d32f2f;
        }

        @media (max-width: 768px) {
            .logout-box {
                padding: 20px;
            }

            .button-group {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>

<div class="main">
    <div class="logout-box">
        <h1>Are you sure you want to log out?</h1>
        <div class="button-group">
            <form action="login.php" method="post">
                <button type="submit" class="btn btn-yes">Yes</button>
            </form>
            <a href="homepage.php" class="btn btn-no">No</a>
        </div>
    </div>
</div>

</body>
</html>
