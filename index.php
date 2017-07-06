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


//bla bla bla bla
<ul>
<li><a href="#home">About viola</a><br></li>
<li><a href='menu.php'>Menu</a></li>
<li><a href='viewaccount.php'>Account</a></li>
<li>
<a href='viewcart.php' style= " padding: 0px; margin:0px"><img class= "cart" src="images/cart_icon.png" style= " width:20px; height:20px;" border="0"/></a>
<input type="text" name="quantity" value= "<?php echo $_SESSION['cart']; ?>"  maxlength="2" max="10" size="1" id="cart" />
<a href="logout.php" style= " padding: 0px; text-decoration: underline; font-size: 15px;" >Logout</a>

</li>
</ul>
<img src="images/FullMenu_1920x704.jpg" alt="HTML Icon" width="100" height="500" align="middle" >
<hr style = "border: none;" >


<h1>Viola Cafe'</h1>
<p  > From a cultural standpoint, coffeehouses largely serve as centers of social
<br>
interaction: the coffeehouse provides patrons with a place to congregate, talk, read, write, entertain one
<br>
another, or pass the time, whether individually or in small groups. Since the development of Wi-Fi,
<br>
coffeehouses with this capability have also become places for patrons to access the Internet on their
<br>
laptops and tablet computers. A coffeehouse can serve as an informal club for its regular members As early
<br>
as the Beatnik era and the folk music scene, coffeehouses have hosted singer-songwriter performances,
<br>
typically in the evening.</p>

<footer >


<ul>
<li><a href="#Cotact" style= "color : white;">Contact Us</a></li>
<li><a href="#Follow Us"> Follow Us </a></li>

</footer>
<!--
<div class="form">
<p>Welcome <?php echo $_SESSION['firstname']; ?>!</p>
<p>This is secure area.</p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>


</div>
-->
</body>
</html>
