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
if(isset($_GET['did'])&&$_GET['did']!=''){
$did=base64_decode($_GET['did']);
$pid=base64_encode($did);
//$delQry=mysqli_query($con,"delete from `websitepage` where `id`='$did'");
if($delQry){
header("location:viewpagetest.php?msg=dls");
}else{
header("location:viewpagetest.php?msg=dlf");
}
}
if(isset($_GET['msg'])&&$_GET['msg']!=''){
	$msg=$_GET['msg'];

	switch($msg){
	case 'ins':
		$msg='Data has been added Successfully !!';
		$class='success';
	break;

	case 'inf':
		$msg='Data not inserted Successfully !!';
		$class='danger';
	break;
	case 'ups':
		$msg='Data updated Successfully !!';
		$class='success';
	break;

	case 'upf':
		$msg='Data not updated Successfully !!';
		$class='danger';
	break;
  case 'dls':
		$msg='Data Deleted Successfully !!';
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
<title>View Page | <?php echo getSiteTitle(); ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'css.php'; ?>
<link rel="stylesheet" href="assets/css/msc-style.css">
<script src="assets/js/msc-script.js">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!--<script src="assets/libs/jquery/jquery.min.js"></script>--->
<!-- Font Awesome Css -->
<link href="css/font-awesome.min.css" rel="stylesheet" />
<!-- Bootstrap Select Css -->
<link href="assets/css/bootstrap-select.css" rel="stylesheet" />
<!-- Custom Css -->
<link href="assets/css/style.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

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
														<h4 class="mb-sm-0 font-size-18">All Pages</h4>
														<div class="page-title-right">
														<a href="addpage.php"	<button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Add New</button></a>

																															 </div>
												</div>
										</div>
								</div>
								   <p><button id="demo1">Simplest</button></p>
  <?php if($msg!=''){ ?>
  <div class="alert alert-<?php echo $class ?> alert-dismissible fade show" role="alert">
                <?php echo $msg; ?>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
        <?php } ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none">
<strong> Success ! </strong> <span class="success-message"> Post Order has been updated successfully </span>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="row">
<div class="col-lg-12">
	<div class="card" style="margin-bottom:0px">

		<table class="table table-light table-borderless" style="margin-bottom:0px">
			<tr  title="Home page can not be moved">
				<th width="5%" style="vertical-align:middle!important;">
					#
				</th>
				 <th width="25%" style="vertical-align:middle!important;">
						 Name
				 </th>

				 <th width="20%" style="vertical-align:middle!important;">Last Update</th>

				 <th width="15%" style="vertical-align:middle!important;">Status</th>
				 <th width="20%" style="vertical-align:middle!important;" >
										 Action
				 </th>
		 </tr>
		</table>
</div>
	<div class="card" style="margin-bottom:0px">
		<table class="table  table-borderless" style="margin-bottom:0px">
			<tr >
				<td width="5%" style="vertical-align:middle!important;">
						<div class="avatar-xs">
								<span class="avatar-title rounded-circle" style="background-color:#eff2f7">
									 <i class="fas fa-arrows-alt" title="You can't move home page"></i>
								</span>
						</div>
				</td>
				 <td width="25%" style="vertical-align:middle!important;">
						 <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Home Page</a></h5>
				 </td>

				  <td width="20%" style="vertical-align:middle!important;"><p class="text-muted mb-0"><?php echo getLastUpdate('websitehomepage','1'); ?></p></td>

				 <td width="15%" style="vertical-align:middle!important;"><?php echo getStatus(1); ?></td>
				 <td width="20%" style="vertical-align:middle!important;">
										  <a href="updatehome.php"><button type="button" class="btn btn-light "  title="Edit page content"><i class="fas fa-edit"></i></button></a>
										 <button type="button" class="btn btn-light" style="cursor:none"  disabled title="Delete Home page" ><i class="fas fa-trash-alt"></i> </button>
			 </td>
				 </td>
		 </tr>
		</table>
																										</div>

	<ul class="list-unstyled" id="post_list">
			 <?php
			 $i=0;
			 $qry=mysqli_query($con,"select * from websitepage order by position asc");
			 	$num=mysqli_num_rows($qry);
				if($num>0){
						while ($page=mysqli_fetch_array($qry)) {
							$i++;
							if ($page['theme']=='1') {
							$thm="Theme One";
							}
							if ($page['theme']=='2') {
							$thm="Theme Two";
							}
							if ($page['theme']=='3') {
							$thm="Theme Three";
							}
							?>
				<li data-post-id="<?php echo $page["id"]; ?>">
					<div class="card"  style="margin-bottom:0px;">
            <table class="table  table-borderless" style="margin-bottom:0px">
            	<tr>
            		 <td width="5%" style="vertical-align:middle!important;">
            				 <div class="avatar-xs" style="cursor:move">
            						 <span class="avatar-title rounded-circle">
            								<i class="fas fa-arrows-alt"></i>
            						 </span>
            				 </div>
            		 </td>
            		 <td width="25%" style="vertical-align:middle!important;">
            				 <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark"><?php echo $page['name'] ?></a></h5>
            		 </td>

                    <td width="20%" style="vertical-align:middle!important;"><p class="text-muted mb-0"><?php echo $page['date']; ?></p></td>
            		 <td width="15%" style="vertical-align:middle!important;"><?php echo getStatus($page['status']); ?></td>
            		 <td width="20%" style="vertical-align:middle!important;">
            								  <a href="viewcontent.php?pid=<?php echo base64_encode($page['id']) ?>">
																<button type="button" class="btn btn-light " title="Edit Page Content" ><i class="fas fa-edit"></i> </button></a>
																<a href="viewpagetest.php?did=<?php echo base64_encode($page['id']) ?>">
																	 <button  type="button" class="btn btn-light " title="Delete Page Content" onclick="mscConfirm('Are you sure want to delete !!',function(){
													 		mscAlert('Post deleted');})"><i class="fas fa-trash-alt"></i> </button></a>
            		 </td>
             </tr>
            </table>
																														</div>


			 </li>
			 <?php }}else{?>

			 <?php } ?>

