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
                        <h4 class="page-title">Assignments</h4>
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
                                <h3 class="box-title mb-0">Assignments</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                   
                                </div>
                            </div>
                            <div class="table-responsive">
                            <table class="display cell-border" id="table_id">
                                    <thead>
                                        <tr>
                                        <th class="border-top-0" scope="col"><input type="text" class="search-input" placeholder="Assignment id" readonly="readonly"></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Characters" readonly="readonly"></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Start Date" readonly="readonly"></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Start Time" readonly="readonly"></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="End Time" readonly="readonly"></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Number of Characters" readonly="readonly"></th>
                                        <th scope="col" class="border-top-0"><input style="text-align:center;"  type="text" class="search-input" placeholder="Status" readonly="readonly"></th>
                                        <th scope="col" class="border-top-0"><input style="text-align:center;"  type="text" class="search-input" placeholder="Edit" readonly="readonly"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $assignments = mysqli_query($conn,"select * from submittedassignment"); 
                                        while($data = mysqli_fetch_array($assignments))
                                        { 
                                            ?>
                                        <tr>
                                        <form action="" method="post">
                                            <td style="text-align:center;"><input type="text" class="no-outline" name="assignmentnumber" value="<?php echo $data['assignmentnumber'];?>" readonly="readonly"></td>
                                            <td style="text-align:center;" class="txt-oflo"><?php echo $data['assignment'];?></td>
                                            <td style="text-align:center;" class="txt-oflo"><?php echo $data['startDate'];?></td>
                                            <td style="text-align:center;"><?php echo $data['startTime'];?></td>
                                            <td style="text-align:center;"><?php echo $data['endTime'];?></td>
                                            <td style="text-align:center;"><?php echo $data['numberOfCharacters'];?></td>
                                            <?php
                                                $date = date('Y-m-d');
                                                if($date>$data['startDate']){ ?>
                                                    <td style="color:red; text-align:center;"><?php echo "Closed" ;?></td>
                                                    <?php
                                                }
                                                if($date<$data['startDate']){ ?>
                                                <td style="color:green; text-align:center;"><?php echo "Not open for attempting" ;?></td>
                                                <?php
                                            }
                                                $time= date('H:i:s'); 
                                                if($date==$data['startDate']){
                                                    if(($time>= $data['startTime']) && ($time < $data['endTime'])){?>
                                                        <td style="color:green; text-align:center;"><?php echo "Open"; ?></td>

                                                        <?php  }
                                                    else{ 
                                                    if($time < $data['startTime']){?>
                                                        <td style="color:green; text-align:center;"><?php echo "Not open for attempting" ?></td>
                                                        <?php
                                                            }  
                                                            else{ ?>
                                                            <td style="color:red; text-align:center;"><?php echo "closed" ?></td> <?php
                                                            }
                                                                                            
                                                            }
                                                        
                                                    }

                                                        ?>       
                                                    <td style="text-align:center;"><a href="#"><i class="fas fa-edit" aria-hidden = "true"></i>Edit</a></td>
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
                                                    mysqli_close($conn);
                                                ?>
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