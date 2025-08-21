<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <title>Navigation bar</title>
    <style>
         /* Navigation Bar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1f1f1f;
            padding: 15px 30px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar .logo {
            font-size: 1.5em;
            color: #00bcd4;
            font-weight: 600;
            font-family: 'Satisfy', cursive;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        .navbar ul li a {
            color: #b0bec5;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            font-family: 'Cinzel', serif;
        }

        .navbar ul li a:hover {
            color: #ffffff;
        }
    @media (max-width: 768px) {
            .navbar ul {
                flex-direction: column;
                gap: 10px;
                align-items: flex-end;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">Easy Events</div>
        <ul>
            <li><a href="homepage.php">HOME</a></li>
            <li><a href="event.php">EVENT</a></li>
            <li><a href="contact.php">CONTACT US</a></li>
            <?php
            
            if(isset($_SESSION['customer'])){ ?>
                <li><a href="logout.php">LOGOUT</a></li>
            <?php }else{ ?>
                <li><a href="login.php">LOGIN</a></li>
            <?php } ?>
        </ul>
    </nav>
</body>
</html>