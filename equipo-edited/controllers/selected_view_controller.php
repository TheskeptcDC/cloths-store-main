<?php
if (isset($_GET['product'])) {
    $id = $_GET['product'];
    $selected_product = new product();
    $get_prod_res = mysqli_query($conn, $selected_product->selectProductById($id));
    
    if ($get_prod_res && mysqli_num_rows($get_prod_res) > 0) {
        $prod_rows = mysqli_fetch_assoc($get_prod_res);
        
        $prod_name = $prod_rows['product_name'];
        $prod_desc = $prod_rows['product_description'];
        $prod_img = $prod_rows['product_images'];
        $prod_id = $prod_rows['product_id'];
        $old_price = floatval($prod_rows['old_price']);
        $new_price = floatval($prod_rows['new_price']);
        
        // Avoid division by zero
        if ($old_price > 0) {
            $discount = (($old_price - $new_price) / $old_price) * 100;
        } else {
            $discount = 0;
        }

        $images = json_decode($prod_img, true);
        
        // Include the view file
        include './views/selected.php';
    } else {
        echo "Product not found.";
    }
} else {
    echo "No product selected.";
}
?>