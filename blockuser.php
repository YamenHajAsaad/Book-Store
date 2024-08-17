

<?php

SESSION_Start();
if((isset($_SESSION['Type']))&&($_SESSION['Type'] == 'admin'))
{

include('CTD.php');

$user_id = $_REQUEST['user_id'];

$id = $_SESSION['id'];

$query = "UPDATE user SET user_status = 0 WHERE user_id = $user_id ";

$r = @mysqli_query ($CTD,$query);

    echo  "<script language='JavaScript' type='text/JavaScript'> " ;
        echo "alert('block user has success');";
        echo  "window.history.back();";
    echo "</script>";
}
else
{
  ?>
        <script language='JavaScript' type='text/JavaScript'>
          window.history.back();
        </script> 
    <?php
}
?>