<?php
// Database connection parameters
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete operation
if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];

    // Use prepared statement to prevent SQL injection
    $deleteStatement = $conn->prepare("DELETE FROM product WHERE id = ?");
    $deleteStatement->bind_param("i", $deleteId);

    if ($deleteStatement->execute()) {
        echo "Product with ID $deleteId has been deleted.";
    } else {
        echo "Error deleting product: " . $deleteStatement->error;
    }

    // Close the prepared statement
    $deleteStatement->close();
}

// Your SQL query to get product data
$sql = "SELECT id, quantity, names, old_price, new_price, description FROM product";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Fetch data
        while ($row = $result->fetch_assoc()) {
            // Display product information
            echo "Product ID: {$row['id']}, Quantity: {$row['quantity']}, Name: {$row['names']}, Old Price: {$row['old_price']}, New Price: {$row['new_price']}, Description: {$row['description']}";

            // Add a delete button for each product
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='delete_id' value='{$row['id']}'>";
            echo "<button type='submit'>Delete</button>";
            echo "</form>";

            echo "<br>";
        }
    } else {
        echo "No products found.";
    }

    // Free result set
    $result->free();
} else {
    // If the query failed
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
