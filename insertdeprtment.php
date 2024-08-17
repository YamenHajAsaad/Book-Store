<?php 
  SESSION_Start();
  if((isset($_SESSION['Type']))&&($_SESSION['Type'] == 'admin')){
  ?>
  <!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>insert deprtment</title>
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

        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>insert a new department</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                
                        <div class="col-md-12 wow fadeInRight animated">
                            <form id="contact-form" enctype="multipart/form-data" method="post" class="contact-form">
                            
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="dep_name" id="dep_name" placeholder="whats the department name ?" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                            <label for="image_dep">depertment photo : </label>
                                            <input accept=".jpg, .jpeg, .png, .gif, .pdf" type="file" name="image_dep" id="image_dep" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control"  name="dep_description" id="dep_description" placeholder="descrption of your department" required>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group text-center">
                                                <input type="submit" class="contact-submit" value="send to DB"/>
                                            </div>
                                            <input type="hidden" name="submitted" value="true"/>
                                            <?php
                                            if(isset($_POST['submitted']))
                                            {
                                             include('CTD.php');
                                             $depname = $_POST['dep_name']; 
                                             $dep_desc = $_POST['dep_description'];

                                             $image = $_FILES['image_dep'];
                                             $image_name = strtolower($_FILES['image_dep']['name']);
                                             $image_type = $_FILES['image_dep']['type'];
                                             $image_tmp_name = $_FILES['image_dep']['tmp_name'];
                                             $image_size = $_FILES['image_dep']['size'];
                                             $allowed_extensionsimg = array('jpg','git','jpeg','png');
                                             $image_ex = explode('.', $image_name);
                                             $image_extension = strtolower(end($image_ex));
                                             $errors = array();

                                                if($image_size > 11000000)
                                                {
                                                $errors [] = '<br><div class="text-center" ><h3 style="font-size: 26px;color: red;">Please, the image size must be less than 800 KB </h3><div>';
                                                }
                                                if(! in_array($image_extension,$allowed_extensionsimg))
                                                {
                                                $errors [] = '<br><div class="text-center" ><h3 style="font-size: 26px;color: red;">Please, choose an image only: (jpg ,gif ,jpeg ,png)</h3></div>';
                                                }
                                                if(empty($errors))
                                                {
                                                    move_uploaded_file($image_tmp_name , $_SERVER['DOCUMENT_ROOT'].'\\bookstore\\images\\department\\' . $image_name);
                                                    
                                                    $query ="INSERT INTO `departement`(`departement_name`, `departement_image`, `departement_descrption`) VALUES ('$depname','$image_name','$dep_desc')"; 
                                                    
                                                    $result = @mysqli_query ($CTD,$query);
                                                    
                                                 if($result == 1)
                                                 { 

                                                    ?>
                                                    <script language='JavaScript' type='text/JavaScript'>
                                                      alert('insert a new department has success');
                      
                                                    </script>
                                                    <?php
                                                 }
                                                    else
                                                    {
                                                        foreach($errors as $error)
                                                        {
                                  
                                                            echo  $error;

                                                        }
                                                    }
                                                }
                                                else
                                            
                                                
                                                    foreach($errors as $error)
                                                {
                              
                                                        echo  $error;

                                                }

                                            }
                                                    ?>
    

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
       