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

  <script type="text/javascript">
  function ShowHideDiv()
      {
           document.getElementById("dvcourse").style.display ="block";    
           }
   function ShowProof()
      {
          var Yes = document.getElementById("yes");
          Yes.style.display = yes.checked ? "block" : "block";
          
      }

      function no()
      {
        alert("Sorry , You cannot opt for this Course.");
      }


  </script>

  <style>


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

  #dvCourse
  {
    align-items: center;
    margin: auto;
  }

 input[type=checkbox]{
  color: pink;
background-color: green;
border: 5px solid blue;
 }
input[type=text],[type=submit],[type=file],select {
  padding: 10px;
  width: 80%;
  height: 12%;
  border: 1px solid blue;
  border-radius: 4px;
  resize: vertical;
  color:green;
    
}
body{

  background-color: azure;
  padding: 10px;
  border: 1px solid white;
  border-radius: 4px;
  resize: vertical;
  color:crimson;
}
  .button {

    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

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
  height: 70%;
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
</select><br><br>
Branch<br>
<select id="br" name="branch" required>
<option value="">---Select Branch---</option>
<option value="Comps">Comps</option>
<option value="IT">IT</option>
<option value="Mech">Mech</option>
<option value="EXTC">EXTC</option>
<option value="ETRX">ETRX</option>
</select>
<br><br>
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

    <form method="post" name="form">
    
       <input type='text' name='sem' value='<?php echo $sem ?>' style='display:none;'>
            
       <input type='text' name='branch' value='<?php echo $branch ?>' style='display:none;'>
        
        <input type='text' name='ctype' value='<?php echo $coursetype ?>' style='display:none;'>
    
      <input type='text' name='sid' value='<?php echo $roll?> '  style='display:none;'>

 <?php
 $sql = "SELECT name,prerequisite FROM addcourse where sem='".$sem."' AND $branch = '1' AND coursetype='".$coursetype."' AND prerequisite_y='yes'  ";
$result1 = $conn->query($sql);
if ($result1->num_rows > 0) {
echo "<table><tr>";
         echo "<th>Course Name</th>";
         echo "<th>Prerequisite</th>";
         echo "</tr>";
         echo "<tr>";
while($row = $result1->fetch_assoc()) {
        echo "<tr><td> " . $row["name"]. "</td><td> " . $row["prerequisite"].  "</td>";
  echo"</tr></table>";
}
}
$result2 = $conn->query($sql);
if ($result2->num_rows > 0) {

echo"<br>Select Course<br><br>";
echo"<select  name='pref1' onclick='ShowHideDiv()'>"; 
  echo "<option>~~Select~~<br></option>";
 while($row = $result2->fetch_assoc()) {
        $name=$row["name"];
 
   echo "<option value='$name' >$name<br></option>";}
    echo"</select>";
  } else{
  echo"<script>alert('Form not available')</script>";
}
}}
    ?>
<br><br>
<div id="dvcourse" style="display: none" >
    Do You have an Prerequisite for selected course ?
    <br><br>
    <button class ="button" onclick="ShowProof()" />Yes</button>
    <button class ="button" onclick="no()">No</button>
</div>

<div id="yes" style="display:none" >
    <label for="cname">Enter Prerequiste Course Name:</label><br>
    <input type="text" name="cname" id="cname" required ><br>
    <label for="myfile">Upload a Proof:</label>
    <input type="file" id="myfile" name="file" accept="application/pdf"><br>
    <input type="submit" name="allot">
  </form>
</div>
<?php   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['allot'])){

$sid = $_POST['sid'];
$coursetype = $_POST['ctype'];
$branch = $_POST['branch'];
$sem = $_POST['sem'];
$pref1 = $_POST['pref1'];
$cname=$_POST['cname'];

 $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
     #upload directory path
$uploads_dir = 'images';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "elective");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
    
$sql ="INSERT INTO finalallot2(sid,sem,branch,Ctype,Pref1,coursename,proof) Values('$sid','$sem','$branch','$coursetype','$pref1','$cname','$pname')";

    if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Your response added successfully')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();  
    
}
}

        
?>
</body>
<html>
