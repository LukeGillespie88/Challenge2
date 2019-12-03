<?php


$Result = new \stdClass();

////Check if GET value is set
if(isset($_GET['value'])){
	///Check to make sure the value is an integer
	if(is_numeric($_GET['value'])){
		///Check
		if($_GET['value'] % 7 == 0){
			if($_GET['value'] % 9 == 0){
				$Result->Result = "C";
			}else{
				$Result->Result = "CN";
			}
		}else if($_GET['value'] % 9 == 0){
			$Result->Result = "N";
		}else{
			$Result->Result = "Value is not a multiple of 7 or 9";
		}
	}else{
		$Result->Result = "Value was not numeric";
	}
}

if(isset($Result->Result)){

	// Creates a new csv file and store it in tmp directory
	$NewFile = fopen("./result.json", 'w');
	file_put_contents("./result.json", json_encode($Result));
	fclose($NewFile);

	// output headers so that the file is downloaded rather than displayed
	header("Content-type: text/csv");
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