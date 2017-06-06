
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['firstname'])){
		
		$firstname = stripslashes($_REQUEST['firstname']); // removes backslashes
		$firstname = mysqli_real_escape_string($con,$firstname); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `USER` WHERE `Fname`='$firstname' and `Password`= '$password' ";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        $flag = mysqli_fetch_assoc($result);
        
        echo '<div><h3>'  . $rows .  '</h3></div>';
        
        if($rows==1){
            $_SESSION['userid'] = $flag['User_Id'];
            $_SESSION['cart'] = "0 ";
            if($flag['admin_flag'] == "admin"){
                header("Location: indexadmin.php"); // Redirect user to index.php
                $_SESSION['admin_flag']="admin" ;
            }
            else{
			header("Location: index.php"); // Redirect user to index.php
            $_SESSION['admin_flag']="user" ;
            }
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
                
				}
    }else{
?>
<div class="form">

<form action="" method="post" name="login">
<h1>Login</h1>
<input type="text" name="firstname" placeholder="firstname" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</form>

</div>
<?php } ?>


</body>
</html>
