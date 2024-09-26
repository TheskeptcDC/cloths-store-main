<?php
            // include '../models/product_category.php';
?>
<div class="heading" >categories</div>

<div class="table-responsive" id="cat_update">
   <table class="table">
   <th>category</th>
   <th>promo</th>
   <th>featured</th>
   <th>active</th>
   <?php
$categoryToView = new product_category();
$res = $categoryToView->selectAll($conn);
         if ($res) {
            $count = mysqli_num_rows($res);
            if ($count>0) {
               while ($rows = mysqli_fetch_assoc($res)) {
                  $cat_name = $rows['category_name'];
                  $promo_text = $rows['category_prom_text'];
                  $cat_id = $rows['category_id'];
                  $active = $rows['active'];
                  $featured = $rows['featured'];
//CURRENT DATA ARRAY FOR UPDATE
?>
<tr>
<form action="index.php" method="POST">
<td>
   <input type="text" name="cat_name" value="<?php echo $cat_name; ?> ">
</td>
<td>
   <input type="text" name="promo_text" value="<?php echo $promo_text; ?>">
</td>
<td>
   <input type="radio" name="featured" value="yes" <?php if ($featured == 'yes') {
      echo 'checked';
   }?> >yes
   <input type="radio" name="featured" value="no" <?php if ($featured == 'no') {
      echo 'checked';
   }?> >no
   
</td>
<td>
<input type="radio" name="active" value="yes" <?php if ($active == 'yes') {
      echo 'checked';
   }?> >yes
   <input type="radio" name="active" value="no" <?php if ($active == 'no') {
      echo 'checked';
   }?> >no
</td>
<td>
   <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
   <input type="submit" name="update_cat" value="update" class="add_cat btn btn-success">
</td>
<td>
   <a href="index.php?cat_del=<?=$cat_id?>" class="add_cat btn btn-danger">delete</a>
</td>
</form>
<tr>
<?php
               }
            }else {
               echo "no categories to show";
            }
         }else {
            echo "failed to load categories";
         }
?>
  
</table>
</div>
    <!--  ends  -->


    <!-- RELATED PHP OPS  -->

    <?php
        //del cat
if (isset($_GET['cat_del'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $cat_id = $_GET['cat_del'];
       $gonner_category = new product_category();
       $isGone = $gonner_category->delete($conn,$cat_id);
        if ($isGone) {
            echo 'DELETED';
        }else {
            echo "failled to delete [make sure this category is empty first]";
        }
    }
}


// HERE WE UPDATE THE CATEGORY DATA
   // Check if the form is submitted
if (isset($_POST['update_cat'])) {
   // Check if the request method is POST
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       // Check if prod_name is set
       if (!isset($_POST['cat_name'])) {
           $errors[] = "Please enter the cat name";
       } else {
           $cat_name = $_POST['cat_name'];
       }

       // Check if promo text is set

       if (!isset($_POST['promo_text'])) {
         $errors[] = "Please enter a promotional text";
     } else {
         $promo_text = $_POST['promo_text'];
     }


       // Check if cat_id is set
       if (!isset($_POST['cat_id'])) {
           $errors[] = "Please select a product category";
       } else {
           $cat_id = $_POST['cat_id'];
       }

       // Check if active and featured are set
       if (!isset($_POST['active']) && !isset($_POST['featured'])) {
           $errors[] = "Please choose if the cat is active and/or featured";
       } else {
           $active = $_POST['active'];
           $featured = $_POST['featured']; 
       }

       // If there are no errors, update the product
       if (empty($errors)) {
            $data = array(
               'id' => $cat_id,
               'name' => $cat_name,
               'active' => $active,
               'featured' => $featured,
               'promo_text' => $promo_text

            );
            $cat_to_update = new product_category();
            $res = $cat_to_update->update($conn,$data);

           if ($res) {
               // Redirect to a success page.. the chages are made but one needs to refresh the page 
               echo "it worked";

              
           } else {
               $errors[] = "Update failed. Please contact tech support for assistance.";
             echo "it failed ";
           }
       }else {
           // Redirect to a success page
         //   header('location:'.SITEURL.'admins/#cat_update');
         //   exit();
         print_r($errors);
       }
   } else {
       $errors[] = "Invalid request method";
   }
}

    ?>