<?php
	require_once('load.php');
	if(isset($_GET['action']))
	{
		if ( $_GET['action'] == 'logout' ) 
		{
			$loggedout = $fun->logout();
		}
	}
	$logged = $fun->login('cart.php');//to redirect to the cart page
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Music Store LOGIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="descriptio" />
<meta name="keywords" content="login here" />
<meta name="author" content="CODE CRACKERS" />
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
					<div style="width: 960px; background: #fff; border: 1px solid #e4e4e4; padding: 20px; margin: 10px auto;">
						<?php if ( $logged == 'invalid' ) : ?>
							<p style="background: #e49a9a; border: 1px solid #c05555; padding: 7px 10px;">
								The username password combination you entered is incorrect. Please try again.
							</p>
						<?php endif; ?>
						<?php if ( isset($_GET['reg']) ? $_GET['reg'] == 'true' : null ) : ?>
							<p style="background: #fef1b5; border: 1px solid #eedc82; padding: 7px 10px;">
								Your registration was successful, please login below.
							</p>
						<?php endif; ?>
						<?php if ( isset($_GET['action'])?$_GET['action'] == 'logout':null): ?>
						<?php if ( $loggedout == true ) : ?>	
							<p style="background: #fef1b5; border: 1px solid #eedc82; padding: 7px 10px;">
								You have been successfully logged out.
							</p>
						<?php else: ?>
							<p style="background: #e49a9a; border: 1px solid #c05555; padding: 7px 10px;">
								There was a problem logging you out.
							</p>
						<?php endif; ?>
						<?php endif; ?>
						<?php if ( isset($_GET['msg']) ? $_GET['msg'] == 'login' :null): ?>
						<p style="background: #e49a9a; border: 1px solid #c05555; padding: 7px 10px;">
							You must log in to view this content. Please log in below.
						</p>
						<?php endif; ?>
		
					<h2>Login</h2>
			
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<table>
							<tr>
								<td>Username:</td>
								<td><input type="text" name="username" /></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input type="password" name="password" /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Log In" id="login" /></td>
							</tr>
						</table>
					</form>
					<p>Don't have an account<a href="register.php">Register here</a></p>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="tail-bottom png">
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