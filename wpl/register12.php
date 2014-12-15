<?php
	require_once('load.php');
	$fun->register('login.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Registration Form-Music Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="Register Music Store" />
<meta name="author" content="Templates.com - website templates provider" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Bauhaus_Md_BT_400.font.js" type="text/javascript"></script>
<script src="js/musicStore.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	 <script type="text/javascript" src="js/ie_png.js"></script>
	 <script type="text/javascript">
			 ie_png.fix('.png');
	 </script>
<![endif]-->
</head>
<body id="page2">
<div class="tail-cont">
	<div class="tail-top-left"></div>
	<div class="tail-top">
		<div class="container">
<!-- header -->
			<div id="header">
				<div class="logo"><a href="index.php"><img src="images/logo.jpg" alt="" /></a></div>
				<ul class="site-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="guitars.php" class="act">Guitars</a></li>
					<li><a href="pianos.php">Pianos</a></li>
					<li><a href="drums.php">Drums</a></li>
					<li class="last"><a href="cart.php">Cart</a></li>
				</ul>
			</div>
<!-- content -->
			<div id="content">
				<div class="indent">
						<h3>Register</h3>
			
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<table>
							<tr>
								<td>Name:</td>
								<td><input type="text" name="name" /></td>
							</tr>
							<tr>
								<td>Username:</td>
								<td><input type="text" name="username" /></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input type="password" name="password" /></td>
							</tr>
							<tr>
								<td>Email:</td>
								<td><input type="text" name="email" /></td>
							</tr>
								<input type="hidden" name="date" value="<?php echo time(); ?>" />
									<tr>
									<td></td>
								<td><input type="submit" value="Register" /></td>
							</tr>
					</table>
				</form>
				<p>Already a member? <a href="login.php">Log in here</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="tail-bottom png">
<!-- footer -->
		<div id="footer">
			<div class="container">
				<div class="indent">
					<div class="fleft">Copyright - Code Crackers.</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>