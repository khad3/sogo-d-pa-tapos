<?php
// Start the session
session_start();

// Include your database connection file (e.g., connect.php)
require('con.php');

// Check if the form is submitted
if (isset($_POST['code'])) {
    // Assign the posted code to a variable
    $enteredCode = $_POST['code'];

    // Retrieve the email from the URL parameters (passed from registration page)
    $e = $_POST['Email']; // Corrected variable name

    // Retrieve the stored code from the database (you'll need to adapt this query)
    $storedCodeQuery = "SELECT verificationcode FROM registrationsogo WHERE Email = '$e'"; // Example query

    // Execute the query and fetch the result
    // (You should use prepared statements to prevent SQL injection)
    $result = mysqli_query($con, $storedCodeQuery);
    $row = mysqli_fetch_assoc($result);
    $dbCode = $row['verificationcode'];

    // Compare the entered code with the stored code
    if ($enteredCode === $dbCode) {
        // Verification successful, create a session for the user
        $_SESSION['verified'] = $e;
        header("Location: login.php"); // Redirect to login page
        exit; // Important: End the script to prevent further execution
    } else {
        echo '<script language="javascript">alert("Invalid Verification Code!"); window.location="veri.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verification Page</title>
    <style>
                * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Roboto Slab', serif;
        }

        body {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-image: url('bg dark.jpg');
            background-repeat: no-repeat;
            background-size: 2200px;
            background-color: black;
            margin-top:90px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #fffe6c;
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

        h1 {
            text-align: center;
            color: #fffe6c;
        }

        h2 {
            text-align: center;
            color: #fffe6c;
        }

        img {
            margin-left: 230px;
        }
    </style>
</head>
<body>
    <h1>Enter Verification Code</h1>
    <form method="POST">
    <input type="text" name="Email" placeholder="Enter your email" required>
        <input type="text" name="code" placeholder="Enter code" required>
        <input type="submit" value="Verify">
    </form>
</body>
</html>
