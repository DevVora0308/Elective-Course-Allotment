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
<link rel="stylesheet" type="text/css" href="styles.css" />

<style>
/* Styling for first form*/


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
input[type=text], select {
  width: 80%;
  height: 14%;
  padding: 10px;
  border: 1px solid white;
  border-radius: 4px;
  resize: vertical;
  color:green;
    
}


.split {
  height: 60%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 25%;
  overflow-x: hidden;
  padding-top: 40px;
    font-size: 130%;
    
}

.left {
  left: 0;
  background-color: azure;
    color: crimson;
    padding-bottom: 30%;
    
    font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
}

.right {
  right: 0;
  background-color: azure;
    color: crimson;
    padding-top: 3px;
    padding-right: 5%;
animation-name: example;
  animation-duration: 4s;
    font-family: Zapf Chancery, cursive;
}
@keyframes example {
  0%   {background-color:blanchedalmond; left:0px; top:27%;}
  25%  {background-color:azure; left:620px; top:27%;}
  
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
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
      <li><a class="nav-item" href="drag1.php">Experience courses</a></li>
       <li><a class="nav-item" href="prerequisite.php">Prerequisite Courses</a></li>
        <li><a class="nav-item" href="#">Welcome <?php echo $_COOKIE["username"]. "<br />";?></a></li>
        <li><a class="nav-item" href="a.php">Course Alloted</a></li>
        
      <li><a  class="nav-item" href="studentlogout.php">Logout</a></li>
    </ul>
  </div>
</nav>

    <div class="split left">
<div class="centered">
    <form method="post" action="">

    <center>
  Course Type
<select name="ctype" required>
<option value="">---Select Course Type ---</option>
<option value="Departmental-I">Departmental Elective - I</option>
<option value="Departmental-II">Departmental Elective - II</option>
<option value="Open Elective">Open Elective</option>
<option value="Open manag">Open Management</option>
<option value="Exposure">Exposure</option>
<option value="AOAC">AOAC</option>
<option value="AOCC">AOCC</option>
</select>
Branch
<select id="br" name="branch" required>
<option value="">---Select Branch---</option>
<option value="Comps">Comps</option>
<option value="IT">IT</option>
<option value="Mech">Mech</option>
<option value="EXTC">EXTC</option>
<option value="ETRX">ETRX</option>
</select>

Semester
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

   <br><br>
<button class="btn btn-info btn-lg"  name="submit">Go!</button>
        </center> 
        
    </form>
        </div> 
    </div>
<?php
$conn = mysqli_connect("localhost", "root", "", "elective");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){
$coursetype=$_POST["ctype"];
$sem=$_POST["sem"];
$branch=$_POST["branch"];
/* $sqle = "SELECT start,ends FROM addcourse where coursetype='$coursetype' AND sem='$sem' AND branch='$branch' ";
$resulte = $conn->query($sqle);

if ($resulte->num_rows > 0) {

    while($row = $resulte->fetch_assoc()) {
    $start=$row["start"];
    $ends=$row["ends"];
      }
    }
*/
     $username=$_COOKIE["username"];
        $sqlr = "SELECT rollno FROM student where username='$username' ";
$resultr = $conn->query($sqlr);
if ($resultr->num_rows > 0) {
    // output data of each row
    while($row = $resultr->fetch_assoc()) {
    $roll=$row["rollno"]; 
  
    }}
    ?>




    <div class="split right">

    <form method="post" name="formpref" onsubmit="return validateForm()">
    
       <input type='text' name='sem' value='<?php echo $sem ?>' style='display:none;'>
            
       <input type='text' name='branch' value='<?php echo $branch ?>' style='display:none;'>
        
        <input type='text' name='ctype' value='<?php echo $coursetype ?>' style='display:none;'>
    
      <input type='text' name='sid' value='<?php echo $roll?> '  style='display:none;'>

 <?php
 $sql = "SELECT name FROM addcourse where sem='".$sem."' AND $branch = '1' AND coursetype='".$coursetype."' ";
$result1 = $conn->query($sql);

if ($result1->num_rows > 0) {
    // output data of each row
    echo "Preference 1 ";
echo"<select name='pref1' required>";
echo "<option value=''>Select Course</option>";
     echo "<br/>";
    while($row = $result1->fetch_assoc()) {
        $name=$row["name"];
   echo "
   <option value='$name'> $name</option>"; 
    }
   echo "</select>"; 
}

               echo "<br><br>";
   $result2 = $conn->query($sql);
            
if ($result2->num_rows > 0) {
    // output data of each row
    echo "Preference 2 ";
echo"<select name='pref2' required>";
echo "<option value=''>Select Course</option>";
     echo "<br/>";
    while($row = $result2->fetch_assoc()) {
        $name=$row["name"];

    echo "<option value='$name'> $name</option>"; 
}    
  echo "</select>";  

}
 echo "<br><br>";
   $result3 = $conn->query($sql);
          
if ($result3->num_rows > 0) {
    // output data of each row
     echo "Preference 3 ";
echo"<select name='pref3' required>";
echo "<option value=''>Select Course</option>"; 
     echo "<br/>";
    while($row = $result3->fetch_assoc()) {
        $name=$row["name"];
    echo "<option value='$name'> $name</option>"; 
    }
    echo "</select>"; 
}
              
               echo "<br><br>";
   $result4 = $conn->query($sql);
           
if ($result4->num_rows > 0) {
    // output data of each row
     echo "Preference 4 ";
echo"<select name='pref4' required>";
echo "<option value=''>Select Course</option>";
     echo "<br/>";
    while($row = $result4->fetch_assoc()) {
        $name=$row["name"];
    echo "<option value='$name'> $name</option>";  
    }
    echo "</select>";
}

               echo "<br><br>";
   $result5 = $conn->query($sql);
           
if ($result5->num_rows > 0) {
    // output data of each row
     echo "Preference 5 ";
echo"<select name='pref5' required>";
echo "<option value=''>Select Course</option>"; 
     echo "<br/>";
    while($row = $result5->fetch_assoc()) {
        $name=$row["name"];
    echo "<option value='$name'> $name</option>"; 
    }
   echo "</select>"; 
}

               
else {
    echo "No course exists";
}
}
else {
  echo"none";
}


}
$conn->close();
?>
<br> <br>     
      <button class="btn btn-info btn-lg"  name="allot" >Submit</button>
    </form>


        </center>
    </div>
    
    <?php   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['allot'])){

//the form was submitted
$sid = $_POST['sid'];
$coursetype = $_POST['ctype'];
$branch = $_POST['branch'];
$sem = $_POST['sem'];
$pref1 = $_POST['pref1'];
$pref2 = $_POST['pref2'];
$pref3 =$_POST['pref3'];
$pref4=$_POST['pref4'];
$pref5=$_POST['pref5'];
 $tp= time();

     if ($pref1!=$pref2 && $pref1!=$pref3 && $pref1!=$pref4 && $pref1!=$pref5 && $pref2!=$pref3 && $pref2!=$pref4 && $pref2!=$pref5 && $pref3!=$pref4 && $pref3!=$pref5 && $pref4!=$pref5){
    
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "elective");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
    
$sql ="INSERT INTO finalallot(sid,sem,branch,Ctype,Pref1,Pref2,Pref3,Pref4,Pref5) Values('$sid','$sem','$branch','$coursetype','$pref1','$pref2','$pref3','$pref4','$pref5')";

    if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();  
    
}
else
{
  echo"<script>alert('Preference cannot be same')</script>";
}
}
}

        
?>
    
    </body>     
</html>
