
<?php
    
    
    include("auth.php"); //include auth.php file on all secure pages
    ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/userstyle.css" />
</head>
<body>

<ul>
<li><a href='index.php'>About viola</a><br></li>
<li><a href='menu.php'>Menu</a></li>
<li><a href='viewaccount.php'>Account</a></li>
<li>
<a href="Location : viewcart.php" style= " padding: 0px; margin:0px"><img class= "cart" src="images/cart_icon.png" style= " width:20px; height:20px; font-size:15px;" border="0"/></a>

<input type="text" name="quantity" value= "<?php echo $_SESSION['cart']; ?>"  maxlength="2" max="10" size="1" id="cart" />
<a href="logout.php" style= " padding: 0px; text-decoration: underline; font-size: 15px;" >Logout</a>
</li>

</ul>

<img id="image" src="images/FullMenu_1920x704.jpg" alt="HTML Icon" width="100" height="500" align="middle" />


<hr style = "border: none;" >


<?php
    //echo '<h1>'.$_SESSION['userid'] . '</h1>';
    //echo '<h1>'.$_SESSION['cart']. '</h1>';
    require('db.php');
    $userid =$_SESSION['userid'];
    //Checking is user existing in the database or not
    $query = "SELECT `Menu_Id` , `Quantity` FROM `BILL` WHERE `Customer_id` = $userid  ";
    $result = mysqli_query($con,$query) or die(mysql_error());
   // echo '<h1>'.$_SESSION['cart']. '</h1>';
    echo ' <table style="color: black; font-size:20px; border: 0px solid black;"> <tbody>   ' ;
   $total =0;
    while($row = mysqli_fetch_assoc( $result ) )
    { 
        $menuid = $row['Menu_Id'];
        //$quantity = $row['Quantity'];
        $twoquery = "SELECT `Name` , `Image` ,`Type` , `Category` , `Price` FROM `MENU` WHERE `Menu_Id` = $menuid ";
        $result2 = mysqli_query($con,$twoquery) or die(mysql_error());
        $itemsum = 0 ;
        
        while($row2 = mysqli_fetch_assoc( $result2 ) ){
        
            echo '<tr><td>' . $row2['Name'] .'<p style = "margin-left:0px;" > Category : ' . $row2['Type']. ' / ' .$row2['Category']. '</p>';
            
            echo '<p style = "margin-left:0px;"> price :'.$row2['Price'].'</p></td>';
            echo "<td><img src='images/".$row2['Image']."'></td>";
            $itemsum = $row2['Price'] * $row['Quantity'];
            
            
        }
        
        
        echo ' <td> Quantity : ' . $row['Quantity'] .'<br/> total = ' . $itemsum. ' SAR</td></tr>';
         $total+=$itemsum ;
            
        }

        echo '  </table>' ;
        echo '<p>total order = '.$total.' SAR</p>';
    
    
    
    //echo ' <table style="color: black; font-size:20px; border: 0px solid black;"> <tbody>   ' ;
    //while($row = mysqli_fetch_assoc( $result ) )
    //{
        
      //  echo '<tr> <td>' . $row['Menu_Id'] . '</td>';
        //echo '<td>' . $row['Quantity'] . '</td></tr>';
        
    //}
    //echo '  </table>' ;
    //echo '<h1>'.$_SESSION['userid'] . '</h1>';
    ?>


