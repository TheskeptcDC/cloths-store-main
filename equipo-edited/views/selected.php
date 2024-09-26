    <style>
        .product-view {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }
        .product-view .carousel_selected {
            flex: 1;
            max-width: 50%;
            padding-right: 20px;
        }
        .product-view .carousel_selected img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .product-details {
            flex: 1;
            max-width: 50%;
            padding-left: 20px;
        }
    </style>

<div class="container">
    <br>
    <br>
    <br>
    <?php
        $images = json_decode($prod_img, true);
        if (!is_array($images) || empty($images)) {
            $images = ['instra1.png']; // Default to a placeholder image if none exists
        }
    ?>
    <div class="product-view">
        <div class="carousel_selected">
        <?php foreach ($images as $index => $image): ?>
            <div><img src="./assets/img/products/<?= htmlspecialchars($image); ?>" alt="Product Image <?= $index + 1; ?>"></div>
        <?php endforeach; ?>
        </div>
        <div class="product-details">
            <h1><?php echo $prod_name; ?></h1>
            <p class="price"><?php echo $new_price; ?></p>
            <p class="description"><?php echo $prod_desc; ?></p>
            <!-- <p><input type="number" placeholder="quantity"></p> -->
            <!-- <p><input type="number" placeholder="size"></p> -->
            <!-- <button class="btn btn-primary">Add to Cart</button> -->
            <button class="add-to-cart" data-name="<?php echo $prod_name; ?>" data-id="<?php echo $new_price; ?>">Add to Cart</button>
        
        </div>
    </div>
</div>




<script>
$(document).ready(function(){
    $('.carousel_selected').slick({
        slidesToShow: 1,  // Show one slide at a time
        slidesToScroll: 1, // Scroll one slide at a time
        autoplay: true,    // Enable autoplay
        autoplaySpeed: 3000, // Autoplay speed in milliseconds
        arrows: true,      // Show next/prev arrows
        dots: true         // Show dots for navigation
    });
});
</script>
