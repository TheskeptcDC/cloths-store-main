<section>
<h1 class="latest"><span>TOP</span>ARRIVALSssss!<span>AND</span>PROMOS!</h1>
<?php
    //lets get the data for the catalog
   $searched_cat = new product_category();
    $res = mysqli_query($conn,$searched_cat->search_category());
    if ($res && mysqli_num_rows($res)>0) {
          #get the datainto the array $rows
            while ($rows = mysqli_fetch_assoc($res)) {
                $cat_id = $rows['category_id'];
                $p_cat = $rows['category_name'];
                $promo_text = $rows['category_prom_text'];
                $cat_desc = $rows['category_description'];
?>
    <h1 class="latest"><?php echo $p_cat; ?><span><?php echo $promo_text; ?></span></h1>
    <div class="box-container">
<?php
        // for the products in the loaded category
        $match_search_prod = new product();
                     $get_prod_res = mysqli_query($conn, $match_search_prod->selectFromCategory($cat_id));
                     if ($get_prod_res) {
                        $count = mysqli_num_rows($get_prod_res);
                        if ($count > 0) {
                            //the category has products
                            //get the products
                            while ($prod_rows = mysqli_fetch_assoc($get_prod_res)) {
                                $prod_name = $prod_rows['product_name'];
                                $prod_desc = $prod_rows['product_description'];
                                $prod_img = $prod_rows['product_image'];
                                $prod_id = $prod_rows['product_id'];
                                $old_price = $prod_rows['old_price'];
                                $new_price = $prod_rows['new_price'];
                                $dicount = (($old_price - $new_price)/$new_price)*100;
?>
                     <div class="box">
                         <span class="discount"><?php echo $dicount.'% OFF'; ?></span>
                         <div class="image">
                            <img src="assets\img\gallery\instra2.png" alt="">
                        <div class="icons">
                                <a href="" class="fa fa-heart"></a>
                                <a href="" class="cart-btn">BUY NOW</a>
                                <a href="" class="fas fa-shopping-cart"></a>
                    </div>
            </div>
            <div class="content">
                <h3><?php echo $prod_name; ?></h3>
                <div class="price"><?php echo $new_price; ?><span><?php echo $old_price; ?></span></div>
            </div>
        </div>
<?php
                            }
                        }
                    }
?>
    </div>
<?php

            }
    }else {
?>
<br>
<!-- SEARCH RESULTS SEC -->
<section class="home" id="home">
    <div class="content">
        <h3>JOHMS BOUTIQUE</h3>
        <span>no match for your search</span>
       <?php
            include 'partials/slider.php';
       ?>
    
        
    </div>
</section>