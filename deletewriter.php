<?php
SESSION_Start();
if((isset($_SESSION['Type']))&&($_SESSION['Type'] == 'admin'))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
include('CTD.php');

$writers_id = $_REQUEST['writers_id'];

$qurey="DELETE FROM writers WHERE writers_id = $writers_id";

$quedelete = mysqli_query($CTD,$qurey);

    if($quedelete)
    {
        ?>
        <script>
            if(confirm("Are you sure you want to delete?")) 
            {
                window.location='Showwriters.php';
            }
            else 
            {
                window.history.back();
            }
        </script>
        <?php
        
    } 
    else 
    {
        ?>
        <script>
        alert("Error deleting record.");
        window.history.back();
        </script>
        <?php
    } 
}
else
{
    ?>
    <script>
    alert("Error deleting record.");
    window.history.back();
    </script>
    <?php
}


?>