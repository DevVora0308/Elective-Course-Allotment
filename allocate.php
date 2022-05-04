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
      <li><a class="nav-item" href="addcourse.php">Add Courses</a></li>
      <li><a class="nav-item" href="viewcourse.php">View Courses</a></li>
      <li><a class="nav-item" href="formdetail.php">Form Details</a></li>
      <li><a  class="nav-item" href="allocate.php">Allocate</a></li>
      <li><a  class="nav-item" href="avail.php">Form Availability</a></li>
      <li style="float:right;"><a  class="nav-item" href="logout.php">Logout</a></li>
         <li><a class="nav-item" href="#">Welcome  <?php echo $_COOKIE["name"]. "<br />";?></a></li>
    </ul>
  </div>
  </nav>
 <br>
 <br>

  <form method="post">
<div class="block" id="form" >
      <table class="tab">
  <tr>
  <td class="tab">Course Type:</td>
  <td class="tab">
  <select name="ctype" id="ctype" required>
  <option value="">---Select Course Type---</option>
  <?php
  $femail= $_COOKIE["name"];
  if($femail=="hodit@somaiya.edu" || $femail=="hodcomps@somaiya.edu" || $femail=="hodetrx@somaiya.edu" || $femail=="hodextc@somaiya.edu" ||$femail=="hodmech@somaiya.edu")
   {?>
  <option value="Departmental-I">Departmental Elective - I</option>
  <option value="Departmental-II">Departmental Elective - II</option>
  <?php }else{?>
  <option value="Open Elective">Open Elective</option>
  <option value="Open Management">Open Management</option>
  <option value="Exposure">Exposure</option>
  <option value="AOAC">AOAC</option>
  <option value="AOCC">AOCC</option>
  <?php }?>
 </select>
  </td>
  </tr>

  <tr>
  <td class="tab">Semester:</td>
  <td class="tab">
  <select name="sem" required>
    <option value="">---Select Semester---</option>
  <option value="1">I</option>
  <option value="2">II</option>
  <option value="3">III</option>
  <option value="4">IV</option>
  <option value="5">V</option>
  <option value="6">VI</option>
  <option value="7">VII</option>
  <option value="8">VIII</option>
  </select>
  </td>
  </tr>

</table>
    <center>
<button class="btn btn-primary" id="grade" name="allot" value="grade" >By experience</button>
<button class="btn btn-primary" id="fcfs" name="submit" value="fcfs" >By prerequisite</button>
    </center> </div>
</form>

<script>
var b = document.getElementsByClassName('btn');
var i;
for (i = 0; i < b.length; i++) {
	b[i].addEventListener('click', function() {
    var f=document.getElementById('form');
    f.style.display = "block";
    var t=document.getElementById('table');
    t.style.display = "none";
	});
}


</script>
    <br><br><br>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['allot'])){

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "elective");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
     $sem = $_POST['sem'];
    $ctype = $_POST['ctype'];
    // $branch = $_POST['branch'];
$sqln="UPDATE addcourse SET c=capacity";
    $resultn=$conn->query($sqln);
$sql = "SELECT sid,sem,Ctype,Pref1 FROM finalallot2 where sem='".$sem."' AND Ctype='".$ctype."' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($rown = mysqli_fetch_assoc($result))
    {
      $tra=1;
        $sql1 = "SELECT experience,c  FROM addcourse where name='".$rown["Pref1"]."'";
        $result1 = $conn->query($sql1);

        while($row = mysqli_fetch_assoc($result1)){
            if($row["c"]>0 && $row["experience"]="yes")
            {
                 $sqlf= "UPDATE finalallot2 SET allocate='".$rown["Pref1"]."' WHERE sid='".$rown["sid"]."'";
                 $resultf = $conn->query($sqlf);
                  $sqlc= "UPDATE addcourse SET c=c-1 where name='".$rown["Pref1"]."'";
                  $resultc = $conn->query($sqlc);
                 $tra--;
            }
            else {
                $sqlf= "UPDATE finalallot2 SET allocate='-' WHERE sid='".$rown["sid"]."'";
                 $resultf = $conn->query($sqlf);
            }
        }

        

}
}

echo "<table border='1'>";
     $sqlu = "SELECT sid,sem,Ctype,allocate FROM finalallot2 where sem='".$sem."' AND Ctype='".$ctype."'  order by sid";
$resultu = $conn->query($sqlu);

if ($resultu->num_rows > 0) {
    // output data of each row
    echo "<tr>";
         echo "<th>Id</th>";
         echo "<th>Sem</th>";
     echo "<th>Course Type</th>";
     echo "<th>Allocated Course</th>";
         echo "</tr>";
    while($row = $resultu->fetch_assoc()) {
       echo "<tr>";

        echo "<td> " . $row["sid"]. "</td><td> " . $row["sem"].  "</td><td>" . $row["Ctype"]."</td><td>" . $row["allocate"]. "</td>";
  echo"</tr>";
    }
} else {
    echo "<script>alert('No Record Exits')</script>";
}
 echo "</table>";

    $conn->close();

}
}
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "elective");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
     $sem = $_POST['sem'];
    $ctype = $_POST['ctype'];
    // $branch = $_POST['branch'];
$sqln="UPDATE addcourse SET c=capacity";
    $resultn=$conn->query($sqln);
$sql = "SELECT sid,sem,Ctype,Pref1 FROM finalallot2 where sem='".$sem."' AND Ctype='".$ctype."' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($rown = mysqli_fetch_assoc($result))
    {
      $tra=1;
        $sql1 = "SELECT prerequisite_y,c  FROM addcourse where name='".$rown["Pref1"]."'";
        $result1 = $conn->query($sql1);

        while($row = mysqli_fetch_assoc($result1)){
            if($row["c"]>0 && $row["prerequisite_y"]="yes")
            {
                 $sqlf= "UPDATE finalallot2 SET allocate1='".$rown["Pref1"]."' WHERE sid='".$rown["sid"]."'";
                 $resultf = $conn->query($sqlf);
                  $sqlc= "UPDATE addcourse SET c=c-1 where name='".$rown["Pref1"]."'";
                  $resultc = $conn->query($sqlc);
                 $tra--;
            }
            else {
                $sqlf= "UPDATE finalallot2 SET allocate1='-' WHERE sid='".$rown["sid"]."'";
                 $resultf = $conn->query($sqlf);
            }
        }

        

}
}

echo "<table border='1'>";
     $sqlu = "SELECT sid,sem,Ctype,allocate1 FROM finalallot2 where sem='".$sem."' AND Ctype='".$ctype."'  order by sid";
$resultu = $conn->query($sqlu);

if ($resultu->num_rows > 0) {
    // output data of each row
    echo "<tr>";
         echo "<th>Id</th>";
         echo "<th>Sem</th>";
     echo "<th>Course Type</th>";
     echo "<th>Allocated Course</th>";
         echo "</tr>";
    while($row = $resultu->fetch_assoc()) {
       echo "<tr>";

        echo "<td> " . $row["sid"]. "</td><td> " . $row["sem"].  "</td><td>" . $row["Ctype"]."</td><td>" . $row["allocate1"]. "</td>";
  echo"</tr>";
    }
} else {
    echo "<script>alert('No Record Exits')</script>";
}
 echo "</table>";

    $conn->close();

}
}
?>
</body>
</html>
