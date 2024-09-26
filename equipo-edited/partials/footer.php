<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
        .footer {
            /* background: #f8f9fa; */
            padding: 40px 0;
            background-color: 9F8170;
        }
        .footer .heading {
            font-size: 2rem;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        /* for privacy and learn more  */
        .contents {
      display: none;
      margin-top: 10px;
       }
  
        .footer .btn {
            margin-top: 10px;
        }
        .footer .video-container {
            text-align: center;
        }
        .footer .video-container video {
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
        }
        .footer .icons {
            text-align: center;
            margin-bottom: 20px;
        }
        .footer .icons img {
            width: 80px;
            margin-bottom: 10px;
        }
        .footer .icons h3 {
            font-size: 1.2rem;
        }
    </style>

<footer class="footer">
    
    <!-- Footer Start-->
    <section class="about" id="about">
                <h1 class="heading text-center">
                    <span>About</span> Us
                </h1>
                <div class="row">
                    <div class="col-md-6 video-container">
                        <video loop autoplay controls muted>
                            <source src="assets/img/Kotlin_Course_-_Tutorial_for_Beginners(720p).mp4" type="video/mp4">
                        </video>
                        <h3>BEST CLOTHS STORE</h3>
                    </div>
                    <div class="col-md-6 content">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto recusandae sit nam vitae beatae enim, cumque saepe repellendus nihil aliquid voluptatibus deserunt repudiandae, nesciunt dolor delectus ratione impedit nostrum nemo.</p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut libero facere blanditiis. Dignissimos perferendis et hic quod unde ipsa, est dolorum, quo blanditiis incidunt quas cumque perspiciatis facere. Maiores, ad.</p>
                        
                        <button class="btn btn-primary" id="learnMoreBtn" >Learn More</button>
                        <div class="learn contents">
                            lor
                        </div>
                        <a class="btn btn-success" href="views/privacy.html">Privacy Policy</a>
                        <div class="privacy contents">
                        JOHM's PRIVACY POLICY.
                        </div>
                    </div>
    
            </section>
            <section class="icon-container mt-5">
                <div class="row">
                    <div class="col-md-3 icons">
                        <img src="assets/img/post/post_9.png" alt="Free Delivery">
                        <div class="info">
                            <h3>Free Delivery</h3>
                            <span>on all orders</span>
                        </div>
                    </div>
                    <div class="col-md-3 icons">
                        <img src="assets/img/post/post_8.png" alt="10 Days Return">
                        <div class="info">
                            <h3>10 Days Return</h3>
                            <span>money back guarantee</span>
                        </div>
                    </div>
                    <div class="col-md-3 icons">
                        <img src="assets/img/mtn.png" alt="Secure Shopping">
                        <div class="info">
                            <h3>Secure Shopping</h3>
                            <span>+260 968 515 719</span>
                        </div>
                    </div>
                    <div class="col-md-3 icons">
                        <img src="assets/img/airtel.png" alt="Secure Shopping">
                        <div class="info">
                            <h3>Secure Shopping</h3>
                            <span>+260 978 409 582</span>
                        </div>
                    </div>
    </div>
    </div>

    <!-- customer reviews  -->
     <?php
        include './partials/review.php';
        
     ?>
     <!-- our contacts  -->
      <?php
        include './partials/contact.php';
      ?>

</footer>
    
    <!-- footer ends -->
</body>
</html>
<script type="text/javascript" src="./js/forCart.js"></script>
<script type="text/javascript" src="./js/search.js"></script>
<script type="text/javascript" src="./js/cart.js"></script>
<script src="./js/cart.js"></script>
<body>
    <?php
        include './js/clicks.js';
    ?>