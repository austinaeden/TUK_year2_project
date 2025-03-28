<?php
require_once __DIR__ . '/../includes/config_session.inc.php';
require_once __DIR__ .'/../includes/dbh.inc.php'; // Include database connection

// Ensure the user is logged in
function output_payment(object $pdo){
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id']; // Get logged-in user's ID

        // Query the cart items for the logged-in user
        $sql = "SELECT * FROM user_cart WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $userId, PDO::PARAM_INT); // Bind the user ID parameter
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Get the result of the query

        // Initialize the subtotal
        $subtotal = 0;
        $cartTableRows = '';

        // Fetch and generate the HTML for each cart item
        foreach ($result as $row) {
            $itemTotal = $row['item_price'] * $row['item_quantity'];
            $subtotal += $itemTotal;

            // Create table row for each item
            $cartTableRows .= '<tr id="cart-item-' . $row['id'] . '">';
            $cartTableRows .= '<td><img src="' . $row['item_image'] . '" alt="' . $row['item_name'] . '" style="width: 50px;"></td>';
            $cartTableRows .= '<td>' . $row['item_name'] . '</td>';
            $cartTableRows .= '<td>$' . number_format($row['item_price'], 2) . '</td>';
            $cartTableRows .= '<td>' . htmlspecialchars($row['item_quantity']) . '</td>';
            $cartTableRows .= '<td>$' . number_format($itemTotal, 2) . '</td>';
            $cartTableRows .= '</tr>';
        }

        // Close the prepared statement
        $stmt->closeCursor();

        // Display the cart table with items
        echo '
             <section id="cartp" class="section-p1">
                <table id="cart1" width="70%">
                    <thead>
                        <tr>
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
    

            <section id="form-details">
                <form id="payment-form" action="cart/process_payment.php" method="POST" onsubmit="return validateForm()">
                    <span>FILL ALL BLANK SPACES</span>
                    <h2>Items will be delivered after 2 weeks </h2>
                    <input type="text" id="name" placeholder="Your Name" required>
                    <input type="email" id="email" placeholder="E-mail" required>
                    <input type="tel" id="phone" placeholder="Phone Number" required>
                    <input type="text" id="postOffice" placeholder="Post Office" required>
                    <input type="text" id="postCode" placeholder="Post Code" required>
                    <select class="form-select" id="validationTooltip04" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="30">Baringo</option>
                        <option value="36">Bomet</option>
                        <option value="39">Bungoma</option>
                        <option value="40">Busia</option>
                        <option value="28">Elgeyo/Marakwet</option>
                        <option value="14">Embu</option>
                        <option value="7">Garissa</option>
                        <option value="43">Homa Bay</option>
                        <option value="11">Isiolo</option>
                        <option value="34">Kajiado</option>
                        <option value="37">Kakamega</option>
                        <option value="35">Kericho</option>
                        <option value="22">Kiambu</option>
                        <option value="3">Kilifi</option>
                        <option value="20">Kirinyaga</option>
                        <option value="45">Kisii</option>
                        <option value="42">Kisumu</option>
                        <option value="15">Kitui</option>
                        <option value="2">Kwale</option>
                        <option value="31">Laikipia</option>
                        <option value="5">Lamu</option>
                        <option value="10">Marsabit</option>
                        <option value="16">Machakos</option>
                        <option value="17">Makueni</option>
                        <option value="9">Mandera</option>
                        <option value="12">Meru</option>
                        <option value="44">Migori</option>
                        <option value="1">Mombasa</option>
                        <option value="21">Muranga</option>
                        <option value="32">Nakuru</option>
                        <option value="33">Narok</option>
                        <option value="29">Nandi</option>
                        <option value="47">Nairobi</option>
                        <option value="18">Nyandarua</option>
                        <option value="46">Nyamira</option>
                        <option value="19">Nyeri</option>
                        <option value="25">Samburu</option>
                        <option value="41">Siaya</option>
                        <option value="26">Trans Nzoia</option>
                        <option value="23">Turkana</option>
                        <option value="6">Taita/Taveta</option>
                        <option value="4">Tana River</option>
                        <option value="13">Tharaka-Nithi</option>
                        <option value="27">Uasin Gishu</option>
                        <option value="38">Vihiga</option>
                        <option value="24">West Pokot</option>
                        <option value="8">Wajir</option>
                    </select>
                    <div class="custom-radio">
                        <input type="radio" name="paymentMethod" id="cash" value="Cash">
                        <label for="cash">Cash</label>
                    </div>
                    <div class="custom-radio">
                        <input type="radio" name="paymentMethod" id="mpesa" value="M-pesa" checked>
                        <label for="mpesa">M-pesa</label>
                    </div>
                    <div class="custom-radio">
                        <input type="radio" name="paymentMethod" id="card" value="Card">
                        <label for="card">Card</label>
                    </div>
                    <button type="submit" class="normal paymentbtn">Proceed to Payment</button>                
                </form>

                <div id="subtotalpy">
                    <h3>Your Totals</h3> 
                    <table>
                        <tr>
                            <td>Cart Subtotals</td>
                            <td id="cartSubtotal">$' . number_format($subtotal, 2) . '</td> <!-- ID to update subtotal -->
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td id="cartTotal"><strong>$' . number_format($subtotal, 2) . '</strong></td> <!-- ID to update total -->
                        </tr>
                    </table>                    
                </div>

                
            </section>
            <script src="index.js"></script>
        ';
    } else {
        header("location: ../index.php");
    }
}
?>








