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
$date=date('d-m-Y h:i:sa');
checkIntrusion($adminId);
if(isset($_POST['addpage'])){
	extract($_POST);
	//$content2=$_POST['hi'];
	$content=$_POST['content'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$timing=$_POST['timing'];
	$timing2=$_POST['timing2'];
	$content2=$_POST['content2'];
	$address=$_POST['address'];

	$excQry=mysqli_query($con,"UPDATE `contact` SET `content`='$content',`tel`='$tel',`email`='$email',`timing`='$timing',`timing2`='$timing2',`content2`='$content2',`address`='$address',`status`='1' WHERE `id`=1");
	if($excQry ){
		header("location:viewcontact.php?msg=ins");
	}else{
		header("location:contact.php?msg=inf");
	}
	}
	if(isset($_GET['msg'])&&$_GET['msg']!=''){
	$msg=$_GET['msg'];
$name='Contact us';
	switch($msg){
	case 'ins':
		$msg=$name.' Data has been added Successfully !!';
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
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>View Contact | <?php echo getSiteTitle(); ?> </title>
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
														<h4 class="mb-sm-0 font-size-18">Contect Us</h4>
														<div class="page-title-right">
														<a href="contact.php"	<button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Edit Content</button></a>

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
	<?php $fetch=mysqli_fetch_array(mysqli_query($con,"select * from contact where id=1")); ?>
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
	<div class="row"><div  class="mb-3 col-lg-12"><?php echo $fetch['content'] ?></div></div>

<div class="row" style="background-color:<?php echo getWebsiteColor() ?>;font-size:16px;text-align:center;padding:20px;color:#fff">
	<div  class="mb-3 col-lg-12" >
	Tel:<?php echo $fetch['tel'] ?></br>
	Email:-<?php echo $fetch['email'] ?></br>
	Monday-Friday:-<?php echo $fetch['timing'] ?></br>
	(Excl Bank Holidays)Saturday:-<?php echo $fetch['timing2'] ?></br>
</div>
</div>
<div class="row" ><div  class="mb-3 col-lg-12"><?php echo $fetch['content2'] ?></div></div>
<div class="row" style="background-color:<?php echo getWebsiteColor() ?>;font-size:16px;text-align:center;padding:20px;color:#fff">
    <div  class="mb-3 col-lg-12"><?php echo $fetch['address']?>
    </div>
</div>
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
