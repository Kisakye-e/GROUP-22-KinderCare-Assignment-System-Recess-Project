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
                        <h4 class="page-title">Pupil Grades</h4>
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
                                <h3 class="box-title mb-0">Assignment results</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">                                    
                                                                     
                                </div>
                            </div>
                            <div class="col-md-12">
                <?php 
                    if(isset($_SESSION['addComment']))
                    {
                        ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['addComment']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['addComment']);
                    }
                    
                   
                ?>
                
                </div>
                            <div class="table-responsive">
                            <table class="display cell-border" id="table_id">
                                    <thead>
                                        <tr>
                                        <th class="border-top-0" hidden scope="col"><input type="text" class="search-input" placeholder="Assignment id"></th>
                                        <th class="border-top-0"  scope="col"><input type="text" class="search-input" placeholder="Assignment id"></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="User Code"></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Pupil Name"></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Duration"></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Score" ></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Comment" ></th>
                                        <th scope="col" class="border-top-0"><input type="text" class="search-input" placeholder="Edit Comment" ></th>
                                        
                                    </thead>
                                    <tbody>
                                    <?php 
                                    // The inner join party.....................
                                        $sql = "SELECT * FROM attemptedassignment INNER JOIN pupils ON attemptedassignment.userCode = pupils.userCode";
                                        $result = mysqli_query($conn, $sql);
                                        if(mysqli_num_rows($result)>0){                                            
                                            while($data =mysqli_fetch_array($result))
                                            { 
                                                ?>
                                            <tr>
                                            <form action="" method="post">
                                                <td style="text-align:center;" hidden><input type="text" class="no-outline" name="assignmentnumber" value="<?php echo $data['assignmentnumber'];?>" readonly="readonly"></td>
                                                <td style="text-align:center;"><?php echo $data['assignmentnumber'];?></td>
                                                <td style="text-align:center;" class="txt-oflo"><?php echo $data['userCode'];?></td>
                                                <td style="text-align:center;" class="txt-oflo"><?php echo $data['firstName']."  ". $data['lastName'];?></td>
                                                <td style="text-align:center;" class="txt-oflo"><?php echo $data['duration'];?></td>
                                                <td style="text-align:center;"><?php echo $data['score'];?></td>
                                                <td style="text-align:center;"><?php echo $data['comment'];?></td>
                                                <td style="text-align:center;"><a href="addComment.php?id=<?php echo $data['id']; ?>" ><i class="fas fa-edit" aria-hidden = "true"></i>Edit</a></td>
                                            </form>
                                            </tr>  
                                            <?php
                                                }
                                                  
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
                                            <script src="js/home.js">
                                                
                                                </script>
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