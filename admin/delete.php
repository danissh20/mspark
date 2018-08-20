<?php
 	include '../connections/db_connect.php' ;
	mysqli_report(MYSQLI_REPORT_ALL);
	$idd = $_POST['id'];
	
$_SESSION['loggedin'] = true;/*For testing*/

if(isset($_POST['deleteproduct']) && $_SESSION['loggedin'] == true ){
	echo "Delete Product";
	
	$sql_display = "SELECT id, img_one FROM products WHERE id='$idd'; ";
	$result = $db->query($sql_display);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$filename = "../uploads/products/".$row['img_one'];
		}
	}
	
	if (file_exists($filename)) {
    unlink($filename);
    echo 'File '.$filename.' has been deleted';
	
	$sql_query3 = $db->prepare("DELETE FROM products WHERE id=? LIMIT 1") OR die('query preparation failed');
	$sql_query3->bind_param("i",$idd);
	$sql_query3->execute() OR die('query execution failed');	
	//header("Location: form-allproduct.php");
	
	}
	else{
		echo "<p>Error Image was not deleted</p>";
	}
	
}
elseif(isset($_POST['deleteblog']) && $_SESSION['loggedin'] == true ){
	echo "Delete Blog";
	
	$sql_display = "SELECT id, image FROM posts WHERE id='$idd'; ";
	$result = $db->query($sql_display);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$filename = "../uploads/blogs/".$row['image'];
		}
	}
	
	if (file_exists($filename)) {
    unlink($filename);
    echo 'File '.$filename.' has been deleted';
	
	$sql_query3 = $db->prepare("DELETE FROM posts WHERE id=? LIMIT 1") OR die('query preparation failed');
	$sql_query3->bind_param("i",$idd);
	$sql_query3->execute() OR die('query execution failed');	
	header("Location: form-allblog.php");
	
	}
	else{
		echo "<p>Error Image was not deleted</p>";
	}
	
}
else{
	echo "Unauthorized Access";
}
?>