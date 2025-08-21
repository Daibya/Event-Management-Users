<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
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
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364); /* Deep blue-dark gradient */
            color: #e0e0e0;
        }

        /* Main Content */
        .main {
            padding: 40px 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10%;
        }

        .main h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #ffffff;
            text-align: center;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
        }

        .login-box label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .login-box input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            background-color: #1a1a1a;
            border: 1px solid #444;
            border-radius: 4px;
            color: #ffffff;
        }

        .login-box input:focus {
            border-color: #00bcd4;
            outline: none;
        }

        .login-box button {
            width: 100%;
            background-color: #00bcd4;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-box button:hover {
            background-color: #0097a7;
        }

        .login-box .extra-links {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9em;
        }

        .login-box .extra-links a {
            color: #00bcd4;
            text-decoration: none;
        }

        .login-box .extra-links a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main {
                padding: 20px;
            }

            .login-box {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="main">
        <div class="login-box">
            <h1>Forget Password</h1>
            <form action="" method="post">

                <label for="mail">Enter OTP</label>
                <input type="mail" id="mail" name="mail" placeholder= "Enter OTP" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder= "New Password" required>

                <label for="password">Confirm Password</label>
                <input type="password" id="password" name="password" placeholder= "Confirm Password" required>


                <button type="submit" name="submit">Send reset link</button>
            </form>
        </div>
    </div>
    
</body>
</html>