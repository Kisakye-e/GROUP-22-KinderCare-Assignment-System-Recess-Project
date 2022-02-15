<?php

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
                <!-- Three charts -->
                <!-- ============================================================== -->
                
                
              <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Assignments</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                   
                                </div>
                            </div>
                            <div class="col-md-12">
                <?php 
                    if(isset($_SESSION['delete']))
                    {
                        ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['delete']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['delete']);
                    }   
                    if(isset($_SESSION['updateAssignment']))
                    {
                        ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['updateAssignment']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['updateAssignment']);
                    }  
                    
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                        
                   
                ?>
                
                </div>
                            <div class="table-responsive">
                            <table class="display cell-border" id="table_id">
                                    <thead>
                                        <tr>
                                        <th class="border-top-0" scope="col"><input type="text" class="search-input" placeholder="Assignment id" ></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Characters" ></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Start Date"></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Start Time" ></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="End Time"></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Number of Characters" ></th>
                                        <th scope="col" class="border-top-0"><input style="text-align:center;"  type="text" class="search-input" placeholder="Status" ></th>
                                        <th scope="col" class="border-top-0"><input style="text-align:center;"  type="text" class="search-input" placeholder="Edit" ></th>
                                        <th scope="col" class="border-top-0"><input style="text-align:center;"  type="text" class="search-input" placeholder="View Report" ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $closed = 0;
                                    $open = 0;
                                    $notOpen = 0;
                                        $assignments = mysqli_query($conn,"select * from submittedassignment order by assignmentnumber DESC"); 
                                        while($data = mysqli_fetch_array($assignments))
                                        { 
                                            ?>
                                        <tr>
                                        <form action="" method="post">
                                            <td style="text-align:center;" class="txt-oflo"><?php echo $data['assignmentnumber'];?></td>
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
                                                    $closed +=1;
                                                }
                                                else if($date<$data['startDate']){ ?>
                                                <td style="color:green; text-align:center;"><?php echo "Not open for attempting" ;?></td>
                                                <?php
                                                $notOpen += 1;
                                            }else{
                                                $time= date('H:i:s'); 
                                                
                                                if(($time >= $data['startTime']) && ($time < $data['endTime'])){?>
                                                    <td style="color:green; text-align:center;"><?php echo "Open"; ?></td>

                                                    <?php
                                                    $open +=1;
                                                }
                                                else if($time < $data['startTime']){?>
                                                    <td style="color:green; text-align:center;"><?php echo "Not open for attempting" ?></td>
                                                    <?php
                                                     $notOpen += 1;
                                                        }  
                                                        else{ ?>
                                                        <td style="color:red; text-align:center;"><?php echo "Closed" ?></td> <?php
                                                        $closed +=1;
                                                        }
                                                                                        
                                            }

                                                    ?> 
                                                
                                                    
                                                    <td style="text-align:center;"><a href="editAssignment.php?id=<?php echo $data['assignmentnumber'];?>"><i class="fas fa-edit" aria-hidden = "true"></i>Edit</a>        <a href="deleteAssignment.php?id=<?php echo $data['assignmentnumber'];?>"><i class="fas fa-trash-alt" aria-hidden = "true"></i>Delete</a></td>
                                                    <td style="text-align:center;"><a href="AssignmentReports.php?id=<?php echo $data['assignmentnumber']; ?>" ><i class="fas fa-file-alt" aria-hidden = "true"></i>View Report</a></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                                                                </table>
                                                                               
                                                                                <script>
                                                        $(document).ready(function(){
                                                                        $('.display').DataTable({
                                                                                "order": [[ 0, "desc" ]],
                                                                                'destroy': false,
                                                                                dom: 'Bfrtip',
                                                                                buttons: [
                                                                                    {
                                                                                        extend: 'copyHtml5',
                                                                                        exportOptions:{
                                                                                            columns: [0,1,2,3,4,5,6]
                                                                                        }
                                                                                    },
                                                                                    {
                                                                                        extend: 'excelHtml5',
                                                                                        exportOptions:{
                                                                                            columns: [0,1,2,3,4,5,6]
                                                                                        }
                                                                                    },
                                                                                    {
                                                                                        extend: 'pdfHtml5',
                                                                                        exportOptions:{
                                                                                            columns: [0,1,2,3,4,5,6]
                                                                                        }
                                                                                    },
                                                                                    {
                                                                                        extend: 'csvHtml5',
                                                                                        exportOptions:{
                                                                                            columns: [0,1,2,3,4,5,6]
                                                                                        }
                                                                                    }

                                                                                ]
                                                                            });

                                                        })
                                                        </script>
                                                        <script src="js/home.js"></script> 
    
                                                <?php 
                                                    mysqli_close($conn);
                                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Assignments</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><i class="fa fa-chart-bar fa-3x" aria-hidden="true"></i>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success"><strong><?php echo $open + $notOpen + $closed; ?></strong></span></li>         
            
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Not Open</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><i class="fa fa-chart-bar fa-3x" aria-hidden="true"></i>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple"><strong><?php echo $notOpen; ?></strong></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Open</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><i class="fa fa-chart-bar fa-3x" aria-hidden="true"></i>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info"><strong><?php echo $open; ?></strong></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Closed </h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                    <div id="sparklinedash4"><i class="fa fa-chart-bar fa-3x" aria-hidden="true"></i>
                                    </div>
                                </li>                               
                                <li class="ms-auto"><span class="counter text-info"><strong><?php echo $closed; ?></strong></span>
                                </li>
                                <?php 
                                $_SESSION['closed']= $closed;                               
                                
                                ?>
                            </ul>
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