<?php
session_start();
include_once 'layout.php';
include_once 'database.php'; 
?>
<head>  

<!-- Data tables css -->
    <link href="css/bootstrap.min.css"rel="stylesheet">
    <link href="css/datatables.min.css" rel="stylesheet">
    <style>
        #sparklinedash{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #sparklinedash2{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #sparklinedash3{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
    </style>
</head>
<body>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
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
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Registered Pupils</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                    <script>
                                        const data1 = [0, 5, 6, 10, 9, 12, 4, 9]
                                        const config1 = {
                                        type: 'bar',
                                        height: '50',
                                        barWidth: '10',
                                        resize: true,
                                        barSpacing: '5',
                                        barColor: '#7ace4c'
                                        }
                                        $('#sparklinedash').sparkline(data1, config1)

                                    </script>
                                </li>
                                <li class="ms-auto"><span class="counter text-success">
                                <?php
            $query = "SELECT * FROM pupils";
            $result = mysqli_query($conn , $query);
            $regPupils = mysqli_num_rows($result);
            echo $regPupils;?>

                                </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Deactivated Pupils</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                    <script>
                                        const data2 = [0, 5, 6, 10, 9, 12, 4, 9]
                                        const config2 = {
                                        type: 'bar',
                                        height: '50',
                                        barWidth: '10',
                                        resize: true,
                                        barSpacing: '5',
                                        barColor: '#CBC3E3'
                                        }
                                        $('#sparklinedash3').sparkline(data2, config2)

                                    </script>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple" ><?php
            $query2 = "SELECT * FROM pupils WHERE activationStatus = false";
            $result2 = mysqli_query($conn , $query2);
            $deacPupils = mysqli_num_rows($result2);
            echo $deacPupils; 
            ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Pending Activation Requests</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                    <script>
                                        const data = [0, 5, 6, 10, 9, 12, 4, 9]
                                        const config = {
                                        type: 'bar',
                                        height: '50',
                                        barWidth: '10',
                                        resize: true,
                                        barSpacing: '5',
                                        barColor: '#ADD8E6'
                                        }
                                        $('#sparklinedash2').sparkline(data, config)

                                    </script>
                                </li>
                                <li class="ms-auto"><span class="counter text-info"> <?php
            $query3 = "SELECT * FROM pupils WHERE requestStatus = 'Pending'";
            $result3 = mysqli_query($conn , $query3);
            $acReq = mysqli_num_rows($result3);
            echo $acReq;
            ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
              <!-- ============================================================== -->
                <!-- REGISTERED PUPILS -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Registered Pupils</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                    
                                </div>
                            </div>
            <div class="col-md-12">
                <?php 
                    if(isset($_SESSION['changeStatus']))
                    {
                        ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['changeStatus']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['changeStatus']);
                    }
                    
                    if(isset($_SESSION['updatePupil']))
                    {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['updatePupil']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['updatePupil']);
                    }
                ?>
                
                </div>

                            <div class="table-responsive" >
                                <table class="display cell-border" id="table_id">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0"><input type="text" class="search-input" placeholder="User Code" readonly="readonly"></th>
                                            <th class="border-top-0"><input type="text" class="search-input" placeholder="Pupil Number" readonly="readonly"></th>
                                            <th class="border-top-0"><input type="text" class="search-input" placeholder="First Name" readonly="readonly"></th>
                                            <th class="border-top-0"><input type="text" class="search-input" placeholder="Last Name" readonly="readonly"></th>
                                            <th class="border-top-0"><input type="text" class="search-input" placeholder="Phone Number" readonly="readonly"></th>
                                            <th class="border-top-0"><input type="text" class="search-input" placeholder="Activation Status" readonly="readonly"></th>
                                            <th class="border-top-0"><input type="text" class="search-input" placeholder="Action" readonly="readonly"></th>
                                            <th class="border-top-0"><input type="text" class="search-input" placeholder="Edit details" readonly="readonly"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
    $pupils = mysqli_query($conn,"select * from pupils"); 
    while($data = mysqli_fetch_array($pupils))
{
?>  
                                        <tr>
                                        <form action="changeStatus.php" method="post">
                                            <td style="text-align:center;"><input type="text" class="no-outline" name="userCode" value="<?php echo $data['userCode']; ?>" readonly="readonly"></td>
                                            <td style="text-align:center;" class="txt-oflo"><?php echo $data['pupilNumber'];?></td>
                                            <td style="text-align:center;" class="txt-oflo"><?php echo $data['firstName'];?></td>                                            
                                            <td style="text-align:center;" class="txt-oflo"><?php echo $data['lastName'];?></td>
                                            <td style="text-align:center;"><?php echo $data['phoneNumber']; ?></td>
                                            <?php
                                                if($data['activationStatus']== false){ ?>
                                                    <td style="text-align:center;"><input type="text" style="color:red;" name="activationStatusD" class="no-outline" value="Deactivated" readonly="readonly"></td>
                                            <?php } ?>
                                            <?php
                                                if($data['activationStatus']== true){ ?>
                                                    <td style="text-align:center;"><input type="text" name="activationStatusA" style="color:green;" class="no-outline" value="Activated" readonly="readonly"></td>
                                            <?php } ?>
          <?php if($data['activationStatus']== true){ ?>
  <td style="text-align:center;"><input type="submit" name="changeA" class="btn btn-danger" value="Deactivate" style="margin-left:11px; color:white;"></td>
  <?php } ?>
  <?php if($data['activationStatus']== false){ ?>
  <td></td>
  <?php } ?>
  <td style="text-align:center;"><a href="editPupil.php?id=<?php echo $data['pupilNumber']; ?>" ><i class="fas fa-edit" aria-hidden = "true"></i>Edit</a></td>

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
    