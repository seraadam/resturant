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
<li><a href='viewaccount.php'>Account</a></li>
<li>
<a href='viewcart.php' style= " padding: 0px; margin:0px"><img class= "cart" src="images/cart_icon.png" style= " width:20px; height:20px; font-size:15px;" border="0"/></a>

<input type="text" name="quantity" value= "<?php echo $_SESSION['cart']; ?>"  maxlength="2" max="10" size="1" id="cart" />
<a href="logout.php" style= " padding: 0px; text-decoration: underline; font-size: 15px;" >Logout</a>
</li>

</ul>
<img src="images/FullMenu_1920x704.jpg" alt="HTML Icon" width="100" height="500" align="middle" >
<hr style = "border: none;" >

<?php
    //echo '<h1>'.$_SESSION['cart']. '</h1>';
    require('db.php');
    
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `MENU` ";
    $result = mysqli_query($con,$query) or die(mysql_error());
   
    
    
    echo ' <table style="color: black; font-size:20px; border: 0px solid black;"> <tbody>   ' ;
    while($row = mysqli_fetch_assoc( $result ) )
    {

        echo '<tr> <td>' . $row['Name'] . '<p';
        
        echo ' style = "margin-left:0px; line-height: 5px; font-size: 20px;" > Category : ' . $row['Type']. ' / ' .$row['Category']. '</p>';
        
        echo '<p style = "margin-left:0px; line-height: 5px; font-size: 20px;"> Price : ' . $row['Price']. ' SAR </p>';
        echo '<details><summary>More details</summary> <p style="font-size:20px; line-height: 20px;" >'. $row['Details'] .'<p></details></td>';
        
        echo "<td><img src='images/".$row['Image']."'></td>";
        
        echo '<td><form action="cart.php" method="post">';
       echo' <input type="submit"   value="Add to cart" style="margin-left:5%; font-size:40px;" />
        <input type="hidden" value=" ';
        echo $row['Menu_Id'].'" name="Menu_Id"/>';
        echo '<input type="text" name="quantity" value= "0"  maxlength="2" max="10" size="1" id="cart" /></form></td></tr>';
        

    }
    echo '  </table>' ;
    //echo '<h1>'.$_SESSION['cart']. '</h1>';
    ?>
//new code for testing remove later
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

<!--
<div class="form">

<p>This is secure area.</p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>


</div>
-->
</body>
</html>
