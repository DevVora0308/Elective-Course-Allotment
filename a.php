<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Allocate</title>
<meta name="description" content="Courses">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="course.css">
<link rel="shortcut icon" href="somaiya_symbol.PNG">
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
.btn{
  margin:10px;
}
select
{
  color: #008060;
  background-color: #b3daff;
  border:2px solid #80c1ff;
  box-shadow: 2px 2px 5px #80c1ff;
}

</style>


</head>
<body>
     
<h1 class="brand" align="center"><a href="index.html"><img src="somaiya_symbol.PNG" height="50" width="50">  K J Somaiya College of Engineering</a></h1>
    <nav class="navbar navbar-custom">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a class="nav-item" href="drag1.php">Experience courses</a></li>
       <li><a class="nav-item" href="prerequisite.html">Prerequisite Courses</a></li>
        <li><a class="nav-item" href="#">Welcome <?php echo $_COOKIE["username"]. "<br />";?></a></li>
        <li><a class="nav-item" href="a.php">See course alloted</a></li>
      <li><a  class="nav-item" href="studentlogout.php">Logout</a></li>
    </ul>
  </div>
</nav>
<?php
 
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "elective");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username=$_COOKIE["username"];
        $sqlr = "SELECT rollno FROM student where username='$username' ";
$resultr = $conn->query($sqlr);
if ($resultr->num_rows > 0) {
    // output data of each row
    while($row = $resultr->fetch_assoc()) {
    $roll=$row["rollno"]; 
    }
}
    echo "<table border='1'>";
     $sql = "SELECT sid,sem,ctype,allocate FROM finalallot where sid='$roll' order by sid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
     echo "<tr>";
         echo "<th>Id</th>";
         echo "<th>Sem</th>";
     echo "<th>Course Type</th>";
     echo "<th>Allocated Course</th>";
         echo "</tr>";
    while($row = $result->fetch_assoc()) {
       echo "<tr>";
        echo "<tr><td> " . $row["sid"]. "</td><td> " . $row["sem"].  "</td><td>" . $row["ctype"]."</td><td>" . $row["allocate"]. "</td>";
        echo "</tr>";
    }
} else {
    echo "<script>alert('No Record Exits')</script>";
}
    echo "</table>";

$conn->close();
?>