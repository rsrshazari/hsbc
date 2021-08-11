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
	$pgname=$_POST['pgname'];
	$url=$pgname.'.php';
	$theme=$_POST['theme'];
	$pos=$_POST['order'];
	$status=$_POST['sts'];
	//$title=$_POST['title'];
	//$content=$_POST['content'];
	$excQry=mysqli_query($con,"INSERT INTO `websitepage`(`id`, `name`, `url`, `position`, `theme`, `status`,`date`) VALUES ('NULL','$pgname','$url','$pos','$theme','$status','$date')");
$insId=mysqli_insert_id($con);
$pid=base64_encode($insId);
$i=0;
if( isset($_POST['pp']) && is_array( $_POST['pp'])) {
		foreach( $_POST['pp'] as $pp ) {
			$i++;
			$subh=generateRandomString();
			$res = $con->query("insert into websitepagecontent (`pid`, `heading`,`subheading`, `content`, `position`, `status`, `date`)
				value('".$insId."','".$pp["title"]."','".$subh."','".$pp["content"]."', '".$i."','".$status."','".$date."')");
		}
	}
//$cqry=mysqli_query($con,"INSERT INTO `websitepagecontent`(`id`, `pid`, `heading`, `subheading`, `content`, `position`, `status`, `date`)VALUES (NULL,'$insId','$title','','$content','$pos','1','$date')");
	if($excQry ){
		header("location:viewpage.php?msg=ins&pid=$pid");
	}else{
		header("location:addpage.php?msg=inf");
	}
	}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Add Page| <?php echo getSiteTitle(); ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'css.php'; ?>
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<style>
#sticky-div {
   position : fixed;
 /*bottom:0;*/

}
</style>
<script>
$counter =0;
//$a =0;
	// add code
		function addCode(ele)
		{
			$button = $(ele);
			// increment
			$counter += 1;
			$button.closest('tr').before('<tr><td><div  class="mb-3 col-lg-12"><label for="name">Title</label><input type="text"  name="pp['+$counter+'][title]" class="form-control"/></div><div  class="mb-3 col-lg-12"><label for="name">Content</label><textarea class="form-control" id="editor'+$counter+'" placeholder="Content" name="pp['+$counter+'][content]"></textarea></div><div style="text-align:right"><button class="btn btn-danger btn-sm remove_code"  type="button" onClick="remove(this)">Remove section</button></div></td></tr>');
			var a="editor"+$counter;
			CKEDITOR.replace(a);
		}
		function remove(ele)
		{
			$button = $(ele);
			$button.closest('tr').remove();
			return false;
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
														<h4 class="mb-sm-0 font-size-18">Add New</h4>

												</div>
										</div>
								</div>
<?php if($msg!=''){ ?>
<div class="alert alert-<?php echo $class ?> alert-dismissible fade show" role="alert">
<?php echo $msg; ?>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<form id="myform" action="" method="post"   enctype="multipart/form-data">
<div class="row">
<div class="col-lg-9">
<div class="mb-3 col-lg-12">
<input type="text" placeholder="Page Title" required class="form-control" id="pgname" name="pgname">
</div>
<div class="card">
<div class="card-body">
<h4 class="card-title mb-4">Page Content</h4>
<table class="table ">
		<tr>
			<td>
				<div  class="mb-3 col-lg-12"><label for="name">Title</label><input type="text" id="name" name="pp[0][title]" class="form-control"/></div>
				<div  class="mb-3 col-lg-12"><label for="name">Content</label><textarea id="editor" name="pp[0][content]" class="form-control"></textarea></div>		</td>
		</tr>
		<tr>
			<td colspan="2">
				<button class="btn btn-success btn-sm" type="button" name="add_code" onClick="addCode(this)">Add New Section</button>&nbsp;
			</td>
		</tr>
	</table>
</div>
</div>
</div>
<div class="col-lg-3" id="pageAtt" >
<div class="row" id="sticky-div">
<div class="col-12">
	<div class="card">
	<div class="card-body">
	<h4 class="card-title mb-4">Page Attribute</h4>
	<div  class="mb-3 col-lg-12">
<label for="theme">Theme</label>
<select class="form-control" name="theme" id="theme">
	<option value="1">Default</option>
	<option value="2">Theme Two</option>
	<option value="3">Theme Three</option>
</select>
</div>

<!--<div  class="mb-3 col-lg-12">
<label for="status">Order</label>
<input  type="text" id="order" name="order" class="form-control" value="<?php echo getNextPosition() ?>"/>

</div>-->
<div  class="mb-3 col-lg-12">
<label for="order">Status</label>
<select class="form-control" name="sts" id="sts">
	<option value="1">Publish</option>
	<option value="0">Save As Draft</option>

</select>
</div>
<div class="row">
	<div class="mb-3 col-md-6">
	<button type="submit" name="addpage" class="btn btn-primary w-md btn-sm">Update</button>
	</div>
	<div class="mb-3 col-md-6">
	<button type="reset" name="resetpage" class="btn btn-light btn-sm w-md">Cancel</button>
	</div>
</div>

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
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

$('#myform').validate({
rules: {
		pgname: "required",

 title: "required",
 editor: "required"
},
messages: {
	pgname: "Please enter page title",
	title: "Please enter title",
	editor:"Please enter content"
},
submitHandler: function(form) { // for demo
	form.submit();
}
});

});
</script>
<script>
  CKEDITOR.replace( 'editor' );
</script>
</body>
</html>
