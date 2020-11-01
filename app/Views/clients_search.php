
<?php

$action = 'read';
require "../controllers/register_controller.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Clients Search</title>
	<meta charset="utf-8" lang="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Language" content="en">
</head>

<!--style&js-->
<link rel="stylesheet" type="text/css" href="static/style.css">
<script type="text/javascript" src="static/script.js"></script>
<!--bootstrap&ajax-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!---->


<body>
	<div class="row d-flex justify-content-center">
		<div>
			<h3 class="text-center py-2">Healthy Research</h3>
			<p class="text-center">Clients consultation system</p>
		</div>
		<div>
			<img src="static/imgs/food.png" style="border-radius: 100%">
		</div>
	</div>

	<div class="text-right mr-4">
		<a href="clients_register.php"><button class="btn btn-primary">Register new client</button></a>
	</div>


	<form class="py-3 text-center">
		<div class="input-group input-group-sm mb-3 text-center d-flex justify-content-center">
			<input type="text" class="form-control col-lg-6 col-md-6 col-xs-6 col-sm-6" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="search" placeholder="Search for a name"  onfocus="hideTable()" id="search">
		</div>
	</form>
	<div class="text-center d-flex justify-content-center">

		<form id="selectForm" class="row">

			<label class="mr-1">Weight</label>
			<select name="weight" id="selectWeight" class="form-control form-control-sm col-lg-2 col-md-2 mr-1" onclick="hideTable()">
				<option value=""></option>
				<option value="Overweight">Overweight</option>
				<option value="Ideal weight">Ideal weight</option>
				<option value="Underweight">Underweight</option>
			</select>


			<!--height-->
			<label class="mr-1">Height</label>
			<select name="height" id="selectHeight" class="form-control form-control-sm col-lg-2 mr-1" onclick="hideTable()">
				<option value=""></option>
				<option value="Tall">Tall</option>
				<option value="Average">Average</option>
				<option value="Short">Short</option>
			</select>

			<!--lactose-->
			<label class="mr-1">Lactose</label>
			<select name="lactose" id="lactose" class="form-control form-control-sm col-lg-1  mr-1" onclick="hideTable()">
				<option value=""></option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>

			<!--athletic-->
			<label class="mr-1">Athletic</label>
			<select name="athletic" id="athletic" class="form-control form-control-sm col-lg-1  mr-1" onclick="hideTable()">
				<option value=""></option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
		</form>

	</div>



	<p class="result"></p>

	<script>

		//ajax filters

	//ajax by name
	$("#search").keydown(function(){
		var search = $("#search").val();
		$.post('../controllers/search_controller.php', {search: search},function(data){
			$(".result").html(data);
		});
	});

	//filter lactose
	$("#lactose").click(function(){
		var lactose = $("#lactose").val();
		$.post('../controllers/search_controller.php', {lactose: lactose},function(data){
			$(".result").html(data);
		});
	});

	//filter athletic
	$("#athletic").click(function(){
		var athletic = $("#athletic").val();
		$.post('../controllers/search_controller.php', {athletic: athletic},function(data){
			$(".result").html(data);
		});
	});

	

	//filter weight
	$("#selectWeight").click(function(){
		var selectWeight = $("#selectWeight").val();
		$.post('../controllers/search_controller.php', {selectWeight: selectWeight},function(data){
			$(".result").html(data);
		});
	});
	


	//filter height
	$("#selectHeight").click(function(){
		var selectHeight = $("#selectHeight").val();
		$.post('../controllers/search_controller.php', {selectHeight: selectHeight},function(data){
			$(".result").html(data);
		});
	});

	


</script>


<div class="container div0">
	<div class="py-3 ml-2">
		<table id="table" class="container div1">
			<thead  class="table_head text-light px-3">
				<tr class="table_head text-center">
					<th>Name</th>
					<th>Height</th>
					<th>Weight</th>
					<th>Lactose</th>
					<th>Athletic</th>
					<th>Categorie Height</th>
					<th>Categorie Weight</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody class="text-center">

				<? foreach($registers as $indice => $register) {?>
					<tr id="register_<?=$register->id ?>" class="table_user">

						<td><?=$register->name ?></td>
						<td ><?=$register->height ?></td>
						<td><?=$register->weight ?></td>
						<td><?=$register->lactose ?></td>
						<td><?=$register->athletic ?></td>
						<td><?=$register->cat_height?></td>
						<td><?=$register->cat_weight?></td>

						<td class="text-light">
							<button class="btn btn-secondary" onclick="edit(<?=$register->id ?>)">Edit</button>
							<button class="btn btn-danger" onclick="toDelet(<?=$register->id ?>)">Delete</button>
						</td>

					</tr>

					<?}?>

				</tbody>
			</table>



		</tbody>






	</table>

</div>
</div>

</body>
</html>