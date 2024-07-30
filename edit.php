<?php
require 'dbConnect.php';
 if(isset($_GET['edit'])){
    $id = $_GET['edit'];
		$seleteDataRegi = "SELECT  `name`, `email`,`password` FROM `php_crud_user_table` WHERE `id`='$id'";
		$result = $db_conn->query( $seleteDataRegi );
		$row = $result->fetch_assoc();
		// var_dump($row);

		// echo $id;
		
}

//$id = $row["id"];



if(isset($_POST['update'])){

	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $pwd = $_POST['pwd'];
	  // $_SESSION['email'] = $email;

  // updata data into database //
  $updataData = "UPDATE `php_crud_user_table` 
  SET `name`='$name',`email`='$email',`password`='$pwd ' WHERE `id`='$id'";
  $resultUpdate =  $db_conn->query($updataData);

//var_dump($updataData);

  	header("location:index.php");


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../cdn.jsdelivr.net/npm/bootstrap%405.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="style.css" rel="stylesheet">
  <script src="../cdn.jsdelivr.net/npm/bootstrap%405.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
	<ul class=menu-list>
		<ul class="list-center">
		<li><h1> Updata Data Page</h1><hr></li>
        </ul>
		<ul class="list-right">
			<li><a href="index.php"> Home </a></li>
			<li><a href="logout.php"> LogOut </a></li>
			<li><a href="login.php"> LogIn </a></li>
		</ul>
	</ul>
<div class="form-wrapper mt-5">

<form method="post" action="">
 <p>
 	<label for="name"> Name </label>
 	<input type="text" name="name" value="<?php echo  $row["name"];?>"  id="name" placeholder="Write Name">
 </p>
 <p><label for="email"> Email </label>
 	<input type="email" name="email" value="<?php echo $row["email"];?>" id="email" placeholder="Write Email">
 </p>
 <p><label for="pwd"> Password </label>
 	<input type="password" name="pwd" value="<?php echo $row["password"];?>" id="pwd" placeholder="Write Password">
 </p>
 <div class="mt-5"></div>
 <p><input type="submit" name="update" value="Update">
 </p>
</form>

</div>
</div>

</body>
</html>