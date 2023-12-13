<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your existing head content here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
</head>

<body>
    <style>
        body {
            height: 100vh;
            margin: 0;
            padding: 0;
            background-image: url('images/welcome-banner.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;            
        }
        button {
  background-color: cyan; /* Green */
  border: none;
  color: green;
  padding: 20px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 20px 30px;
  transition-duration: 0.2s;
  cursor: pointer;
  text-decoration: none;
}

button:hover {
            background-color: #45a049;
            
            color: white;
}
button a {
            text-decoration: none; /* Remove underline from the anchor tag inside the button */
            color: inherit; /* Inherit the color from the button */
        }
    </style>
    <!-- Add your existing body content here -->
    <center>
    <br><br><br><br><br>
        <div class="ticket-details-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Item Details</h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        
                    <?php
$quantity = 0;
$total = 0;

// Retrieve values from URL parameters
$ticketId = isset($_GET['ticketId']) ? $_GET['ticketId'] : '';
$orderDetails = isset($_GET['orderDetails']) ? $_GET['orderDetails'] : '';

// Decode the JSON string to an array
$orders = json_decode(urldecode($orderDetails), true);

// Create a connection
$conn = mysqli_connect("localhost", "root", "", "automotive_new") or die(mysqli_error());

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Display ticket details
echo "<h3>Selected Product: $ticketId</h3>";

// Display order details
echo "<h3>Order Details:</h3>";
echo "<ul>";
foreach ($orders as $order) {
    $quantity = $order['quantity'];
    $total = $order['total'];
    echo "<li>ticketid: $ticketId, Quantity: $quantity, Total: $$total</li>";
}
echo "</ul>";

// Check if the item already exists in cart_tbl
$checkSql = "SELECT * FROM cart_tbl WHERE id = ?";
$checkStmt = $conn->prepare($checkSql);

if ($checkStmt) {
    $checkStmt->bind_param("s", $ticketId);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Item exists, perform an update
        $updateSql = "UPDATE cart_tbl SET quantity = ?, total = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);

        if ($updateStmt) {
            $updateStmt->bind_param("sss", $quantity, $total, $ticketId);
            $updateExecuted = $updateStmt->execute();

            if ($updateExecuted) {
                echo "Cart item updated successfully.";
            } else {
                echo "Error updating cart item: " . $updateStmt->error;
            }

            $updateStmt->close();
        } else {
            echo "Error preparing update statement: " . $conn->error;
        }
    } else {
        // Item doesn't exist, perform an insert
        $insertSql = "INSERT INTO cart_tbl (id, quantity, total) VALUES (?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);

        if ($insertStmt) {
            $insertStmt->bind_param("sss", $ticketId, $quantity, $total);
            $insertExecuted = $insertStmt->execute();

            if ($insertExecuted) {
                echo "Cart item added successfully.";
            } else {
                echo "Error adding cart item: " . $insertStmt->error;
            }

            $insertStmt->close();
        } else {
            echo "Error preparing insert statement: " . $conn->error;
        }
    }

    $checkStmt->close();
} else {
    echo "Error preparing check statement: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

                        <!-- Add a button to proceed to payment -->
                        <form action="payment.php" method="GET">
                            <input type="hidden" name="ticketId" value="<?php echo $ticketId; ?>">
                            <input type="hidden" name="orderDetails" value="<?php echo $orderDetails; ?>">
                            <button><a href="ticket-details.php">BACK</a></button>
                        </form>
                    </div>
                    <!-- Add other content here -->
                </div>
            </div>
        </div>
    </center>
</body>

</html>
