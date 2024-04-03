<!-- view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Records</title>
    <!-- Add your CSS styles here if needed -->
</head>
<body>
    <h1>User Records</h1>

    <?php
    // Include your database connection file (e.g., con.php)
    include('con.php');

    // Retrieve user records from the database
    $query = "SELECT * FROM registrationsogo";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Display user records in a table
        echo '<table>';
        echo '<tr><th>Username</th><th>Email</th></tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['UserName'] . '</td>';
            echo '<td>' . $row['Email'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No user records found.';
    }

    // Close the database connection
    mysqli_close($con);
    ?>

    <!-- Add any additional content or styling as needed -->
</body>
</html>
