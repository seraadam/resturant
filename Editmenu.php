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
<li><a href="#What's new">What's new </a></li>
<li><a href='viewaccount.php'>Account</a></li>
<li>
<a href='viewcart.php' style= " padding: 0px; margin:0px"><img class= "cart" src="images/cart_icon.png" style= " width:20px; height:20px; font-size:15px;" border="0"/></a>


<a href="logout.php" style= " padding: 0px; text-decoration: underline; font-size: 15px;" >Logout</a>
</li>

</ul>


<?php
    require('db.php');
    $userid =$_SESSION['userid'];
   $id = $_GET['id'];
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['name'])){
		
        $name = $_REQUEST['name']; //escapes special characters in a string
        $Category =$_REQUEST['Category']; // removes backslashes
        $Type = $_REQUEST['Type'];
		$Details = $_REQUEST['Details'];
        $Price = $_REQUEST['Price'];
        $Image = $_REQUEST['Im'];
       
		$query = "UPDATE `MENU` SET `Name`= '$name' , `Price`= '$Price' , `Type`='$Type' , `Category`= '$Category', `Details`= '$Details' , `Image`= '$Image' WHERE  `Menu_Id`= $id";
        $result = mysqli_query($con,$query);
        if($result){
            header("Location: adminmenu.php ");
        }
    }else{
?>

<?php
    require('db.php');
    //getting id from url
    $id = $_GET['id'];
    $quer = "SELECT * FROM `MENU` WHERE `Menu_Id`=$id";
    //selecting data associated with this particular id
    $result2 = mysqli_query($con, $quer );
    
    while($ress = mysqli_fetch_array($result2))
    {
        $name = $ress['Name']; //escapes special characters in a string
        $Category = $ress['Category']; // removes backslashes
        $Type = $ress['Type'];
        $Details = $ress['Details'];
        $Price = $ress['Price'];
        $Image = $ress['Image'];
    }
    ?>

<div class="form" >
<h1 style="color:white;" >Update ITEM</h1>
<form name="ADDITEM" action="" method="post" style="align:center; margin-left:50%" >

<input type="name" name="name" placeholder="Item name" value="<?php echo $name;?>"/><br/>
<input type="Category" name="Category" placeholder="Category" value="<?php echo $Category;?>" /><br/>
<input type="Type" name="Type" placeholder="Food or Drinks" value="<?php echo $Type;?>" /><br/>
<input type="Details" name="Details" placeholder="Details" value="<?php echo $Details;?>" /><br/>
<input type="Price" name="Price" placeholder="Price" value="<?php echo $Price;?>"/><br/>
<input type="Im" name="Im" placeholder="Image name" value="<?php echo $Image;?>"/> <br/>

<input type="submit" name="submit" value="update item" />
</form>
</div>
<?php } ?>
</body>
</html>
