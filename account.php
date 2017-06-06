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
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['firstname'])){
		$firstname = stripslashes($_REQUEST['firstname']); // removes backslashes
		$firstname = mysqli_real_escape_string($con,$firstname); //escapes special characters in a string
        $lastname = stripslashes($_REQUEST['lastname']); // removes backslashes
        $lastname = mysqli_real_escape_string($con,$lastname); //escapes special characters in a string
        $email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
        $city = stripslashes($_REQUEST['city']);
        $city = mysqli_real_escape_string($con,$city);
        $address = stripslashes($_REQUEST['city']);
        $address = mysqli_real_escape_string($con,$address);
        $admin_flag = 0 ;
		$query = "UPDATE `USER` SET `Fname`='$firstname' ,`Lname`='$lastname',`Password`='$password',`Email`='$email',`city`='$city' ,`address`='$address' WHERE `User_Id`= $userid ";
        $result = mysqli_query($con,$query);
        if($result){
            header("Location: viewaccount.php ");
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="firstname" placeholder="firstname" required />
<input type="text" name="lastname" placeholder="lastname" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="text" name="city" placeholder="city"  />
<input type="text" name="address" placeholder="address"  />

<input type="submit" name="submit" value="Edit your data" />
</form>
</div>
<?php } ?>
</body>
</html>
