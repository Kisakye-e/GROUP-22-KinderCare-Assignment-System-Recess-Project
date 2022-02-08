<?php
session_start();
include_once 'layout.php'; 
    $id =$_GET['id'];  
    $queryE = "SELECT * FROM attemptedassignment where id = '$id'";
    $resultE = mysqli_query($conn , $queryE);
    $data = mysqli_fetch_array($resultE);     
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
                        <h4 class="page-title">Add Comment</h4>
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
                                <form class="form-horizontal form-material" action="processAddComment.php?id=<?php echo $id; ?>" method="post">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Assignment Number</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="assignmentnumber"  value= "<?php echo $data['assignmentnumber']; ?>"
                                                class="form-control p-0 border-0" readonly="readonly"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">User Code</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="userCode"  value= "<?php echo $data['userCode']; ?>"
                                                class="form-control p-0 border-0" readonly="readonly"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Duration</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="duration"  value= "<?php echo $data['duration']; ?>"
                                                class="form-control p-0 border-0" readonly="readonly"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Score</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="score"  value= "<?php echo $data['score']; ?>"
                                                class="form-control p-0 border-0" readonly="readonly"> </div>
                                    </div>                                 
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Comment</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="comment"  value= "<?php echo $data['comment']; ?>"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    
                
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <input name="Update" type="submit" value="Save Comment" class="btn btn-success">
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