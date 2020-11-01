<?php


class Register{
	private $id;
	private $name;
	private $height;
	private $weight;
	private $lactose;
	private $athletic;

	public function __get($attr){
		return $this->$attr;
	}

	public function __set($attr,$value){
		return $this->$attr=$value;
	}
}


?>