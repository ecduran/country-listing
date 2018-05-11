<?php 

include_once 'config/database.php';
include_once 'country.php';

$database = new Database();

$db = $database->getConnection(); 

$country = new Country($db);

$results = $country->selectAll();

$totalRows = count($results);


if ($totalRows>0){

	foreach($results as $row){
		echo "<tr>";
		echo "<td>".$row['country_code']."</td>";
		echo "<td>".$row['state_name']."</td>";
		echo "<td>".$row['state']."</td>";
		echo "</tr>";
	}

} else {
	echo "0 results.";
}


?>