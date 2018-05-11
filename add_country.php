<?php 

include_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();


if($_POST){

	include_once 'country.php';

	$cntry = new Country($db);

	$cntry->countryCode = $_POST['countryCode'];
	$cntry->stateName = $_POST['stateName'];
	$cntry->state = $_POST['state'];

	if($cntry->add()){
	
		echo '<script language="javascript">';
		echo 'alert("message successfully sent")';
		echo '</script>';
		
	}	

	header("location: index.php");	
	exit;
	
}

echo '<form class="form-inline"  method="post">';

	echo '<label class="sr-only" for="inlineFormInputCountryCode2">Country code</label>';
	echo '<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputCountryCode2" name="countryCode" placeholder="Country code" required>';


	echo '<label class="sr-only" for="inlineFormInputStateName2">State name</label>';
	echo '<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputStateName2" name="stateName" placeholder="State" required>';
			
	echo '<label class="sr-only" for="inlineFormInputStateCode2">State code</label>';
	echo '<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputStateCode2" name="state" placeholder="State code" required>';		

	echo '<button type="submit" class="btn btn-primary mb-2">Submit</button>';

echo "</form>";


?>