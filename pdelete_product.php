<?php
	include('conn.php');

	$id = $_GET['history'];

	$sql="delete from history where historyid='$id'";
	$conn->query($sql);

	header('location:sales.php');
?>