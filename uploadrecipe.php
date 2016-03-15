<html>
	<head>
	</head>
	<body>

		<?php
			$servername = "192.168.200.185";
			$username = "recipuser";
			$password = "d13acc!481";

			//connection part //
			$db = mysql_connect($servername,$username,$password);
			if (!$db) {
				die("Database connection failed miserably: " . mysql_error());
 			}

			//Select the database, will always be using the database //
			$db_select = mysql_select_db("recipindex",$db);
 			if (!$db_select) {
 				die("Database selection also failed miserably: " . mysql_error());
 			}

 			$recipename = $_POST["recipename"];
 			$recipetype = $_POST["recipetype"];
 			$difficulty = $_POST["difficulty"];
 			$ingredient = $_POST["ingredient"];
 			$preparation = $_POST["preparation"];

 			$sql = "INSERT INTO recipes (recipename, type, difficulty, ingredients, preparation) VALUES ('$recipename', '$recipetype', '$difficulty', '$ingredient', '$preparation')";

 			//Print out results; to be deleted later after testing is done//
			$result = mysql_query($sql, $db);
			$result = mysql_query("SELECT * FROM recipes", $db);

			if (!$result) {
				die("database query failed: " . mysql_error());
			}

			while ($row = my_sql_fetch_array($result)) {
				echo $row[1]." ".$row[2]."<br/>";
			}

mysql_close($db);

?>
 </body>

</html>