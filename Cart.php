<?php
session_start();

if(isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $productID = $_GET['id'];
    $_SESSION['cart'][$productID] = 1; // Quantity (you can modify as needed)
}
?>

<?php include 'include/header.php'; ?>

<h2>Your Shopping Cart</h2>
<?php
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $productID => $quantity) {
        // Fetch product details from a database using $productID
        echo "Product: Product Name - Quantity: $quantity<br>";
    }
} else {
    echo "Your cart is empty.";
}
?>

<a href="checkout.php">Proceed to Checkout</a>

<?php include 'include/footer.php'; ?>
