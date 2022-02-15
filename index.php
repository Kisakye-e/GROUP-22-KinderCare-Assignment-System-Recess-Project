<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KinderCare Education Centre|Assignment Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <style>
      html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}


    </style>
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="">
    
      <!-- <img class="mb-3" src="img/logo Icon.png" alt="Logo" > -->
      <img class="mb-3" src="img/logo-text (2).png" alt="Logo" width="110px" height="70px">
                <?php 
                    if(isset($_SESSION['firstlogin']))
                    {
                        ?>
                            <div class="alert alert-primary alert-dismissible fade show" style="text-align:left;"role="alert">
                            <?php echo $_SESSION['firstlogin']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['firstlogin']);
                    }
                    if(isset($_SESSION['signin']))
                    {
                        ?>
                            <div class="alert alert-primary alert-dismissible fade show" style="text-align:left;"role="alert">
                            <?php echo $_SESSION['signin']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['signin']);
                    }
                    if(isset($_SESSION['regTr']))
                    {
                        ?>
                            <div class="alert alert-primary alert-dismissible fade show" style="text-align:left;"role="alert">
                            <?php echo $_SESSION['regTr']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['regTr']);
                    }
                ?>  
 
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputTeacherNo" class="sr-only">Teacher Number</label>
      <input type="text" name="teacherNumber" class="form-control" placeholder="Teacher Number" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
        <p >Don't have an account?
        <a href="registerTeacher.php"><span style ="color:#151f28">Register Here</span></a></p>
        </label>
      </div>
      <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>



<?php
include "database.php";

if(isset($_POST['submit'])){

    $teacherNumber = mysqli_real_escape_string($conn,$_POST['teacherNumber']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));

    if ($teacherNumber != "" && $password != ""){

        $sql_query = "select count(*) as cntUser,firstName,lastName from teachers where teacherNumber='".$teacherNumber."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        $_SESSION['first'] = $row['firstName'];
        $_SESSION['last'] = $row['lastName'];
        
        if($count > 0){
            $_SESSION['teacherNumber'] = $teacherNumber;            
            header('Location: home.php');
        }else{
          $_SESSION['signin']="Invalid teacher number or password";
          header("Location:index.php"); 
        }

    }

}
?>