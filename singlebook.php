<?php 
  SESSION_Start();
  if((isset($_SESSION['Type']))&&($_SESSION['Type'] == 'user')){
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
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titie-section wow fadeInDown animated ">
                    <h1>Show single book</h1>
                </div>
            </div>
        </div>
        <?php
            include('CTD.php');
            $book_id = $_REQUEST['book_id'];
            $query ="SELECT book.book_id, book.book_name, book.book_image,book.book_descrption, book.book_pdf,
             book.book_price,book.departement_id, book.writers_id ,departement.departement_id,
             departement.departement_name ,writers.writers_id , writers.writers_name 
             FROM book inner join departement 
             on book.departement_id = departement.departement_id 
             inner join writers 
             on book.writers_id = writers.writers_id
            WHERE book.book_id = '$book_id'";
            $result = mysqli_query($CTD,$query);
            $num = mysqli_num_rows($result);
            if($num > 0)
            {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                    $book_name = $row['book_name'];
                    $book_image = $row['book_image'];	
                    $book_descrption = $row['book_descrption'];
                    $book_pdf = $row['book_pdf'];
                    $book_price = $row['book_price'];
                    $departement_name = $row['departement_name'];
                    $writers_name = $row['writers_name'];
        ?>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="product-item">
                            <img src="images/book/<?php echo $book_image;?>" class="img-responsive" style="width: 800px; height: 800px" alt="">
                        </div>
                        </div>   
                        <div class="col-md-6 text-center" style="margin-top: 60px">
                            <h1 style="font-size: xx-large">informtion in This Book</h1>
                            <strong><h2>Book name : </h2></strong><p style="font-size: x-large;"><?php echo $book_name; ?></p>
                            <strong><h2>Book descrption : </h2></strong><p style="font-size: x-large;"><?php echo $book_descrption; ?></p>
                            <strong><h2>Book department : </h2></strong><p style="font-size: x-large;"><?php echo $departement_name; ?></p>
                            <strong><h2>Writer of the book : </h2></strong><p style="font-size: x-large;"><?php echo $writers_name; ?></p>
                            <strong><h2>For Download : </h2></strong>      
                            <a href="images/pdf/<?php echo $book_pdf; ?>" class="btn btn-success" download="bs.pdf">download</a>
                            <strong><h2>For save of yor profile : </h2></strong>   

                            <?php
                                $id = $_SESSION['id'];

                                $queselectbook = "SELECT detailsorder.detailsorder_id , detailsorder.order_id , detailsorder.book_id , orderbook.orderbook_id , orderbook.user_id FROM detailsorder INNER JOIN orderbook on detailsorder.order_id = orderbook.orderbook_id where detailsorder.book_id = '$book_id' and  orderbook.user_id = $id " ;
                                $reselect = mysqli_query($CTD,$queselectbook);
                                $num = mysqli_num_rows($reselect) ;
                                if($num == 0)
                                {
                                    ?>
                                        <form method="post">
                                            <button class="btn btn-info" name="submit" download="bs.pdf">save</button>
                                            <input type="hidden" name="submitted" value="true"/>
                                            <?php
                                                if(isset($_POST['submitted']))
                                                { 
                                                    include('CTD.php');
                                                    
                                                    $query1 = "INSERT INTO `orderbook`(`user_id`) VALUES ('$id')";
                                                    $result1 = mysqli_query($CTD,$query1);
                                                    if($result1 == 1)
                                                    {
                                                        $query2 = "INSERT INTO `detailsorder`(`order_id`, `book_id`) VALUES (LAST_INSERT_ID(),'$book_id')";
                                                        $result2 = mysqli_query($CTD,$query2);
                                                        if($result2 == 1)
                                                        {
                                                            ?>
                                                            <script language='JavaScript' type='text/JavaScript'>
                                                                        
                                                                        alert('save book is succsus');
                                                                        window.location='profile.php';

                                                                    </script>
                            
                                                                    <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                        </form>


                                    <?php
                                }
                                else
                                {
                                    ?>
                                         <button class="btn btn-success" name="submit" download="bs.pdf">has saved before</button>
                                    <?php
                                }
                            ?>
                            
                        </div> 
                    </div>

        <?php
                }
            }   
        }
        else 
        {
            echo"<br><div class='text-center'><h2 style='Color:Red'>you are not user  this book just a member in this website </h2><div>";
        }     
