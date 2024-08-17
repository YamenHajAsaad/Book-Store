<?php 
  SESSION_Start();
  ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Show Book </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="css/style.css">
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


                <?php 
                include('layouts/nav.php');  
                ?> 

                </div>
            </nav>
        </header>

        <section class="best-seller-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>Books you have purchased</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    include('CTD.php');
                    $id = $_SESSION['id'];
                    $query ="SELECT book.book_id, book.book_name, book.book_image, book.book_descrption, book.book_pdf, book.book_price ,
                     book.departement_id, book.writers_id , orderbook.orderbook_id ,orderbook.user_id ,  detailsorder.order_id 
                     , detailsorder.book_id 
                       FROM book inner join detailsorder on  book.book_id = detailsorder.book_id inner join  orderbook on orderbook.orderbook_id = detailsorder.order_id 
                       where orderbook.user_id = '$id'";
                    $result = mysqli_query ($CTD, $query); 
                    $num = mysqli_num_rows($result);
                    if($num > 0)
                    {   
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                            $book_id = $row['book_id'];
                            $book_name = $row['book_name'];	
                            $book_image = $row['book_image'];
                            $book_price = $row['book_price'];
                            ?>
                            <div class="col-md-3 col-sm-6 wow fadeInDown animated">
                                <div class="product-item">
                                    <img src="images/book/<?php echo $book_image;?>" class="img-responsive" style="width: 300px; height: 500px" alt="">
                                    <div class="product-hover">
                                        <div class="product-meta">  
                                            <a href="singleBook.php?book_id=<?php echo $book_id; ?>"><i class="pe-7s-cart"></i><?php echo $book_price; ?></a> 
                                        </div>
                                    </div>
                                    <div class="product-title"> 
                                                    <a href="singleBook.php?book_id=<?php echo $book_id; ?>"> 
                                            <h3><?php echo $book_name; ?></h3>
                                        </a>
                                    </div>
                                </div>                    
                            </div>
                            <?php              
                        }
                    }
                    else
                    {
                        echo"<br><div class='text-center'><h2 style='Color:Red'>There Is No book inserted in your saved</h2><div>";
                    }
                    ?>    
                </div>
            </div>
        </section>
        <div class="row">
            <div class="container">
                <div class="col-md-12 text-center">
                        <h1>for logout : </h1>
                        <a href="logout.php"><button type="button" class="btn btn-danger">logout</button></a>                     
                </div> 
            </div>
        </div>