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
        
    }
    
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
    .no-outline{
        outline: none;
        border: none;
      }
      .search-input{
        outline: none;
        border: none;
      }
</style>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
<div class="container">
  <br/>
  <h4>Activation requests</h4>
  <br/>
  <div class="col-md-5">
                <?php 
                    if(isset($_SESSION['changeStatus1']))
                    {
                        ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['changeStatus1']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['changeStatus1']);
                    }
                ?>
</div>
  <table class="table" id="pupil_table">
  <thead>
    <tr>
    <th scope="col"><input type="text" class="search-input" placeholder="User Code"></th>
      <th scope="col"><input type="text" class="search-input" placeholder="First Name"></th>
      <th scope="col"><input type="text" class="search-input" placeholder="Last Name"></th>
      <th scope="col"><input type="text" class="search-input" placeholder="Phone Number"></th>
      <th scope="col"><input type="text" class="search-input" placeholder="Activation Status"></th>
      <th scope="col"><input type="text" class="search-input" placeholder="Action"></th>      
    </tr>
  </thead>
  <tbody>
    <?php 
 $query4 = "SELECT * FROM pupils WHERE requestStatus = 'Pending'";
 $result4 = mysqli_query($conn , $query4);
    while($data = mysqli_fetch_array($result4))
{
?>

<form action="changeStatus1.php" method="post">
    <tr>
    <td scope="row"><input type="text" class="no-outline" name="userCode" value="<?php echo $data['userCode']; ?>" readonly="readonly"></td>
      <td><?php echo $data['firstName'];?></td>
      <td><?php echo $data['lastName']; ?></td>
      <td><?php echo $data['phoneNumber']; ?></td>
      <td><input type="text" name="activationStatus" value="Deactivated" class="no-outline" readonly="readonly"></td>
      <td><input type="submit" name="change" value="Activate" style="margin-left:11px;"></td>

  </tr>
</form>
<?php
}
?>

  </tbody>
</table>
<script src="js/home.js"></script>
</div>
<?php 
mysqli_close($conn);?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

