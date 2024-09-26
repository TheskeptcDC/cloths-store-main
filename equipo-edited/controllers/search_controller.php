<?php
    //lets get the data for the catalog
   $searched_cat = new product_category();
    $res = mysqli_query($conn,$searched_cat->search_category($look));
    if ($res && mysqli_num_rows($res)>0) {
        echo "product 1st query";
          #get the datainto the array $rows
            while ($rows = mysqli_fetch_assoc($res)) {
                $cat_id = $rows['category_id'];
                $p_cat = $rows['category_name'];
                $promo_text = $rows['category_prom_text'];
                $cat_desc = $rows['category_description'];
                echo "product cat";
                ?>

<div class="container" id="productView">
<?php

        // for the products in the loaded category
        $match_search_prod = new product();
                     $get_prod_res = $match_search_prod->selectFromCategory($conn,$cat_id);
                     if ($get_prod_res) {
                        $count = mysqli_num_rows($get_prod_res);
                        if ($count > 0) {
                            //the category has products
                            //get the products
                            $product_html_array = array();
                            while ($prod_rows = mysqli_fetch_assoc($get_prod_res)) {
                                $prod_name = $prod_rows['product_name'];
                                $prod_desc = $prod_rows['product_description'];
                                $prod_img = $prod_rows['product_images'];
                                $prod_id = $prod_rows['product_id'];
                                $old_price = $prod_rows['old_price'];
                                $new_price = $prod_rows['new_price'];
                                $discount = (($old_price - $new_price) / $old_price) * 100; // Fixed discount calculation
                
                                //  get an image from the product images to be used as the front view
                                $images = json_decode($prod_img, true);
                                $first_image = isset($images[0]) ? $images[0] : 'IMG_20230123_163759.jpg'; // Default to a placeholder image if none exists
                
                                //array to send when clicked
                                $product_array = array(
                                    'id' => $prod_id,
                                    'name' => $prod_name,
                                    'old_price' => $old_price,
                                    'new_price' => $new_price,
                                    'description' => $prod_desc,
                                    'images' => $prod_img,
                                    'image' => $first_image
                                );
                
                                //array to send when clicked 
                                $product = http_build_query($product_array);
                                $productSelector = $prod_id;
                
                                // INCLUDE THE VIEW 4 
                                include './views/selected.php';
                            }
                        }
                    }
                    ?>
                </div>
                <?php
            }
            ?> 
</div> 
            <?php
        }
