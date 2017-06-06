

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
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
        $admin_flag ="user" ;
		
        $query = "INSERT into `USER` (Fname ,Lname , password, Email, city , address , admin_flag) VALUES ('$firstname', '$lastname','$password', '$email', '$city' , '$address', '$admin_flag' )";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
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

<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>
