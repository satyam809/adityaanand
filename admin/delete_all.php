<?php 
require 'config.php';
if(isset($_POST['id'])) {
		$id = trim($_POST['id']);
		$sql = "DELETE FROM contact WHERE id in ($id)";
        if(mysqli_query($conn,$sql)){
        /*if(mysqli_query($obj->con, $sql)){*/
            echo $id;
        }
		
	}

/*if (isset($_GET['export'])) {
		$obj->vendor_export();
			}*/
?>