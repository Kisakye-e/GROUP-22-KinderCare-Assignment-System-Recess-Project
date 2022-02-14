<?php 

include_once 'layout.php';
include_once 'database.php';
?>
<html>

<head>
    <style >
        .chartBox{
            width:800px;                
        }
        #chartArea{
            align-items:center;
        }
    </style>

</head>

<body>
   
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">General Assignment Reports</h4>
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
                <!-- ASSIGNMENT ACTIVITY -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Highest score, average score and lowest score per assignment</h3>
                           
                            <div  id="chartArea" style="height: 405px;">
                            <?php
                                                //Assignment summary 
                                                $sql = "SELECT assignmentnumber, COUNT(*) AS noAttempts,MIN(score) AS min, MAX(score) AS max, avg(score) AS Avg, avg(duration) AS avgDur FROM `attemptedassignment` 
                                                GROUP BY assignmentnumber 
                                                ORDER BY assignmentnumber DESC
                                                limit 10;";
                                                $result = mysqli_query($conn, $sql);
                                                if((mysqli_num_rows($result)>0)){
                                                    $assno = array();
                                                    $noAttempts = array();
                                                    $min = array();
                                                    $max = array();
                                                    $avg = array();
                                                    $dur = array();
                                                while($data = mysqli_fetch_assoc($result)){ 
                                                    $assno[] = $data["assignmentnumber"];
                                                    $noAttempts[]= $data["noAttempts"];
                                                    $min[] = $data['min'];
                                                    $max[] = $data['max'];
                                                    $avg[] = $data['Avg'];
                                                    $dur[] = $data['avgDur'];

                                                    //Reversed values
                                                    $assno1 = array_reverse($assno);
                                                    $noAttempts1 =array_reverse($noAttempts);
                                                    $min1 = array_reverse($min);
                                                    $max1 = array_reverse($max);
                                                    $avg1 = array_reverse($avg);
                                                    $dur1 = array_reverse($dur);
                                                }

                                                }
                                                else{
                                                    echo "No records found";
                                                } 
                                                mysqli_close($conn);              
                                            ?>
                                    <div class = "chartBox">
                                    <canvas id="myChart" ></canvas>
                                    </div>
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                    <script>
                                    const assno = <?php echo json_encode($assno1); ?>;
                                    const noAttempts = <?php echo json_encode($noAttempts1); ?>;
                                    const min = <?php echo json_encode($min1); ?>;
                                    const max = <?php echo json_encode($max1); ?>;
                                    const avg = <?php echo json_encode($avg1); ?>;
                                    const dur = <?php echo json_encode($dur1); ?>;
                                    const ctx = document.getElementById('myChart').getContext('2d');
                                    const myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data:    
                                        {
                                            labels: assno,
                                            datasets: [
                                            
                                            {
                                                label: 'Lowest Score',
                                                data: min,
                                                backgroundColor: 'rgba(255,0,0,0.2)',
                                                borderColor: 'rgba(255,0,0,0.6)',
                                                borderWidth: 1            
                                            },
                                            
                                            {
                                                label: 'Average Score',
                                                data: avg,
                                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                borderColor: 'rgba(75, 192, 192, 1)',
                                                borderWidth: 1            
                                            },
                                            {
                                                label: 'Highest Score',
                                                data: max,
                                                backgroundColor: 'rgba(11,156,49,0.2)',
                                                borderColor: 'rgba(0,128, 0, 0.6)',
                                                borderWidth: 1            
                                            }

                                            
                                            ]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    title:{
                                                display:true,
                                                text: 'Marks',
                                                fontsize: 25

                                            },
                                                    
                                                    beginAtZero: true
                                                },
                                                x:{
                                                    title:{
                                                display:true,
                                                text: 'Assignment Number',
                                                fontsize: 25}


                                                }
                                            }
                                        }
                                    });
                                    </script>
                                    
                                    <script src="Chart.min.js"></script>
                                                                    
                                </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                        <h3 class="box-title">Change in number of attempts</h3>
                            
                            <div class="table-responsive">
                            <div class = "chartBox">
                                    <canvas id="myChart2" ></canvas>
                                    </div>                                  

                                    <script>                                        
                                    
                                    const ctx2 = document.getElementById('myChart2').getContext('2d');
                                    const myChart2 = new Chart(ctx2, {
                                        type: 'line',
                                        data:    
                                        {
                                            labels: assno,
                                            datasets: [
                                                {
                                                label: 'Number of Attempts',
                                                data: noAttempts,
                                                backgroundColor: 'rgba(255, 99, 132, 0.2)', 
                                                borderColor: 'rgba(0,128, 0, 0.6)',         
                                                
                                                borderWidth: 1            
                                            }
                                            
                                            ]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    title:{
                                                display:true,
                                                text: 'Number of attempts',
                                                fontsize: 25

                                            },

                                                    beginAtZero: true
                                                },
                                                x:{
                                                    title:{
                                                display:true,
                                                text: 'Assignment Number',
                                                fontsize: 25}


                                                }
                                            },
                                            
                                            layout:{
                                                padding:{
                                                    left:50,
                                                    right: 0,
                                                    bottom:0,
                                                    top: 0
                                                }
                                            }
                                        }
                                    });
                                    </script>
                                    
                                </div>
                            </div>
                            </div>
                        </div>



                        <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Change in Average Score</h3>
                           
                            <div  id="chartArea" style="height: 405px;">
                            
                                    <div class = "chartBox">
                                    <canvas id="myChart3" ></canvas>
                                    </div>
                                   
                                    <script>
                                    
                                    const ctx3 = document.getElementById('myChart3').getContext('2d');
                                    const myChart3 = new Chart(ctx3, {
                                        type: 'line',
                                        data:    
                                        {
                                            labels: assno,
                                            datasets: [
                                            
                                           
                                            
                                            {
                                                label: 'Average Score',
                                                data: avg,
                                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                borderColor: 'rgba(75, 192, 192, 1)',
                                                borderWidth: 1            
                                            }
                                            
                                            ]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    title:{
                                                display:true,
                                                text: 'Average Score',
                                                fontsize: 25

                                            },
                                                    beginAtZero: true
                                                },
                                                x:{
                                                    title:{
                                                display:true,
                                                text: 'Assignment Number',
                                                fontsize: 25}


                                                }
                                            }
                                        }
                                    });
                                    </script>                                                                   
                                </div>
                        </div>                        
                       
                    </div>
                </div>
            </div>
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
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
