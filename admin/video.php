<?php
include 'config.php';
session_start();
function check_login(){
  if(strlen($_SESSION['login'])==0){
    header('location:login.php');
  }
}
check_login();
?>
<!DOCTYPE html>
<html>
   <?php include'include/head.php'; ?>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         <?php include 'include/navbar.php';?>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <?php include 'include/sidebar.php';?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                     <div class="col-lg-12 col-6">
                        <div class="d-flex justify-content-end">
                           <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Add video</button>
                        </div>
                        <div id="records_contant">
                        </div>
                        <div class="modal" id="myModal">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <!-- Modal body -->
                                 <div class="modal-body">
                                    <div class="form-group">
                                       <label>Video Name</label>
                                       <input type="text" name="video_name" id="video_name" class="form-control" placeholder="video name">
                                    </div>
                                    <div class="form-group">
                                       <label>URL</label>
                                       <input type="text" name="video_link" id="video_link" class="form-control" placeholder="video link">
                                    </div>
                                 </div>
                                 <!-- Modal footer -->
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addRecord()">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- update -->
                        <div class="modal" id="update_user_modal">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <!-- Modal Header -->
                                 <div class="modal-header">
                                    
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 </div>
                                 <!-- Modal body -->
                                 <div class="modal-body">
                                    <div class="form-group">
                                       <label>Video Name</label>
                                       <input type="text" name="video_name" id="update_video_name" class="form-control" placeholder="video name">
                                    </div>
                                    <div class="form-group">
                                       <label>URL</label>
                                       <input type="text" name="video_link" id="update_video_link" class="form-control" placeholder="Video Link">
                                    </div>
                                    
                                 </div>
                                 <!-- Modal footer -->
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="updateuserdetail()">Update</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <input type="hidden" name="" id="hidden_user_id">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.row (main row) -->
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <?php include 'include/footer.php';?>
         <!-- Control Sidebar -->
         <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="plugins/chart.js/Chart.min.js"></script>
      <!-- Sparkline -->
      <script src="plugins/sparklines/sparkline.js"></script>
      <!-- JQVMap -->
      <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="plugins/moment/moment.min.js"></script>
      <script src="plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
           readRecords();
         });
           function readRecords(){
             var readrecord="readrecord";
             $.ajax({
                 url:"backend.php",
                 type:"post",
                 data:{readrecord:readrecord},
                 success:function(data,status){
                    $('#records_contant').html(data); 
                 }
             });
           }
         
           function addRecord() {
               var video_name = $('#video_name').val();//alert(video_name);
               var video_link = $('#video_link').val();//alert(video_link);
               $.ajax({
                   url: "backend.php",
                   type: 'post',
                   data: {
                       video_name: video_name,
                       video_link: video_link,
                   },
         
                   success: function(data, status) {
                       readRecords();
                   }
               });
           }
         
           ///delete
           function DeleteUser(deleteid){
            //alert(deleteid);
             var conf=confirm("Are u sure");
             if(conf==true){
               $.ajax({
                 url:"backend.php",
                 type:"post",
                 data:{deleteid:deleteid},
                 success:function(data,status){
                     readRecords(); 
                 }
               });
             }
         
           }
         
           ///Edit
           function GetUserDetails(id){
            //alert(id);
              $('#hidden_user_id').val(id);
              $.post("backend.php",{
                   id:id
              },function(data,status){
                  var user=JSON.parse(data);
                  $('#update_video_name').val(user.video_name);
                  $('#update_video_link').val(user.video_link);
                  
              });
              $('#update_user_modal').modal("show");
           }
         
           //update
           function updateuserdetail(){
            var video_nameupd=$('#update_video_name').val();
            var video_linkupd=$('#update_video_link').val();
            
         
            var hidden_user_idupd=$('#hidden_user_id').val();
            $.post("backend.php",{
              hidden_user_idupd:hidden_user_idupd,
              video_nameupd:video_nameupd,
              video_linkupd:video_linkupd,
              
             
            },function(data,status){
              $('#update_user_modal').modal("hide");
              readRecords();
            });
          }
      </script>
   </body>
</html>