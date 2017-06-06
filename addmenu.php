<?php
    
    
    include("auth.php"); //include auth.php file on all secure pages
    ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/account.css" />
<link rel="stylesheet" href="css/userstyle.css" />
</head>
<body style"overflow: scroll;">

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
   
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['name'])){
		
        $name = $_REQUEST['name']; //escapes special characters in a string
        $Category =$_REQUEST['Category']; // removes backslashes
        $Type = $_REQUEST['Type'];
		$Details = $_REQUEST['Details'];
        $Price = $_REQUEST['Price'];
        $Image = $_REQUEST['Im'];
        
		$query = "INSERT INTO `MENU`( `Name`, `Price`, `Type`, `Category`, `Details`, `Image`) VALUES ('$name','$Price','$Type','$Category','$Details','$Image')";
        $result = mysqli_query($con,$query);
        if($result){
            header("Location: adminmenu.php ");
        }
    }else{
?>
<div class="form" >
<h1 style="color:white;" >ADD NEW ITEM</h1>
<form name="ADDITEM" action="" method="post" style="align:center; margin-left:50%" >

<input type="name" name="name" placeholder="Item name" required /><br/>
<input type="Category" name="Category" placeholder="Category" required /><br/>
<input type="Type" name="Type" placeholder="Food or Drinks" required /><br/>
<input type="Details" name="Details" placeholder="Details" required /><br/>
<input type="Price" name="Price" placeholder="Price" required /><br/>
<input type="Im" name="Im" placeholder="Image name" required/> <br/>

<input type="submit" name="submit" value="Add item" />
</form>
</div>
<?php } ?>
</body>
</html>
