<?php
        require('partials/menu.php');
        require('../models/product_category.php');
        require('../models/product.php');
        

         //   HERE WE SHOW PRODUCTS BY CATEGORY ...ALSO ALLOWING ADMIN TO ADD ANEW PRODUCT
            include 'views/view_products.php';

         //  HERE WE ADD A NEW CATEGORY 
         
            include 'views/add_category.php';
         
         // UPTO HERE  

         // VIEW CATEGORIES HERE

            include 'views/view_categories.php';

         // UPTO HERE 
         
         // HERE WE SHOW FOOTER CONTENT 

            include('partials/footer.php');

         // UPTO HERE 

?>

