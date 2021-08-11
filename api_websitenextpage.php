<?php
 include("configuration/connect.php");
 include("configuration/functions.php");
 header('Content-Type:application:json');
 header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 ?>
<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
 $pid  = $_GET['pid'];
$qry6=mysqli_fetch_array(mysqli_query($con,"SELECT position FROM `websitepage` WHERE id='$pid' "));
$pos=$qry6['position'];
$qry=mysqli_query($con,"SELECT * FROM `websitepage` WHERE position>'$pos' and status='1' order by position asc limit 1");
$num=mysqli_num_rows($qry);
$records= array();
if($num>0){
if($qry)
{
	while($record=mysqli_fetch_assoc($qry))
	{
		$records[]=$record;

	}
//$abc['mnu']=$records;

}
}
else{
  array_push($records,array("id"=>'0',
		"name"=>'contact-us'

		));
}
echo json_encode($records);
}
	//echo $num;
//print_r ($records);
?>
