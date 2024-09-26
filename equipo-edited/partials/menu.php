<?php
    include './config/constants.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>johmsOnlineStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/prod_view_4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <!-- Include Slick CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .social-links {
    background: #000;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}
.social-links a {
    color: #fff;
    margin: 0 10px;
    font-size: 18px;
}
     .carousel, .carousel_prod4 {
            margin: 0 auto;
            width: 100%;
        }
        .carousel .item{
            margin: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            background-color: #fff;
            height: 260px;
        }
        .carousel .discount{
            color: red;
            font-weight: bold;
        }
        .carousel .image{
            position: relative;
            margin-bottom: 10px;
        }
        .carousel .image img{
            max-width: 100%;
            height: 95%;
            border-radius: 5px;
        }
        .carousel .icons{
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .carousel .item:hover .icons {
            opacity: 1;
        }
        .carousel .icons a {
            color: #fff;
            background-color: #000;
            padding: 5px;
            border-radius: 50%;
            text-decoration: none;
        }
        .carousel .content h3 {
            margin: 10px 0;
            font-size: 1.2em;
        }
        .carousel .price, .arousel_prod4 .price {
            font-size: 1em;
        }
        .carousel, .arousel_prod4 .price span{
            text-decoration: line-through;
            color: #888;
        }

        .carousel 
        /* Cart Sidebar */
.cart-sidebar {
    position: fixed;
    right: 0px;
    display: none;
    top: 0;
    width: 500px;
    height: 100%;
    background-color: white;
    box-shadow: -2px 0 5px rgba(0,0,0,0.5);
    padding: 20px;
    /* transform: translateX(100%); */
    transition: right 0.3s ease;
    z-index: 1000;
}

.cart-sidebar h2 {
    margin-top: 0;
}

.cart-sidebar .close-cart {
    background: none;
    border: none;
    font-size: 24px;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}

.cart-sidebar .cart-items {
    margin-top: 20px;
}

/* Cart Button */
#cart-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1001;
}

.btn-add-to-cart{
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1001;
}

/* for product view 4 */
.item {
    position: relative;
    overflow: hidden;
    width: 250px; /* Adjust width as needed */
    margin: 20px;
    transition: transform 0.3s ease;
}

.item:hover {
    transform: scale(1.05); /* Optional: Slightly enlarges the item on hover */
}

.image {
    position: relative;
}

.image img {
    width: 100%;
    height: auto;
    display: block;
    transition: opacity 0.3s ease;
}

.icons {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.item:hover .icons {
    opacity: 1; /* Show the icons when hovering over the item */
}

.content {
    padding: 10px;
    text-align: center;
    background-color: #f8f8f8;
    border-top: 1px solid #ddd;
}

.content h3 {
    font-size: 18px;
    margin: 10px 0;
}

.content .price {
    font-size: 16px;
    color: #333;
}

.content .price span {
    text-decoration: line-through;
    color: #999;
}

.discount {
    top: 10px;
    left: 10px;
    background-color: ;
    color: #fff;
    padding: 5px 10px;
    font-size: 14px;
    font-weight: bold;
    border-radius: 3px;
}

.add-to-cart {
    background-color: #007bff;
    color: #fff;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.add-to-cart:hover {
    background-color: #0056b3;
}

/* .fas.fa-cart {
    font-size: 18px;
    color: #007bff;
    margin-right: 10px;
} */

.fas.fa-cart:hover {
    color: #0056b3;
}

/* ends product view 4  */
  </style>
</head>
  <body>
    <div class="social-links">
    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/johmsonlineboutique/?utm_source=qr&igsh=cHNyNzVrcWxncXFk" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <style>

<?php
    include('./views\header.html')
?>
  