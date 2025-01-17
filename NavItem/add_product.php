<?php
$title = 'Add Product';
if (session_status() == PHP_SESSION_NONE) session_start();

// تأكد من أن المستخدم هو أدمن
if (!isset($_SESSION['auth']) || $_SESSION['auth']['role'] != 'admin') {
    header('Location: ../NavItem/login.php');
    exit();
} 
?>


      


    <h1>Add Product</h1>
    <form action="../handellers/handel_add_product.php" method="POST" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" id="product_name" required><br><br>

        <label for="product_price">Product Price:</label>
        <input type="number" name="product_price" id="product_price" step="0.01" required><br><br>

        <label for="product_quantity">Product Quantity:</label>
        <input type="number" name="product_quantity" id="product_quantity" required><br><br>

        <label for="product_image">Product Image:</label>
        <input type="file" name="product_image" id="product_image" accept="image/*"><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>