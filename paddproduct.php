<?php
	include('conn.php');

	$pname=$_POST['pname'];
	$pcontact=$_POST['pcontact'];
	$location=$_POST['location'];


	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
	
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	
	$sql="insert into history (pname, pcontact, location) values ('$pname', '$pcontact', '$location')";
	$conn->query($sql);

	header('location:sales.php');

?>