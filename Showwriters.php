
<?php 
  SESSION_Start();
  ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Show Author </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.png">

        <link rel="stylesheet" href="css/style.css">


    </head>
    <body>

        <header class="header-section">
            <nav class="navbar navbar-default">
                <div class="container">
                   
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><b>Book </b> Store</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                <?php 
                include('layouts/nav.php');  
                ?>
                 <!-- /.navbar-collapse -->
                </div><!-- /.container -->
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
                            <h2>We have the latest books available</h2>
                           
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/slider1.jpg" width="1648" height="400" style="height:800px" alt="">
                        <div class="carousel-caption">
                            <h2>E-books can be purchased</h2>
                        </div>
                    </div>
                    <div class="item ">
                        <img src="images/slider2.jpg" width="1648" height="400" style="height:800px" alt="">
                        <div class="carousel-caption">
                            <h2>All books for any book can be seen in the book section</h2>
                          
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="pe-7s-angle-left glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="pe-7s-angle-right glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </section>

        <section class="best-seller-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>Show Writers</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    include('CTD.php');
                    $query = "SELECT `writers_id`, `writers_name`, `writers_image`, `writers_descrption` FROM `writers`";
                    $result = mysqli_query($CTD,$query);
                    $num = mysqli_num_rows($result);
                    if( $num > 0)
                    {
                        $i = 0.2;
                        while($row = mysqli_fetch_array($result , MYSQLI_ASSOC))
                        {
                            $writers_id = $row['writers_id'];
                            $writers_name = $row['writers_name'];
                            $writers_image = $row['writers_image'];
                            $writers_descrption = $row['writers_descrption'];
                            ?>
                            <div class="col-md-6 col-sm-6 wow fadeInDown animated" data-wow-delay="<?php echo $i;?>s">
                                <div class="product-item">
                                    <img src="images/writers/<?php echo $writers_image; ?>" class="img-responsive" style="width: 600px; height: 500px" alt="">
                                    <div class="product-title">
                                        <a href="booksinwriter.php?writers_id=<?php echo $writers_id; ?>">
                                            <h3 ><?php echo $writers_name; ?></h3>
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center" style="margin-top:10px">
                                    <a href="booksinwriter.php?writers_id=<?php echo $writers_id; ?>" type="button" class="btn btn-success" style="padding:5px">show books in this Writers</a>
                                    <?php
                                    if((isset($_SESSION['Type']))&&($_SESSION['Type'] == 'admin'))
                                    {
                                        ?>
                                        <a href="updatewriter.php?writers_id=<?php echo $writers_id; ?>" type="button" class="btn btn-info">Updete</a>  
                                        <a href="deletewriter.php?writers_id=<?php echo $writers_id; ?>" type="button" class="btn btn-danger">Delete</a>
                                        <?php
                                    }
                                    ?>    
                                </div>
                            </div>
                            <?php
                            $i+=0.2;
                        }

                    }   
                    else
                    {
                        echo"<br><div class='text-center'><h2 style='Color:Red'>There Is No writers inserted</h2><div>";
                    }
                    ?>     
                </div>
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
