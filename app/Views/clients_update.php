
<?php

$action = 'update';
require "../controllers/register_controller.php";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="row d-flex justify-content-center">
		<div>
			<h3 class="text-center py-2">Healthy Research</h3>
			<p class="text-center">Clients Update</p>
		</div>
		<div>
			<img src="static/imgs/food.png" style="border-radius: 100%">
		</div>
	</div>

	<div>
		<div class="row col-lg-12 py-4">
			<form method="post" action="../controllers/register_controller.php?action=update&id=<?=$_GET['id']?>">

				<? foreach($registers as $indice => $register){
					if($register->id == $_GET['id']){?>


						<label>Name</label>
						<input type="text" name="name"  value="<?=$register->name?>">

						<label>Height</label>
						<input type="text" name="height" value="<?=$register->height?>">

						<label>Weight</label>
						<input type="text" name="weight" value="<?=$register->weight?>">



						<label>Lactose Intolerant</label>
						<select name="lactose">
							<option value="<?=$register->lactose?>"><?=$register->lactose?></option>
							<option value=""></option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>

						<label>Athletic</label>
						<select name="athletic">
							<option value="<?=$register->athletic?>"><?=$register->athletic?></option>
							<option value=""></option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>

						<?}}?>
						
						<button type="submit" class="btn btn-primary">Update</button>
					</form>


				</div>
			</div>
		</body>
		</html>