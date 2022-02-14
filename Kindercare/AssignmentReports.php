<?php

include_once 'layout.php';
include_once 'database.php';

$id =$_GET['id'];
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
                    <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Report for Assignment: <?php echo $id; ?> </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            
                        </div>
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

                    <!-- select count(userCode) AS Fails FROM attemptedassignment where score < 50 AND assignmentnumber = '$id'; 
                    select count(userCode) AS fts FROM attemptedassignment where score between 49 AND 61 AND assignmentnumber = '$id';
                    select count(userCode) AS sts FROM  attemptedassignment where score between 59 AND 71 AND assignmentnumber = '$id';
                    select count(userCode) AS ste FROM  attemptedassignment where score between 69 AND 81 AND assignmentnumber = '$id';
                    select count(userCode) AS ste FROM  attemptedassignment where score > 79 AND assignmentnumber = '$id';
                    my piechart queries
                    -->                              
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                        <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Table of results </h3>
                                
                            </div>

                            <div class="table-responsive" >
                            <?php
                            $id =$_GET['id'];
                                                $sql ="SELECT * FROM pupils INNER JOIN attemptedassignment 
                                                ON pupils.userCode = attemptedassignment.userCode 
                                                WHERE attemptedassignment.assignmentnumber = '$id'
                                                ORDER BY pupils.firstName ASC;";  
                                                $results =  mysqli_query($conn, $sql);
                                        
                                    if (mysqli_num_rows($results)>0) { ?>

                                    <table  id="table_id" class="table no-wrap display cell-border">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">User Code</th>
                                            <th class="border-top-0">Pupil Name</th>
                                            <th class="border-top-0">Duration</th>
                                            <th class="border-top-0">Score</th>
                                            <th class="border-top-0">Comment</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($data = mysqli_fetch_array($results)){ ?>
                                        <tr>
                                        <td class="txt-oflo"><?php echo $data['userCode'];?></td>
                                        <td class="txt-oflo"><?php echo $data['firstName']." ".$data['lastName'];?></td>
                                        <td class="txt-oflo"><?php echo $data['duration'];?></td>
                                        <td class="txt-oflo"><?php echo $data['score'];?></td>
                                        <td class="txt-oflo"><?php echo $data['comment'];?></td>
                                        </tr>
                                        <?php
                                        
                                    } ?>
                                       
                                    </tbody>
                                    <tfoot>
                                    <?php
                                      $sql2 =  "SELECT count(userCode) AS attempts ,AVG(score) AS aver, MAX(score) AS maxi, MIN(score) AS mini 
                                      FROM attemptedassignment where assignmentnumber = '$id'; "; 
                                        $results2 =  mysqli_query($conn, $sql2);                                       
                                        while($row = mysqli_fetch_array( $results2)){
                                            $attempts = $row[0];
                                            $max = $row[2];
                                            $min = $row[3];
                                            $avg= $row[1];
                                        }                                                                           
                                        ?>
                                        <tr>
                                            <td>
                                                Number of Attempts
                                            </td>

                                            <td>
                                            <?php echo $attempts; ?>

                                            </td>
                                                

                                            </tr>
                                            <tr>
                                            <td>
                                                Total that missed
                                            </td>

                                            <td>
                                            <?php echo $_SESSION['totalP'] - $attempts; ?>

                                            

                                            </td>
                                                

                                            </tr>
                                            <tr>
                                            <td>
                                                Highest Score
                                            </td>

                                            <td>
                                            <?php echo $max; ?>
                                            </td>                                               

                                            </tr>
                                            <tr>
                                            <td>
                                                Average Score
                                            </td>
                                            <td>
                                            <?php echo $avg; ?>
                                            </td>                                                

                                            </tr>
                                            <tr>
                                            <td>
                                                Lowest Score
                                            </td>

                                            <td>
                                            <?php echo $min; ?>
                                            </td>
                                                

                                            </tr>
                                        <tr>
                                            <td colspan="2" style="color: green;">
                                                Best Pupil(s)
                                            </td>
                                           
                                          <?php  $sql4= "SELECT firstName, lastName from pupils inner join attemptedassignment
                                         on pupils.userCode = attemptedassignment.userCode 
                                         WHERE assignmentnumber = '$id' AND score = '$max'; ";
                                          $results4 =  mysqli_query($conn, $sql4);                                       
                                          while($row4 = mysqli_fetch_array( $results4)){ ?>
                                          <tr>
                                              <td></td>
                                            <td>
                                                <?php echo $row4['firstName']." ".$row4['lastName']; ?>

                                            </td>
                                          </tr>

                                        <?php  
                                    } ?>                        
                                            </tr>

                                            <tr>
                                            <td colspan="2" style="color: red;">
                                                Worst Performer(s)
                                            </td>
                                            <?php  $sql5= "SELECT firstName, lastName from pupils inner join attemptedassignment
                                         on pupils.userCode = attemptedassignment.userCode 
                                         WHERE assignmentnumber = '$id' AND score = '$min'; ";
                                          $results5 =  mysqli_query($conn, $sql5);                                       
                                          while($row5 = mysqli_fetch_array( $results5)){ ?>
                                          <tr>
                                              <td></td>
                                            <td>
                                                <?php echo $row5['firstName']." ".$row5['lastName']; ?>

                                            </td> 
                                            </tr>

                                        <?php  
                                    } ?>                        
                                            </tr>                                       
                                
                                            

                                    </tfoot>
                                </table>
                                <script>
        $(document).ready(function(){
            $('.display').DataTable();
                   })
        </script>
        <script src="js/home.js"></script>             

                                <?php
                                                } 
                                                else {                                                    
                                                    echo "<h1>No results for assignment</h1>";                                        
                                                }
                                        
                                                mysqli_close($conn);                            
                                                ?>
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




<!-- SELECT COUNT(userCode) from attemptedassignment WHERE score <=50;  -->
<!-- SELECT COUNT(userCode) from attemptedassignment WHERE score BETWEEN 50 AND 71;  -->
<!-- SELECT COUNT(userCode) from attemptedassignment WHERE score BETWEEN 71 AND 80;  -->
<!-- SELECT COUNT(userCode) from attemptedassignment WHERE score >79;  -->