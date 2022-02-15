<?php
session_start();
include_once 'layout.php'; 
    $id =$_GET['id'];  
    $queryZ = "SELECT * FROM submittedassignment where assignmentnumber = '$id'";
    $resultZ = mysqli_query($conn , $queryZ);
    $data = mysqli_fetch_assoc($resultZ);  
    
?>
<!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit pupil details</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    
                <!-- FEEDBACK MESSAGE -->
                <!-- <div class="col-md-5"> -->
                
<!-- </div> -->
<!-- END OF FEEDBACK MESSAGE -->
                    
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12" style="margin-left:175px;">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="processEditassignment.php" method="post">
                                <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                                    <input placeholder="Select start date" type="date" name="startDate" id="example" class="form-control" value="<?php echo $data['startDate']; ?>" required>
                                    <label for="example">Start Date</label>
                                    <i class="fas fa-calendar input-prefix" ></i>
                                </div>
                                <input name="id" type="text" value=<?php echo $data['assignmentnumber']?> hidden>
                                <div class="md-form">
                                    <input placeholder="Select start time" type="time" name="startTime" id="input_starttime" class="form-control timepicker" value="<?php echo $data['startTime']; ?>" required>
                                    <label for="input_starttime">Start Time</label>
                                    <i class="fas fa-clock input-prefix" ></i>
                                </div>
                                <div class="md-form">
                                    <input placeholder="Select close time" name="endTime" type="time" id="input_closetime" class="form-control timepicker" value="<?php echo $data['endTime']; ?>" required>
                                    <label for="input_closetime">Close Time</label>
                                    <i class="fas fa-clock input-prefix" ></i>
                                </div>                             
                                                                   
                
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <input name="Update" type="submit" value="Update assignment" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2022 © KINDERCARE EDUCATION SERVICES                     
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>
</html>