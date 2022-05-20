<?php
if (isset($_SESSION["name"])) {
  ?>
   <ul class="nav navbar-nav navbar-right">
	<li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION["name"]; ?> </a></li>
	<li class="active" ><a href="item.php"><span class="glyphicon glyphicon-globe"></span> Recycling Items </a></li>
	<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Your card of recycling Items  (<?php
	  if(isset($_SESSION["cart"])){
	  $count = count($_SESSION["cart"]); 
	  echo "$count"; 
		}
	  else
		echo "0";
	  ?>) </a></li>
	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
  </ul>
<?php        
}
?>