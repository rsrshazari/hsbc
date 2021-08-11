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
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Dashboard | <?php echo getSiteTitle(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include 'css.php'; ?>
				<script src="assets/libs/jquery/jquery.min.js"></script>
				<style>.btn-grad {background-image: linear-gradient(to right, #AC268B 0%, #bfe9ff  51%, #ff6e7f  100%)}
         .btn-grad {
            margin: 10px;
            padding: 5px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 10px #eee;
            border-radius: 3px;
            display: block;
            height:35px;
            border:0px;
          }

          .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }</style>
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
                            <div class="col-xl-12">
                                <div class="card overflow-hidden">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class=" p-3">
                                                    <h5 class="text-primary" style="margin:20px 0 30px">Welcome <?php echo $fetch[username] ?> !</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius, odio quis vestibulum hendrerit, nisl neque venenatis purus, non scelerisque nulla risus at nisl. Proin pretium, justo quis ultricies vehicula, nisi mi condimentum ar Proin pretium, justo quis ultricies vehicula, nisi mi condimentum arProin pretium, justo quis ultricies vehicula, nisi mi condimentum arProin pretium, justo quis ultricies vehicula, nisi mi condimentum ar </p>
																									
                                                <a href="addpage.php" ><button class="btn-primary btn-sm btn">Create New Page</button></a>



                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
									                    <!-- <div class="card-body pt-0">
                                        <div class="row">


                                            <div class="col-sm-12">
                                                <div class="pt-4">

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="font-size-15"><?php echo getTotalPage(); ?></h5>
                                                            <p class="text-muted mb-0">Pages</p>
                                                            <div class="mt-4">
                                                              <a href="viewpage.php" class="btn btn-primary waves-effect waves-light btn-sm">View Pages <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                            </div>
                                                                    </div>
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">0</h5>
                                                            <p class="text-muted mb-0">Views</p>
                                                              <div class="mt-4">
                                                            <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                          </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
									</div>
									</div>
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
    </body>
</html>
