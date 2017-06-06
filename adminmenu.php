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
<li><a href="#Menu">Menu</a></li>
<li><a href='account.php'>Account</a></li>
<li>
<a href='viewcart.php' style= " padding: 0px; margin:0px"><img class= "cart" src="images/cart_icon.png" style= " width:20px; height:20px; font-size:15px;" border="0"/></a>

<a href="logout.php" style= " padding: 0px; text-decoration: underline; font-size: 15px;" >Logout</a>
</li>

</ul>
<img src="images/FullMenu_1920x704.jpg" alt="HTML Icon" width="100" height="500" align="middle" >
<hr style = "border: none;" >

<a href='addmenu.php' style="font-size:20px" >Add New Item</a><br/><br/>

<table style="width:90%;" border=0>
<tr bgcolor='#CCCCCC'>
<td>Name</td>
<td>Type</td>
<td>Category</td>
<td>Details</td>
<td>Price</td>
<td>Image</td>
<td>Update</td>
</tr>
<?php
    require('db.php');
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `MENU` ";
    $result = mysqli_query($con,$query) or die(mysql_error());
    
    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$row['Name']."</td>";
        echo "<td>".$row['Category']."</td>";
        echo "<td>".$row['Type']."</td>";
        echo "<td>".$row['Details']."</td>";
        echo "<td> price : ".$row['Price']."</td>";
        echo "<td><img src='images/".$row['Image']."'></td>";
        echo "<td><a href=\"Editmenu.php?id=$row[Menu_Id]\">Edit</a> | <a href=\"delete.php?id=$row[Menu_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
</table>


<!-- <div>


<?php
    //echo '<h1>'.$_SESSION['cart']. '</h1>';
    require('db.php');
    
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `MENU` ";
    $result = mysqli_query($con,$query) or die(mysql_error());
   
    
    
    echo ' <table style="color: black; font-size:20px; border: 0px solid black;"> <tbody>   ' ;
    while($row = mysqli_fetch_assoc( $result ) )
    {

        echo '<tr> <td>' . $row['Name'] . '<br><br> <details>
        <summary>More details</summary>';
        echo
       ' <p style="font-size:20px; line-height: 20px;" >'. $row['Details'] .'</p>
        </details>';
        echo '<p style = "margin-left:0px;" > Category : ' . $row['Type']. ' / ' .$row['Category']. '</p></td>';
        echo "<td><img src='images/".$row['Image']."'></td>";
        echo "<td>Price: ".$row['Price']." SAR </td></tr>";
       
        

    }
    echo '  </table>' ;
    //echo '<h1>'.$_SESSION['cart']. '</h1>';
    ?>

<div class="container">
<input type="button" onclick="decrementValue()" value="-" />
<input type="text" name="quantity" value="0" maxlength="2" max="10" size="1" id="number" />
<input type="button" onclick="incrementValue()" value="+" />
</div>

<script type="text/javascript">
function incrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value<10){
        value++;
        
        document.getElementById('number').value = value;
        document.getElementById('cart').value = value;
    }
}
function decrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1){
        value--;
        document.getElementById('number').value = value;
         document.getElementById('cart').value = value;
    }
    
}
</script>


<div class="form">

<p>This is secure area.</p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>


</div>
</div>
-->
</body>
</html>
