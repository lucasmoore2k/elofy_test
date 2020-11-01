<?php


include('../Models/connection_search.php');


function edit(){
	header('clientes_update.php?action=read&id='+$row['id']);
}

function toDelete(){
	header('clients_search.php?action=delete&id='+$row['id']);
}

if(isset($_POST['search'])){
	$search = $_POST['search'];
	$query = mysqli_query($conn, "SELECT * FROM clients WHERE name LIKE '%$search%'");
}
else if(isset($_POST['lactose'])){
	$search = $_POST['lactose'];
	$query = mysqli_query($conn, "SELECT * FROM clients WHERE lactose LIKE '%$search%'");
}
else if(isset($_POST['athletic'])){
	$search = $_POST['athletic'];
	$query = mysqli_query($conn, "SELECT * FROM clients WHERE athletic LIKE '%$search%'");
}
else if(isset($_POST['selectWeight'])){
	$search = $_POST['selectWeight'];
	$sql = "SELECT * FROM clients
	WHERE 
	(
	case
	when  weight >= 90 THEN 'Overweight'
	when  weight >=70 AND weight <= 80 THEN 'Ideal weight'
	when  weight <= 69 THEN 'Underweight'
	end
	)
	LIKE '%$search%'";

	$query = mysqli_query($conn, $sql);
}
else if(isset($_POST['selectHeight'])){
	$search = $_POST['selectHeight'];
	$sql = "SELECT * FROM clients
	WHERE 
	(
	case
	when height >= 180 THEN 'Tall'
	when height >=160 AND height <= 179 THEN 'Average'
	when height <= 159 THEN 'Short'
	end
	)
	LIKE '%$search%'";

	$query = mysqli_query($conn, $sql);

}

$num   = mysqli_num_rows($query);

if($num >0){
	while($row = mysqli_fetch_assoc($query)){
		echo "
		<div class='container div0_1'>
			<div class='py-3 ml-2'>
				<table id='table' class='container div1_1'>
					<thead  class='table_head_1 text-light px-3'>
						<tr class='table_head_1 text-center'>
							<th>Name</td>
								<th>Height</td>
									<th>Weight</td>
										<th>Lactose</td>
											<th>Athletic</td>
												<th>Actions</th>
												<th></td>
												</tr>
											</thead>
											<tbody class='text-center'>
												<tr>

													<td class='table_user'>".$row['name']."</td>
													<td class='table_user'>".$row['height']."</td>
													<td class='table_user'>".$row['weight']."</td>
													<td class='table_user'>".$row['lactose']."</td>
													<td class='table_user'>".$row['athletic']."</td>





													<td>
														<button class='btn btn-secondary' onclick='edit(".$row['id'].")'>Edit</button>
														<button class='btn btn-danger' onclick='toDelet(".$row['id'].")'>Delete</button>

													</td>
												</tr>
											</tbody>
										</table>
									</tbody>
								</table>
							</div>
						</div>
						";


					}
				}else{
					echo "
					<div class='container text-center'>
						<p class='bg-danger text-light'>This client does not existz!!</p>
					</div>
					";
				}








				?>