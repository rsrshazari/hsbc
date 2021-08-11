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
	$timing3=$_POST['timing3'];
	$content2=$_POST['content2'];
	$address=$_POST['address'];

	$excQry=mysqli_query($con,"UPDATE `contact` SET `content`='$content',`tel`='$tel',`email`='$email',`timing`='$timing',`timing2`='$timing2',`timing3`='$timing3',`content2`='$content2',`address`='$address',`status`='1',`date`='$date' WHERE `id`=1");
	if($excQry ){
		header("location:viewcontact.php?msg=ins");
	}else{
		header("location:contact.php?msg=inf");
	}
	}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Edit Contact | <?php echo getSiteTitle(); ?> </title>
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
														<h4 class="mb-sm-0 font-size-18">Update Content</h4>

												</div>
										</div>
								</div>
<?php if($msg!=''){ ?>
<div class="alert alert-<?php echo $class ?> alert-dismissible fade show" role="alert">
<?php echo $msg; ?>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<form action="" method="post"   enctype="multipart/form-data">
	<?php $fetch=mysqli_fetch_array(mysqli_query($con,"select * from contact where id=1")); ?>
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
	<div class="row"><div  class="mb-3 col-lg-12"><label for="name">Content</label><textarea id="editor" name="content" class="form-control"><?php echo $fetch['content'] ?></textarea></div></div>

<div class="row">
	<div  class="mb-3 col-lg-3"><label for="name">Telephone</label><input type="text" id="name" required name="tel" placeholder="##########"  class="form-control" value="<?php echo $fetch['tel'] ?>"/></div>
	<div  class="mb-3 col-lg-3"><label for="name">Email</label><input type="text" id="email" required name="email" placeholder="#####@###.##" class="form-control" value="<?php echo $fetch['email'] ?>"/></div>
	<div  class="mb-3 col-lg-2"><label for="name">Monday-Friday</label><input type="text" id="holiday" required name="timing" placeholder="Timing(08:00-18:00)" class="form-control" value="<?php echo $fetch['timing'] ?>"/></div>
	<div  class="mb-3 col-lg-2"><label for="name">Saturday</label><input type="text" id="sat" required name="timing2" placeholder="Timing(Excl Bank Holidays)" class="form-control" value="<?php echo $fetch['timing2'] ?>"/></div>
    <div  class="mb-3 col-lg-2"><label for="name">Sunday</label><input type="text" id="sun" name="timing3" placeholder="Sunday" class="form-control" value="<?php echo $fetch['timing3'] ?>"/></div>

</div>
<div class="row"><div  class="mb-3 col-lg-12"><label for="name">Content</label><textarea id="editor2" name="content2" class="form-control"><?php echo $fetch['content2'] ?></textarea></div></div>
<div class="row"><div  class="mb-3 col-lg-12"><label for="name">Address</label><textarea id="address" required name="address" class="form-control"><?php echo $fetch['address']?></textarea></div></div>

	<div class="row">
		<div class="mb-3 col-md-4">
		    	<button type="submit" name="addpage" class="btn btn-primary w-md btn-sm">Update</button>	<button type="reset" name="resetpage" class="btn btn-light btn-sm w-md">Cancel</button>
		</div>
		<div class="mb-3 col-md-4">
	
		</div>
		<div class="mb-3 col-md-4">
	
		</div>
		<div class="mb-3 col-md-4"></div>
	</div>
</div>
</div>
</div>

</div>



</form>
</div>
</div>
<?php include 'footer.php' ?>
</div>
</div>
<?php include 'script.php'; ?>
<script>
  CKEDITOR.replace( 'editor' );
	CKEDITOR.replace( 'editor2' );
	CKEDITOR.replace( 'address' );
</script>
</body>
</html>
