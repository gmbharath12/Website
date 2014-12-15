<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>About Us - About Us | Music - Free Website Template from Templates.com</title>
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
					<h2> Guitars </h2>
					<ul class="list p1">
						<li><img src="images/Acoustic.jpg" alt="" width="200" height="200" /><b> Electric Guitar </b> Electric guitars are solid-bodied guitars that are designed to be plugged into an amplifier. The electric guitar when amplified produces a sound that is metallic with a lengthy decay.<br />
						<br>
							<button type="submit" onclick="productAvailability('electric_guitar')">Check for availability</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<button type="submit" onclick="downloadFile('electric_guitar')">Click to Download Manual</button>
							<div id="electric_guitar"></div><br>
							<div><h4>Quantity<input type="number" id="ecQuantity" style="width:50px" min="0" max="5"> <button onclick="addToCart('electric_guitar','25.50','ecQuantity')">Add to Cart</button></h4></div>
						</br>
						</li>

						<li><img src="images/GuitareClassique.png" alt="" width="200" height="200" /><b> Accoustic Guitar</b> An acoustic guitar is a guitar that uses only acoustic means to transmit the strings' vibrational energy to the air in order to produce a sound.<br />
						<br>
							<button type="submit" onclick="productAvailability('acoustic_guitar')">Check for availability</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<button type="submit" onclick="downloadFile('acoustic_guitar')">Click to Download Manual</button>
							<div id = "acoustic_guitar"></div><br>
							<div><h4>Quantity<input type="number" id="acQuantity" style="width:50px" min="0" max="5"> <button onclick="addToCart('acoustic_guitar','20.10','acQuantity')">Add to Cart</button></h4></div>
						</br>
						</li>

					</ul>
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