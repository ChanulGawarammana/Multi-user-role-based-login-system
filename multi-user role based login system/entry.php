<?php 

	$date = $_POST['date'];
	$diaryentry = $_POST['diaryentry'];


$conn = new mysqli('localhost','root','','test');
if($conn ->connect_error){
	die('connect_failed :' .$conn->connect_error);
}else{
	$stmt = $conn->prepare("insert into diaryentry(date,diaryentry)values(?,?)");
	$stmt ->bind_param("ssssssi",$date, $diaryentry);
	$stmt ->execute();
	echo "diary updated";
	$stmt ->close();
	$conn->close();
}
?>