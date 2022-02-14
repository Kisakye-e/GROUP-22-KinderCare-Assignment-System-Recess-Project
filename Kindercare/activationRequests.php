<?php
session_start();
include_once 'layout.php';
include_once 'database.php';
 
?>
<head>
<!-- Data tables css -->
    <link href="css/bootstrap.min.css"rel="stylesheet">
    <link href="css/datatables.min.css" rel="stylesheet">
</head>
<body>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Activation Requests</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            
                        </div>
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
                <!-- ACTIVATION REQUESTS -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Pending Activation Requests</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
               
</div>
                            <div class="table-responsive">
                                <table class="display cell-border" id="table_id">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;" class="border-top-0" hidden><input type="text" class="search-input" placeholder="User Code" ></th>
                                            <th style="text-align:center;" class="border-top-0"><input type="text" class="search-input" placeholder="User Code" ></th>                                            
                                            <th style="text-align:center;" class="border-top-0"><input type="text" class="search-input" placeholder="First Name" ></th>
                                            <th style="text-align:center;" class="border-top-0"><input type="text" class="search-input" placeholder="Last Name" ></th>
                                            <th style="text-align:center;"  class="border-top-0"><input type="text" class="search-input" placeholder="Phone Number" ></th>
                                            <th style="text-align:center;" class="border-top-0"><input type="text" class="search-input" placeholder="Activation Status" ></th>
                                            <th style="text-align:center;" class="border-top-0"><input type="text" class="search-input" placeholder="Action"></th>
                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $query4 = "SELECT * FROM pupils WHERE requestStatus = 'Pending'";
                                        $result4 = mysqli_query($conn , $query4);
                                            while($data = mysqli_fetch_array($result4))
                                        {
                                        ?>
                                        <tr>
                                        <form action="changeStatus1.php" method="post">
                                            <td style="text-align:center;" hidden><input type="text" class="no-outline" name="userCode" value="<?php echo $data['userCode']; ?>" readonly="readonly"></td>
                                            <td style="text-align:center;" class="txt-oflo"><?php echo $data['userCode']; ?></td>                                            
                                            <td style="text-align:center;" class="txt-oflo"><?php echo $data['firstName'];?></td>
                                            <td style="text-align:center;" class="txt-oflo"><?php echo $data['lastName'];?></td>
                                            <td style="text-align:center;"><?php echo $data['phoneNumber']; ?></td>
                                            <td style="text-align:center; color:red;">Deactivated</td>
                                            <td style="text-align:center;"><input type="submit" name="change" class="btn btn-success" value="Activate" style="margin-left:11px; color:white;"></td>
</form>
                                        </tr>
                                        <?php
}
?>
                                        
                                    </tbody>
                                </table>
                                <script>
        $(document).ready(function(){
            $('.display').DataTable();
                   })
        </script>
        <script src="js/home.js"></script> 
<?php 
mysqli_close($conn);?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent Comments -->
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
    <script src= "js/jquery-3.6.0.min.js"></script>
    <script src= "js/bootstrap.min.js"></script>
    <script src= "js/datatables.min.js"></script> 
</body>