<?php
require 'dbConnect.php';



if(isset($_POST['register'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$pwd = md5( $_POST['pwd'] );

	$error = [];

	if( empty( $name ) ){
	   $error["name"] = "field is require";
	} 

	if( empty( $email ) ){
	   $error["email"] = "field is require";
	} 
	if( empty( $pwd ) ){
	   $error["pwd"] = "field is require";
	} 


  // insert data into database ///
  $regiDataInsert  = "INSERT INTO `php_crud_user_table`(`name`, `email`, `password`) 
  VALUES ('$name','$email','$pwd')";
  $resultInsert = $db_conn->query($regiDataInsert);

    header("location:index.php");

}


//var_dump($error);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../cdn.jsdelivr.net/npm/bootstrap%405.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="style.css" rel="stylesheet">
  <script src="../../cdn.jsdelivr.net/npm/bootstrap%405.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
	<ul class=menu-list>
		<ul class="list-center">
		<li><h1> Insert Data Page</h1><hr></li>
        </ul>
		<ul class="list-right">
			<li><a href="index.php"> Home </a></li>
			<li><a href="logout.php"> LogOut </a></li>
			<li><a href="login.php"> LogIn </a></li>
		</ul>
	</ul>
<div class="form-wrapper mt-5">
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
 <p>
 	<label for="name"> Name </label>
 	<input type="text" name="name" value="<?php isset($name) ? $name : ''?>"  id="name" placeholder="Write Name">
 	<span class="error"><?php echo isset($error["name"]) ? $error["name"] : ''?></span>
 </p>
 <p><label for="email"> Email </label>
 	<input type="email" name="email" value="<?php isset($email) ? $email : ''?>" id="email" placeholder="Write Email">
 	 	<span class="error"><?php echo isset($error["email"]) ? $error["email"] : ''?></span>
 </p>
 <p><label for="pwd"> Password </label>
 	<input type="password" name="pwd" value="<?php isset($pwd) ? $pwd : ''?>" id="pwd" placeholder="Write Password">
 	 	<span class="error"><?php echo isset($error["pwd"]) ? $error["pwd"] : ''?></span>
 </p>

 <div class="mt-5"></div>
 <p><input type="submit" name="register" value="Register">
 </p>
</form>

</div>
</div>

</body>
</html>