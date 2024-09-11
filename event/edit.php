<?php
session_start();
 $edit_id=$_GET['id'];
$con= new mysqli("localhost","root","","event");

if($con->connect_error) die($con->connect_error);
else{
	$sql="select * from music where id=".$edit_id;
	$res=$con->query($sql);
	$row=$res->fetch_assoc();
	//print_r($row);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<header class='modal-header'><h1>Please Edit Event <Details></Details></h1></header>
		
		<form method="post" action="update.php" enctype="multipart/form-data">
	<input type="hidden" name="hidden_id" value="<?php echo $row['id']; ?>">
			<div class='form-group'>
				<label>Name</label>
		<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" >
			</div>
			<div class='form-group'>
				<label>phone</label>
				<input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>">
			</div>
			<div class='form-group'>
				<label>Email</label>
				<input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control">
			</div>
			
			<div class='form-group'>
				<label>Upload Picture</label>
				<input type="file" name="picture" class="form-control">
				<img src="<?php echo $row['image']; ?>"height="68px" width="68px">
			</div>
			
			<button class='btn btn-sm btn-primary'>update</button>
			
		</form>
	</div>

</body>
</html>