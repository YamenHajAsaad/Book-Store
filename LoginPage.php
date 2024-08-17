<?php 
  SESSION_Start();
  ?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Log In Page</title>
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

        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>Log In WebSite</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft animated">
                        <div class="left-content">
                            <h1><span>Book </span>Store</h1>
                            <h3>Log In To The Site To Purchase Products</h3>
                            <div class="contact-info">
                                <p><b>Phone:</b> 1.555.555.5555</p>
                                <p><b>Email:</b> info@yourdomain.com</p>
                            </div>
                            <div class="social-media">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRight animated">
                     <form action="" method="post" class="contact-form">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="Email" class="form-control" name="User_Email" id="User_Email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="Password" class="form-control" name="User_Password" id="User_Password" placeholder="Your Password">
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="submit" class="contact-submit" value="LogIn"/>
                                        <input type="hidden" name="submitted1" value="true"/>
                                        <?php
                                        include('CTD.php');
                                        if(isset($_POST['submitted1']))
                                        {
                                            $User_Email = $_POST['User_Email'];

							                $User_Password = $_POST['User_Password'];
							
							                $selectAdmin ="SELECT admin_email , admin_password FROM admin WHERE admin_email = '$User_Email' and admin_password = '$User_Password'";
                                            $resselectAdmin = @mysqli_query($CTD,$selectAdmin);

							                $quneselectAdmin = mysqli_num_rows($resselectAdmin);

									
							                if($quneselectAdmin == 0){
                                                $queuser="SELECT user_id , user_email , user_password , user_status FROM user WHERE user_email = '$User_Email' and user_password = '$User_Password'";
                                                $resuser = @mysqli_query ($CTD, $queuser);

								                $quneuser = mysqli_num_rows($resuser);
                                                if( $quneuser == 0)
								                {
									                echo "<script language='JavaScript' type='text/JavaScript'>" ;
											        echo "alert('لا يوجد مستخدمين');";
									                echo "</script>" ; 

								                }
                                                else
								                {

									               while ($rowuser = mysqli_fetch_array($resuser, MYSQLI_ASSOC))
                                                   {
                                                    if($rowuser['user_status'] == 0)
                                                    {
                                                        echo "<script language='JavaScript' type='text/JavaScript'>" ;
                                                        echo "alert('this account is blocked');";
                                                        echo "</script>" ; 
                                                    }
                                                    else
                                                    {

                                                    $_SESSION['id'] = $rowuser['user_id']; 
                                                    $_SESSION['Type'] = 'user';
                                                    $_SESSION['Log_in'] ='true';
                                                    
                                                    echo "<script language='JavaScript' type='text/JavaScript'>" ;
                                                    echo "window.location='showBook.php';";
                                                    echo "</script>" ;
                                                   }
                                                 }
                                                }
                                            }
                                            else
                                            {
                                                
                                                $_SESSION['Type'] = 'admin';
                                                $_SESSION['Log_in'] ='true';
                                                echo "<script language='JavaScript' type='text/JavaScript'>" ;
                                                echo "window.location='showBook.php';";
                                                echo "</script>" ; 
                                            }
                
                                                
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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