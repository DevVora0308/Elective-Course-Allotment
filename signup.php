<html>
<head>
<title>Student Signup</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
.login-box{
    width: 420px;
    height: 500px;
    background: rgba(184, 246, 233, 0.5);
    color: #1c8adb;
    top: 55%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 20px 30px;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #FBC15D ;
}

li {
  float: left;
}


</style>
</head>

<body>
      <div class="navbar-wrapper">
    		<div class="navbar navbar-inverse navbar-fixed-top">
    			<div class="navbar-inner">
    				<div class="container">
    					<!-- Responsive navbar -->
    					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
    				</a>
    					<h1 class="brand" style="color:white; text-align:center"><a id="brand" href="index.html"><img src="somaiya_symbol.PNG" height="50" width="50">  K J Somaiya College of Engineering</a></h1>

    				</div>
    			</div>
    		</div>
    	</div>
<br>
<div class="login-box">
  <h1 align="center">Sign Up</h1>
<form method="POST" action="">
<div class="form-group">
    <label for="name">Name:</label>
    <input type="name" class="form-control" name="name" id="name" required>
  </div>
  <div class="form-group">
      <label for="number">Roll no:</label>
      <input type="number" class="form-control" pattern="[0-9]{7}" name="roll" id="number" required>
    </div>
<div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" pattern="^[\w.+\-]+@somaiya\.edu$" name="email" id="email" placeholder="example@somaiya.edu" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" id="pwd" required>
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</fieldset>
</form>

<p class="text-success">Already Registered? <a href="stulogin.php">Login</a></p>
</div>

</body>
<?php
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){

	$username = "root";
	$password = "";
	$hostname = "localhost";
	
	$conn = mysqli_connect($hostname, $username, $password) or die("Could not connect to database");
	
	
mysqli_select_db($conn,"elective");

$username = $_POST['email'];
	$password = $_POST['password'];
	$name=$_POST['name'];
$roll=$_POST['roll'];
	
 $sql="INSERT INTO student(rollno,username,password,name) VALUES ('$roll','$username','$password','$name')"; 
			
            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Signup Successful');</script>";

			} 
			else
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
	
		

	mysqli_close($conn);
}
}
?>
</html>
