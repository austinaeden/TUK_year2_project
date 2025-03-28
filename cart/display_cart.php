<?php
require_once __DIR__ . '/../includes/config_session.inc.php';
require_once __DIR__ .'/../includes/dbh.inc.php'; // Include database connection

// Ensure the user is logged in
function output_cart(object $pdo){
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id']; // Get logged-in user's ID

        // Query the cart items for the logged-in user
        $sql = "SELECT * FROM user_cart WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $userId, PDO::PARAM_INT); // Bind the user ID parameter
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Get the result of the query

        if (empty($result)) {
            // Display message and button when cart is empty
            echo '
                <section id="cart" class="section-p1">
                    <table id="cart1" width="100%">
                        <thead>
                            <tr>
                                <td>Remove</td>
                                <td>Image</td>
                                <td>Production</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Subtotal</td>
                            </tr>
                        </thead>
                    </table>
                    <h3 style="text-align: center; vertical-align: middle; padding-top: 20px; color: #088178;">No items on Cart</h3>
                </section>
                <section id="cart-add" class="section-p1">
                <div id="coupon">
                    <h3>Apply Coupon</h3>
                    <div>
                        <input type="text" id="coupon-code" placeholder="Enter Your Coupon">
                        <button class="normal" id="apply-coupon-button">Apply</button>
                    </div>
                </div>

                <script>
                    document.getElementById("apply-coupon-button").addEventListener("click", () => {
                        // Retrieve the coupon code entered by the user
                        const couponCode = document.getElementById("coupon-code").value.trim();

                        // Check if the input field is empty
                        if (couponCode === "") {
                            alert("Please enter a coupon code.");
                            return;
                        }

                        // List of valid coupons (for demonstration purposes)
                        const validCoupons = ["DISCOUNT10", "FREESHIP", "SAVE20"];

                        // Check if the coupon code is valid
                        if (validCoupons.includes(couponCode.toUpperCase())) {
                            alert(`Coupon applied successfully! You have used the coupon: ${couponCode}`);
                        } else {
                            alert("Invalid coupon code. Please try again.");
                        }

                        // Clear the input field after processing
                        document.getElementById("coupon-code").value = "";
                    });
                </script>

                <div id="subtotal">
                    <h3>Cart Totals</h3> 
                    <table>
                        <tr>
                            <td>Cart Subtotals</td>
                            <td id="cartSubtotal">$0.00</td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td id="cartTotal"><strong>$0.00</strong></td>
                        </tr>
                    </table>
                    <a href="shop.php"><button class="normal">Buy goods first</button></a>
                </div>
                <a href="purchases.php"><button id="purchasebtn" class="normal">Check Purchases</button></a>
            </section>
            ';
            return; // Exit the function since there are no items
        } else{
            // Initialize the subtotal
        $subtotal = 0;
        $cartTableRows = '';



        // Fetch and generate the HTML for each cart item
        foreach ($result as $row) {
            $itemTotal = $row['item_price'] * $row['item_quantity'];
            $subtotal += $itemTotal;

            // Create table row for each item
            $cartTableRows .= '<tr id="cart-item-' . $row['id'] . '"  >';
            $cartTableRows .= '<td><a href="#" onclick="removeFromCart(' . $row['id'] . ')"><i class="bi bi-trash"></i></a></td>';
            $cartTableRows .= '<td><img src="' . $row['item_image'] . '" alt="' . $row['item_name'] . '" style="width: 50px;"></td>';
            $cartTableRows .= '<td>' . $row['item_name'] . '</td>';
            $cartTableRows .= '<td>$' . number_format($row['item_price'], 2) . '</td>';
            $cartTableRows .= '<td><input type="number" value="' . $row['item_quantity'] . '" min="1" onchange="updateCartQuantity(' . $row['id'] . ', this.value); updateSubtotal(this, ' . $row['item_price'] . ')"></td>';
            $cartTableRows .= '<td>$' . number_format($itemTotal, 2) . '</td>';
            $cartTableRows .= '</tr>';


        }

        // Close the prepared statement
        $stmt->closeCursor();

        // Display the cart table with items
        echo '
             <section id="cart" class="section-p1">
                <table id="cart1" width="100%">
                    <thead>
                        <tr>
                            <td>Remove</td>
                            <td>Image</td>
                            <td>Production</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Subtotal</td>
                        </tr>
                    </thead>
                    <tbody>
                        ' . $cartTableRows . '
                    </tbody>
                </table>
            </section>
    
            <section id="cart-add" class="section-p1">
                <div id="coupon">
                    <h3>Apply Coupon</h3>
                    <div>
                        <input type="text" id="coupon-code" placeholder="Enter Your Coupon">
                        <button class="normal" id="apply-coupon-button">Apply</button>
                    </div>
                </div>

                <script>
                    document.getElementById("apply-coupon-button").addEventListener("click", () => {
                        // Retrieve the coupon code entered by the user
                        const couponCode = document.getElementById("coupon-code").value.trim();

                        // Check if the input field is empty
                        if (couponCode === "") {
                            alert("Please enter a coupon code.");
                            return;
                        }

                        // List of valid coupons (for demonstration purposes)
                        const validCoupons = ["DISCOUNT10", "FREESHIP", "SAVE20"];

                        // Check if the coupon code is valid
                        if (validCoupons.includes(couponCode.toUpperCase())) {
                            alert(`Coupon applied successfully! You have used the coupon: ${couponCode}`);
                        } else {
                            alert("Invalid coupon code. Please try again.");
                        }

                        // Clear the input field after processing
                        document.getElementById("coupon-code").value = "";
                    });
                </script>


                <div id="subtotal">
                    <h3>Cart Totals</h3> 
                    <table>
                        <tr>
                            <td>Cart Subtotals</td>
                            <td id="cartSubtotal">$' . number_format($subtotal, 2) . '</td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td id="cartTotal"><strong>$' . number_format($subtotal, 2) . '</strong></td>
                        </tr>
                    </table>
                    <a href="payment.php"><button class="normal">Proceed to checkout</button></a>
                </div>
                <a href="purchases.php"><button id="purchasebtn" class="normal">Check Purchases</button></a>
            </section>
        ';
        }

        
    } else {
        echo '
             <section id="cart" class="section-p1">
                <table id="cart1" width="100%">
                    <thead>
                        <tr>
                            <td>Remove</td>
                            <td>Image</td>
                            <td>Production</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Subtotal</td>
                        </tr>
                    </thead>
                </table>
                <h3 style="text-align: center; vertical-align: middle; padding-top: 20px; color: #088178;">You are not logged in </h3>
            </section>
    
            <section id="cart-add" class="section-p1">
                <div id="coupon">
                    <h3>Apply Coupon</h3>
                    <div>
                        <input type="text" placeholder="Login To Enter Your Coupon">
                        <button class="normal">Apply</button>
                    </div>
                </div>
                <div id="subtotal">
                    <h3>Cart Totals</h3> 
                    <table>
                        <tr>
                            <td>Cart Subtotals</td>
                            <td id="cartSubtotal">$0.00</td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td id="cartTotal"><strong>$0.00</strong></td>
                        </tr>
                    </table>
                    <a href="login.php"><button class="normal">Login to buy</button></a>
                </div>
            </section>
        ';
    }
}
?>
