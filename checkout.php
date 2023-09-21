<?php include 'include/header.php'; ?>

<h2>Checkout</h2>
<?php
if(isset($_POST['place_order'])) {
    // Handle order processing (e.g., send confirmation email)
    echo "Order placed successfully!";
} else {
    ?>
    <form method="post">
        <!-- Add fields for shipping/billing info here -->
        <button type="submit" name="place_order">Place Order</button>
    </form>
    <?php
}
?>

<?php include 'include/footer.php'; ?>
