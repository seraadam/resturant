<?php
    include("auth.php");
//including the database connection file
require('db.php');

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM MENU WHERE 'Menu_Id'=$id");

//redirecting to the display page (index.php in our case)
header("Location:adminmenu.php");
      ?>
