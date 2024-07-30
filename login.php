<?php
require 'dbConnect.php';

$emailError = $pwdError = $email = $pwd = $loginError = '';

if(isset( $_POST['login'] )){
  if( !empty($email = $_POST['email'] ) ){
     $email = $_POST['email'];
  } else {
     $emailError = "field is require";
  }

  if( !empty($pwd = $_POST['pwd'] ) ){
     $pwd = $_POST['pwd'];
  } else {
     $pwdError = "field is require";
  }

  //var_dump( $_POST );

  $emailDataCheck = "SELECT `id`, `name`, `password`, `status` FROM `php_crud_user_table` WHERE `email` = '$email'";
  $result =  $db_conn->query($emailDataCheck);
  if($result->num_rows == 1){ //var_dump($result);
     $userInfo = $result->fetch_assoc(); //var_dump($userInfo);
     if($userInfo["password"] == md5($pwd)){ //var_dump(md5($pwd));
      
        if($userInfo["status"] == 1){

            // $_SESSION['email'] = $email;
            // $_SESSION['name'] = $userInfo["name"];

            // if( isset($_SESSION['email']) ){
              
            //  } 

          header("location:index.php");

        } else{
          $loginError  = "Status Inactive";
        }

     } else {
      $loginError  = "Credential Not Matched";
     }

  } else {
    $loginError  = "Credential Not Matched";
  }

  //var_dump($result);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Bootstrap 5 Example </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../cdn.jsdelivr.net/npm/bootstrap%405.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="style.css" rel="stylesheet">
  <script src="../cdn.jsdelivr.net/npm/bootstrap%405.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <div class="form-wrapper login-wrapper mt-5">
    <h1 class="insert-heading"> Login Page </h1><hr>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
     <p><label for="email"> Email </label>
      <input type="email" name="email"  value="<?php echo isset($email) ? $email : '';?>" id="email" placeholder="Write Email">
      <span class="error"><?php echo $emailError;?></span>
      <span class="error"><?php echo $loginError;?></span>
    </p>
     <p><label for="pwd"> Password </label>
      <input type="password" name="pwd"  value="<?php echo isset($pwd) ? $pwd : '';?>" id="pwd" placeholder="Write Password">
       <span class="error"><?php echo $pwdError;?></span>
        <span class="error"><?php echo $loginError;?></span>
    </p>
     <div class="mt-5"></div>
     <p><input type="submit" name="login" value="Login"></p>
    </form>
  </div>
</div>

</body>
</html>