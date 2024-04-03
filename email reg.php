<?php
include 'con.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['web'])){

    $f = ($_POST['FirstName']);
    $l = ($_POST['LastName']);
    $u = ($_POST['UserName']);
	$e = ($_POST['Email']);
	$ph = ($_POST['PhoneNumber']);
    $p = ($_POST['Password']);

    $selectQuery = mysqli_query($con, "SELECT * FROM registrationsogo WHERE Email = '$e'");


    if (mysqli_num_rows($selectQuery) > 0) {
 
        // Email already exists
		echo '<script language="javascript">alert("Email address already exists! Proceed to Log in page"); window.location="email reg.php";</script>';
    }

else {	
    $v = mt_rand(100000, 999999);

 $insert_query = "INSERT INTO registrationsogo (FirstName, LastName, UserName, Email, PhoneNumber, Password, verificationcode) VALUES ('$f','$l','$u','$e','$ph','$p','$v')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            echo '<script language="javascript">alert("Registration Sucessful"); window.location="veri.php";</script>';
        } else {
            echo "Error inserting email into database.";
        }
        if ($insert_result) {
            // Send verification email
			require 'vendor/autoload.php';
			$mail = new PHPMailer(true);
			try {
                //Server settings
                $mail->isSMTP(); // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'wongkhadley0@gmail.com'; // Your email username
                $mail->Password = 'pivs zwnf gssw avtc'; // Your email password
                $mail->SMTPOptions = array(
                	'ssl' => array(
                		'verify_peer' => false,
                		'verify_peer_name' => false,
                		'allow_self_signed' => true
                	)
                );
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
 
                // Send Email
                $mail->setFrom('wongkhadley0@gmail.com','Verification code');
                $mail->addAddress($e); // Recipient email
                //$mail->addReplyTo('');
                $mail->addReplyTo('wongkhadley0@gmail.com');
                $mail->isHTML(true);
                $mail->Subject = 'Verification Code for Registration';
                $mail->Body = 'Here is your verification code: ' . $v;
                $mail->send();
                $_SESSION['message'] = 'Verification code sent to your email!';
                header('Location: veri.php?email=' . $e); // Redirect to verification page
                exit;
            } catch (Exception $e) {
            	echo '<script language="javascript">alert("Error sending verification code!"); window.location="registration.php";</script>';
            }
        } else {
        	echo '<script language="javascript">alert("Error adding user!"); window.location="registration.php";</script>';
        }
    }   
}

?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">

.center {
  padding: 20px 0px;

  text-align: center;
}
.likod {
    max-width: 100%;
    margin: auto;
    text-align: center;
    padding: 50px;
    background-color: #da251c;
 

}
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Roboto Slab', serif;
}
body::-webkit-scrollbar {
    display: none;
}
body {
    max-width: 700px;
    margin: 0 auto;
    padding: 20px;
    margin-top:50px;
    border: 1px solid #ddd;
    border-radius: 5px;
    
    background-image: url('bg dark.jpg');
    background-repeat: no-repeat;
    background-size: 2200px;
    background-color:black;
           
}
label {
    display: block;
    margin-bottom: 10px;
    color:#fffe6c;
}
input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}
button {
    background-color: black;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    background-color: #333;
}


h1{
text-align: center;

color: #fffe6c;

}
h2{
text-align: center;

color: #fffe6c;
}
img{
    margin-left:230px;
}
	</style>
	<title></title>
<script src="my-script.js"></script>
</head>

<body>
   
<img src="https://upload.wikimedia.org/wikipedia/en/c/c8/SOGO_Hotel_logo.png">
<h1>Register at Sogo Hotel</h1>
		<h2> Register Below</h2>

	<div class="likod">
<form method = "POST">
	<div class="center">
    <label >Your FirstName:</label>
            <input type="text" name="FirstName" placeholder="Enter First Name here" required><br><br>

    <label >Your LastName:</label>
            <input type="text" name="LastName" placeholder="Enter Last Name here" required><br><br>

    <label >Your UserName:</label>
            <input type="text" name="UserName" placeholder="Enter User Name here" required><br><br>

	<label >Your E-mail:</label>
            <input type="email" name="Email" placeholder="Enter email here" required><br><br>

    <label >Your Phone Number:</label>
            <input type="text" name="PhoneNumber" placeholder="Enter Phone Number here" required><br><br>

	<label >Your Password:</label>
            <input type="password" name="Password" placeholder="Enter password here" required><br><br>

	<button><input type="submit" name="web" value="Register"></button>

</div>
</form>
</div>
</body>	
</html>
