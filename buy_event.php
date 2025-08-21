<?php
    session_start();
    include ('navbar.php');
    include ('mymethods.php');

    $userData = $_SESSION['customer'];
    $mail = $userData ['mail'];
?>

<?php
$event = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = getEventById($id); // You need to implement this function in methods.php
    if ($result) {
        $event = mysqli_fetch_assoc($result);
    }
}

if (!$event) {
    echo "<h2 style='color:#f87171;text-align:center;margin-top:50px;'>Event not found.</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buy Event</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Satisfy&family=Cinzel&family=Great+Vibes&display=swap" rel="stylesheet">
    <style>
        /* Include your full CSS here (already provided) */
        /* Paste your entire CSS block here to keep everything consistent */
        /* ---------------- START OF YOUR CSS ---------------- */
        /* [Place full CSS you provided above here] */
        /* ---------------- END OF YOUR CSS ---------------- */
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

        .buy-container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.6);
        }

        .buy-container img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .buy-container input[type="date"],
        .buy-container input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #444;
            color: white;
        }

        .buy-container label {
            font-weight: 600;
            color: #00bcd4;
            display: block;
            margin-top: 10px;
        }

        .buy-container h2 {
            font-size: 2rem;
            color: #00e5ff;
            margin-bottom: 10px;
        }

        .buy-container p {
            color: #ccc;
            line-height: 1.6;
        }

        .btn-buy-event {
            display: inline-block;
            padding: 12px 25px;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 114, 255, 0.3);
        }

        .btn-buy-event:hover {
            transform: scale(1.05);
            background: linear-gradient(to right, #00d2ff, #3a7bd5);
        }
    </style>
</head>
<body>

<!-- Main Buy Event Content -->
<div class="buy-container">
    <img src="http://localhost/MyEventManagement/<?php echo htmlspecialchars($event['image']); ?>" alt="Event Image">
    
    <h2><?php echo htmlspecialchars($event['name']); ?></h2>
    <p><strong>Price:</strong> ₹<?php echo htmlspecialchars($event['amount']); ?></p>
    <p><?php echo htmlspecialchars($event['description']); ?></p>

    <div>
        <label for="event_date">Select Date:</label>
        <input type="date" name="event_date" id="event_date" required>

        <label for="location">Enter Location:</label>
        <input type="text" name="location" id="location" placeholder="Your preferred location" required>

        <!-- Hidden fields -->
        <input type="hidden" id="event_name" value="<?php echo htmlspecialchars($event['name']); ?>">
        <input type="hidden" id="amount" value="<?php echo htmlspecialchars($event['amount']); ?>">
        <input type="hidden" id="eventid" value="<?php echo htmlspecialchars($event['eventid']); ?>">
        <input type="hidden" id="mail" value="<?php echo htmlspecialchars($mail); ?>">

        <button type="submit" class="btn-buy-event" onclick= "bookTicket()">Buy Event</button>
    </div>
    </div>
      
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function bookTicket() {
            //userid, transactionid, status
            var eventPrice = document.getElementById('amount').value;

            var options = {
                "key": "rzp_test_agSIP3tMeNjkMT", // Enter the Key ID generated from the Dashboard
                "amount": eventPrice*100, // Amount is in currency subunits. 
                "currency": "INR",
                "name": "Easy Events", //your business name
                "description": "Payment for Event Ticket",
                "image": "https://img.freepik.com/premium-vector/alphabetical-letter-e-logo-collection_647881-448.jpg?w=360",
                 "handler": function (response){
                    //alert("Ticket booked successfully!"+response.razorpay_payment_id);
                    addToOrder(response.razorpay_payment_id)
                  
                }
            };

            var rzp1 = new Razorpay(options);
            rzp1.open();
        }

        function addToOrder(transactionid)
        {
            //alert(transactionid)
            var eventId = document.getElementById('eventid').value;
            var amount = document.getElementById('amount').value;
            var location = document.getElementById('location').value;
            var event_date = document.getElementById('event_date').value;
            var event_name = document.getElementById('event_name').value;
            var mail = document.getElementById('mail').value;



            $.ajax({
                url:'AddOrder.php',
                method:'post',
                data:{'eventid':eventId, 'amount':amount, 'location':location, 'event_date':event_date, 'event_name':event_name, 'mail':mail, 'transactionid':transactionid, 'status':"Order Placed" },
                success: function(response)
                {
                    console.log(220, response)
                    alert(response);
                    window.location.href = "event.php";
                }
            })
        }
    </script>

</body>
</html>
