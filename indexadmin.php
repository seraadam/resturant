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
<li><a href="#users">Users</a><br></li>
<li><a href='adminmenu.php'>Menu Items</a></li>
<li><a href='viewaccount.php'>Account</a></li>
<li><a href="logout.php" style= " padding: 0px; text-decoration: underline; font-size: 15px;" >Logout</a></li>

</ul>
<img src="images/FullMenu_1920x704.jpg" alt="HTML Icon" width="100" height="500" align="middle" >
<hr style = "border: none;" >


<?php
    require('db.php');
    $flag = "user";
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `USER` WHERE `admin_flag` = '$flag'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    
    echo '<table > <thead><tr> <th>user_id</th><th>first_Name</th><th>last_Name</th><th>email</th><th>user_city</th><th>user_Adress</th></thead><tbody>   ' ;
    while($row = mysqli_fetch_assoc( $result ) )
    {
        echo '<tr> <td>' . $row['User_Id'] . '</td>';
        echo '<td>' . $row['Fname'] . '</td>';
        echo '<td>' . $row['Lname'] . '</td>';
        echo '<td>' . $row['Email'] . '</td>';
        echo '<td>' . $row['city'] . '</td>';
        echo '<td>' . $row['address'] . '</td></tr>';
      
       
    }
    
    
    echo '  </table>' ;
    
    ?>


<!--
<div class="form">

<p>This is secure area.</p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>


</div>
-->
</body>
</html>
