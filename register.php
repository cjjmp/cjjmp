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

 			$password = $_POST["password"];
 			$username = $_POST["username"];
 			$name = $_POST["name"];
 			$email = $_POST["email"];

 			$sql = "INSERT INTO users (password, username, name, email) VALUES ('$password', '$username', '$name', '$email')";

 			//Print out results; to be deleted later after testing is done//
			$result = mysql_query($sql, $db);
			$result = mysql_query("SELECT * FROM users", $db);

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