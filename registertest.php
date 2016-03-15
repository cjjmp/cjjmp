<!DOCTYPE HTML>
<html>
	<head>
		<title>Create New User</title>
		<style>
			.error {color: #FF0000;}
		</style>
	</head>
	<body>
		<?php
			$servername = "192.168.200.185";
			$dbusername = "recipuser";
			$password = "d13acc!481";

			//connection part //
			$db = mysql_connect($servername,$dbusername,$password);

 			$password = $username = $name = $email = "";
 			$passErr = $usernameErr = $nameErr = $emailErr = "";
 			$notloaded = 0;
 			//notloaded = 1 means no errors while 2 means errors

 			if ($_SERVER["REQUEST_METHOD"] == "POST") {
 				if (empty($_POST["name"])) {
 					$nameErr = "Name is required";
 					$notloaded = 2;
 				} else {
 					$name = test_input($_POST["name"]);
 					//check if name only contains letters and whitespace
 					if (!preg_match("/^[a-zA-Z]*$/",$name)) {
 						$nameErr = "Only letters and white space allowed";
 						$notloaded = 2;
 					} else {
 						$notloaded = 1;
 					}
 				}
 			

 				if (empty($_POST["email"])) {
 					$emailErr = "Email is required";
 					$notloaded = 2;
 				} else {
 					$email = test_input($_POST["email"]);
 					//check if e-mail is well-formed
 					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 						$emailErr = "Invalid email format";
 						$notloaded = 2;
 					} else {
 						$notloaded = 1;
 					}
 				}

 				if (empty($_POST["password"])) {
 					$passErr = "Password is required";
 					$notloaded = 2;
 				} else {
 					$name = test_input($_POST["password"]);
 					//check if name only contains letters and whitespace
 					if (!preg_match("/^[a-zA-Z]*$/",$password)) {
 						$passErr = "Only letters and white space allowed";
 						$notloaded = 2;
 					} else {
 						$notloaded = 1;
 					}
 				}

 				if (empty($_POST["username"])) {
 					$usernameErr = "Username is required";
 					$notloaded = 2;
 				} else {
 					$username = test_input($_POST["username"]);
 					//check if name only contains letters and whitespace
 					if (!preg_match("/^[a-zA-Z]*$/",$username)) {
 						$usernameErr = "Only letters and white space allowed";
 						$notloaded = 2;
 					} else {
 						$notloaded = 1;
 					}
 				}

 				function test_input($data) {
 					$data = trim($data);
 					$data = stripslashes($data);
 					$data = htmlspecialchars($data);
 					return $data;
 				}
 			
 				if ($notloaded == 1) {
 					$sql = "INSERT INTO users (password, username, name, email) VALUES ('$password', '$username', '$name', '$email')";
 					$result = mysql_query($sql, $db);
 				}

 			}

			mysql_close($db);

		?>
	
		<form id="registerform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<h3>Register</h3>
        
		<div>Name:
			<label>
				 <input type="text" name="name" value="<?php echo $name;?>" placeholder="Enter your name.">
			</label>
			<span id="nameError" class="formError">* <?php echo $nameErr;?></span>
		</div>
	
		<div>Email:
			<label>
				<input type="text" name="email" value="<?php echo $email;?>" placeholder="Enter your email address.">
			</label>
			<span id="emailError" class="formError">* <?php echo $emailErr;?></span>
		</div>
	
		<div>Username:
			<label>
				<input type="text" name="username" value="<?php echo $username;?>" placeholder="Enter a username.">
			</label>
			<span id="usernameError" class="formError">* <?php echo $usernameErr;?></span>
		</div>
	
		<div>Password:
			<label>
				<input type="password" name="password" value="" placeholder="Enter a password.">
			</label>
			<span id="passError" class="formError">* <?php echo $passErr;?></span>
		</div>

		<div>Confirm Password:
			<label>
				<input type="password" name="password" value="" placeholder="Re-enter password.">
			</label>
			<span id="passError" class="formError"></span>
		</div>
        <input type="Submit" value="Submit">
 		</form>
 		<?php
 		echo "<h2>Your Input:</h2>";
 		echo $name;
 		echo "<br>";
 		echo $email;
 		echo "<br>";
  		echo $username;
 		echo "<br>";
  		echo $password;
 		echo "<br>";
 		if ($notloaded == 1) {
 			echo "User successfully created";
 		}		
 		if ($notloaded == 2) {
 			echo "User not created";
 		}
 		?>
	</body>
</html>
