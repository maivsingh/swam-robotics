<?php
ob_start();
 date_default_timezone_set("Asia/Calcutta");
	require('config.php');
	
/*	$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo $details // -> "Amritsar"*/


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cmd="";
        
        if(isset($_POST['stop']))
    	    $cmd = "S";
	    else if (isset($_POST['backward']))
	        $cmd = "B";
	    else if (isset($_POST['forward']))
	        $cmd = "F";
	    else if (isset($_POST['left']))
	        $cmd = "L";
	    else if (isset($_POST['right']))
	        $cmd = "R";
	        
	        $date = date("Y-m-d");
		
		$time = date("h:i:s");
      
    //  echo "UPDATE `robo_command` SET cmd='$cmd', date='$date', time = '$time' WHERE `id`= 1";


// die();
    	//$cmd=$_REQUEST['cmd'];
    	$insertdata = mysqli_query($link,"UPDATE `robo_command` SET cmd='$cmd', date='$date', time = '$time' WHERE `id`= 1") or die(mysql_error("ERROR".$link));
    	if($insertdata)
    	{
    	    //echo json_encode(array("cmd"=>$cmd,));
    	}
    }

    
    

?>

<!doctype html>
<html lang="en">
<head>
<title>Robot Control</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<style>
.error {color: #FF0000;}
b { font-weight: 500;}
</style>

</head>
<body>
<div class="container container-sm container-md container-lg container-xl container-xxl border" style="width:500px; margin-top:20px; margin-bottom:20px; padding-bottom: 20px;">

<form  name="robotform" method="post" enctype="multipart/form-data">

<div class="col-xs col-sm col-md col-lg col-xl col-xxl"><h2 class="text-center"><i class="fas fa-car" style="color: #ff081a;"></i> Master Robot Control</h2></div>


<div class="col-xs col-sm col-md col-lg col-xl col-xxl">
    
    <?php    

	
	$sqlquery = mysqli_query($link,"SELECT * FROM `robo_command` where id = 1;") or die(mysql_error("ERROR".$link));
	$fetch = mysqli_fetch_array($sqlquery);
	
$longs = $fetch["longitude"];
	
$lats = $fetch["latitude"];
	
	


//http://maps.google.com/maps?q=24.197611,120.780512
	
 $mapurl = 'http://maps.google.com/maps?q='.$lats.','.$longs;

?>


</div>

<div class="container mx-auto" style="">

<div class="d-flex justify-content-center">
<div class="d-grid gap-2 d-md-block">
  <button class="btn btn-primary btn-lg" name="forward" type="submit"> <i class="fas fa-angle-double-up"></i> Forward</button>
</div>
</div>

<div class="container">&nbsp;</div>

<div class="container">
<div class="d-flex justify-content-between">
<div class="d-grid gap-2 d-md-block">
  <button class="btn btn-warning btn-lg" name="left" type="submit"> <i class="fas fa-angle-double-left"></i> Left</button>
</div>



<div class="d-grid gap-2 d-md-block">
  <button class="btn btn-success btn-lg" style="background-color:red;border-color:red" name="stop" type="submit"> <i class="far fa-square"></i> Stop    </button>
</div>



<div class="d-grid gap-2 d-md-block">
  <button class="btn btn-warning btn-lg" name="right" type="submit"> Right <i class="fas fa-angle-double-right"></i> </button>
</div>


</div>

</div>

<div class="container">&nbsp;</div>

<div class="d-flex justify-content-center">
<div class="d-grid gap-2 d-md-block">
  <button class="btn btn-primary btn-lg" name="backward"  type="submit"> <i class="fas fa-angle-double-down"></i> Backward</button>
</div>
</div>

</div>



</form>

</div>

</body>
</html>