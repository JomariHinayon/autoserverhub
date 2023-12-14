<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your existing head content here -->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/tooplate-artxibition.css">
    <title>Tickets Page</title>
    <script>

        // Array to store orders
        var orders = [];

        // Function to update orders array
        function updateOrders(ticketId, quantity, total) {
            // Check if the item is already in the orders array
            var index = orders.findIndex(order => order.ticketId === ticketId);

            if (index !== -1) {
                // If the item is in the orders array, update its quantity and total
                orders[index].quantity = quantity;
                orders[index].total = total;
            } else {
                // If the item is not in the orders array, add it
                orders.push({
                    ticketId,
                    quantity,
                    total
                });
            }

        }

        // Function to increment quantity
        function incrementQuantity(ticketId, price) {
            var quantityElement = document.getElementById('quantityDisplay-' + ticketId);
            var totalElement = document.getElementById('totalDisplay-' + ticketId);

            var quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;

            var total = quantity * price;
            console.log(quantity)
            totalElement.textContent = total.toFixed(2);

            updateOrders(ticketId, quantity, total);
        }

        // Function to decrement quantity
        function decrementQuantity(ticketId, price) {
            var quantityElement = document.getElementById('quantityDisplay-' + ticketId);
            var totalElement = document.getElementById('totalDisplay-' + ticketId);

            var quantity = parseInt(quantityElement.textContent);
            if (quantity > 0) {
                quantity--;
                quantityElement.textContent = quantity;

                var total = quantity * price;
                totalElement.textContent = total.toFixed(2);

                updateOrders(ticketId, quantity, total);
            }
        }

    </script>
    <script>
    // ... (existing code)

    // Function to display order details
    function displayOrderDetails(ticketId) {
        // Use a default ticketId or customize it based on your requirements

        // Redirect to payment.php with order details
        var ordersParam = encodeURIComponent(JSON.stringify(orders));
        window.location.href = 'payment.php?ticketId=' + ticketId + '&orderDetails=' + ordersParam;
    }

    // ... (existing code)
</script>

</head>

<body>
    <style>
        body{
            background-color:  darkgray;         
        }
        .header-area , .header-sticky{
            
        }
    </style>
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
                            <li><a href="updateprofile.php">user Profile</a></li>
                            <li><a href="tickets.php">Cart</a></li>  
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
                    <span>Check out upcoming and  grab your items right now.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="tickets-page">
        <style>
            .tickets-page{
                
            background-color: darkgray;
        
            }
            footer{
                background-color:  gray;
                padding: 30px;
            }
           html{
                background-color:  gray;
            }
        </style>
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Products Page</h2>
                        
                    </div>
                </div>

                <?php
                    // Create a connection
                    $conn = mysqli_connect("localhost", "root", "", "automotive_new") or die(mysqli_error());

                    // Check the connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Fetch all products from the database
                    $sql = "SELECT * FROM product";
                    $result = $conn->query($sql);

                    // Check if there are any products
                    if ($result->num_rows > 0) {
                        // Output the HTML for each product
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-lg-4">';
                            echo '<div class="ticket-item" id="' . $row['id'] . '">';
                            echo '<div class="thumb">';
                            echo ' <img src="assets/images/automotive_tools.jpg" alt="">';
                            echo '<div class="price">';
                            echo '<span><em>$' . $row['new_price'] . '</em></span>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="down-content">';
                            echo '<h4>' . $row['names'] . '</h4>';
                            echo '<p>' . $row['description'] . '</p>'; // Display the description

                            echo '<div class="main-dark-button ">';
                            echo ' <a class="mx-2" href="javascript:void(0);" onclick="displayOrderDetails(\'' . $row['cart_id'] . '\')">Add to cart</a>';
                            echo '<div class="quantity ">';
                            echo '<label  for="quantity-' . $row['id'] . '">Quantity:</label>';
                            echo '<span id="quantityDisplay-' . $row['id'] . '">0</span>';
                            echo '<button class="mx-2" onclick="decrementQuantity(\'' . $row['id'] . '\', \'' . $row['new_price'] . '\')">-</button>';
                            echo '<button onclick="incrementQuantity(\'' . $row['id'] . '\', \'' . $row['new_price'] . '\')">+</button>';
                            echo '</div>';
                            echo '<h4>Total: $<span id="totalDisplay-' . $row['id'] . '">0.00</span></h4>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No products found";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>

            </div>
        </div>
        <center>
            <button><a href="tickets.php" >BACK</a></button>
            </center>
    </div>
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
</body>

</html>
