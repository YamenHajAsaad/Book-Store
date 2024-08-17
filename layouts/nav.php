

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
         <li><a href="ShowBook.php">Show Book</a></li>
         <li><a href="ShowDepartion.php">Show department</a></li>
         <li><a href="Showwriters.php">Show writers</a></li>




        <?php
    if((isset($_SESSION['Log_in']))&&($_SESSION['Log_in'] == 'true'))
    {
                ?>
                <?php
                if($_SESSION['Type'] == 'user')
                {
                    ?>

                        
                        <li><a href="profile.php"> MY profile </a></li>
                        
                        
                    <?php
                }
                
                elseif($_SESSION['Type'] == 'admin')
                {
                    ?>
                        
                        <li><a href="insert.php"> insert item </a></li>
                        <li><a href="users.php"> users and logout </a></li>
                        
                        

                    <?php
                }
    }
    else
    {
        ?>
        <li><a href="Registration.php">Register</a></li>
        <li><a href="LoginPage.php">Log In </a></li>
        <?php
    }
    ?>
    </ul>
                        
