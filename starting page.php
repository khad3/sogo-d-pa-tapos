<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL SOGO</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image:url('bg.gif');
    background-repeat:no-repeat;
    background-size:1450px;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 50px;
    background-color: #da251c; /* Customize background color */
    color: white; /* Customize text color */
}

.logo img {
    max-height: 80px; /* Adjust logo size */
}

.menu-items h3 {
    font-size: 18px;
    margin-left: 120px;
}

.auth-buttons button {
    padding: 10px 20px;
    margin-left: 10px;
    cursor: pointer;
    border: none;
    color: white;

    background-color:White;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    
}

.auth-buttons button:hover {
    transform: translateY(-2px); /* Add a subtle lift effect on hover */
}




.main-content {
    padding: 20px;
    text-align: center;
}

form {
    margin-top: 20px;
}

form label {
    display: block;
    font-weight: bold;
}

form input[type="text"],
form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form input[type="submit"] {
    background-color: #ff4500;
    color: white;
    border: none;
    cursor: pointer;
    padding: 10px 20px;
    border-radius: 5px;
}

p a {
    color: #ff4500;
    text-decoration: none;
}
.container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5); /* Add a semi-transparent black background */
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add a subtle shadow to the text */
            color:white;
        }

        p {
            font-size: 18px;
            line-height: 1.5;
            color:white;
        }

    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">
        <img src="https://upload.wikimedia.org/wikipedia/en/c/c8/SOGO_Hotel_logo.png" alt="SOGO Hotel Logo">
    </div>
    
    <div class="menu-items">
        <h3>So Cleen So Good!</h3>
    </div>

    <div class="auth-buttons">
        <button><a href="login.php">Log in</a></button>
        <button><a href="email reg.php">Register</a></button>
    </div>
</div>

<div class="main-content">
<div class="container">
        <h1>Welcome to SOGO Hotel Website</h1>
        <p> Discover a world of comfort, convenience, and exceptional hospitality at our premier hotel chain. Whether you're traveling for business or leisure, SOGO Hotel offers the perfect accommodation to suit your needs.</p>
    </div>
   
</div>

</body>
</html>
