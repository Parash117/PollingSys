<?php
include('dbconnection.php');

//if(isset($_GET["qid"])){
	$qid = $_GET["qid"];
	$sub = $_GET["sub"];
	$a = $_GET["a"];
	$b = $_GET["b"];
	$c = $_GET["c"];
	$d = $_GET["d"];
	$e = $_GET["e"];
	$sql = "UPDATE $sub SET a = a+$a, b=b+$b, c=c+$c, d=d+$d, e=e+$e where ID = $qid";
	if(mysqli_query($conn, $sql)){
	        echo json_encode(['status'=>'success']);
	      }
	      else{
	      	echo "error".$conn->error;
	      }
	//echo "hello World";
//}

?>





