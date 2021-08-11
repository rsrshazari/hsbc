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
checkIntrusion($adminId);
$qry=mysqli_query($con,'select * from websiteheader');
$hqry=mysqli_fetch_array($qry);
if(isset($_POST['update'])){
	extract($_POST);
	$id=$_POST['hidid'];
	$crmname=$_POST['name'];
	$crmtitle=$_POST['contact'];
	$crmtagline=$_POST['tagline'];
	$color=$_POST['color'];
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
	$sqlQry="UPDATE `websiteheader` SET `site_name`='$crmname',`site_logo`='$filename',`site_contact`='$crmtitle',`site_tagline`='$crmtagline',`status`='1',`color`='$color'
	 WHERE `id` = '$id'";
 }else{
	 $sqlQry="UPDATE `websiteheader` SET `site_name`='$crmname',`site_contact`='$crmtitle',`site_tagline`='$crmtagline',`status`='1',`color`='$color'  WHERE `id` = '$id'";

 }
	$execQry=mysqli_query($con,$sqlQry);
	if($execQry){
		header("location:profile.php?msg=ups");
	}else{
		header("location:profile.php?msg=upf");
	}
}
if(isset($_GET['msg'])&&$_GET['msg']!=''){
	$msg=$_GET['msg'];

	switch($msg){
	case 'ins':
		$msg='Profile data has been added Successfully !!';
		$class='success';
	break;

	case 'inf':
		$msg='Profile data not inserted Successfully !!';
		$class='danger';
	break;
	case 'ups':
		$msg='Profile data updated Successfully !!';
		$class='success';
	break;

	case 'upf':
		$msg='Profile data not updated Successfully !!';
		$class='danger';
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
        <title>Profile | <?php echo getSiteTitle(); ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include 'css.php'; ?>
				 <link href="assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
				<script src="assets/libs/jquery/jquery.min.js"></script>

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
														<h4 class="mb-sm-0 font-size-18">Profile  </h4>
														<div class="page-title-right">
														<!--<a href="addpage.php"	<button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Add Page</button></a>-->

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
											<div class="row">
					                            <div class="col-lg-8">
					                                <div class="card">
					                                    <div class="card-body">


																									<form  id="myform" action="" method="post" enctype="multipart/form-data">
																										<input type="hidden" name="hidid" value="<?php echo $hqry['id'] ?>">
																		 <div class="row">
																		      <div class="col-md-6">
																						 <div class="mb-3">
																								 <label for="formrow-name-input" class="form-label">Name <span style="color:red">*</span></label>
																								 <input type="text" class="form-control" id="name" name="name" value="<?php echo $hqry['site_name'] ?>">
																						 </div>
																						 	 <div class="mb-3">
																								 <label for="TagLine" class="form-label"> TagLine </label>
																								 <input type="text" class="form-control" id="tagline" name="tagline" value="<?php echo $hqry['site_tagline'] ?>" >
																						 </div>
																						 <div class="mb-3">
																								 <label for="formrow-inputContact" class="form-label"> Contact (with county code) <span style="color:red">*</span></label>
																								 <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $hqry['site_contact'] ?>" >
																						 </div>
																						 <div class="mb-3">
																			 						<label class="form-label">Color</label>
																			 						<input type="text" name="color" required class="form-control" id="colorpicker-default" value="<?php echo $hqry['color'] ?>">
																			 			</div>
																				 </div>


																				 <div class="col-md-6">
																						<div class="mb-3">
																			 				<label for="formrow-logo-input" class="form-label"> Logo <span style="color:red">*</span></label><br>
																							<div style="width:70px;height:70px;margin:20px auto 10px;overflow:hidden">
																				<img id="pimage" src="patientZoneCMSAdmin/src/assets/img/<?php echo $hqry['site_logo'] ?>"  alt="" style="width:70px">
																				</div>

																							<input style="margin-top:10px" class="form-control form-control" id="image" type="file" name="image" onchange="readURL(this);">
																			 		</div>
																				 </div>

																		 </div>
																		 <div >
																		 <button type="submit" name="update" class="btn btn-primary w-md">Update Profile</button>
																																									 	</div>
																		 <div>

																		 </div>
																 </form>
					                                    </div>
					                                    <!-- end card body -->
					                                </div>
					                                <!-- end card -->
					                            </div>
					                            <div class="col-lg-4">

					                                        <img src="assets/images/verification-img.png" height="330" width="330"/>

					                            </div>
					                            <!-- end col -->
					                        </div>
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
								<footer class="footer" style="position:absolute">
										<div class="container-fluid">
												<div class="row">
														<div class="col-sm-6">
																<!--<script>document.write(new Date().getFullYear())</script> © Trust.-->
														</div>
														<div class="col-sm-6">
																<div class="text-sm-end d-none d-sm-block">
																	<span class="text-muted">  Powered By</span> <img src="Picture3.png" alt="Trust" height="37">
																</div>
														</div>
												</div>
										</div>
								</footer>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
  <?php include 'script.php'; ?>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

$('#myform').validate({
	rules: {
			name: "required",
			contact: {
		required: true,
		 number: true,
		 minlength: 10,
		 maxlength: 10
	 },
	 formFileSm: "required"
	},
	messages: {
		name: "Please enter name",

		contact: {
			required: "Please enter contact no",
			minlength: "Please enter 10 digit contact no",
			maxlength: "Please enter 10 digit contact no"
		},
		formFileSm: "Please select logo"
	},
	submitHandler: function(form) { // for demo
		form.submit();
	}
});

});
</script>
	<script src="assets/libs/select2/js/select2.min.js"></script>

	<script src="assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>


	<!-- form advanced init -->
	<script src="assets/js/pages/form-advanced.init.js"></script>
    </body>
</html>
