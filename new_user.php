<?php
	$username = "root";
	$password = "";
	$hostname = "localhost";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");
	
	$selected = mysql_select_db("elective", $dbhandle);

		if(isset($_POST['user']) && isset($_POST['pass'])){
			$user = $_POST['user'];
			$pass = $_POST['pass'];

			$query = mysqli_query("SELECT * FROM users WHERE Username='$user'");
			if(mysql_num_rows($query) > 0 ) { //check if there is already an entry for that username
				echo "Username already exists!";
			}else{
				mysqli_query("INSERT INTO admin (username, password) VALUES ('$user', '$pass')");
				header("location:index.html");
			}
	}
	mysqli_close();
?>

<html>
	<body>
		<h1>Signup!</h1>
			<form action="new_user.php" method="POST">
				<p>Username:</p><input type="text" name="user" />
				<p>Password:</p><input type="password" name="pass" />
				<br />
				<input type="submit" value="Signup!" />
			</form>
	</body>
</html>