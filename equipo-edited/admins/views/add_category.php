
   <!-- other content posts starts  -->
   <section class="contact" id="contact">
         <div class="heading" id="add_cat">add a <span>category</span></div>
            <div class="row">
           <form action="" method="POST">
               <input type="text" name="cat_name" placeholder="category" class="box">
               <input type="text" name="promo_text" placeholder="promo text" class="box">
             <div class="box">ACTIVE?
             <input type="radio" name="active" value="yes" placeholder="" class="">yes
               <input type="radio" name="active" value="no" placeholder="" class="">no
             </div>
             <div class="box">FEATURED?
               <input type="radio" name="featured" value="yes" placeholder="" class="">yes
               <input type="radio" name="featured" value="no" placeholder="" class="">no
               </div>
               <input type="submit" name="new_cat" value="add new category" class="btn btn-success">
               
           </form>
           <div class="image">
               <img src="../assets\img\gallery\offers2.png" alt="">
           </div>
       </div>
   </section>

<?php
   //FOR ADDING A NEW CATEGORY
if (isset($_POST['new_cat'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = array();
        // $data = array();
        if (!isset($_POST['cat_name'])) {
            $errors[] = "add a name";
        }else {
            $cat_name = $_POST['cat_name'];
            $data[] = $cat_name;
        
        }
        //for active ?
        if (!isset($_POST['active'])) {
            $errors[] = "is this product active?";
        }else {
            $active = $_POST['active'];
            // $data[] = $active;
            
        }

        //for featured 
        if (!isset($_POST['featured'])) {
            $errors[] = "is this product featured?";
        }else {
            $featured = $_POST['featured'];
            // $data[featured] = $featured;
            
        }
         //cat promo text
         if (!isset($_POST['promo_text'])) {
            $errors[] = "add the category promo text";
        }else {
            $promo_text = $_POST['promo_text'];
            
            echo "adding ";
        }
        // if no errors ..we add the new cat
        if (empty($errors)) {
          $data = array(
            'name' => $cat_name,
            'active' => $active,
            'featured' => $featured,
            'promo_text' => $promo_text
          );
          $new_category = new product_category();
          $isAdded = $new_category->add($conn,$data);
        }else {
            //redirect back to index with appropriate errors 
            echo "errors";
            print_r($errors);
            print_r($data);

        }
    }
}

?>