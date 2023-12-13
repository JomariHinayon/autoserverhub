<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your actual MySQL password
$database = "automotive_new";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database using prepared statements
    $sql = "INSERT INTO signup_tbl (name, password, email, age) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssss", $username, $hashed_password, $email, $age);

        // Execute the statement
        $stmt_executed = $stmt->execute();

        if ($stmt_executed) {
            echo "";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<html>
    <head>
        <title>AutoServeHub</title>
        <style>
            h3 { 
	margin: 0;
	color:#ffffff;
    font-size: 20px;
    font-weight: 500;
    text-transform: capitalize;
}
body {
            margin: 0;
            padding: 0;
            background-image: url('images/welcome-banner.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
          
        }
       .bordered-button {
  background-color: cyan; /* Green */
  border: none;
  color: green;
  padding: 20px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 20px 30px;
  transition-duration: 0.4s;
  cursor: pointer;
  text-decoration: none;
}

.bordered-button:hover {
            background-color: #45a049;
            
            color: white;
}
.bordered-button a {
            text-decoration: none; /* Remove underline from the anchor tag inside the button */
            color: inherit; /* Inherit the color from the button */
        }
</style>
    </head>
    <body>
    <section id="home" class="welcome-hero">
    <div style="text-align:center;">
    <?php
    
  
    ?>
    <br><br><br><br><br><br>
    <?php
echo '<p><span style="color: green; font-size: 20px;">DATA INSERTED SUCCESSFULLY!</span></p>';
?>
</p>
</div>
<!-- top-area Start -->
<div class="top-area">
    <div class="header-area">
        <!-- Start Navigation -->
        <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

            <div class="container">

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                   
                    
                    
                </div><!--/.navbar-header-->
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                
                <br><br> <br>
                    <br><br><br><br><br>
              
            </div><!--/.container-->
            
        </nav><!--/nav-->
        <!-- End Navigation -->
    </div><!--/.header-area-->
    <div class="clearfix"></div>
</div><!-- /.top-area-->
<!-- top-area End -->


<div>
<center>
<button class="bordered-button" type="submit"><a href="contact.php">Back</a></button>
    </center>
    </div> 
</section><!--/.welcome-hero-->
<!--welcome-hero end -->
 
</html>