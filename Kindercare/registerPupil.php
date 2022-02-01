<?php include_once 'layout.php';
session_start(); 
?>
<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
 
 <style>
  .col-sm-8{
   margin-left:170px;
   margin-top:30px;
  }
  </style>
</head>
<body>

<div class="card col-sm-8">
<form action="processRegisterPupil.php" method="post" id="reg">
  <h3>Fill in this form to register a new pupil</h3>
  <div class="col-md-5">
                <?php 
                    if(isset($_SESSION['regstatus']))
                    {
                        ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['regstatus']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['regstatus']);
                    }
                ?>
</div>
  <div class="form-group">
    <label for="User Code">User Code</label>
    <input type="text" name="userCode" class="form-control"  placeholder="Enter User code">
  </div>
  <div class="form-group">
    <label for="First Name">First Name</label>  
    <input type="text" name="firstName" class="form-control"  placeholder="Enter First Name">
  </div>
  <div class="form-group">
    <label for="Last Name">Last Name</label>
    <input type="text" name="lastName" class="form-control"  placeholder="Enter Last Name">
  </div>
  <div class="form-group">
    <label for="Phone Number">Phone Number</label>
    <input type="text" name="phoneNumber" class="form-control"  placeholder="Enter Phone Number">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="text" name="password" class="form-control"  placeholder="Enter Password">
  </div>  
  <button type="submit" name="save" class="btn btn-primary">Register</button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
