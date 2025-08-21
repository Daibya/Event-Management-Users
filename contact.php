<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Your CSS starts here */
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
        }

        .navbar ul li a:hover {
            color: #ffffff;
        }

        .main {
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 80px);
        }

        .contact-box {
            background-color: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
        }

        .contact-box h1 {
            font-size: 2em;
            color: #ffffff;
            margin-bottom: 20px;
            text-align: center;
            font-family: 'Quicksand', sans-serif;   
        }

        .contact-box label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
        }

        .contact-box input,
        .contact-box textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            background-color: #1a1a1a;
            border: 1px solid #444;
            border-radius: 4px;
            color: #ffffff;
        }

        .contact-box textarea {
            resize: vertical;
            min-height: 100px;
        }

        .contact-box button {
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

        .contact-box button:hover {
            background-color: #0097a7;
        }

        .contact-info {
            margin-top: 30px;
            text-align: center;
        }

        .contact-info p {
            margin: 8px 0;
            font-size: 0.95em;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }

        .social-links a {
            color: #00bcd4;
            text-decoration: none;
            font-size: 1.1em;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #ffffff;
        }

        @media (max-width: 768px) {
            .main {
                padding: 20px;
            }

            .contact-box {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <?php
        include ('navbar.php');
    ?>

    <div class="main">
        <div class="contact-box">
            <h1>Contact Us</h1>
            <form action="#" method="post">
                <!-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.197845625656!2d88.36389521496062!3d22.57264628517779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277c2c9a257bd%3A0xf6e6c03cbd4f64b2!2sKolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1626947210234!5m2!1sen!2sin"
                width="100%" height="250" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe> -->
                <iframe src="https://www.google.com/maps/embed?pb=!4v1752058889017!6m8!1m7!1s8ki8nJUOQ2d_6pekdHBwyA!2m2!1d22.82681504773879!2d88.38063010666869!3f100.20557428209747!4f-4.479949006944338!5f0.7820865974627469" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </form>

            <div class="contact-info">
                <p><strong>Location:</strong> Shyamnagar, West Bengal, India</p>
                <div class="social-links">
                    <a href="#" target="_blank">Facebook</a>
                    <a href="#" target="_blank">Twitter</a>
                    <a href="#" target="_blank">LinkedIn</a>
                    <a href="#" target="_blank">Instagram</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
