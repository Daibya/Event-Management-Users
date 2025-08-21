<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
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
    

         /* Main Content */
        .main {
            padding: 40px 30px;
        }

        .main h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #ffffff;
            font-family: 'Cinzel', serif;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 80px 20px;
        }

        .hero h1 {
            font-size: 3.5em;
            margin-bottom: 15px;
            color: #00bcd4;
            font-family: 'Dancing Script', cursive;
            background: linear-gradient(to right, #00bcd4,rgb(255, 255, 255)); /* gradient colors */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
        }

        

        .hero p {
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #e0e0e0;
            font-family: 'Cinzel', serif;
        }

        .hero button {
            background-color: #00bcd4;
            border: none;
            padding: 14px 28px;
            border-radius: 5px;
            font-size: 1em;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .hero button:hover {
            background-color: #0097a7;
        }

        /* Services Section */
        .services {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            margin-top: 60px;
        }

        .service-card {
            background-color: rgba(255, 255, 255, 0.05);
            padding: 25px;
            border-radius: 10px;
            width: 280px;
            text-align: center;
            transition: transform 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-card h3 {
            color: #00bcd4;
            margin-bottom: 10px;
        }

        .service-card p {
            font-size: 0.95em;
            color: #ccc;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar ul {
                flex-direction: column;
                gap: 10px;
                align-items: flex-end;
            }

            .main {
                padding: 20px;
            }

            .hero h1 {
                font-size: 2.2em;
            }

            .services {
                flex-direction: column;
                align-items: center;
            }
        
        }
    </style>
</head>
<body>

    <?php
        include ('navbar.php');
    ?>

    <div class="main">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['customer']['name'] ?? 'User'); ?> 👋</h1>
        <h1>BOOK YOUR EVENT TODAY! 🎉</h1>
        <div class="main">
        <section class="hero">
            <h1 class="fade-down">Bring Your Events to Life</h1>
            <p>We plan, design, and deliver unforgettable experiences tailored just for you.</p>
            <button onclick="location.href='event.php'">Explore Services</button>
        </section>

        <section id="services" class="services">
            <div class="service-card">
                <h3>Corporate Events</h3>
                <p>From conferences to product launches, we create professional and engaging environments.</p>
            </div>
            <div class="service-card">
                <h3>Weddings</h3>
                <p>Beautiful, stress-free wedding planning with a personal touch that makes your day magical.</p>
            </div>
            <div class="service-card">
                <h3>Concerts & Festivals</h3>
                <p>Lighting, sound, stage, and everything in between—perfect for your big crowd.</p>
            </div>
            <div class="service-card">
                <h3>Private Parties</h3>
                <p>Whether it's a birthday, anniversary, or celebration—your moment, our creativity.</p>
            </div>
        </section>
    </div>

</body>
</html>
