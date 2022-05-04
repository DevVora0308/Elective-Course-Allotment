
<html>
<head>
<title>Admin Homepage</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="somaiya_symbol.PNG">
</head>
<style>
a:hover{
  text-decoration: none;
}
.navbar-custom {
    background-color: #006080;
}
/* Modify brand and text color */
.navbar-custom .navbar-brand,.navbar-custom .nav-item,
.navbar-custom .navbar-text {
    color: white;
    padding: 15px 30px;
}

.navbar-custom .navbar-brand:hover,.navbar-custom .nav-item:hover,
.navbar-custom .navbar-text:hover,.navbar-custom .navbar-brand:focus,
.navbar-custom .navbar-text:focus{
  background-color: #00bfff;
}

</style>
    
<body>
<h1 class="brand" align="center"><a href="index.html"><img src="somaiya_symbol.PNG" height="50" width="50">  K J Somaiya College of Engineering</a></h1>
<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin1.php">Admin</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a class="nav-item" href="addcourse.php">Add Courses</a></li>
      <li><a class="nav-item" href="viewcourse.php">View Courses</a></li>
      <li><a class="nav-item" href="formdetail.php">Form Details</a></li>
      <li><a  class="nav-item" href="allocate.php">Allocate</a></li>
	<li><a  class="nav-item" href="avail.php">Form Availability</a></li>
      <li><a  class="nav-item" href="logout.php">Logout</a></li>
        <li><a class="nav-item" href="#">Welcome  <?php echo $_COOKIE["name"]. "<br />";?></a></li>
    </ul>
  </div>
</nav>
	
	</body>
</html>