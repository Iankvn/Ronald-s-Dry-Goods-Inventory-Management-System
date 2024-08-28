<?php
	include('conn.php');

	$id=$_GET['history'];

	$pname=$_POST['pname'];
	$pcontact=$_POST['pcontact'];
	$location=$_POST['location'];

	$sql="select * from history where historyid='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}

	$sql="update history set pname='$pname', pcontact='$pcontact', location='$location' where historyid='$id'";
	$conn->query($sql);

	header('location:sales.php');
?>