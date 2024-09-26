<?php
include('partials/menu.php');
include('models/product_category.php');
if (isset($GET_['logout'])) {
    if ($_SERVER['REQUEST_METHOD']== 'POST') {
        
        ?>
<div class="home">
    <div class="login_form latest">
        <form action="test.php" method="POST">
            <label for="admin_name">Name</label>
            <p>
            <input type="text" name="admin_name" class="user_input" >
                                                       
                                                      
            </p>
            <label for="admin_password">Password</label>
            <p>
            <input type="password" name="admin_password" class="user_input">
            </p>
        <div class="forgot_password">
            <!-- <a href="#">Forgot password?</a> -->
        </div>
            
            <p>
            <input type="submit" name="login" value="login" class="btn">
            </p>
            <!-- <p>Or sign in with</p> -->
            <!-- <p class="button_login google">
                <a href="#">Google</a> -->
            </p>
            
        </form>
    </div>
        </div>
    </div>
    
</body>
</html>
<?php
    }
}


//code for adding products
if (isset($_POST['add_prod'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if prod_image is set
        if (!isset($_POST['prod_image'])) {
            $errors[] = "Please select an image for the product";
        } else {
            $prod_image = $_POST['prod_image'];
        }

        // Check if prod_name is set
        if (!isset($_POST['prod_name'])) {
            $errors[] = "Please enter the product name";
        } else {
            $prod_name = $_POST['prod_name'];
            echo "$prod_name";
        }

        //for product description
        if (!isset($_POST['prod_desc'])) {
            $errors[] = "Please enter the product desc";
        } else {
            $prod_desc = $_POST['prod_desc'];
            echo "$prod_desc";
        }
        //for old price 
        if (!isset($_POST['old_price'])) {
            $errors[] = "Please enter the old price ";
        } else {
            $old_price = $_POST['old_price'];
            echo "$old_price";
        }
        //for new price 
        if (!isset($_POST['new_price'])) {
            $errors[] = "Please enter the product new price ";
        } else {
            $new_price = $_POST['new_price'];
            echo "$new_price";
        }

        // Check if cat_id is set
        if (!isset($_POST['cat_id'])) {
            $errors[] = "Please select a product category";
        } else {
            $cat_id = $_POST['cat_id'];
            echo $cat_id;
        }

        // Check if active and featured are set
        if (!isset($_POST['active']) && !isset($_POST['featured'])) {
            $errors[] = "Please choose if the product is active and/or featured";
        } else {
            $active = $_POST['active'];
            $featured = $_POST['featured']; 
            echo "$featured";
            echo "$active";
        }
        // forimg
        
        // fortheimage
        print_r($_FILES['image']);
        if (isset($_FILES['image']['name'])) {
            // if the file has name vale ..then upload the image
             $image_name = $_FILES['image'['name']];
             $source_path = $_FILES['image'['tmp_name']];
             $destination_path = "./assets/img/".$image;
                // upload img
                $upload = move_uploaded_file($source_path,  $destination_path);
                if ($upload==false) {
                    header('location:'.SITEURL.'admins/');
                    die();
                }

        }
        else{
            //set image name value as blank 
            $image_name ="";
        }


        // If there are no errors, update the product
        if (empty($errors)) {
            // Assuming you have the product ID in $_POST['prod_id']

            // SQL query to update the product
            $sql = "INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_description`, `product_image`, `old_price`, `new_price`, `featured`, `active`) 
                    VALUES (NULL, '$cat_id', '$prod_name', '$prod_desc', '$prod_image', '$old_price', '$new_price', '$featured', '$active');";

            // Execute the query
            $res = mysqli_query($conn, $sql);

            if ($res) {
                // Redirect to a success page
                header('location:'.SITEURL.'admins/');
                exit();
            } else {
                $errors[] = "Update failed. Please contact tech support for assistance.";
            }
        }
    // } else {
    //     $errors[] = "Invalid request method";
    //     print_r($errors);
    
     }
}

//CODE FOR UPDATING PRODUCTS DATA
// Initialize errors array
$errors = array();

// Check if the form is submitted
if (isset($_POST['prod_update'])) {
    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if prod_image is set
        if (!isset($_POST['prod_image'])) {
            $errors[] = "Please select an image for the product";
        } else {
            $prod_image = $_POST['prod_image'];
        }

        // Check if prod_name is set
        if (!isset($_POST['prod_name'])) {
            $errors[] = "Please enter the product name";
        } else {
            $prod_name = $_POST['prod_name'];
        }

        // Check if description is set
        if (!isset($_POST['prod_desc'])) {
            $errors[] = "Please select a product description";
        } else {
            $prod_desc = $_POST['prod_desc'];
        }

        // Check if cat_id is set
        if (!isset($_POST['cat_id'])) {
            $errors[] = "Please select a product category";
        } else {
            $cat_id = $_POST['cat_id'];
        }

        // Check if old price  is set
        if (!isset($_POST['old_price'])) {
            $errors[] = "Please select old price";
        } else {
            $old_price = $_POST['old_price'];
        }

        // Check if cat_id is set
        if (!isset($_POST['new_price'])) {
            $errors[] = "enter new price ";
        } else {
            $new_price = $_POST['new_price'];
        }

        // Check if active and featured are set
        if (!isset($_POST['active']) && !isset($_POST['featured'])) {
            $errors[] = "Please choose if the product is active and/or featured";
        } else {
            $active = $_POST['active'];
            $featured = $_POST['featured']; 
        }

        // If there are no errors, update the product
        if (empty($errors)) {
            // Assuming you have the product ID in $_POST['prod_id']
            $prod_id = $_POST['prod_id'];

            // SQL query to update the product
            $sql = "UPDATE product SET 
                    product_image = '$prod_image',
                    product_description = '$prod_desc',
                    new_price = '$new_price',
                    old_price = '$old_price', 
                    product_name = '$prod_name', 
                    category_id = '$cat_id', 
                    active = '$active', 
                    featured = '$featured' 
                    WHERE product_id = '$prod_id'";

            // Execute the query
            $res = mysqli_query($conn, $sql);

            if ($res) {
                // Redirect to a success page
                header('location:'.SITEURL.'admins/');
                echo "updated";
                exit();
            } else {
                $errors[] = "Update failed. Please contact tech support for assistance.";
            }
        }
    } else {
        $errors[] = "Invalid request method";
    }
}

// If there are errors, handle them here
// You can display errors to the user or log them for debugging
?>
