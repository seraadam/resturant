<?php
include("auth.php"); //include auth.php file on all secure pages
    $item_id = intval($_POST["Menu_Id"]);
    $user_id = $_SESSION['userid'];
    $quantity = intval($_POST["quantity"]);
    if($item_id >0 && $user_id && $quantity >0 ){
        require('db.php');
        $query = "INSERT INTO `BILL`( `Menu_Id`, `Customer_id`, `Quantity`) VALUES ($item_id ,$user_id , $quantity) ";
        $result = mysqli_query($con,$query) or die(mysql_error());
        //$flag = mysqli_fetch_assoc($result);
       
        $_SESSION['cart'] = $_SESSION['cart'] + $quantity ;
       
    }
    session_commit();
     //echo '<h1>'.$_SESSION['cart']. '</h1>';
    header("Location: menu.php ");
    ?>

