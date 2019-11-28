<?php
  include("includes/db.php");
  include("functions/functions.php");
 ?>

 <?php

 if(!isset($_GET['$pro_id'])){ //if the product active is id, then do this:
   $pro_id=$_GET['pro_id'];
   $get_product="select * from products where product_id='$pro_id' "; //only get the productthat is clicked with the unique id
   $run_product=mysqli_query($con,$get_product);
   $row_product=mysqli_fetch_array($run_product);
   $p_cat_id=$row_product['sub_cat_id'];
   $p_title=$row_product['product_title'];
   $p_price=$row_product['product_price'];
   $p_desc=$row_product['product_desc'];
   $p_img1=$row_product['product_img1'];
   $p_img2=$row_product['product_img2'];
   $p_img3=$row_product['product_img3'];
   $get_p_cat="select * from sub_category where sub_cat_id='$p_cat_id'";
   $run_p_cat=mysqli_query($con,$get_p_cat);
   $row_p_cat=mysqli_fetch_array($run_p_cat);
   $p_cat_id=$row_p_cat['sub_cat_id'];
   $p_cat_title=$row_p_cat['sub_cat_title'];
 }
  ?>

<!DOCTYPE html>
<html>
<head>
  <title>My Store</title>

        <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <!--Font-Awesome CDN-->

      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <link rel="stylesheet" type="text/css" href="style/style.css"/>

      <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
</head>
<html>

