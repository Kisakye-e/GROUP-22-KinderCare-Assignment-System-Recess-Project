<?php
session_start();
include_once 'layout.php';
include_once 'database.php'; 
?>
<style>
td{
    font-size:50px;
}
</style>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Assignment</h4>
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
                <!-- CHARACTERS -->
                <!-- ============================================================== -->
                
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Select characters to add to the assignment(select not less than 1 and not more than 8 characters)</h3>
                               
                            </div>
                            <div class="col-md-12">
                                            <?php 
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
                            <form action = "postAssignment.php" method="POST">
                                <table class="table no-wrap">
                                    <tbody>
                                    <script>    
                                        check = function (j) {
                                            var total = 0;
                                            var chars = document.getElementsByName('character[]');
                                            for (var i = 0; i < chars.length; i++) {
                                                if (chars[i].checked) {
                                                    total = total + 1;
                                                }
                                                if (total > 8) {
                                                    alert("You have already selected 8 characters. Selecting an extra character will deselect one of the already selected characters. Click Ok to continue.");
                                                    chars[i].checked = false;
                                                    return false;
                                                }
                                            }
                                        }
                                    </script>
                                        <tr>
                                        <td class="txt-oflo">A<input type="checkbox" id="character" name="character[]" value="A" onclick='check(25)'></td>
                                        <td class="txt-oflo">B<input type="checkbox" id="character" name="character[]" value="B" onclick='check(24)'></td>
                                        <td class="txt-oflo">C<input type="checkbox" id="character" name="character[]" value="C" onclick='check(23)'></td>
                                        <td class="txt-oflo">D<input type="checkbox" id="character" name="character[]" value="D" onclick='check(22)'></td>
                                        <td class="txt-oflo">E<input type="checkbox" id="character" name="character[]" value="E" onclick='check(21)'></td>
                                        <td class="txt-oflo">F<input type="checkbox" id="character" name="character[]" value="F" onclick='check(20)'></td>
                                        <td class="txt-oflo">G<input type="checkbox" id="character" name="character[]" value="G" onclick='check(19)'></td>
   
                                        </tr>
                                        <tr>
                                        <td class="txt-oflo">H<input type="checkbox" id="character" name="character[]" value="H" onclick='check(18)'></td>
                                        <td class="txt-oflo">I<input type="checkbox" id="character" name="character[]" value="I" onclick='check(17)'></td>
                                        <td class="txt-oflo">J<input type="checkbox" id="character" name="character[]" value="J" onclick='check(16)'></td>
                                        <td class="txt-oflo">K<input type="checkbox" id="character" name="character[]" value="K" onclick='check(15)'></td>
                                        <td class="txt-oflo">L<input type="checkbox" id="character" name="character[]" value="L" onclick='check(14)'></td>
                                        <td class="txt-oflo">M<input type="checkbox" id="character" name="character[]" value="M" onclick='check(13)'></td>
                                        <td class="txt-oflo">N<input type="checkbox" id="character" name="character[]" value="N" onclick='check(12)'></td>
                                        </tr>
                                        <tr>
                                            
                                        <td class="txt-oflo">O<input type="checkbox" id="character" name="character[]" value="O" onclick='check(11)'></td>
                                        <td class="txt-oflo">P<input type="checkbox" id="character" name="character[]" value="P" onclick='check(10)'></td>
                                        <td class="txt-oflo">Q<input type="checkbox" id="character" name="character[]" value="Q" onclick='check(9)'></td>
                                        <td class="txt-oflo">R<input type="checkbox" id="character" name="character[]" value="R" onclick='check(8)'></td>
                                        <td class="txt-oflo">S<input type="checkbox" id="character" name="character[]" value="S" onclick='check(7)'></td>
                                        <td class="txt-oflo">T<input type="checkbox" id="character" name="character[]" value="T" onclick='check(6)'></td>
                                        <td class="txt-oflo">U<input type="checkbox" id="character" name="character[]" value="U" onclick='check(5)'></td>
                                        </tr>
                                        <tr>
                                        <td class="txt-oflo">V<input type="checkbox" id="character" name="character[]" value="V" onclick='check(4)'></td>
                                        <td class="txt-oflo">W<input type="checkbox" id="character" name="character[]" value="W" onclick='check(3)'></td>
                                        <td class="txt-oflo">X<input type="checkbox" id="character" name="character[]" value="X" onclick='check(2)'></td>
                                        <td class="txt-oflo">Y<input type="checkbox" id="character" name="character[]" value="Y" onclick='check(1)'></td>
                                        <td class="txt-oflo">Z<input type="checkbox" id="character" name="character[]" value="Z" onclick='check(0)'></td>
                                        <td></td>
                                        <td></td>
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>

                                <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                                    <input placeholder="Select start date" type="date" name="startD" id="example" class="form-control" required>
                                    <label for="example">Start Date</label>
                                    <i class="fas fa-calendar input-prefix" ></i>
                                </div>
                                <div class="md-form">
                                    <input placeholder="Select start time" type="time" name="startT" id="input_starttime" class="form-control timepicker" required>
                                    <label for="input_starttime">Start Time</label>
                                    <i class="fas fa-clock input-prefix" ></i>
                                </div>
                                <div class="md-form">
                                    <input placeholder="Select close time" name="closeT" type="time" id="input_closetime" class="form-control timepicker" required>
                                    <label for="input_closetime">Close Time</label>
                                    <i class="fas fa-clock input-prefix" ></i>
                                </div>
                                <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button onclick="printChar()" name="submit" type="submit" class="btn btn-success" style="color:white;">Submit Assignment</button>
                                        </div>
                                    </div>

                                <!-- <p>Start Date &emsp;<input type="Date" name="startD">&emsp;&emsp;Start time&emsp;<input type="time" name="startT"></p></br></br> 
                                <p>Close time &emsp;<input type="time" name="closeT">&emsp;&emsp; <button onclick="printChar()" name="submit" class="btn btn-success" type="submit" style="color:white;">Submit Assignment</button> -->
                            </form>

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