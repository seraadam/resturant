
<?php
    
    
    include("auth.php"); //include auth.php file on all secure pages
    ?>
<!DOCTYPE html>
<html>
<head>

//bla bla bla bla
//bla bla bla again
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/account.css" />
<link rel="stylesheet" href="css/userstyle.css" />
</head>
<body style="overflow: scroll;">

<ul>
<li><a href='index.php'>About viola</a><br></li>
<li><a href='menu.php'>Menu</a></li>
<li><a href='viewaccount.php'>Account</a></li>
<li>
<a href='viewcart.php' style= " padding: 0px; margin:0px"><img class= "cart" src="images/cart_icon.png" style= " width:20px; height:20px; font-size:15px;" border="0"/></a>


<a href="logout.php" style= " padding: 0px; text-decoration: underline; font-size: 15px;" >Logout</a>
</li>

</ul>

<?php
	require('db.php');
    $userid =$_SESSION['userid'];
    $query = "SELECT * FROM `USER` WHERE `User_Id` = $userid  ";
    $result = mysqli_query($con,$query) or die(mysql_error());
    while($row = mysqli_fetch_assoc( $result ) )
    {
        echo ' <div class="form"><h1 style="color:white;">Your Info </h1><form style="margin-left: 45%; font-size :30px;" name="show data" action="" method="get">First name : '.$row['Fname']. '<br/><br/>' ;
        echo 'Last name :  ' .$row['Lname']. '<br/><br/>' ;
        echo ' email :  '.$row['Email']. '<br/><br/>' ;
    echo 'password : '.$row['Fname']. '<br/><br/>' ;
        echo 'city :'.$row['city']. '<br/><br/>' ;
        echo 'address: '.$row['address']. '<br/><br/>' ;
    echo '<input type="submit" name="submit" value="Edit" style="margin:0px;" />';
    echo '</form></div>';
    }
    if (isset($_REQUEST['submit'])){
    header("Location: account.php ");
    }
    
    ?>


</body>
</html>
