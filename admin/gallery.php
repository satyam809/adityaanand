<?php
   session_start();
   function check_login(){
     //print_r($_SESSION['login']);
     if(strlen($_SESSION['login'])==0){
       header('location:login.php');
     }
   }
   check_login();
   
?>
<?php 
   include 'config.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
   
   //$id=$_POST['id'];
   
    $count= count($_FILES['images']['name']);
    for ($i=0; $i <$count ; $i++) 
    { 
        $photo = $_FILES['images']['name'][$i];
        $target="../images/".basename($photo);
   
   
        $sql="INSERT INTO `image_table`(`images`) VALUES ('$photo')";
        if(mysqli_query($conn,$sql))
            if(move_uploaded_file($_FILES["images"]["tmp_name"][$i], $target)){
              echo '<script language="javascript">';
              echo 'alert("Images uploaded Sucessfully")';
              echo '</script>';
            }
          }
    }
?>
<?php 
   //include 'config.php';
    if(isset($_GET['ids'])){
      //print_r($_GET['Delete']);die;
        $sql="SELECT * FROM `image_table` WHERE image_id='".$_GET['ids']."'";
      //$result=mysqli_query($conn,$sql);
      //print_r($sql);die;
        $result=mysqli_query($conn,$sql);
        $filename=mysqli_fetch_array($result);//print_r($filename);die;
        if(file_exists("../images/$filename[images]")){
        $del_file=unlink("../images/$filename[images]");
          if($del_file){
          $delete="DELETE FROM `image_table` WHERE image_id='".$_GET['ids']."'";
          $del_image=mysqli_query($conn,$delete);
              if($del_image){
              echo '<script language="javascript">';
                    echo 'alert("Delete Sucessfully")';
                    echo '</script>';
              }
          }
        }
        else{
           echo "Could not deleted record: ". mysqli_error($conn);  
        }
    }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Aditya Anand</title>
      <link rel="shortcut icon" href="img/logo-anand.png" type="image/x-icon"/>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
      <!-- Ekko Lightbox -->
      <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/adminlte.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <style type="text/css">
        

      </style>
   </head>
   <body class="hold-transition sidebar-mini">
      <div class="wrapper">
         <!-- Navbar -->
         <?php include 'include/navbar.php';?>
         <!-- /.navbar -->
         <?php include 'include/sidebar.php';?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            
            <!-- Main content -->
            <section class="content">
               <br>
                  <div class="row">
                     <div class="col-lg-12 col-6">
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                              <input type="file"  placeholder="Upload Images" name="images[]" multiple>
                           </div>
                           <button type="submit" name="upload" class="btn btn-default">Submit</button>
                        </form>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-12">
                        <div class="card card-primary">
                           
                           <div class="card-body">
                              <div class="row">
                                 <?php include '../admin/config.php';
                                    $sql="select * from image_table";
                                    $result=mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                    ?> 
                                 <div class="col-sm-2">
                                    <a href="../images/<?php echo $row['images'];?>" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                    <img src="../images/<?php echo $row['images'];?>" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                    <a href="gallery.php?ids=<?php echo $row['image_id'];?>" type="button" class="btn btn-danger">Delete</a>
                                 </div>
                                 <?php } ?>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <?php include 'include/footer.php';?>
         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
         </aside>
         <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->
      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- jQuery UI -->
      <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Ekko Lightbox -->
      <script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <!-- Filterizr-->
      <script src="plugins/filterizr/jquery.filterizr.min.js"></script>
      <!-- Page specific script -->
      <script>
         $(function () {
           $(document).on('click', '[data-toggle="lightbox"]', function(event) {
             event.preventDefault();
             $(this).ekkoLightbox({
               alwaysShowClose: true
             });
           });
         
           $('.filter-container').filterizr({gutterPixels: 3});
           $('.btn[data-filter]').on('click', function() {
             $('.btn[data-filter]').removeClass('active');
             $(this).addClass('active');
           });
         })
      </script>
   </body>
</html>