</ul>
<div class="card">
	<table class="table  table-borderless" style="margin-bottom:0px">
		<tr  >
			<td width="5%" style="vertical-align:middle!important;">
					<div class="avatar-xs">
							<span class="avatar-title rounded-circle" style="background-color:#eff2f7">
								 <i class="fas fa-arrows-alt" title="You Can't move contact page"></i>
							</span>
					</div>
			</td>
			 <td width="25%" style="vertical-align:middle!important;">
					 <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Contact Page</a></h5>
			 </td>

			 <td width="20%" style="vertical-align:middle!important;"><p class="text-muted mb-0"><?php echo getLastUpdate('contact','1'); ?></p></td>

			 <td width="15%" style="vertical-align:middle!important;"><?php echo getStatus(1); ?></td>
			 <td width="20%" style="vertical-align:middle!important;" >
									  <a href="contact.php" ><button type="button" class="btn btn-light" title="Edit Contact Page" ><i class="fas fa-edit"></i> </button></a>
									 <button type="button" class="btn btn-light " disabled title="Delete Contact page" ><i class="fas fa-trash-alt"></i> </button>
			 </td>
	 </tr>
	</table>
																								</div>

</div>

</div>

</div>

</div>
<footer class="footer">
								<div class="container-fluid">
										<div class="row">
												<div class="col-sm-6">
														<script>document.write(new Date().getFullYear())</script> © Skote.
												</div>
												<div class="col-sm-6">
														<div class="text-sm-end d-none d-sm-block">
																Design & Develop by Themesbrand
														</div>
												</div>
										</div>
								</div>
						</footer>
</div>

</div>

<?php include 'script.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
$("#post_list" ).sortable({
//alert('sdfsdf');
placeholder : "ui-state-highlight",
update  : function(event, ui)
{
var post_order_ids = new Array();
$('#post_list li').each(function(){
post_order_ids.push($(this).data("post-id"));
});
$.ajax({
url:"update_fn.php",
method:"POST",
data:{post_order_ids:post_order_ids},
success:function(data)
{
if(data){
$(".alert-danger").hide();
$(".alert-success").show();
}else{
$(".alert-success").hide();
$(".alert-danger").show();
}
}
});
}
});
});
</script>
<script>
function errorMsg(){

	mscConfirm("Delete?",function(){
		mscAlert("Post deleted");
	});

		}
		document.addEventListener("DOMContentLoaded", function() {
			 var demobtn = document.querySelector("#demo1");
			 demobtn.addEventListener("click", function() {
				 mscConfirm("Delete?",function(){
					 mscAlert("Post deleted");
				 });
			 });
		 });
</script>
</body>
</html>
