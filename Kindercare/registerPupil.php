<?php include_once 'layout.php';?>
<style>
  .col-sm-8{
   margin-left:170px;
   margin-top:30px;
  }
  </style>
<div class="card col-sm-8">
<form action="" method="post" id="reg">
  
  <h3>Fill in this form to register a new pupil</h3>
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
