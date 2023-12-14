<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>AutoServeHub</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/tooplate-artxibition.css">
<!--

Tooplate 2125 ArtXibition

https://www.tooplate.com/view/2125-artxibition

-->
    </head>
    
    <body>
        
        <header class="header-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="index.html" class="logo">AutoServe<em>Hub</em></a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li><a href="user_homepage.html">Home</a></li>
                                <li><a href="update-profile.html">user Profile</a></li>
                                <li><a href="tickets.php">Products</a></li>  
                            </ul>        
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- Add your existing body content here -->
        <div class="page-heading-shows-events">
            <div class="container"> 
                <div class="row">
                    <div class="col-lg-12">
                        <h2>AutoServeHub</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- ***** Preloader Start ***** -->
   
    <!-- ***** Preloader End ***** -->
    
    <!-- ***** Pre HEader ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    
    <!-- ***** Header Area End ***** -->

    <!-- ***** About Us Page ***** -->
   

   
    <div class="rent-venue-application">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <style>
                        /* Add this CSS to your stylesheet */
.contact-form .row {
    display: flex;
    flex-wrap: wrap;
}

.contact-form .col-md-6 {
    width: 100%;
    box-sizing: border-box;
}

.contact-form fieldset {
    margin-bottom: 15px;
}

                    </style>
                   <div class="center-container">
                    <div class="heading-text">
                        <h4>User Profile</h4>
                    </div>
                    <div class="contact-form">
                    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$user_id = $_SESSION['user_id'];

$conn = mysqli_connect("localhost", "root", "", "automotive_new") or die(mysqli_error());

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Get updated values from the form
        $newName = $_POST['name'];
        $newEmail = $_POST['email'];
        $newAge = $_POST['age'];


        // Prepare and execute the update query
        $updateQuery = "UPDATE signup_tbl SET name=?, email=?, age=? WHERE id=?";
        $updateStmt = $conn->prepare($updateQuery);

        // Check for errors in the prepared statement
        if (!$updateStmt) {
            die('Error in preparing update statement: ' . $conn->error);
        } else {
            echo "Profile updated successfully!";
        }

        // Bind parameters
        $updateStmt->bind_param("sssi", $newName, $newEmail, $newAge, $user_id);

        // Execute the update query and check for errors
        if (!$updateStmt->execute()) {
            die('Error updating user data: ' . $updateStmt->error);
        }

        // Close the update statement
        $updateStmt->close();

    }
}

// The rest of your code for displaying the form remains unchanged

// Close the connection
$conn->close();
?>


<?php

$conn = mysqli_connect("localhost", "root", "", "automotive_new") or die(mysqli_error());

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare and execute the query
$query = "SELECT * FROM signup_tbl WHERE id = ?";
$stmt = $conn->prepare($query);

// Check for errors in the prepared statement
if (!$stmt) {
    die('Error in preparing statement: ' . $conn->error);
}

// Bind parameters
$stmt->bind_param("i", $user_id);

// Execute the query and check for errors
if (!$stmt->execute()) {
    die('Error: ' . $stmt->error);
}

// Get the result
$result = $stmt->get_result();

// Check if a user was found
if ($result->num_rows > 0) {
    // Fetch the user data
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $email = $row['email'];
        $age = $row['age'];
    }
} else {
    echo "User not found";
}

// Close the connection
$stmt->close();
$conn->close();
?>

<form id="contact" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!-- ... (your form fields) ... -->
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <label>Name</label>
            <input name="name" type="text" id="name" placeholder="Your Name:" required="" value="<?php echo $name; ?>">
        </div>
        <div class="col-md-9 col-sm-12">
            <label>Email</label>
            <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email:" required="" value="<?php echo $email; ?>">
        </div>
        <div class="col-md-9 col-sm-12">
            <label>Age</label>
            <input name="age" type="number" id="age" placeholder="Age:" required="" value="<?php echo $age; ?>">
        </div>
        <div class="col-lg-12">
            <button type="submit" name="submit" class="main-dark-button">Save Changes </button>
        </div>
    </div>
</form>


                    </div>
                </div>
                                <center>
                                <style>
                                    /* Add this CSS code in the head section or in your external stylesheet */
                                    button[type="submit"] {
                                      background-color: rgb(3, 3, 3);
                                      color: white; /* Set text color to white for better contrast */
                                      padding: 10px 20px; /* Adjust padding as needed */
                                      text-decoration: none; /* Remove default underline on anchor inside button */
                                      border: none; /* Remove border for a cleaner look */
                                      cursor: pointer;
                                      border-radius: 5px; /* Optional: Add rounded corners */
                                    }
                                  </style>
                                  </center>
                                  <center>
                                  <button><a href="contact.php">Logout</a></button>
                                </center>
                            </div>
                        </form>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>


    <!-- *** Subscribe *** -->
   

    <!-- *** Footer *** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="address">
                        <h4>AutoServeHub</h4>
                        <span>Colegio De Montalban, San Isidro Montalban Rizal, Philippines</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="links">
                        <h4>Group Members</h4>
                        <ul>
                            <li><a href="#">Dionado, Aban</a></li>
                             
                            <li><a href="#">Villate, Abad</a></li>
                             
                            <li><a href="#">Gegrimos, Acuram</a></li>
                            
                            <li><a href="#">Candado</a></li>
                        
                        </ul>
                    </div>
                </div>
              
               
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>