<?php


require "../models/connection.php";
require "../models/register_model.php";
require "../models/register_service.php";

$action = isset($_GET['action']) ? $_GET['action'] : $action;

if($action == 'create'){
	$register = new Register();

	$register->__set('name',$_POST['name']);
	$register->__set('height',$_POST['height']);
	$register->__set('weight',$_POST['weight']);
	$register->__set('lactose',$_POST['lactose']);
	$register->__set('athletic',$_POST['athletic']);

	$connection = new Connection();

	$registerService = new RegisterService($connection,$register);
	$registerService ->create();

	header('Location: http://localhost/elofy/app/views/clients_search.php?test=1');

}else if($action == 'read'){


	$register = new Register();
	$connection = new Connection();

	$registerService = new RegisterService($connection,$register);
	$registers = $registerService->read();


}else if($action == 'update'){

	$register = new Register();
	
	$register->__set('name',$_POST['name']);
	$register->__set('height',$_POST['height']);
	$register->__set('weight',$_POST['weight']);
	$register->__set('lactose',$_POST['lactose']);
	$register->__set('athletic',$_POST['athletic']);
	$register->__set('id',$_GET['id']);



	$connection = new Connection();
	$registerService = new RegisterService($connection,$register);
	
	if($registerService->update()){
		header('Location: http://localhost/elofy/app/views/clients_search.php?updated');
	}

}else if($action == 'delete'){

	$register = new Register();
	$register->__set('id',$_GET['id']);

	$connection = new Connection();
	
	$registerService  = new RegisterService($connection,$register);
	$registerService->delete();
	header('location:clients_search.php');

}












?>