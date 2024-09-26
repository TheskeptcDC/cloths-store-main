<style>
/* css for glutys cloths store */
:root {
    --pink: rgb(253, 191, 191);

}

/* for the header */

/* css for body */
body{
    font-family: playfair display;
}

html{
    scroll-behavior: smooth;
    font-size: 62.5%;
    scroll-padding: 6rem;
    overflow-x: hidden;
}
/* css for the header */
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
.header {
    text-align: center;
    padding: 20px;
    background: #f8f9fa;
    position: relative;
    z-index: 2;
}
.header .navbar-nav {
    flex-direction: row;
}
.header .nav-link {
    padding-left: 20px;
    padding-right: 20px;
}
.sticky-navbar {
    position: sticky;
    top: 0;
    z-index: 2;
}
.logo{
    font-weight:bolder;
    font-size: 2rem;
    color: rgb(100, 114, 100);   
}

.logo span{
    color: var(--pink);
}
.navbar .container ul li a:hover{
    color: black;
}
.heading{
    text-align: center;
    color: #333;
    font-size: 4rem;
    padding: 1rem;
    background: rgb(236, 229, 229);
    font-family: playfair display;
}
.heading span{
    color: var(--pink);
}

/* css for icons container */
/*  */
/* css for category */
.latest{
    font-size: 5rem;
}
.latest span{
    font-size: 3rem;
    color: var(--pink);
}
.latest p{
    font-size: small;
    font-style: italic;
}
/* css for the category view in the slider and catalogue  */
/* css for products */
/* css for review section */
.review .box-container{
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
}
.review .box-container .box{
    position: relative;
    flex: 1 1 30rem;
    border-radius: .5rem;
    box-shadow: 0 .5rem 1.5rem gray;
    border: .1rem solid gray;
}
.review .box-container .box .fa-quote-right{
    position: absolute;
    bottom: 3rem; right: 3rem;
    font-size: 6rem;
    color: #eee;
}
.review .box-container .box .user{
    display: flex;
    align-items: center;
    padding-top: 3rem;
}
.review .box-container .box .user img{
    object-fit: cover;
    height: 8rem;
    width: 8rem;
    border-radius: 50%;
    margin-right: 1rem;
}
.review .box-container .box .user h3{
    font-size: 2rem;
    color: #333;
}
.review .box-container .box .user span{
    font-size: 2rem;
    color: var(--pink);
}
.review .box-container .box .stars i{
    font-size: 2rem;
    color: var(--pink);
}
.review .box-container .box p{
    font-size: 1.5rem;
    color: #999;
    line-height: 1.5rem;

}
/* css for contact  */
.contact{
    background-color: 9F8170;
}
.contact .row{
    display: flex;
    flex-wrap: wrap-reverse;
    gap: 1.5rem;
    align-items: center;
    background-color: 9F8170;
}
.contact .row form, .login_form{
    flex: 1 1 40rem;
    padding: 2rem 2.5rem;
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
    border: .1rem solid rgba(0, 0, 0, .1);
    background: #fff;
    border-radius: 5rem;
}
.contact .row form .box{
    padding: 1rem;
    font-size: 1.7rem;
    color: #333;
    text-transform: none;
    border: .1rem solid rgba(0, 0, 0, .1);
    border-radius: 5rem;
    margin: 7rem 0;
    width: 100%;
    background-color: 9F8170;
}
.contact .row form .box:focus{
    border-color: var(--pink);
}
.contact .row form textarea{
    resize: none;
    height: 15rem;
}
.contact .row .image{
    flex: 1 1 40rem;
}
.contact .row .image img{
    width: 100%;
}

/* css for login pages  */
.login{
    font-size: larger;
    
}

/* css for socials */
.socials .icons img{
    object-fit: cover;
    height: 8rem;
    width: 8rem;
    border-radius: 50%;
    margin-right: 1rem;
}
.socials .icons .infor h3{
    font-size: x-large;
}


    </style>
<!-- contact us section starts -->
<section class="contact" id="socials">
    <div class="heading">send us a message on our socials below</div>
    <div class="row">
        <form action="" method="">
            <div class="heading">Email Us</div>
            <input type="text" name="name" placeholder="name" class="box">
            <input type="text" name="email" placeholder="email" class="box">
            <input type="text" name="number" placeholder="number" class="box">
            <textarea name="" id="" cols="30" rows="10" placeholder="message"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>
        <div class="socials">
            <!-- <img src="assets\img\gallery\offers2.png" alt=""> -->
            <div class="icons">
            <img src="assets\img\meta.JPG" alt="">
            <div class="infor">
                <h3><a href="">johmsonlineboutique </a></h3>
                <span>like our facebook page</span>
            </div>
        </div>
        <!-- FOR INSTA -->
        <div class="icons">
            <img src="assets\img\instagram.png" alt="">
            <div class="infor">
                <h3><a href="https://www.instagram.com/johmsonlineboutique/?utm_source=qr&igsh=cHNyNzVrcWxncXFk">ohmsonlineboutique</a></h3>
                <span>follow our insta page</span>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- contact us section ends  -->