<?php
	require_once('load.php');
	$logged = $fun->checkLogin();
	
	if ( $logged == false ) {
		$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		$redirect = str_replace('cart.php', 'login.php', $url);
		
		//Redirect to the login page if the users is not logged in
		header("Location: $redirect?msg=login");
		exit;
	} else {
		//check cookie values
		$cookie = $_COOKIE['musicstorecookie'];
		//Set our user and authID variables
		$user = $cookie['user'];
		$authID = $cookie['authID'];
		
		$table = 'store_users';
		$sql = "SELECT * FROM $table WHERE user_login = '" . $user . "'";
		$results = $msdb->select($sql);

		if (!$results) {
			die('The user name is invalid');
		}
		$results = mysql_fetch_assoc( $results );

?>
<head>

<title>Site Map - Site Map | Music - Free Website Template from Templates.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
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
<body id="page6" onload="loadCart()">
<div class="tail-cont">
	<div class="tail-top-left"></div>
	<div class="tail-top">
		<div class="container">
<!-- header -->
			<div id="header">
				<div class="logo"><a href="index.php"><img src="images/logo.jpg" alt="" /></a></div>
				<ul class="site-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="guitars.php">Guitars</a></li>
					<li><a href="pianos.php">Pianos</a></li>
					<li><a href="drums.php">Drums</a></li>
					<li class="last"><a href="cart.php" class="act">Cart</a></li>
				</ul>
			</div>
<!-- content -->
			<div id="content">
				<div class="indent">
					<h2>Welcome <?php echo '<b>'.$results['user_name'].'</b>'; ?></h2>
					<h3>Subscribe for our newsletter</h3><br>
					<h4>email:<input type="email" id="sEmail" maxlength="40"> <button onclick="subscribe()">Subscribe</button></h4>
					<div id="subscriptionMsg"></div>
					<h2>Cart</h2>
					<div id="cart"></div>
					<br/>
					<br/>
					<p>To logout click on<B><a href="login.php?action=logout">LOGOUT</a><B></p>
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
<?php } ?>