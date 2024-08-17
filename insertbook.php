<?php 
  SESSION_Start();
  if((isset($_SESSION['Type']))&&($_SESSION['Type'] == 'admin'))
  {
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

            <section class="contact-section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="titie-section wow fadeInDown animated ">
                                <h1>insert a new Book : </h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    
                            <div class="col-md-12 wow fadeInRight animated">
                                <form id="contact-form" enctype="multipart/form-data" method="post" class="contact-form">
                                
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label for="book_name" class="form-label">book name :</label>
                                                    <input type="text" class="form-control" name="book_name" id="book_name" placeholder="whats the Book name ?" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                            
                                                <label for="image_book" class="form-label">book photo :</label>
                                                <input class="form-control" accept=".jpg, .jpeg, .png, .gif, .pdf" type="file" name="image_book" id="image_book" multiple required>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label for="book_description" class="form-label">book descrption :</label>
                                                    <input type="text" class="form-control" name="book_description" id="book_description" placeholder="descrption of your book" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                <label for="book_pdf" class="form-label">book pdf :</label>
                                                <input class="form-control" accept=".jpg, .jpeg, .png, .gif, .pdf" type="file" name="book_pdf" id="book_pdf" multiple required>
                                            
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="row">
                                        <div class="col-md-4">
                                            <label for="book_price">price ?</label>    
                                            <input type="text" class="form-control" name="book_price" id="book_price" placeholder="like : 50000 sp" style= "background:bottom"required> 
                                        </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <label for="dep_book">select type book  :</label>
                                                    <select name="dep_book" class="form-select" aria-label="Default select example">
                                                    
                                                        <?php
                                                        include('CTD.php');
                                                        $query = "SELECT `departement_id`, `departement_name` FROM `departement`";
                                                        $result = mysqli_query ($CTD,$query); 
                                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                                        {
                                                            $departement_id = $row['departement_id'];
                                                            $departement_name = $row['departement_name'];
                                                    
                                                        
                                                        ?>
                                                        
                                                            <option value="<?php echo $departement_id;?>"><?php echo $departement_name ; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="input-group">
                                                    <label for="writers_book">select writers :</label>
                                                    
                                                    <select name="writers_book" class="form-select" aria-label="Default select example">
                                                    
                                                        <?php
                                                        
                                                        $query = "SELECT `writers_id`, `writers_name` FROM `writers`";
                                                        $result = mysqli_query ($CTD,$query); 
                                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                                        {
                                                            $writers_id = $row['writers_id'];
                                                            $writers_name = $row['writers_name'];
                                                    
                                                        
                                                        ?>                
                                                            <option value="<?php echo $writers_id;?>"><?php echo $writers_name ; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>    
                                                </div>
                                            </div>
                                           
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="text-center">
                                                       <input type="submit" class="contact-submit" value="send to DB" />
                                                    </div>   
                                                </div>
                                                <input type="hidden" name="submitted" value="true"/>
                                            <?php
                                            if(isset($_POST['submitted']))
                                            { 
                                                $bookname = $_POST['book_name'];

                                                //image
                                                $image = $_FILES['image_book'];
                                                $image_name = strtolower($_FILES['image_book']['name']);
                                                $image_type = $_FILES['image_book']['type'];
                                                $image_tmp_name = $_FILES['image_book']['tmp_name'];
                                                $image_size = $_FILES['image_book']['size'];
                                                $allowed_extensionsimg = array('jpg','git','jpeg','png');
                                                $image_ex = explode('.', $image_name);
                                                $image_extension=strtolower(end($image_ex));
                                                //image
                                                $bookdescription = $_POST['book_description'];

                                                //pdf
                                                $book_pdf = $_FILES['book_pdf'];
                                                $book_name = strtolower($_FILES['book_pdf']['name']);
                                                $book_tmp_name = $_FILES['book_pdf']['tmp_name'];
                                                
                                                $depbook = $_POST['dep_book'];

                                                $writers_book = $_POST['writers_book'];

                                                $bookprice = $_POST['book_price'];

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
                                                    move_uploaded_file($image_tmp_name , $_SERVER['DOCUMENT_ROOT'].'\\bookstore\\images\\book\\' . $image_name);
                                                    move_uploaded_file($book_tmp_name  , $_SERVER['DOCUMENT_ROOT'].'\\bookstore\\images\\pdf\\' . $book_name);
                                                    
                                                    include('CTD.php');
                                                    $query = "INSERT INTO `book`(`book_name`, `book_image`, `book_descrption`, `book_pdf`, `book_price`, `departement_id`, `writers_id`) 
                                                                         VALUES ('$bookname','$image_name','$bookdescription','$book_name','$bookprice','$depbook','$writers_book')";    
                                                    $results= @mysqli_query ($CTD,$query);	
                                                    if($results == 1)
                                                    {
                                                    
                                                        ?>
                                                        <script language='JavaScript' type='text/JavaScript'>
                                                            
                                                            alert('add a new book is succsus');
                                                            window.location='ShowBook.php';

                                                        </script>

                                                        <?php

                                                    }
                                                }
                                                else
                                                {
                                                    foreach($errors as $error)
                                                    {
                        
                                                        echo  $error;
                                            
                                                    }
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
       