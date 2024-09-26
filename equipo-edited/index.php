<?php
// include the models we are using apa
include 'models/product_category.php';
include 'models/product.php';
// add the menu.. includes all the links shared across johms 
include('partials/menu.php');

if (isset($_POST['search'])) {
    $look = $_POST['look'];
    //include the search.php
} elseif (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['old_price']) && isset($_GET['new_price']) && isset($_GET['description']) && isset($_GET['images'])) {
    $product_id = $_GET['id'];
    $product_name = $_GET['name'];
    $old_product_price = $_GET['old_price'];
    $new_product_price = $_GET['new_price'];
    $description = $_GET['description'];
    $prod_img = $_GET['images'];
    // pick a single image from the json array of images 
    $images = json_decode($prod_img, true);
    $first_image = isset($images[0]) ? $images[0] : 'IMG_20230123_163759.jpg';
    // re-create array of product data 
    $product_array = array(
        'id' => $product_id,
        'name' => $product_name,
        'old_price' => $old_product_price,
        'new_price' => $new_product_price,
        'description' => $description,
        'images' => $prod_img,
        'image' => $first_image
    );
    // encode the array  as json data 
    
    $product_data_json = htmlspecialchars(json_encode($product_array), ENT_QUOTES, 'UTF-8');
 
    //include a view for selected item
    include 'views/selected.php';
} elseif (isset($_GET['product'])) {
    include 'controllers/selected_view_controller.php';
    echo "viewd upto here ";
}
//if not searching and not clicked any product the just display the home normals 
?>

<br>
<!-- HOME  -->
<?php
$slide_categories = new product_category();
$get_cat_res = mysqli_query($conn, $slide_categories->select_active_featured());
$slide_data = $slide_categories->displayCategory($get_cat_res);
include 'partials/slider.php';
?>
<div class="heading">Featured <span>Collections </span></div>
<div class="container" id="productView">
    <?php
    include 'controllers/recommended_controller.php';
    // here we check if any product has been clicked 
    ?>  
</div> 

<div class="heading">Recently <span>Viewed</span></div>
<div class="container " id="productView">
    <?php
    include 'controllers/recently_viewed_controller.php';
    // here we check if any product has been clicked 
    ?>  
</div> 
<!-- view accessories -->
<div class="heading"> <span>Trending</span></div>
<div class="container " id="productView">
    <?php
    include 'controllers/accessory_controller.php';
    // here we check if any product has been clicked 
    ?>  
</div> 

<!-- Cart Button -->
<a id="cart-button" class="btn btn-primary" href="views/cart_view.html" id="cart-link">Cart</a>


<br>
<div class="container">
<?php
include('partials/footer.php');
?>
</div>

