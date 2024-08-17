<?php 
  SESSION_Start();
  if((isset($_SESSION['Type']))&&($_SESSION['Type'] == 'admin')){
  ?>
  <!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>insert</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.png">

        <link rel="stylesheet" href="css/style.css">

      
    </head>
    <body>

        <header class="header-section">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><b>Book </b> Store</a>
                    </div>

                    
                <?php 
                include('layouts/nav.php');  
                ?> 
            
                </div>
            
            </nav>
        </header>
        <section class="slider-section">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators slider-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="images/slider.jpg" width="1648" height="400" style="height:800px" alt="">
                         <div class="carousel-caption">
                           <h2>insert a new item in library :</h2>
                          <div class="row">
                            <div class="col-sm-12">   
                             <div class="col-md-4">
                                <a href="insertdeprtment.php"> <button type="button" class="btn btn-primary btn-lg">insert deprtment</button> </a>
                              </div>  
                              <div class="col-md-4"> 
                                <a href="insertwriters.php"> <button type="button" class="btn btn-primary btn-lg">insert writers</button> </a>
                              </div> 
                              <div class="col-md-4"> 
                                <a href="insertbook.php"> <button type="button" class="btn btn-primary btn-lg">insert book</button> </a>
                              </div>                              
                            </div>    
                         </div>
                    </div>
                  
                </div>

                <!-- Controls -->
              
            </div>
        </section>

    

      
        <!-- JQUERY -->
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
<?php
  }
  else 
  {
  ?>
  <script>
    window.history.back();
  </script>
  <?php
  }
  ?>
       