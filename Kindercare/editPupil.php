<?php
session_start();
include_once 'layout.php'; 
    $id =$_GET['id'];  
    $queryE = "SELECT * FROM pupils where userCode = '$id'";
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
                                <form class="form-horizontal form-material" action="processEditpupil.php?id=<?php echo $id; ?>" method="post">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">User Code</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="userCode" placeholder="Enter pupil User Code" value= "<?php echo $data['userCode']; ?>"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">First Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="firstName" placeholder="Enter First Name" value= "<?php echo $data['firstName']; ?>"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Last Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="lastName" placeholder="Enter Last Name" value= "<?php echo $data['lastName']; ?>"
                                                class="form-control p-0 border-0"> </div>
                                    </div>                                 
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Phone Number</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="phoneNumber" placeholder="+000 000000000" value= "<?php echo $data['phoneNumber']; ?>"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="password" placeholder="Enter password" value= "<?php echo $data['password']; ?>"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <input name="Update" type="submit" value="Edit details" class="btn btn-success">
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