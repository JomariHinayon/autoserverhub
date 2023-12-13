<?php
// Create a connection
$conn = mysqli_connect("localhost", "root", "", "automotive_new") or die(mysqli_error());

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Variable to track login status
$loginStatus = "";

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["names"]);
    $password = mysqli_real_escape_string($conn, $_POST["passwords"]);

    // Use prepared statements for better security
    $sql = "SELECT * FROM `signup_tbl` WHERE name = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    // Check if any rows were returned
    if ($row = mysqli_fetch_assoc($result)) {
        // Verify the entered password against the stored hashed password
        if (password_verify($password, $row['password'])) {
            // Password is correct
            header("Location: user_homepage.html");
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            $loginStatus = "Incorrect password";
        }
    } else {
        $loginStatus = "No matching records found";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// ... (your existing code)

// Process form data for update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["names"]);
    $password = mysqli_real_escape_string($conn, $_POST["passwords"]);

    // Use prepared statements for better security
    $sql = "SELECT * FROM `signup_tbl` WHERE name = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ss", $name, $password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Update user information
        $newAge = mysqli_real_escape_string($conn, $_POST["new_age"]);
        $newNumber = mysqli_real_escape_string($conn, $_POST["new_number"]);

        $updateSql = "UPDATE `signup_tbl` SET age = ?, number = ?, email = ? WHERE name = ?";
        $updateStmt = mysqli_prepare($conn, $updateSql);

        mysqli_stmt_bind_param($updateStmt, "iss", $newAge, $newNumber, $name);
        mysqli_stmt_execute($updateStmt);

        // Redirect to user_homepage.html upon successful update
        header("Location: user_homepage.html");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        $loginStatus = "No matching records found";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background-image: url('images/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 95vh;
        }

        .login-container {
            margin: 100px auto;
            padding: 20px;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .error-message {
            color: red;
            font-weight: bold;
            font-size: 36px;
        }

        button {
            display: inline-block;
            padding: 10px 50px;
            background-color: #f1db25;
            color: #ffffff;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            border: 1px solid transparent;
            text-transform: uppercase;
            font-weight: bold;
        }

        a {
            padding: 20px;
        }
    </style>
</head>

<body>
    <br><br><br><br><br>
    <center>
        <div class="error-message">
            <?php echo $loginStatus; ?>
        </div>
        <br><br><br><br><br>
        <button><a href="contact.php">Back to Login</a></button>
    </center>
</body>

</html>
