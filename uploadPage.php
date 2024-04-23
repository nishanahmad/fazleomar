<?php
session_start();
if(isset($_SESSION["user_name"]))
{																																						?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Documents | Fazl-E-Omar</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Arvo:400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
		<style>
		@import url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		.isa_error {
			color: #D8000C;
			background-color: #FFD2D2;
		}
		</style>
	</head>


	<body>
		
		<div id="site-content">
			<header class="site-header">
				<div class="primary-header">
					<div class="container">
						<a href="index.html" id="branding">
							<img src="images/logo.png" alt="Fazl-E-Omar Public School">
							<h1 class="site-title">Fazl-E-Omar Public School</h1>
						</a> <!-- #branding -->
						
						<div class="main-navigation">
							<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="menu-item"><a href="index.html">Home</a></li>
								<li class="menu-item"><a href="aboutUs.html">About Us</a></li>
								<li class="menu-item"><a href="admission.html">Admission</a></li>
								<!--li class="menu-item"><a href="academics.html">Academics</a></li-->
								<li class="menu-item"><a href="#">Facilities</a></li>
								<li class="menu-item"><a href="gallery.php">Gallery</a></li>
								<li class="menu-item"><a href="docs.html">Docs</a></li>
								<!--li class="menu-item"><a href="contact.html">Contact</a></li-->
							</ul> <!-- .menu -->
						</div> <!-- .main-navigation -->

						<div class="mobile-navigation"></div>
					</div> <!-- .container -->
				</div> <!-- .primary-header -->

				<div class="page-title">
					<div class="container">
						<h2>Gallery upload</h2>
					</div>
				</div>
			</header>
		</div>

		<main class="main-content">
			<div class="fullwidth-block inner-content">
				<div class="container">
					<div class="col-md-8">																			<?php
						if(isset($_GET['error']))
						{																							?>
							<div class="isa_error">
							   <i class="fa fa-times-circle"></i>
							   <?php echo $_GET['error'];?>
							</div>																					<?php								
						}																							?>					
						<div class="content">																		 
							<form action="upload.php" method="post" enctype="multipart/form-data">
								<h3>Select image to upload:</h3>
								<input type="file" name="fileToUpload" id="fileToUpload" required>
								<h3>Title:</h3>
								<input type="text" name="title" id="title" required>
								<br/><br/><br/>
								<input type="submit" value="Upload Image" name="submit">
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
		<footer class="site-footer" style="height:200px !important; padding: 0 0 0;">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="widget">
							<h3 class="widget-title">Contact us</h3>
							<address>Fazl-E-Omar Public School, Aduthila. P O Payangadi <br>Kannur, Kerala, Pin-670 303</address>

							<a href="mailto:info@fazleomarps.com">info@fazleomarps.com</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<a href="tel:+917025845684">+91 70258 45684</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="widget">
							<h3 class="widget-title">Social media</h3>
							<div class="social-links circle">
								<a href="https://www.youtube.com/channel/UCfxOnCke8XAjOCDQ03OygQA"><i class="fa fa-youtube"></i></a>								
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</div>
						</div>
					</div>
			</div>
		</footer>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>
<?php
}
else
	header("Location:loginPage.php");