<?php


$Result = new \stdClass();

////Check if GET value is set
if(isset($_GET['value'])){
	///Check to make sure the value is an integer
	if(is_numeric($_GET['value'])){
		///Check to see if the value is multiple of 7
		if($_GET['value'] % 7 == 0){
			///Check to see if the value is multiple of 9
			if($_GET['value'] % 9 == 0){
				$Result->Result = "C";
			}else{
				$Result->Result = "CN";
			}
		///Check to see if the value is multiple of 9
		}else if($_GET['value'] % 9 == 0){
			$Result->Result = "N";
		}else{
			$Result->Result = "Value is not a multiple of 7 or 9";
		}
	}else{
		$Result->Result = "Value was not numeric";
	}
}
///Check to see if result is set
if(isset($Result->Result)){

	//Create file
	$NewFile = fopen("./result.json", 'w');
	///insert data
	file_put_contents("./result.json", json_encode($Result));
	///close the file
	fclose($NewFile);

	//Force download
	header("Content-type: application/json");
	header("Content-disposition: attachment; filename = result.json");
	readfile("./result.json");

}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Challenge 2</title>
</head>

<body>
	<form action="./challenge2.php" type="GET">
		<input type="text" name="value" placeholder="Enter you number!" />
		<input type="submit" name="submit" value="Submit" />
	</form>
</body>

</html> 