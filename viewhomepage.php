<?php
ob_start();
session_start();
$adminId=$_SESSION['aid'];
include_once("configuration/connect.php");
include_once("configuration/functions.php");
if(isset($_SESSION["aid"])) {
if(isLoginSessionExpired()) {
header("Location:logout.php");
}
}
$date=date('d-m-Y h:i:sa' );
checkIntrusion($adminId);
if(isset($_GET['msg'])&&$_GET['msg']!=''){
	$msg=$_GET['msg'];
$name='Home Page';
	switch($msg){
	case 'ins':
		$msg=$name.' Data has been updated Successfully !!';
		$class='success';
	break;

	case 'inf':
		$msg=$name.'Data not updated Successfully !!';
		$class='danger';
	break;
	case 'ups':
		$msg=$name.' updated Successfully !!';
		$class='success';
	break;

	case 'upf':
		$msg=$name.' Data not updated Successfully !!';
		$class='danger';
	break;
  case 'dls':
		$msg=$name.' Data Deleted Successfully !!';
		$class='success';
	break;
	case 'default' :
		$msg='';
		break;

	}
	}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Home Page| <?php echo getSiteTitle(); ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'css.php'; ?>
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
</head>
<body >
<!-- Begin page -->
<div id="layout-wrapper">
<?php include 'header.php'; ?>
<!-- ========== Left Sidebar Start ========== -->
<?php include 'leftmenu.php'; ?>
<!-- Left Sidebar End -->
<div class="main-content">
<div class="page-content">
<div class="container-fluid">
	<div class="row">
										<div class="col-12">
												<div class="page-title-box d-sm-flex align-items-center justify-content-between">
														<h4 class="mb-sm-0 font-size-18">Home Page</h4>
														<div class="page-title-right">
														<a href="updatehome.php"	<button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Edit Content</button></button></a>

																															 </div>
												</div>
										</div>
								</div>
<?php if($msg!=''){ ?>
<div class="alert alert-<?php echo $class ?> alert-dismissible fade show" role="alert">
<?php echo $msg; ?>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
	<?php
	$qry=mysqli_query($con,"select * from websitehomepage where id=1");

	$fetch=mysqli_fetch_array($qry);

	 ?>
<div class="row">
<div class="col-lg-6">
<div class="card">
<div class="card-body">
	<div class="row"><div  class="mb-3 col-lg-12"><?php echo $fetch['content'] ?></div></div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="card">
<div class="card-body">
	<div class="row"> <img src="patientZoneCMSAdmin/src/assets/img/<?php echo $fetch['img'] ?>" alt=""></div>
</div>
</div>
</div>
</div>

</div>
</div>
<?php include 'footer.php' ?>
</div>
</div>
<?php include 'script.php'; ?>
<script>
  CKEDITOR.replace( 'editor' );
	CKEDITOR.replace( 'editor2' );
</script>
</body>
</html>
