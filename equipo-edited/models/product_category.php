<?php

class product_category{
    //public $cat_id;
    
    function selectAll($conn){
        $sql = "SELECT * FROM product_category";
        $get_cat_res = mysqli_query($conn,$sql);
        return $get_cat_res;
    }
    //to select featured and active categories 
    function select_active_featured(){
        $sql = "SELECT * FROM product_category WHERE active = 'yes' AND featured = 'yes' ";
        return $sql;
    }
    //to sectect active featured cats withe the conn parameter 
    function active_featured($conn){
        $sql = "SELECT * FROM product_category WHERE active = 'yes' AND featured = 'yes' ";
        $get_cat_res = mysqli_query($conn,$sql);
        return $get_cat_res;
    }

     //to select active  categories only
     function select_active(){
        $sql = "SELECT * FROM product_category WHERE active = 'yes'";
        return $sql;
    }

    //to search for categories
    function search_category($look){
        // $sql = "SELECT * FROM product_category WHERE active = 'yes' AND featured = 'yes' ";
        $sql = "SELECT * FROM product_category WHERE active = 'yes' AND category_name LIKE '%$look%' OR category_description LIKE '%$look%'  ";
        return $sql;
    }

   // To display the category
 

    // Function for getting the category ID based on the result object
    function displayCategory($res) {
        if ($res && mysqli_num_rows($res) > 0) {
            $categories = "";
            while ($rows = mysqli_fetch_assoc($res)) {
                $id = htmlspecialchars($rows['category_id']);
                $p_cat = htmlspecialchars($rows['category_name']);
                $promo_text = htmlspecialchars($rows['category_prom_text']);
                $cat_desc = htmlspecialchars($rows['category_description']);
                $categories = "<h1 class='latest'>{$id}<span>{$promo_text}</span></h1><div class='box-container'>";
            }
            return $categories;
        } else {
            return [];
        }
    }

    // Function for getting the category data based on the result object
    function displayCategoryData($res) {
        if ($res && mysqli_num_rows($res) > 0) {
            $categories = array(); 
    
            while ($rows = mysqli_fetch_assoc($res)) {
                $category = array(
                    'id' => htmlspecialchars($rows['category_id']),
                    'name' => htmlspecialchars($rows['category_name']),
                    'promo_text' => htmlspecialchars($rows['category_prom_text']),
                    'description' => htmlspecialchars($rows['category_description'])
                );
                
                $categories[] = $category;
            }
            
            return $categories;
        } else {
            return [];
        }
    }
    

    //FUNCTIONS USED BY THE ADMIN 
    function add($conn, $data) {
        
        $cat_name = $data['name'];
        $promo_text = $data['promo_text'];
        $featured = $data['featured'];
        $active = $data['active'];
        
        
        $sql = "INSERT INTO `product_category` (`category_name`,`category_prom_text`, `featured`, `active`) 
                VALUES ('$cat_name','$promo_text', '$featured', '$active')";
        
        
        if (mysqli_query($conn, $sql)) {
            echo "Category added successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }


    function delete($conn, $id) {
        try {
            $sql = "DELETE FROM `product_category` WHERE category_id = $id";
            $isDeleted = mysqli_query($conn, $sql);
    
            if ($isDeleted) {
                if (mysqli_affected_rows($conn) > 0) {
                    return true;
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
// function to update the categories 
    function update($conn, $data) {
        // Extract data from the associative array
        $cat_name = $data['name'];
        $cat_id = $data['id'];
        $active = $data['active'];
        $featured = $data['featured'];
        $promo_text = $data['promo_text'];
    
        // Create the SQL update query
        $sql = "UPDATE `product_category` SET 
        `category_name` = '$cat_name',
        `active` = '$active',
        `featured` = '$featured',
         `category_description` = '',
          `category_prom_text` = '$promo_text'
           WHERE `product_category`.`category_id` = $cat_id";
    
        // Execute the query
        $res = mysqli_query($conn, $sql);
    
        // Check if the query was successful and return true or false
        if ($res && mysqli_affected_rows($conn) > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}


?>

