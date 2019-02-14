<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Gallery | Fazl-E-Omar</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Arvo:400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
	</head>	
<?php
include_once('connect.php');

$per_page = 8;

if (isset($_GET['page'])) 
{
	$page = $_GET['page'] - 1;
	$offset = $page * $per_page;
}
else 
{ 
	$page = 0;
	$offset = 0;
} 

$images = "SELECT count(id) FROM images ORDER by id ASC";
$result = mysqli_query($con, $images);
$row = mysqli_fetch_array($result);
$total_images = $row[0];

if ($total_images > $per_page) 
{
	$pages_total = ceil($total_images / $per_page);
	$page_up = $page + 2;
	$page_down = $page;
} 
else 
{
	$pages_total = 1;
} 
?>																			
	<body>
		<div id="site-content">
			<header class="site-header">
				<div class="primary-header">
					<div class="container">
						<a href="index.html" id="branding">
							<img src="images/logo.png" alt="Lincoln high School">
							<h1 class="site-title">Fazl-E-Omar Public School</h1>
						</a>
						
						<div class="main-navigation">
							<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="menu-item"><a href="index.html">Home</a></li>
								<li class="menu-item"><a href="aboutUs.html">About Us</a></li>
								<li class="menu-item"><a href="admission.html">Admission</a></li>
								<li class="menu-item"><a href="facilities.html">Facilities</a></li>
								<li class="menu-item current-menu-item"><a href="#">Gallery</a></li>
								<li class="menu-item"><a href="docs.html">Docs</a></li>
							</ul>
						</div>

						<div class="mobile-navigation"></div>
					</div>
				</div>

				<div class="page-title">
					<div class="container">
						<h2>Gallery</h2>
					</div>
				</div>
			</header>
		</div>

		<main class="main-content">
			<div class="fullwidth-block inner-content">
				<div class="container">
					<div class="fullwidth-content">
						<div class="pagination"><?php
							if($page>0)
							{?>
								<a href="gallery.php?page=<?php echo $page_down;?>" class="page-numbers"><i class="fa fa-angle-left"></i></a><?php
								for($i=1;$i<=$page;$i++)
								{?>
									<a href="gallery.php?page=<?php echo $i;?>" class="page-numbers"><?php echo $i;?></a>	<?php
								}							
							}
							else
							{?>
								<a href="#" class="page-numbers"><i class="fa fa-angle-left"></i></a><?php
							}?>
							
							<span class="page-numbers current"><?php echo $page + 1;?></span>
							
							<?php
							for($i=$page+1;$i<$pages_total;$i++)
							{?>
								<a href="gallery.php?page=<?php echo $i+1;?>" class="page-numbers"><?php echo $i+1;?></a>	<?php
							}
							if($page < $pages_total -1)
							{?>
								<a href="gallery.php?page=<?php echo $page_up;?>" class="page-numbers"><i class="fa fa-angle-right"></i></a><?php	
							}
							else
							{?>
								<a href="#" class="page-numbers"><i class="fa fa-angle-right"></i></a><?php	
							}								?>
						</div>

						<ul class="students-grid"><?php
						$result = mysqli_query($con, "SELECT * FROM images ORDER by created_on DESC LIMIT $offset, $per_page");
						while($row = mysqli_fetch_array($result)) 
						{
							$image=$row['file'];
							?>
								<li class="student">
									<figure class="avatar"><a href="images/gallery/<?php echo $image;?>"><img src="images/gallery/<?php echo $image;?>"></a></figure>
									<h3 class="student-name"><a href="images/gallery/<?php echo $image;?>"><?php echo $row['title'];?></a></h3>
								</li><?php
						}		?>
						</ul>

						<div class="pagination"><?php
							if($page>0)
							{?>
								<a href="gallery.php?page=<?php echo $page_down;?>" class="page-numbers"><i class="fa fa-angle-left"></i></a><?php
								for($i=1;$i<=$page;$i++)
								{?>
									<a href="gallery.php?page=<?php echo $i;?>" class="page-numbers"><?php echo $i;?></a>	<?php
								}							
							}
							else
							{?>
								<a href="#" class="page-numbers"><i class="fa fa-angle-left"></i></a><?php
							}?>
							
							<span class="page-numbers current"><?php echo $page + 1;?></span>
							
							<?php
							for($i=$page+1;$i<$pages_total;$i++)
							{?>
								<a href="gallery.php?page=<?php echo $i+1;?>" class="page-numbers"><?php echo $i+1;?></a>	<?php
							}
							if($page < $pages_total -1)
							{?>
								<a href="gallery.php?page=<?php echo $page_up;?>" class="page-numbers"><i class="fa fa-angle-right"></i></a><?php	
							}
							else
							{?>
								<a href="#" class="page-numbers"><i class="fa fa-angle-right"></i></a><?php	
							}								?>
							
						</div>
					</div>
					<form action="uploadPage.php" style="float:right">
						<input type="submit" value="Upload" name="submit">
					</form>
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
							<a href="tel:04972876200">0497 2876200</a>
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