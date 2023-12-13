<?php
                            include "db_connection.php";

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                // Retrieve form data
                                $name = $_POST['name'];
                                $quantity = $_POST['quantity'];
                                $user = $_POST['user'];
                                $oldPrice = $_POST['old_price'];
                                $newPrice = $_POST['new_price'];
                                $description = $_POST['description'];

                                // Perform SQL insertion
                                $sql = "INSERT INTO product (name, quantity, user, old_price, new_price, description) 
                                        VALUES ('$name', '$quantity', '$user', '$oldPrice', '$newPrice', '$description')";

                                if (mysqli_query($your_db_connection, $sql)) {
                                    echo "New record added successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($your_db_connection);
                                }
                            }
                        ?>