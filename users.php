<?php 
  SESSION_Start();
  if((isset($_SESSION['Type']))&&($_SESSION['Type'] == 'admin')){
  ?>
    <!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>insert Book</title>
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
        <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>this is user : </h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">status</th>
                                </tr>
                            </thead>
                            <?php
                            include('CTD.php');
                            $query = "SELECT * FROM `user`";
                            $result = @mysqli_query ($CTD,$query);

                            $quneste = mysqli_num_rows($result);
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                            {
                                    $user_id = $row['user_id'];
                                    $user_name = $row['user_name'];
                                    $user_email = $row['user_email'];
                                    $user_phone = $row['user_phone'];
                                    $user_status = $row['user_status']; 
                                ?>

                                <tbody>
                                    <tr>
                                        <th scope="row"><?php echo $user_name ?></th>
                                        <td><?php echo $user_email ?></td>
                                        <td><?php echo $user_phone ?></td>
                                    <?php
                                    if($user_status == 1)
                                    {
                                        ?>
                                        <td><a href="blockuser.php?user_id=<?php echo $user_id ; ?>"><button type="button" class="btn btn-danger btn-sm">block</button></a></td>
                                    
                                    <?php
                                    }
                                    else
                                    {

                                    ?>
                                        <td><a href="unblockuser.php?user_id=<?php echo $user_id ; ?>"><button type="button" class="btn btn-primary btn-sm">un block</button></a></td>
                                    <?php
                                    }
                                    ?>
                                    </tr>
                                
                                </tbody>
                                <?php
                                }
                                ?>
                        </table>
                    </div>    
                </div>    
                <div class="row">
                    <div class="container">
                            <div class="col-md-12 text-center">
                                    <h1>for logout : </h1>
                                    <a href="logout.php"><button type="button" class="btn btn-danger">logout</button></a>                     
                            </div> 
                    </div>
                </div>
        </div>        
                



        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/custom.js"></script> 
  </body>    

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