<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Prerequisite Courses</title>
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
input[type=button], select {
  width: 20%;
  padding: 12px;
  border: 1px solid white;
  border-radius: 4px;
  resize: vertical;
  color:black;
}
button{
  margin: 0% 10% 5% 0%;
}

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 14px;  
  border: none;
  outline: none;
  color: white;
  padding: 16px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: red;
}

.subnav-content {
  display: none;
  position: absolute;
  background-color: black;
  width: 10%;
  z-index: 1;
  font-size: 15px;
}

.subnav-content a {
  float: center;
  color: white;
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: ;
  color: black;
}
.subnav:hover .subnav-content {
  display: block;
}
</style>

</head>
<body>
  <h1 class="brand" align="center"><a href="index.html"><img src="somaiya_symbol.PNG" height="50" width="50">  K J Somaiya College of Engineering</a></h1>
  <nav class="navbar navbar-custom">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li><a class="nav-item" href="addcourse.php">Add Courses</a></li>
      <div class="subnav">
    <button class="subnavbtn">View Course <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="new2.php">Experience</a>
      <a href="precourse.php">Prerequisite</a>
    </div>
  </div> 
      <li><a class="nav-item" href="formdetail.php">Form Details</a></li>
      <li><a  class="nav-item" href="allocate.php">Allocate</a></li>
      <li><a  class="nav-item" href="avail.php">Form Availability</a></li>
         <li><a class="nav-item" href="#">Welcome  <?php echo $_COOKIE["name"]. "<br />";?></a></li>
      <li style="float:right;"><a  class="nav-item" href="logout.php">Logout</a></li>

    </ul>
  </div>
  </nav>
 <br>
 <br>
 <?php
 $conn = mysqli_connect("localhost", "root", "", "elective");
 echo "<table border='1'>";
    $branch= $_COOKIE["name"];
    $sql = "SELECT coursetype,sem,id,name,capacity,Addedby,experience FROM addCourse where Addedby='$branch' AND experience='yes' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo"<h3><center>List of courses entered:</center></h3>";
    echo "<tr>";
     echo "<th>Course Type</th>";
         echo "<th>Sem</th>";
         echo "<th>Id</th>";
         echo "<th>Course Name</th>";
         echo "<th>Capacity</th>";
         echo "<th>Experience</th>";
        echo"<th>Delete</th>";
        echo"<th>edit</th>";
         echo "</tr>";
    while($row = $result->fetch_assoc()) {
 echo "<tr><td>{$row['coursetype']}</td>
<td>{$row['sem']}</td>
<td>{$row['id']}</td>
<td>{$row['name']}</td>
<td>{$row['capacity']}</td>
<td>{$row['experience']}</td>
<td>
    <a href='delete.php?id={$row['id']}'>
<img src='delete.png' height='15px'/></a></td>
   <td> <a href='edit.php?id={$row['id']}'><img src='edit.png' height='15px'/></a>
</td>


</tr>\n";
    }
} else {
    echo "<script>alert('No Record Exits')</script>";
}


    echo"</table>";
    $conn->close();
?>

<br>

</div>

</body>
</html>
