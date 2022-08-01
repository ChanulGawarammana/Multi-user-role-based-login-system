<?php
	session_start();
	include "db_conn.php";
	if (isset($_SESSION['username']) && $_SESSION['id']){	?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
	<div class="container d-flex justify-content-center align-items-center"
	style="min-height: 100vh">
		<?php if ($_SESSION['role']== 'admin') {?>
			
			<div class="card" style="width: 18rem;">
			  
			  <div class="card-body">
			    <h5 class="card-title"><?=$_SESSION['name']?>
			    </h5>
			    <b>Role:-</b><?=$_SESSION['role']?><br>
			  
			    <a href="logout.php" class="btn btn-dark">logout</a>
			  </div>
			</div>
			<div class="p-3">
				<?php include 'php/members.php';
					if (mysqli_num_rows($res)>0) {?>

					
				
				<h1 class="display-4 fs-1">Members</h1>
				<table class="table">
				  	<thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">name</th>
				      <th scope="col">user name</th>
				      <th scope="col">Role</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  	$i =1;
				  	while ( $rows = mysqli_fetch_assoc($res)) {?>

				  		
				    <tr>
				      <th scope="row"><?=$i?></th>
				      <td><?=$rows['name']?></td>
				      <td><?=$rows['username']?></</td>
				      <td><?=$rows['role']?></</td>
				    </tr>
				    <?php $i++; }?>
				
					</tbody>
				</table>
				<?php }?>
			</div>
		<?php }else { ?>

			<div class="card" style="width: 18rem;">
			  
			  <div class="card-body">
			    <h5 class="card-title"><?=$_SESSION['name']?>
			    </h5>
			    <a href="diary.php" class="btn btn-dark">daily diary</a>
			  
			    <a href="logout.php" class="btn btn-dark">logout</a>

			    

			  </div>
			</div>

		<?php } ?>
	</div>

</body>
</html> 
<?php }else{
	header("Location: index.php");
} ?>