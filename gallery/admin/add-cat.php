<?php
session_start();
include '../libs/db.php';
//Checking session is valid or not
if ( strlen( $_SESSION[ 'id' ] == 0 ) ) {
	header( 'location:logout.php' );
} else {
	// for updating user info
	if ( isset( $_POST[ 'Submit' ] ) ) {
		$fname = ucwords($_POST[ 'catname' ]);
		$query = mysqli_query( $con, "insert into cat (cat_name) values('$fname')" );
		$_SESSION[ 'msg' ] = "Catagory added successfully";
	}
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Dashboard">
		<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
		<title>Admin | Update Profile</title>
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/style-responsive.css" rel="stylesheet">
	</head>

	<body>
		<?php include('header.php');?>
			<section id="main-content">
				<section class="wrapper">
					<h3><i class="fa fa-angle-right"></i>New Catagory</h3>

					<div class="row">



						<div class="col-md-12">
							<div class="content-panel">
								<p align="center" style="color:#F00;">
									<?php echo $_SESSION['msg'];?>
									<?php echo $_SESSION['msg']=""; ?>
								</p>
								<form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
									<p style="color:#F00">
										<?php echo $_SESSION['msg'];?>
										<?php echo $_SESSION['msg']="";?>
									</p>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Catogary Name </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="catname" value="">
										</div>
									</div>

									<div style="margin-left:100px;">
										<input type="submit" name="Submit" value="Update" class="btn btn-theme">
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>
			</section>
		</section>
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="assets/js/jquery.scrollTo.min.js"></script>
		<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
		<script src="assets/js/common-scripts.js"></script>
		<script>
			$( function () {
				$( 'select.styled' ).customSelect();
			} );
		</script>
	</body>
	</html>
	<?php } ?>