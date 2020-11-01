
<?php

$action = '';
require "../controllers/register_controller.php";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
		<div class="row d-flex justify-content-center">
		<div>
			<h3 class="text-center py-2">Healthy Research</h3>
			<p class="text-center">Clients Register</p>
		</div>
		<div>
			<img src="static/imgs/food.png" style="border-radius: 100%">
		</div>
	</div>

	<div>
		<div class="row col-lg-12 py-4">
			<form method="post" action="../controllers/register_controller.php?action=create">
				<label>Name</label>
				<input type="text" name="name" placeholder="Name">

				<label>Height</label>
				<input type="text" name="height" placeholder="Height">

				<label>Weight</label>
				<input type="text" name="weight" placeholder="Weight">


				<label>Lactose Intolerant</label>
				<select name="lactose">
					<option value=""></option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>

				<label>Athletic</label>
				<select name="athletic">
					<option value=""></option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>

				<button type="submit" class="btn btn-primary">Register</button>
			</form>


		</div>
	</div>
</body>
</html>