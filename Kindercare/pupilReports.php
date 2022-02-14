<?php

include_once 'layout.php';
include_once 'database.php';
 ?>
 <head>
<!-- Data tables css -->
    <link href="css/bootstrap.min.css"rel="stylesheet">
    <link href="css/datatables.min.css" rel="stylesheet">
    <script src= "js/jquery-3.6.0.min.js"></script>

</head>
<body>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white"> 
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                    <?php
                    $id =$_GET['id'];
                                      $sql3 =  "Select userCode,firstname, lastname from pupils  
                                      where userCode = '$id';"; 
                                        $results3 =  mysqli_query($conn, $sql3);
                                        while($row = mysqli_fetch_row( $results3)){
                                            $userCode = $row[0];
                                            $first = $row[1];
                                            $last= $row[2];
                                        }
                                        ?>



                        <h4 class="page-title">Report for <?php echo $userCode; ?> : <?php echo $first." " .$last; ?></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">                
            
               
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                        <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Table of results</h3>
                                
                            </div>
                            

                            <div class="table-responsive" >
                                
                                    <?php
                                                $id =$_GET['id'];
                                                $sql ="SELECT * FROM pupils INNER JOIN attemptedassignment
                                                ON  pupils.userCode = attemptedassignment.userCode
                                                WHERE pupils.userCode = '$id'
                                                ORDER BY attemptedassignment.assignmentnumber DESC;";  
                                                $results =  mysqli_query($conn, $sql);
                                        
                                                if (mysqli_num_rows($results)>0) { ?>
                                                    <table  id="table_id" class="table no-wrap display cell-border">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-top-0">Assignment Number</th>
                                                            <th class="border-top-0">Duration</th> 
                                                            <th class="border-top-0">Score</th>   
                                                            <th class="border-top-0">Comment</th>                                         
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php
                                                    while($data = mysqli_fetch_array($results)){ ?>
                                                    <tr>
                                                    <td class="txt-oflo"><?php echo $data['assignmentnumber'];?></td>
                                                    <td class="txt-oflo"><?php echo $data['duration'];?></td>
                                                    <td  class="txt-oflo"><?php echo $data['score'];?></td>
                                                    <td  class="txt-oflo"><?php echo $data['comment'];?></td>
                                                    </tr>
                                                    <?php
                                        
                                                    } ?>
                                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                Number of assignments Attempted

                                            </td>

                                            <td>
                                               <?php echo mysqli_num_rows($results); ?>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>

                                        </tr> 
                                        <tr>
                                            <td>
                                                Number of assignments missed

                                            </td>

                                            <td>
                                                <?php                                                
                                               
                                                echo ($_SESSION["closed"] - mysqli_num_rows($results));
                                                 ?>
                                              
                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>

                                        </tr> 
                                        <?php
                                      $sql2 =  "SELECT AVG(score) AS aver, MAX(score) AS maxi, MIN(score) AS mini 
                                      FROM attemptedassignment 
                                      where userCode = '$id';"; 
                                        $results2 =  mysqli_query($conn, $sql2);
                                        while($row = mysqli_fetch_row( $results2)){
                                            $max = $row[1];
                                            $min = $row[2];
                                            $avg= $row[0];
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                Average Score

                                            </td>

                                            <td>
                                               <?php echo $avg; ?>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>

                                        </tr> 
                                        <tr>
                                            <td>
                                                Highest Score

                                            </td>

                                            <td>
                                               <?php echo $max; ?>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>

                                        </tr>    
                                        <tr>
                                            <td>
                                               Lowest Score
                                            </td>

                                            <td>
                                               <?php echo $min; ?>
                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>

                                        </tr>                             

                                    </tfoot>
                                </table>   
                                
                                <script>
                                    $(document).ready(function(){
                                        $('.display').DataTable(
                                            {
                                     "order": [[ 1, "asc" ]],
                                    'destroy': false,
                                    dom: 'Bfrtip',
                                    buttons: [
                                        {
                                            extend: 'copyHtml5',footer: true,
                                            exportOptions:{
                                                columns: [0,1,2,3]
                                            }
                                        },
                                        {
                                            extend: 'excelHtml5',footer: true,
                                            exportOptions:{
                                                columns: [0,1,2,3]
                                            }
                                        },
                                        {
                                            extend: 'pdfHtml5',footer: true,
                                            exportOptions:{
                                                columns: [0,1,2,3]
                                            }
                                        },
                                        {
                                            extend: 'csvHtml5',footer: true,
                                            exportOptions:{
                                                columns: [0,1,2,3]
                                            }
                                        }

                                    ]
                                }


                                        );
                                            });
                                    </script>
                                    <script src="js/home.js"></script>
                                                    
                                        <?php
                                                } 
                                                else {                                                    
                                                    echo "<h1>No results for pupil</h1>";                                        
                                                }
                                        
                                                mysqli_close($conn);                            
                                                ?>
                                       
                                    
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
    <script src= "js/bootstrap.min.js"></script>
    <script src= "js/datatables.min.js"></script> 
</body>