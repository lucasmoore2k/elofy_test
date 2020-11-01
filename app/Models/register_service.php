<?php


class RegisterService{
	private $connection;
	private $register;


	public function __construct(Connection $connection, Register $register){
		$this->connection = $connection->connect();
		$this->register = $register;
	}



	//crud

	public function create(){
		$query = 'insert into clients(name,height,weight,lactose,athletic) values (:name,:height,:weight,:lactose,:athletic)';
		$stmt = $this->connection->prepare($query);
		$stmt->bindValue(':name',$this->register->__get('name'));
		$stmt->bindValue(':height',$this->register->__get('height'));
		$stmt->bindValue(':weight',$this->register->__get('weight'));
		$stmt->bindValue(':lactose',$this->register->__get('lactose'));
		$stmt->bindValue(':athletic',$this->register->__get('athletic'));
		$stmt->execute();
	}

	public function read(){
		$query = "select *,
		case 
		when height >= 180 THEN 'Tall'
		when height >=160 AND height <= 179 THEN 'Average'
		when height <= 159 THEN 'Short'
	
		end as cat_height,
		case
		when  weight >= 90 THEN 'Overweight'
		when  weight >=70 AND weight <= 80 THEN 'Ideal weight'
		when  weight <= 69 THEN 'Underweight'
	
		end AS cat_weight
		from clients"
		;

		$stmt = $this->connection->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function update(){
		$query = "update clients SET name = :name, height = :height, weight = :weight, lactose = :lactose,athletic = :athletic WHERE id = :id";
		
		$stmt = $this->connection->prepare($query);
		$stmt->bindValue(':name',$this->register->__get('name'));
		$stmt->bindValue(':height',$this->register->__get('height'));
		$stmt->bindValue(':weight',$this->register->__get('weight'));
		$stmt->bindValue(':lactose',$this->register->__get('lactose'));
		$stmt->bindValue(':athletic',$this->register->__get('athletic'));
		$stmt->bindValue(':id',$this->register->__get('id'));
		return $stmt->execute();
	}

	public function delete(){
		$query = 'delete from clients where id = :id';
		$stmt= $this->connection->prepare($query);
		$stmt->bindValue(':id',$this->register->__get('id'));
		$stmt->execute();
	}
}



?>