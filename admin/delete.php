<?php 
   include 'config.php';
    if(isset($_GET['ids'])){
      //print_r($_GET['Delete']);die;
      $sql="DELETE FROM `image_table` WHERE image_id='".$_GET['ids']."'";
      //$result=mysqli_query($conn,$sql);
      //print_r($sql);die;
      if(mysqli_query($conn,$sql)){
        echo '<script language="javascript">';
              echo 'alert("Delete Sucessfully")';
              echo '</script>';
      }
      else{
         echo "Could not deleted record: ". mysqli_error($conn);  
      }
    }
   ?>