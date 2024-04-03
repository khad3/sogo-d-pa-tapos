<?php
include 'con.php';
session_start();

if(isset($_POST['login'])){
	$un = $_POST['UserName'];
	$p = ($_POST['Password']);

	$query = "SELECT * FROM registrationsogo WHERE UserName ='$un' AND PASSWORD = '$p'";
	$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) == 1){
	$_SESSION['UserName'] = $un;
	setcookie('UserName','$un', time()+120);
	header('location: view.php');
}
else{

	echo '<script language="javascript">alert("Invalid Invalid UserName or Password!"); window.location="login.php";</script>';
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
/* styles.css */

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
    margin-top: 50px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-image: url('bg dark.jpg');
    background-repeat: no-repeat;
    background-size: 2200px;
    background-color: black;
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

.signup-link {
    text-align: center;
    margin-top: 20px;
}

.signup-link a {
    color: #fffe6c;
    text-decoration: none;
}

.signup-link a:hover {
    text-decoration: underline;
}
p{
    color:white;
}

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST">
            <div class="input-group">
                <label for="UserName">Username:</label>
                <input type="text" id="username" name="UserName" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="Password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
        <div class="signup-link">
            <p>No account? <a href="email reg.php">Register now!</a></p>
        </div>
    </div>
</body>
</html>
