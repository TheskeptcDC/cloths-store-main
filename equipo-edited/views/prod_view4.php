<div class="product-card" data-name="<?php echo $prod_name; ?>">
                    <div class="product-image">
                        <img src="assets\img\gallery\instra1.png<?php //echo $first_image; ?>" alt="<?php echo $prod_name; ?>">
                        <span class="discount"><?php echo number_format($discount, 0); ?>% OFF</span>
                        <div class="product-overlay">
                            <a class="btn-quick-view" href="./index.php?product=<?php echo urlencode($prod_id); ?>">Quick View</a>
                            <button class="add-to-cart" data-name="<?php echo $prod_name; ?>" data-id="<?php echo $new_price; ?>">Add to Cart</button>
                        </div>
                    

                            <!-- product details  -->
                             <div class="product-info">
                                    <h3 class="product-name"><?php echo $prod_name; ?></h3>
                                    <div class="product-price">
                                    <span class="new-price">$<?php echo $new_price; ?></span>
                                    <span class="old-price">$<?php echo $old_price; ?></span>
                        </div>
                    </div>
</div>
                </div>