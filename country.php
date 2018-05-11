<?php 

class Country {

	private $conn;
	private $tableName = 'statedb';

	public $countryCode;
	public $state;
	public $stateName; 


	public function __construct($db) {

		$this->conn = $db;
	}
/*
	public function totalRows() {

		$query = "SELECT id FROM " .$this->tableName;

		$stmt = $this->conn->prepare($query);

		if ($stmt->execute()) {
			return $stmt->rowCount();
		} else {
			return false;
		}		
	}
*/
	public function selectAll() {

		$query = "SELECT * FROM ".$this->tableName. " ORDER BY id DESC";
		
		$stmt = $this->conn->prepare($query);

		$stmt->execute();
		
		return $stmt->fetchAll();
	
	}

	public function add(){

		$query = "INSERT INTO 
					".$this->tableName." (country_code, state, state_name , tax1, tax1_name, tax2, tax2_name, tax_system) 
				  VALUES (:countryCode,:state,:state_name,'0.00000','','0.00000','','')";

		$stmt = $this->conn->prepare($query);
		
		$this->countryCode = htmlspecialchars(strip_tags($this->countryCode));
		$this->state = htmlspecialchars(strip_tags($this->state));
		$this->stateName = htmlspecialchars(strip_tags($this->stateName));

		$stmt->bindParam(':countryCode', $this->countryCode);
		$stmt->bindParam(':state', $this->state);
		$stmt->bindParam(':state_name', $this->stateName);

		if($stmt->execute()) {
			return true;
		} else {
			return false;
		}

	}

	public function update() {

		$query = "UPDATE 
					" . $this->tableName . " 
				  SET 
				  	country_code = :countryCode, 
				  	state = :state, 
				  	state_name = :state_name";

		$stmt = $this->conn->prepare($query);

		$this->countryCode = htmlspecialchars(strip_tags($this->countryCode));
		$this->state = htmlspecialchars(strip_tags($this->state));
		$this->stateName = htmlspecialchars(strip_tags($this->stateName));

		$stmt->bindParam(':countryCode', $this->countryCode);
		$stmt->bindParam(':state', $this->state);
		$stmt->bindParam(':stateName', $this->stateName);

		if($stmt->execute()) {
			return true;
		} else {
			return false; 
		}
	}

	public function delete() {

		$query = "DELETE FROM" . $this->tableName . "WHERE id = ?";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);

		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}

	}

}


 ?>