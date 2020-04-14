<?php
require( "libs/fetch_data.php" );
require( "libs/db.php" );
$id = $_REQUEST[ 'id' ];
$query = "SELECT * from cat where id='" . $id . "'";
$result = mysqli_query( $con, $query );
$row = mysqli_fetch_assoc( $result );
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>
		<?php echo $row['cat_name']; ?>
	</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/fontAwesome.css">
	<link rel="stylesheet" href="css/light-box.css">
	<link rel="stylesheet" href="css/templatemo-style.css">

	<link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<style>
	body {
		background-color: rgba(0, 0, 0, 0.9);
	}

</style>

<body>

	<nav>
		<div class="logo">
			<a href="index.php">Gallery | <em><?php echo $row['cat_name']; ?></em></a>
		</div>
	</nav>

	<div id="video-container">
		<div class="video-overlay"></div>
		<div class="video-content">
			<div class="inner">
				<h1>Gallery</h1>
				<p>
					<?php echo $row['cat_name']; ?>
				</p>
				<div class="scroll-icon">
					<a class="scrollTo" data-scrollTo="portfolio" href="#"><img src="img/scroll-icon.png" alt=""></a>
				</div>
			</div>
		</div>
		<video autoplay="" loop="" muted>
			<source src="highway-loop.mp4" type="video/mp4"/>
		</video>
	</div>


	<div class="full-screen-portfolio" id="portfolio">
		<div class="container-fluid">
			<?php 
            $categoryid=$row['id'];
            getphotos("photo",$categoryid); ?>
		</div>
	</div>


	<footer>
		<div class="container-fluid">
			<div class="col-md-12">
				<p>Copyright &copy; 2020 Technology-Wonder | Designed by TemplateMo</p>
			</div>
		</div>
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
		window.jQuery || document.write( '<script src="js/vendor/jquery-1.11.2.min.js"><\/script>' )
	</script>

	<script src="js/vendor/bootstrap.min.js"></script>

	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>


</body>
</html>