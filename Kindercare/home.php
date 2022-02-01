<?php include_once 'layout.php';
include_once 'database.php';
session_start(); 
?>
<html>
<head>
<style>
    
    .well{
        background-color:#0275d8;
        color:white;
        border-radius:5px;
        padding-left: 5px;
        /* text-align:centre; */
    }
    
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
    .no-outline:focus {
        outline: none;
      }
    
</style>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>


<body>
    <div class="row" style="margin-top:40px;">
        
        <div class="col-sm-4">
          <div class="well">
            <h4>Registered pupils</h4>
            <p>19</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Deactivated Pupils</h4>
            <p>6</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Pending Activation Requests</h4>
            <p>3</p> 
          </div>
        </div>
   </div>




  
  <br/>
  <h4>Registered Pupils</h4>
  <br/>
  <table class="table" id="pupil_table">
  <thead>
    <tr>
      <th scope="col">User Code</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Activation Status</th>
      <th scope="col">Action</th>
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
      <td scope="row"><input type="text" class="no-outline" name="userCode" value="<?php echo $data['userCode']; ?>" readonly="readonly"></td>
      <td><?php echo $data['firstName'];?></td>
      <td><?php echo $data['lastName']; ?></td>
      <td><?php echo $data['phoneNumber']; ?></td>
      <?php
          if($data['activationStatus']== false){ ?>
          <td><input type="text" name="activationStatusD" value="Deactivated" readonly="readonly"></td>
          <?php } ?>
          <?php
          if($data['activationStatus']== true){ ?>
          <td><input type="text" name="activationStatusA" value="Activated" readonly="readonly"></td>
          <?php } ?>

     
 
<?php if($data['activationStatus']== false){ ?>
  <td><input type="submit" name="changeD" value="Activate" style="margin-left:11px;"></td>
 <?php } ?>
 <?php if($data['activationStatus']== true){ ?>
  <td><input type="submit" name="changeA" value="Deactivate" style="margin-left:11px;"></td>
 <?php } ?>

 
</form>
  </tr>
<?php
}
?>

</tbody>
</table>
<?php 
mysqli_close($conn);?>

</body>
</html>
