<?php
require_once( 'dbConnect.php');
if(isset($_SESSION['email'])){
  header("location:login.php");
}

$RegiDataGet = "SELECT `id`, `name`, `email`, `password`, `created_at`, `updated_at` FROM `php_crud_user_table`";
$result = $db_conn->query($RegiDataGet);

//var_dump($_GET);

if(isset($_GET['delete'])){
  echo $id = $_GET['delete'];

  $deleteRecord = "DELETE FROM `php_crud_user_table` WHERE `id` = '$id'";
  $resultDel = $db_conn->query($deleteRecord);

  header("location:index.php");

}

// 

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
		<ul class="list-left">
		<li>
      <h1> All Data Page </h1>
    </li>
		</ul>
		<ul class="list-right">
			<li><a href="index.php"> Home </a></li>
			<li><a href="logout.php"> LogOut </a></li>
			<li><a href="login.php"> LogIn </a></li>
      <li><a href="insert.php"> Register </a></li>
		</ul>
	</ul>
<div class="table-wrapper mt-5">

<table class="table table-responsive text-center">
    <thead>
      <tr>
        <th>ID</th>
      	<th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

     <?php 
      if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){
        ?>

        <tr>
          <td><?php echo $row["id"]?></td>
          <td><?php echo $row["name"]?></td>
          <td><?php echo $row["email"]?></td>
          <td><?php echo $row["password"]?></td>
          <td><?php echo $row["created_at"]?></td>
          <td><?php echo $row["updated_at"]?></td>
          <td><a  href="edit.php?page=edit&&edit=<?php echo $row['id']?>" class="btn btn-success"> Edit </a>
          	<a onclick="alert('Do u want to delete id : <?php echo $row['id']?>')" href="index.php?&&delete=<?php echo $row['id']?>"  class="btn btn-danger"> Delete 
            </a>
          </td>
        </tr>
        <?php } } ?>
         
    </tbody>
  </table>
</div>
</div>

</body>
</html>