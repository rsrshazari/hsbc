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
if(isset($_POST['update'])){
$pid=base64_encode($_POST['hidId']);
$id=$_POST['hidId'];
$name=$_POST['name'];
$status=$_POST['sts'];
$date=date('d-m-Y h:i:sa');
$delQry=mysqli_query($con,"update websitepage set name='$name', status='$status',date='$date' where `id`='$id'");
if($delQry){
header("location:viewcontent.php?msg=ups&pid=$pid");
}else{
header("location:viewcontent.php?msg=inff&pid=$pid");
}
}
if(isset($_GET['did'])&&$_GET['did']!=''){
$did=base64_decode($_GET['did']);
$pid=($_GET['pid']);
$delQry=mysqli_query($con,"delete from `websitepagecontent` where `id`='$did'");
if($delQry){
header("location:viewcontent.php?msg=dls&pid=$pid");
}else{
header("location:viewcontent.php?msg=dlf&pid=$pid");
}
}
if(isset($_GET['pid'])&&$_GET['pid']!=''){
	$pid=base64_decode($_GET['pid']);
	$page=mysqli_fetch_array(mysqli_query($con,"select * from websitepage where id='$pid'"));
}
if(isset($_GET['msg'])&&$_GET['msg']!=''){
	$msg=$_GET['msg'];
$name=getPageNameById(base64_decode($_GET['pid']));
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

	case 'dlf':
		$msg=$name.' section not deleted !!';
		$class='danger';
	break;
  case 'dls':
		$msg=$name.' Section Deleted Successfully !!';
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
        <title>View Content | <?php echo getSiteTitle(); ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include 'css.php'; ?>

					<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
				<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
				<script type="text/javascript" src="assets/js/bootstrap-select.js"></script>
				<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
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
						                                    <h4 class="mb-sm-0 font-size-18"><?php echo  $page['name'] ?></h4>
																								<div class="page-title-right">
																								<a href="addmorecontent.php?pid=<?php echo base64_encode($page['id']) ?>"	<button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Add Section</button></a>

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
						                        <!-- end page title -->
																	        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none">
<strong> Success ! </strong> <span class="success-message"> Section Order has been updated successfully </span>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
																		<div class="alert icon-alert with-arrow alert-danger form-alter" role="alert" style="display:none">
																		<i class="fa fa-fw fa-times-circle"></i>
																		<strong> Note !</strong> <span class="warning-message"> Empty list can't be Process </span>
																		</div>
						                        <div class="row">
						                            <div class="col-lg-9">
																						<div class="accordion" id="accordionExample">
	<ul class="list-unstyled" id="post_list">
																					<?php
																					$i=0;

																					$qry=mysqli_query($con,"select * from websitepagecontent where pid='$pid' order by position asc");
																					 $num=mysqli_num_rows($qry);
																					 if($num>0){
																							 while ($fetch=mysqli_fetch_array($qry)) {
																								 $i++;
																								 	$head='Heading'.$i;
																									$colsp='Collaspe'.$i;
																								 ?>
																					<li data-post-id="<?php echo $fetch["id"]; ?>">

																					 <div class="accordion-item"  style="cursor:move">
																							 <h2 class="accordion-header" id="<?php echo $head; ?>">

																									 <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $colsp; ?>" aria-expanded="true" aria-controls="<?php echo $colsp; ?>">
																									 <div class="avatar-xs" style="cursor:move">
            						                                                                    <span class="avatar-title rounded-circle">
            							                                                                	<i class="fas fa-arrows-alt"></i>
            						                                                                    </span>
            				                                                                         </div>  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fetch['heading'] ?>
																									 </button>
																							 </h2>
																							 <div id="<?php echo $colsp; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $head; ?>" data-bs-parent="#accordionExample">
																									 <div class="accordion-body">
																											 <div class="text-muted">
																													 <?php echo $fetch['content'] ?>
																											 </div>
																											 <div  style="text-align:right">

																												<a href="editcontent.php?cid=<?php echo base64_encode($fetch['id']) ?>" title="Message"><button type="button" class="btn btn-dark btn-sm "><i class="bx bx-edit"></i> Edit</button></a>
																												<a href="viewcontent.php?did=<?php echo base64_encode($fetch['id']) ?>&pid=<?php echo base64_encode($pid) ?>" title="Profile"><button type="button" class="btn btn-danger btn-sm " onClick="return confirm(' Are you sure you want to delete !!')"><i class="bx bxs-trash"></i> Delete</button></a>

																											</div>
																									 </div>
																							 </div>
																					 </div>

																						</li>
																					<?php }} ?>
																				</ul>
																				</div>
						                            </div>
						                            <!-- end col -->

						                            <div class="col-lg-3">

						                                <div class="card">
						                                    <div class="card-body">
						                                        <h4 class="card-title mb-4">Page Attribute</h4>
						                                      			<form action=""method="post">
																										<div  class="mb-3 col-lg-12">
																														<label for="status">Name</label>
																															<input  type="hidden" id="hidId" name="hidId" class="form-control" value="<?php echo $page['id'] ?>"/>
																														<input  type="text" id="name" name="name" class="form-control" value="<?php echo $page['name'] ?>"/>
																																</div>
																										<div  class="mb-3 col-lg-12">
																																<label for="order">Status</label>
																																<select class="form-control" name="sts" id="sts">
																																	<option value="1">Published</option>
																																	<option value="0" <?php if($page['status']=='0'){ ?>selected<?php } ?>>Save As Draft</option>

																																</select>
																																</div>
																																<div class="mb-3 col-lg-12" style="text-align:center">
																																	<button type="submit" name="update" class="btn btn-primary btn-sm waves-effect waves-light">Update </button>
																																</div>

																								</form>

						                                    </div>
						                                </div>
						                            </div>
						                            <!-- end col -->
						                        </div>
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
<?php include 'footer.php' ?>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
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
	url:"update_fn2.php",
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
    </body>
</html>
