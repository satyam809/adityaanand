<?php
include 'config.php';
extract($_POST);
if(isset($_POST['readrecord'])) {
	$data='<table class="table table-bordered table-striped ">
						<tr class="bg-dark text-white">
							<th>No.</th>
							<th>Video Name</th>
							<th>URL</th> 
							<th>Edit Action</th>
							<th>Delete Action</th>
						</tr>';
	$displayquery="SELECT * FROM `video_table`";
	$result=mysqli_query($conn,$displayquery);
	if (mysqli_num_rows($result) > 0) {
	    $number = 1;
	    while ($row=mysqli_fetch_array($result)) {
	    	$data.='<tr>
	    	<td>'.$number.'</td>
	    	<td>'.$row['video_name'].'</td>
	    	<td>'.$row['video_link'].'</td>
	    	<td>
	    	    <button onclick="GetUserDetails('.$row['video_id'].')" class="btn btn-warning">Edit</button>
	    	</td>
	    	<td>
	    	    <button onclick="DeleteUser('.$row['video_id'].')" class="btn btn-danger">Delete</button>
	    	</td>
	    	</tr>';
	    	$number++;    
	    }
	}
	$data .= '</table>';
	echo $data;					
}
// insert
if (isset($_POST['video_name']) && isset($_POST['video_link'])) 
{
	
	$query="INSERT INTO `video_table`(`video_name`, `video_link`) VALUES ('$video_name','$video_link')";
	$conn=mysqli_connect("localhost","root","","adityaanand");
	$insert=mysqli_query($conn,$query);//print_r($insert);die();
}

/// delete
if (isset($_POST['deleteid'])) {
	//print_r($_POST['deleteid']);die();
		$userid=$_POST['deleteid'];
		//print_r($userid);die();
		$delete="DELETE from video_table where video_id='$userid' ";
		mysqli_query($conn,$delete);
	}
// get user detail
if (isset($_POST['id']) && isset($_POST['id']) != "") {
			$user_id=$_POST['id'];
			$query="SELECT * FROM video_table where video_id='$user_id'";
			$result=mysqli_query($conn,$query);
			/*if(!$result){
				exit(mysqli_error());
			}*/
			$response=array();
			if(mysqli_num_rows($result) > 0) {
				while($row=mysqli_fetch_assoc($result)){
					$response=$row;
				}
			}
			else
			{
				$response['status']=200;
				$response['message']="Data not found";
			}
			echo json_encode($response);
}		
else
{
	$response['status']=200;
	$response['message']="Invalid Request";
}
/// update
if (isset($_POST['hidden_user_idupd'])) {
	$hidden_user_idupd=$_POST['hidden_user_idupd'];
	$video_nameupd=$_POST['video_nameupd'];
	$video_linkupd=$_POST['video_linkupd'];
	$query="UPDATE `video_table` SET `video_name`='$video_nameupd',`video_link`='$video_linkupd' WHERE video_id=$hidden_user_idupd";
	mysqli_query($conn,$query);
}
?>