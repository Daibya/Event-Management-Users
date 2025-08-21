<?php

include('phpmailer/PHPMailerAutoload.php'); 

    function connect(){
        $hostname = "localhost";
        $username = "root";
        $userpassword = "";
        $dbname = "online_event";

        $conn = mysqli_connect($hostname, $username, $userpassword, $dbname);
        return $conn;
    }

     function getAllCategory(){
        $conn = connect();
        
        $sql = "select *from category";

        $response = mysqli_query($conn, $sql);

        return $response;
    }
    function getCategoryById($catid){
        $conn = connect();
        
        $sql = "select *from category where catid = '$catid'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

     function getEvent(){
        $conn = connect();
        
        $sql = "select *from events";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    
    function getEventById($eventid){
        $conn = connect();
        
        $sql = "select *from events where eventid = '$eventid'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function getEventBycatId($catid){
        $conn = connect();
        
        $sql = "select *from events where catid = '$catid'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function addUser($data){
        $mail = $data['mail'];
        $name = $data['name'];
        $password = $data['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);    

        $conn = connect();

        $sql = "insert into customer(mail,name,password) values ('$mail', '$name', '$hashedPassword')";

        $response = mysqli_query($conn, $sql);
        if($response == 1){
            sendnotification($data);
        }
        return $response;
    }

    function sendnotification(){
        // $email = $data['mail'];
        // $name = $data['name'];

         $email = 'daibyasankhaadhikary@gmail.com';
        $name = "Anup";

        $mail = new PHPMailer(true);

            //Enable SMTP debugging.
            $mail->SMTPDebug = 3;                               
            //Set PHPMailer to use SMTP.
            
            $mail->isSMTP();            
            //Set SMTP host name                          
            $mail->Host = "smtp.gmail.com";
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;                          
            //Provide username and password     
            $mail->Username = "daibyasankhaadhikary@gmail.com";                 
            $mail->Password = "uizvnfiythddnqer";                           
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "tls";                           
            //Set TCP port to connect to
            $mail->Port = 587;                                   

            $mail->From = "daibyasankhaadhikary@gmail.com";
            $mail->FromName = "Easy Events";

            $mail->addAddress($email, $name);

            $mail->isHTML(true);

            $mail->Subject = "Subject";
            $mail->Body = "<i>Welcome to Easy Events</i>";
            $mail->AltBody = "This is the plain text version of the email content";

            try {
                $mail->send();
                //echo "Message has been sent successfully";
            } catch (Exception $e) {
                //echo "Mailer Error: " . $mail->ErrorInfo;
            }

    }


    function loginUser($data){
        $mail = $data['mail'];
        $password = $data['password'];

        $conn = connect();

        $res = getUserBymail($mail);

        if(mysqli_num_rows($res) == 0){
            return null;
        }
        else{
            $userdata = mysqli_fetch_assoc($res);
            if(!password_verify($password, $userdata['password'])){
                return null;
            }
            else{
                return $userdata;
            }
        }
        return null;
    }
     function getUserBymail($mail){
      
        $conn = connect();
        $sql = "select * from customer where mail = '$mail'";

        $response = mysqli_query($conn, $sql);
        return $response;
    }


   function sendResetLink($mail) {
    $conn = connect();
    $res = getUserBymail($mail);
    
    if (mysqli_num_rows($res) == 0) {
        // Do not reveal whether the email exists
        return true;
    }

    $user = mysqli_fetch_assoc($res);
    
    // Generate a secure OTP
    $otp = rand(100000, 999999);

    // Prepare reset link
    $resetLink = "http://localhost/EventUser/resetpass.php?mail=" . urlencode($mail);

    // Send email
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = "stefen05rogers@gmail.com";
    $mail->Password = "xodisliabtovxnto"; // Consider moving this to a secure .env file
    $mail->setFrom('daibyasankhaadhikary@gmail.com', 'Online Event');
    $mail->addAddress($mail);
    $mail->isHTML(true);
    $mail->Subject = "Password Reset Request";

    $mail->Body = "
        Dear {$user['name']},<br><br>
        You requested to reset your password.<br><br>
        <strong>Your OTP is: <span style='font-size:18px;'>$otp</span></strong><br><br>
        You can also click the link below to reset your password:<br>
        <a href='$resetLink'>$resetLink</a><br><br>
        <em>This OTP and link will expire in 1 hour.</em><br><br>
        If you didn't request this, please ignore this email.
    ";

    $mail->AltBody = "Your OTP is: $otp. Reset your password by visiting: $resetLink (valid for 1 hour).";

    try {
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

    function search($keyword, $catid){
        $conn = connect();        

        if(($catid == "" || $catid == 0) && $keyword=="")
        {
            $sql = "SELECT * FROM events";
        }
        else if($catid > 0)
        {
            $sql = "SELECT * FROM events WHERE catid = $catid";
        }
        else{
            $keyword = "%".$keyword."%";
            $sql = "SELECT * FROM events WHERE (name LIKE '$keyword')";
        }  

        $response = mysqli_query($conn, $sql);
        return $response;
    }

    function addEventOrder($data)
    {
        $eventId = $data['eventid'];
        $amount = $data['amount'];
        $location = $data['location'];
        $event_date = $data['event_date'];
        $event_name = $data['event_name'];
        $mail = $data['mail'];
        $transactionid = $data['transactionid'];
        $status = $data['status'];

        $conn = connect();

        $sql = "insert into order_event (eventid, amount, location, event_date, event_name, mail, transactionid, status) values ('$eventId', '$amount', '$location', '$event_date', '$event_name', '$mail', '$transactionid', '$status')";

        $response = mysqli_query($conn, $sql);

        return $response;

    }

     //sendnotification();
?>