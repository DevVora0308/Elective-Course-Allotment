<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="somaiya_symbol.PNG">

<style>
a {
  padding: 15px 20px;
}

 a:hover {
   text-decoration: none;
  color: #1BAC91;
}

	.login-box{
    height: 500px;
    text-align: center;
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

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 15px 20px;
      text-decoration: none;
    }

    li a:hover {
      background-color: #FA5C22;
      color: white;
    }
    #brand{
      color:white;
    }
#brand:hover{
  text-decoration: none;
 color: #1BAC91;
}
    </style>
<?php
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){

	$username = "root";
	$password = "";
	$hostname = "localhost";
	
	$conn = mysqli_connect($hostname, $username, $password) or die("Could not connect to database");
	
	
mysqli_select_db($conn,"elective");

$username = $_POST['user'];
	$password = $_POST['pass'];
	
	$username = stripslashes($username);
	$password = stripslashes($password);
	
	$query = "SELECT * FROM student WHERE username='$username' and password='$password'";
	$result = mysqli_query($conn,$query);
	
$count = mysqli_num_rows($result);
	
	mysqli_close($conn);
	
	if($count==1){
		$seconds = 5 + time();
		setcookie(loggedin, date("F jS - g:i a"), $seconds);
setcookie("username", "$username", time()+86400, "/","", 0);
		header("location:dragAndDrop.php");
	}else{
		echo "<script> alert('Incorrect Username or Password')</script>";

	}
}
}
?>
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
<br><br>
    <div class="login-box">
    <img src="student.png" class="avatar">
        <h1>Student Login </h1><br>
            <form method="POST" action="">
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="user" placeholder="Enter Email" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="pwd" name="pass" placeholder="Enter Password" required>
              </div>
              <a href="#">Forget Password?</a>
<a href="signup.php">Not Registered?</a>
              <br><br>
              <input type="submit" name="submit" value="Login">
            </form>
            <div class="col s12 m6 offset-m3 center-align">
                <a class="oauth-container btn darken-4 white black-text" href="/users/google-oauth/" style="text-transform:none;">
                    <div class="left">
                        <img width="10px" height="10px" style="margin-right:5px" alt="Google sign-in"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />Sign Up with Google
                    </div>
                </a>
            </div>
        </div>
    </body>
</html>
