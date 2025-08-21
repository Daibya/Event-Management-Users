<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
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
        /* searchbar */
    .search-container {
            position: relative;
            width: 290px;
            margin-left: 30%;
            padding-bottom: 25px;
            float: left;
    }

    .search-input {
      width: 100%;
      padding: 10px 40px 10px 10px; /* space for the icon on the right */
      border: 1px solid #ccc;
      border-radius: 20px;
      font-size: 14px;
    }

    .search-icon {
      position: absolute;
      right: 12px;
      top: 32%;
      transform: translateY(-50%);
      pointer-events: none;
      font-size: 18px;
      color: #999;
    }
    /* BUTTONS */
button,
.save-btn {
  padding: 12px 20px;
  background: linear-gradient(to right, #00c6ff, #0072ff);
  color: white;
  border: none;
  border-radius: 10px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(0, 114, 255, 0.3);
  margin-left: 5px;
}

button:hover,
.save-btn:hover {
  transform: scale(1.05);
  background: linear-gradient(to right, #00d2ff, #3a7bd5);
}

    /* dropdown */
    select {
      padding: 7px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 20px;
      width: 138px;
      background-color: #808080;
      color: white;
      margin-left: 5px;
      /* margin-top: 1px; */
    }
   

     /* Main Content */
     .main {
            padding: 40px 30px;
        }

        .main h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #ffffff;
            font-family: 'Great Vibes', cursive;
        }

        .main .headname{
            color: yellow;     
        }

        .card {
            background-color: #242424;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
        }

        .card h3 {
            margin-bottom: 10px;
            color: #00e5ff;
        }

        .card p {
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
        }
    
        /* Event Container Styling */
.event-card {
    display: flex;
    flex-direction: column;
    width: 280px;
    background-color: #242424;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
    transition: transform 0.2s ease;
    margin-left: 4%;
    position: relative;
    float: left;
}

.event-card:hover {
    transform: translateY(-5px);
}

.event-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    display: block;
}

.event-info {
    padding: 15px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
}

/* Buttons container */
.event-buttons {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    margin-top: 10px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

/* Show buttons only on hover */
.event-card:hover .event-buttons {
    opacity: 1;
}

/* Common button styles */
a .btn-buy {
    /* flex: 1; */
    padding: 8px;
    font-size: 14px;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
    width: 100%;
    margin-left: 65px;
    margin-bottom: 5px;
    
}

/* Buy Now - Green */
.btn-buy {
    background-color: #4caf50;
    color: white;
}
.btn-buy:hover {
    background-color: #43a047;
}




</style>
<body>
    <?php 
        include ('mymethods.php');
        include ('navbar.php');
        // session_start();
        if(!isset($_SESSION['user']))
        {
            //  header ('location: admin_login.php');
        }

        $response1 = getAllCategory();
        $records1 = mysqli_num_rows($response1);

        
        
    ?>
        <div class="main">
    <h1 class= "headname">Events</h1>
    <div class="topbar">
        <form action="" method="post">
        <div class="search-container">
            <input type="text" name="search_input" class="search-input" placeholder="Search events here...">
            <i class="fas fa-search search-icon"></i>
        </div>
        <?php if($records1 > 0) {?>
         <select id="dropdown" name="cat_input">
                <!-- <option value="">Select Category</option> -->
                <option value="0">All</option>
        <?php
            while($data = mysqli_fetch_assoc($response1))
                             {
        ?>
            <option value="<?php echo $data['catid']; ?>"><?php echo $data['name']; ?></option>
                <?php } ?>
        </select> <button name="search">Search</button>
        </div>
        <?php }?>
        </form>
    
    </div>

    <div class="event-container">

        <?php
            if(isset($_POST['search']))
            {
                $search_input = $_POST['search_input'];
                $cat_input = $_POST['cat_input'];
                $response = search($search_input, $cat_input);
            }
            else
            {
                $response = getEvent();
            }
            
            if( mysqli_num_rows($response) > 0){
                
            
        
        /*
        $events = [
            [
                'image' => 'https://via.placeholder.com/150x100?text=Tech+Conf',
                'name' => 'Tech Innovators Conference 2025',
                'price' => '$199',
                'description' => 'A premier event for tech leaders and innovators around the world.'
            ],
            [
                'image' => 'https://via.placeholder.com/150x100?text=AI+Summit',
                'name' => 'AI & Machine Learning Summit',
                'price' => '$149',
                'description' => 'Explore the future of AI with talks from industry pioneers.'
            ],
            [
                'image' => 'https://via.placeholder.com/150x100?text=Web+Bootcamp',
                'name' => 'Web Development Bootcamp',
                'price' => 'Free',
                'description' => 'A one-day training on modern front-end and back-end technologies.'
            ]
        ];
        */

        while($event = mysqli_fetch_assoc($response)){ ?>
            <div class="event-card">
                <img src="http://localhost/MyEventManagement/<?php echo htmlspecialchars($event['image']); ?>" style="height: 200px; object-fit: cover;" alt="Event Image">
                <div class="event-info">
                    <h3><?php echo htmlspecialchars($event['name']); ?></h3>
                    <p><strong>Price:</strong> <?php echo htmlspecialchars($event['amount']); ?></p>
                    <p><?php echo htmlspecialchars($event['description']); ?></p>
                </div>
                <div class="event-buttons">
                    <a href="buy_event.php?id=<?php echo htmlspecialchars($event['eventid']); ?>"><button class="btn-buy">Order Now</button></a>
                </div>
            </div>
        <?php }
        }else{ ?> 
        
        <?php }?>

    </div>
</div>

</div>


</body>
</html>