<body>
  <div id="top" >                                         <!--Top Bar Start-->
    <div class="container">                               <!--Container Start-->
      <div class="col-md-6 offer">                        <!--col-md-6 Start-->
        <a href="shop.php" class="btn btn-success btn-sm" >
          Welcome Guest
        </a> <!--using bootstrap's btn and btn-success class and making the button small with btn-sm class-->
        <!--Bootstrap classes- https://www.w3schools.com/bootstrap/bootstrap_ref_all_classes.asp-->

        <a href="#" id="topGuest">Shopping Cart Total Price: CAD <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
      </div><!--col-md-6 End-->

      <div class="col-md-6"><!---->
        <ul class="menu">
          <li>
            <a href="register.php">Register Here</a>

          <li>
            <a href="cart.php">Go to Cart</a>
          <li>
            <a href="login.php">Login</a>
      </div>

    </div><!--Container End-->
  </div><!--Top Bar End-->


  <div class="navbar navbar-default" id="navbar"> <!--navbar Start-->
    <div class="container"> <!--navbar container start-->
      <div class="navbar-header"> <!--navbar header start-->
        <a class="navbar-brand home" href="index.php">
          <img src="images/logo.jpg" alt="logo" class="hidden-xs"> <!--hidden xs hides the logo when screen is extra small-->
          <img src="images/logoShort.jpg" alt="logo" class="visible-xs">
        </a>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
          <span class="sr-only">Toggle Navigation</span>
          <i class="fa fa-align-justify"></i> <!--Icon taken and copy pasted from https://fontawesome.com/icons/align-justify?style=solid-->
        </button>

        <button class="navbar-toggle" type="button" data-toggle="navbar-toggle" data-target="#search">
          <span class="sr-only">Toggle Navigation</span>
          <i class="fas fa-search"></i><!--Icon taken and copy pasted from https://fontawesome.com/icons/search?style=solid-->
        </button>
      </div><!--navbar header end-->

      <div class="navbar-collapse collapse" id="navigation"> <!--navbar collapse start--> <!--bootstrap nav classes= https://getbootstrap.com/docs/4.3/components/navbar/-->
        <div class="padding-nav"> <!--padding nav start-->
          <ul class="nav navbar-nav navbar-left" id="ulnav">
            <li >
              <a href="index.php">Home</a>
            </li>
            <li class="active">
              <a href="shop.php">Shop</a>
            </li>
            <li>
              <a href="contactus.php">Contact Us</a>
            </li>

          </ul>
        </div><!--padding nav end-->
        <a href="cart.php" class="btn btn-primary navbar-btn right" id="cartbtn"> <!--bootstrap default button class-->
          <i class="fa fa-shopping-cart"></i>
          <span> <?php item(); ?> items in cart </span>
        </a>


      </div> <!--navbar collapse end-->
    </div> <!--navbar container end-->

  </div><!--navbar default end-->

  <div id="content">
    <div  class="container">
      <div class="col-md-12"><!--colmd12 start-->

        <div class="col-md-3"><!--colmd3 start-->
          <?php
            include("includes/sidebar.php");
           ?>
         </div><!--colmd3 end-->

         <div class="col-md-9">
           <div class="row" id="productmain">
             <div class="col-sm-6">
               <div id="mainimage">
                 <div class="carousel slide" id="mycarousel" data-ride="carousel">
                   <ol class="carousel-indicators">
                     <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                     <li data-target="#mycarousel" data-slide-to="1"></li>
                     <li data-target="#mycarousel" data-slide-to="2"></li>
                   </ol>
                   <div class="carousel-inner"><!--carousel inner start-->
                     <div class="item active">
                       <center>
                         <img src="Jastej_Admin/product_images/<?php echo $p_img1 ?>" class="img-responsive">
                       </center>
                     </div><!--item active div end-->

                     <div class="item">
                       <center>
                         <img src="Jastej_Admin/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                       </center>
                     </div><!--item div end-->

                     <div class="item">
                       <center>
                         <img src="Jastej_Admin/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                       </center>
                     </div><!--item div end-->



                   </div><!--carousel inner end-->
                     <a class="left carousel-control" href="#myCarousel" data-slide="prev"><!--for turning slider left and right-->
                       <span class="glyphicon glyphicon-chevron-left"></span>
                       <span class="sr-only">Previous</span>
                     </a>
                     <a class="right carousel-control" href="#myCarousel" data-slide="next">
                       <span class="glyphicon glyphicon-chevron-right"></span>
                       <span class="sr-only">Next</span>
                     </a>

                 </div><!--carousel slid eend-->
               </div><!--mainimage end-->
             </div><!--colsm6 end-->

             <div class="col-sm-6">
               <div class="box">
                 <h1 class="text-center"><?php echo $p_title ?></h1>
                 <?php
                 addCart();
                  ?>
                 <form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
                   <div class="form-group"><!--form group start-->
                     <label class="col-md-5 control-label">Product Quantity</label>
                     <div class="col-md-7">
                       <select name="product_qty" class="form-control">
                         <option>1<option>
                         <option>2<option>
                         <option>3<option>
                         <option>4<option>
                         <option>5<option>
                       </select>
                     </div><!--col-md-7-->
                   </div><!--form group end-->

                   <div class="form-group"><!--form group start-->
                     <label class="col-md-5 control-label">Product Size</label>
                     <div class="col-md-7">
                       <select name="product_size" class="form-control">
                         <option>Select a Size<option>
                         <option>907 Grams<option>
                         <option>2.2 Kgs<option>
                         <option>4.5 Kgs<option>
                       </select>
                     </div><!--colmd7 end-->
                   </div><!--form group end-->

                   <center><p class="price">CAD  <?php echo $p_price  ?></p></center>
                   <p class="text-center buttons">
                   <button class="btn btn-custom-cart" type="submit">
                      <i class="fa fa-shopping-cart"></i>Add to Cart
                   </button>

                 </form><!--Form end -->
               </div><!--box end-->


               <div class="col-xs-4"><!--smaller related imgaes of product in view details-->
                 <a href="#">
                   <img src="Jastej_Admin/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                 </a>
               </div><!--colxs4 end-->

               <div class="col-xs-4"><!--smaller related imgaes of product in view details-->
                 <a href="#">
                   <img src="Jastej_Admin/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                 </a>
               </div><!--colxs4 end-->

             </div><!--colsm6 end-->
           </div><!--productmain end-->

           <div class="box" id="details">
             <h4>Product Details</h4>
               <p><?php echo $p_desc ?></p>

           </div>
         </div><!--colmd9 end-->
       </div><!--colmd12 end-->
    </div><!--container end-->
 </div><!--content end-->





<!--Footer start-->
<?php
include("includes/footer.php");
?>
<!--Footer end-->



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
