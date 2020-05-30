<html>
<title>No of Questions</title>
<head>No of question</head>

<?php
include('dbconnection.php');
	if(isset($_POST['qno'])){
		
		$tableName = $_POST['tname'];
		$noofquestion = $_POST['qno'];

		$query = "SELECT ID FROM ".$tableName;
		$result = mysqli_query($conn, $query);

		if($result->num_rows > 0){
                
		}else{
			$sql = "CREATE TABLE ".$tableName." ( ID int(11) AUTO_INCREMENT,a int(11),b int(11),c int(11),d int(11),e int(11),PRIMARY KEY  (ID) )";
			$result = mysqli_query($conn, $sql);
        	echo $result;

        	for($i = 0; $i<$noofquestion;$i++){
        		$sql2 = "INSERT INTO ".$tableName." (a,b,c,d,e)VALUES(0,0,0,0,0)";
        		mysqli_query($conn, $sql2);
        	}
		}
	}
$conn->close();

?>
</body>
<?php
echo $_SERVER['REMOTE_ADDR'];
?>
<form action="index.php" method="POST">
<input type="number" name="qno" placeholder="Enter No of Questions">
<input type="text" name="tname" placeholder="New Table Name">
<input type="submit" name="submit" value="Submit">
</form>


</body>
</html>