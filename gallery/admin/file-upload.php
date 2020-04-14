<?php
session_start();
error_reporting( 0 );
include '../libs/db.php';
if (strlen($_SESSION['id']==0)) {
header('location:logout.php');
}else{
if ( isset( $_POST[ "submit" ] ) ) {
	#retrieve file title
	$title = $_POST[ "title" ];
	$name = ucwords($_POST["name"]);

	#file name with a random number so that similar dont get replaced
	$pname = $_FILES[ "file" ][ "name" ];
	if ($pname == ''){
		echo "<script>";
		echo "alert( 'Please choose any photo' )";
		echo "</script>";
	}else{
	$pname = rand( 1000000000000, 10000000000000 ) . '.jpg';

	#temporary file name to store file
	$tname = $_FILES[ "file" ][ "tmp_name" ];

	#upload directory path
	$uploads_dir = 'images';
	#TO move the uploaded file to specific location
	$up = move_uploaded_file( $tname, $uploads_dir . '/' . $pname );

	#sql query to insert into database
	$sql = "INSERT into photo(name,title,cat_id) VALUES('$pname','$name','$title')";

	if ( mysqli_query( $con, $sql ) and $up) {
		$_SESSION[ 'msg' ] = "File Sucessfully uploaded";
	} else {
		$_SESSION[ 'msg' ] = "Error uploading file";		
	}
}
}
?><script language="javascript" type="text/javascript">
		function valid() {
			if ( document.form1.title.value == "nil" ) {
				alert( "Please Select any category" );
				document.form1.title.focus();
				return false;
			}
			return true;
		}
	</script>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<title>Admin | Gallery</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>

<body>
	<?php include('header.php');?>
		<section id="main-content">
			<section class="wrapper">
				<h3><i class="fa fa-angle-right"></i> Gallery </h3>
				<div class="row">



					<div class="col-md-12">
						<div class="content-panel">
							<h3> <?php $uc='select photo gallery tab'; 
							$uc=ucwords($uc);
							echo $uc; ?>
                            </h3>
							<form method="post" class="form-horizontal style-form" name="form1" onSubmit="return valid();" enctype="multipart/form-data">
								<p style="color:#F00" align="center">
										<?php echo $_SESSION['msg'];?>
										<?php echo $_SESSION['msg']="";?>
									</p>
									<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Catagory</label>
								<div class="col-sm-10">
								<select name="title" class="form-control">
									<option value="nil">Select any one category</option>
									<?php
									$sql = "select * from cat";
									$result = mysqli_query( $con, $sql );
									foreach ( $result as $key => $value ) {
										echo '<option value="' . $value[ 'id' ] . '">' . $value[ 'cat_name' ] . '</option>';
									}
									?>
								</select></div></div>
								<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Title</label>
								<div class="col-sm-10">
								<input type="text" name="name" class="form-control"></div></div>								
								<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">File Upload</label>
								<div class="col-sm-10">
								<input type="File" name="file" class="form-control"></div></div>
								<div style="margin-left:100px;">
								<input type="submit" name="submit" class="btn btn-success">
							</div>


							</form>
						</div>
					</div>
			</section>
		</section>
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="assets/js/jquery.scrollTo.min.js"></script>
		<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
		<script src="assets/js/common-scripts.js"></script>
</body>
</html>
<?php } ?>