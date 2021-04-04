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
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/adminlte.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      
   </head>
   <body class="hold-transition sidebar-mini">
      <div class="wrapper">
         <!-- Navbar -->
         <?php include 'include/navbar.php';?>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <?php include 'include/sidebar.php';?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <!-- <div class="col-sm-6">
                  <h1>DataTables</h1>
                </div> -->
                <div class="col-sm-12">
                  <a type="button" id="delete_records" class="btn btn-danger" style="color: white;">Delete</a>
                              <a href="export.php?export=contact" type="button" class="btn btn-info">Export</a>
                  
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-md-12">
                     <!-- /.card -->
                     <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                           <!-- <div style="width: 29%;margin: 0 auto;padding: 15px;"> 
                              <a type="button" id="delete_records" class="btn btn-danger" style="color: white;">Delete</a>
                              <a href="backend.php?export=vendor" type="button" class="btn btn-info">Export</a>
                           </div> -->
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th><input type="checkbox" id="select_all"> </th>
                                    
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    include 'config.php';
                                    $sql="select *from contact";
                                    $result=mysqli_query($conn,$sql);
                                    
                                    
                                    while($row = mysqli_fetch_array($result)) { ?>   
                                 <tr id="<?php echo $row['id']; ?>">
                                    <td><input type="checkbox" class="con_checkbox" data-con-id="<?php echo $row['id']; ?>"></td>
                                    
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['subject'];?></td>
                                    <td><?php echo $row['message'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                 </tr>
                                 <?php  }?>
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th><input type="checkbox" id="select_all"></th>
                                    
                                    
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
                        <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
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
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- DataTables -->
      <script src="plugins/datatables/jquery.dataTables.js"></script>
      <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <!-- page script -->
      
      <script>
         $(function () {
           $("#example1").DataTable();
           $('#example2').DataTable({
             "paging": true,
             "lengthChange": false,
             "searching": false,
             "ordering": true,
             "info": true,
             "autoWidth": false,
           });
         });
      </script>
      <script>
         $(document).ready(function() {
            /* delete selected records*/
            $('#delete_records').on('click', function(e) {
                var contact = [];
                $(".con_checkbox:checked").each(function() {
                    contact.push($(this).data('con-id'));
                });
                if(contact.length <=0) {
                    alert("Please select records."); 
                } 
                else { 
                    WRN_PROFILE_DELETE = "Are you sure you want to delete "+(contact.length>1?"these":"this")+" row?";
                    var checked = confirm(WRN_PROFILE_DELETE);
                    if(checked == true) {
                        var selected_values = contact.join(",");//alert(selected_values);
                        $.ajax({
                            type: "POST",
                            url: "delete_all.php",
                            cache:false,
                            data: 'id='+selected_values,
                            success: function(response) {
                                /* remove deleted vendor rows*/
                                var ids = response.split(",");
                                for (var i=0; i < ids.length; i++ ) {   
                                    $("#"+ids[i]).remove(); 
                                }   
                            } 
                        });
                    } 
                } 
            });
         });    
         $(document).on('click', '#select_all', function() {
            $(".con_checkbox").prop("checked", this.checked);
            $("#select_count").html($("input.con_checkbox:checked").length+" Selected");
         });
         $(document).on('click', '.con_checkbox', function() {
            if ($('.con_checkbox:checked').length == $('.con_checkbox').length) {
            $('#select_all').prop('checked', true);
            } else {
            $('#select_all').prop('checked', false);
            }
            $("#select_count").html($("input.con_checkbox:checked").length+" Selected");
         });
      </script>
   </body>
</html>