<?php
class product{

    var $categoryId;
function getGetAccessories(){
    $sql = "SELECT * FROM product WHERE isAccessory = 'yes'";
    return $sql;
    
}
    // select a produc tby id 
function selectProductById($id){
    $get_prod = "SELECT * FROM product WHERE product_id = $id";
    return $get_prod;
}

////to select from a particular category with the conn param
function selectFromCategory($conn, $cat_id){
    $get_prod = "SELECT * FROM product WHERE category_id = $cat_id AND active = 'yes'";
    $get_prod_res = mysqli_query($conn, $get_prod);
    return $get_prod_res;
}


//to select from a products ..from any category
function selectActiveProduct(){
    $get_prod = "SELECT * FROM product WHERE active = 'yes'";
    return $get_prod;
}


//to select from a particular category
function selectFromFeatured(){
    $get_prod = "SELECT * FROM product";
    return $get_prod;
}

//to add a product to the db
function add($conn, $data) {
    // Prepare the images array as a JSON string
    $images = json_encode($data['images']);
    
    $cat_id = $data['cat_id'];
    $prod_name = $data['name'];
    $prod_desc = $data['description'];
    $old_price = $data['old_price'];
    $new_price = $data['new_price'];
    $featured = $data['featured'];
    $active = $data['active'];

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_description`, `product_images`, `old_price`, `new_price`, `featured`, `active`)
            VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    
    // Bind parameters to the placeholders
    $stmt->bind_param('isssssss', $cat_id, $prod_name, $prod_desc, $images, $old_price, $new_price, $featured, $active);
    
    // Execute the statement
    $isAdded = $stmt->execute();
    
    if ($isAdded) {
        return true;
    } else {
        return false;
    }
}


//to delete a product from the database and a particular cartegory 
function delete($conn, $id) {
    try {
        // Retrieve product details, including images
        $sql = "SELECT product_images FROM `product` WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $images = json_decode($product['product_images'], true);

            // Delete each image from the folder
            if (is_array($images)) {
                foreach ($images as $image) {
                    $file_path = 'C:/xampp/htdocs/johms/cloths-store/equipo-edited/assets/products/' . $image;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }

            // Delete the product from the database
            $sql = "DELETE FROM `product` WHERE product_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $isDeleted = $stmt->execute();

            if ($isDeleted) {
                if ($stmt->affected_rows > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } catch (mysqli_sql_exception $e) {
        // Handle foreign key constraint error
        if ($e->getCode() == 1451) {
            // Error code for foreign key constraint failure
            error_log("Cannot delete or update a parent row: a foreign key constraint fails");
            return false;
        } else {
            // Other SQL errors
            error_log("MySQL error: " . $e->getMessage());
            return false;
        }
    }
}


//to return the number of products in a aprticular category.. by giving the mysql res 
function productCount($productArray){

        
    if ($productArray) {
        $count = mysqli_num_rows($productArray);
        return $count;
    }else {
    //return false then an error occured in the query or something 
    return 0;
    }

}


function getData($conn, $id) {
    $sql = "SELECT * FROM product WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
    return $product;
}

}
?>