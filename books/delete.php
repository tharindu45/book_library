<?php require_once('connection_database.php'); ?>
<?php 
session_start();

 if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	mysqli_query($connection, "DELETE FROM book WHERE id=$id");
    header("Location:view.php");
	
}

?>