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
	$pid=base64_encode(1);
	$content=$_POST['content'];
	$filename = $_FILES['image']['name'];
  $valid_ext = array('png','jpeg','jpg','ico');
   $location2="patientZoneCMSAdmin/src/assets/img/".$filename;
  $location = "patientZoneCMSAdmin/src/assets/img/".$filename;
  $file_extension = pathinfo($location, PATHINFO_EXTENSION);
  $file_extension = strtolower($file_extension);
  if(in_array($file_extension,$valid_ext)){
    compressImage($_FILES['image']['tmp_name'],$location,60);
	  }else{
    echo "Invalid file type.";
	  }

	if($filename!=''&& $filename!=''){
	$sqlQry="UPDATE `websitehomepage` SET `content`='$content',`img`='$filename',`status`='1',`date`='$date' WHERE `id` =1";
 }else{
	 	$sqlQry="UPDATE `websitehomepage` SET `content`='$content',`status`='1',`date`='$date' WHERE `id` = 1 ";

 }
$excQry=mysqli_query($con,$sqlQry);
 if($excQry ){
		header("location:viewhomepage.php?msg=ins&pid=$pid");
	}else{
		header("location:viewhomepage.php?msg=inf&pid=$pid");
	}
	}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Update Home Page| <?php echo getSiteTitle(); ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'css.php'; ?>
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
function readURL(input) {
		if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
						$('#pimage')
								.attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
		}
}
</script>
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
														<h4 class="mb-sm-0 font-size-18">Update Home Page</h4>

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
	<?php $fetch=mysqli_fetch_array(mysqli_query($con,"select * from websitehomepage where id=1")); ?>
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
	<div class="row">
		<div  class="mb-3 col-lg-6">
		<label for="name">Content</label><textarea id="editor" name="content" class="form-control"><?php echo $fetch['content'] ?></textarea>
		<div  class="mb-3 col-lg-12" style="padding-top:25px"><label for="name">Image</label><input class="form-control form-control" id="image" type="file" name="image" onchange="readURL(this);"></div>

	</div>
		<div  class="mb-3 col-lg-6" >
			<label for="name">Image</label>	<img id="pimage" src="patientZoneCMSAdmin/src/assets/img/<?php echo $fetch['img'] ?>"  alt=""></div>
		</div>
		<div class="row">
		</div>



	<div class="row">
		<div class="mb-3 col-md-4">
		    <button type="submit" name="addpage" class="btn btn-primary w-md btn-sm">Update</button>&nbsp;&nbsp;&nbsp;<button type="reset" name="resetpage" class="btn btn-light btn-sm w-md">Cancel</button>
		</div>
	
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

</script>
</body>
</html>
