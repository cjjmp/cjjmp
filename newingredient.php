<?php
	//create connection
	$servername = "192.168.200.185";
	$username = "recipuser";
	$password = "d13acc!481";
	$db = mysql_connect($servername,$username,$password);
	if (!$db) {
		die("Database connection failed: " . mysql_error());
	}
	$db_select = mysql_select_db("recipindex",$db);
	if (!$db_select) {
		die("Database selection failed: " . mysql_error());
	}
?>

<html>
	<body>	
		<?php
			$addingre = "INSERT INTO ingredients()
			VALUES ('','')";

			if ($db->query($addingre) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $addingre . "<br>" . $db->error;
			}
		
			mysql_close($db)
		?>
	</body>
</html>
