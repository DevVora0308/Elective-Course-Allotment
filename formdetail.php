<html>
<head>
<title>Form Details</title>

<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="shortcut icon" href="somaiya_symbol.PNG">
<link rel="stylesheet" href="course.css">

<style>
/* Styling for first form*/
.block
{
width:50%;
padding:10px;
margin-left:25%;
border:3px solid #4db8ff;
box-shadow: 2px 2px 5px #b3e0ff;
border-radius:5px;
font-size:20px;
}

#bttn{
  margin-left:90%;
}
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

<script>
  let branch,sem


  function myFunction(){
var element = document.getElementById("myDIV");
//   element.classList.remove("hidden");
if(element)
{
  element.remove();
}
branch = document.getElementById("br").value
se = document.getElementById("se").value
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
   document.getElementsByTagName('body')[0].innerHTML += this.responseText;
  }
};
xhttp.open("GET", "http://localhost/maxim/view.php?branch="+branch+"&sem="+se, true);
xhttp.send();
}


</script>
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
         <li><a class="nav-item" href="#">Welcome  <?php echo $_COOKIE["name"]. "<br />";?></a></li>
      <li style="float:right"><a  class="nav-item" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
    <center>
    <h1>Student Form Details</h1>
    </center>
    <form method="post" action="">
<div class="block">
    <center>
  <p>Course Type:
<select name="ctype" required>
<option value="">---Select Course Type ---</option>
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
</p>


<p>Semester:
  <select id="se" name="sem" required>
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
</p>
<button class="btn btn-primary"  name="submit" >Submit</button>
    </center>
</div>
</form>
<br><br><br>
</body>
<?php
$conn = mysqli_connect("localhost", "root", "", "elective");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){
$coursetype=$_POST["ctype"];
    $sem=$_POST["sem"];
    //$branch=$_POST["branch"];
    echo "<table border='1'>";
    $sql = "SELECT Ctype,sem,sid,Pref1,Pref2,Pref3,Pref4,Pref5,grade FROM finalallot where sem='".$sem."' AND Ctype='".$coursetype."' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
     echo "<tr>";
        echo "<th>Course Type</th>";
         echo "<th>Sem</th>";
     echo "<th>Roll No</th>";
    echo "<th>Preference1</th>";
      echo "<th>Preference2</th>";
     echo "<th>Preference3</th>";
     echo "<th>Preference4</th>";
     echo "<th>Preference5</th>";
    echo "<th>Grade</th>";
     echo "</tr>";
    while($row = $result->fetch_assoc()) {
       echo "<tr><td>{$row['Ctype']}</td>
<td>{$row['sem']}</td>
<td>{$row['sid']}</td>
<td>{$row['Pref1']}</td>
<td>{$row['Pref2']}</td>
<td>{$row['Pref3']}</td>
<td>{$row['Pref4']}</td>
<td>{$row['Pref5']}</td>
<td> <a href='grade.php?id={$row['sid']}'><img src='edit.png' height='15px'/></a>
</td>
</tr>\n";

    }
} else {
    echo "";
}
    echo"</table>";
}
}
$conn->close();
?>

<br>


</html>
