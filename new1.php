

 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elective";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



<html>
<head>
<title>Add Courses</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="somaiya_symbol.PNG">
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
.block1
{
width:50%;
padding:10px;
margin-left:25%;
font-size:20px;
}

/* For container for table*/
.display
{
width:80%;
padding:10px;
margin-left:10%;
border:3px solid #4db8ff;
box-shadow: 2px 2px 5px #b3e0ff;
border-radius:5px;
font-size:20px;
text-align:center;
}

table,th,td
{
  border-collapse: collapse;
  border:none;
  font-size:20px;
  padding:5px;
}
table{
  width:90%;
  margin-left:5%;
}

select
{
  color: #008060;
  background-color: #b3daff;
  border:2px solid #80c1ff;
  box-shadow: 2px 2px 5px #80c1ff;
}

</style>
<style>
a:hover{
  text-decoration: none;
}
        /* Modify the background color */

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
        .navbar-custom .navbar-text:hover{
          background-color: #00bfff;

        }

        .txtb
        {
          border-radius:5px;
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
<script>
  function branch()
  {

    var check=document.getElementById("branches");
    if(ctype.value=="Open Elective")
    {
      document.getElementById("all").style.display="none";
      check.style.display="block";
         document.getElementById("b").style.display="block";
    }
  else if(ctype.value=="Departmental-I" || ctype.value=="Departmental-II") {
    check.style.display="none";
    document.getElementById("all").style.display="none";
document.getElementById("b").style.display="none";

    //output based ona admin login
  }
  else {
    check.style.display="none";
    document.getElementById("all").style.display="block";
      document.getElementById("b").style.display="block";
  }

}

  function check(theForm) {
    var check=document.getElementById("branches");
  var b=document.getElementsByName("branch");
  if(check.style.display=="block")
  {
  if (b[0].checked == false && b[1].checked == false && b[2].checked == false && b[3].checked == false && b[4].checked == false)
  {
    alert ('You didn\'t choose any of the checkboxes!');
    return false;
  } else {
    return true;
  }
  }
}

function ok(){
  document.getElementById("ok").click();
}
</script>
</head>

<body>
  <h1 class="brand" align="center"><a href="index.html"><img src="somaiya_symbol.PNG" height="50" width="50">  K J Somaiya College of Engineering</a></h1>
<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
     <div class="subnav">
    <button class="subnavbtn">Add Course <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="addcourse1.php">upload Excel</a>
      <a href="new1.php">Experience</a>
      <a href="addcourse.php">Prerequisite</a>
    </div>
  </div>
      <li><a class="nav-item" href="viewcourse.php">View Courses</a></li>
      <li><a class="nav-item" href="formdetail.php">Form Details</a></li>
      <li><a  class="nav-item" href="allocate.php">Allocate</a></li>
      <li><a  class="nav-item" href="avail.php">Form Availability</a></li>
         <li><a class="nav-item" href="#">Welcome  <?php echo $_COOKIE["name"]. "<br />";?></a></li>
        <li><a  class="nav-item" href="logout.php">Logout</a></li>

    </ul>
  </div>
</nav>

<br>
<br>
<form method="post" onsubmit="return check(this)">
<div class="block">
<table>
<tr>
<td>Course Type:</td>
<td>
<select name="ctype" id="ctype" onchange="ok()" class="txtb" required>
<option value="">---Select Course type---</option>
<?php
$femail= $_COOKIE["name"];
if($femail=="hodit@somaiya.edu" || $femail=="hodcomps@somaiya.edu" || $femail=="hodetrx@somaiya.edu" || $femail=="hodextc@somaiya.edu" ||$femail=="hodmech@somaiya.edu")
 {?>
<option value="Departmental-I">Departmental Elective - I</option>
<option value="Departmental-II">Departmental Elective - II</option>
<?php }else if($femail=="hodcenter@somaiya.edu"){ ?>
<option value="Open Elective">Open Elective</option>
<option value="Open Management">Open Management</option>
<option value="Exposure">Exposure</option>
<option value="AOAC">AOAC</option>
<option value="AOCC">AOCC</option>
<?php }?>
</select>
<a class="btn btn-info btn-lg text-right"  id="ok" onclick="branch()" style="display:none">OK</a>
</td>
</tr>
<tr>
<td id="b" style="display:none">Branch: </td>
<td id="cell">
  <div id="branches" style="display:none;">
<input type="checkbox" name="branch[]" value="Comps">Computer<br>
<input type="checkbox" name="branch[]" value="IT">IT<br>
<input type="checkbox" name="branch[]" value="EXTC" >EXTC<br>
<input type="checkbox" name="branch[]" value="ETRX" >ETRX<br>
<input type="checkbox" name="branch[]" value="Mech">Mechanical<br>
</div>
<p id="all" value="all" name="branch" style="display:none">All</p>
</td>
</tr>
<tr>
<td>Semester:</td>
<td>
<select name="sem" class="txtb" required>
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
<tr>
<td>Course Name: </td><td><input type="text" name="cname" class="txtb" required></td>
</tr>
<tr>
<td>Course ID: </td><td><input type="text" name="cid" class="txtb" required></td>
</tr>
<tr>
<td>Capacity: </td><td><input type="number" name="cap" class="txtb" required></td>
</tr>
<tr>
<td>Experience Required: </td>
<td><input type="radio"  name="cexp" value="yes" required>
  <label for="yes">Yes</label><br>
  <input type="radio"  name="cexp" value="no" required>
  <label for="no">No</label><br>
</td>
</tr>
</table>
<center><button class="btn btn-primary"  name="submit" >Submit</button></center>
</div>
<br><br><br>
</form>
</body>


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){
    $alert=0;
    $a=0;
    $coursetype = $_POST['ctype'];
    $name = $_POST['cname'];
  $id = $_POST['cid'];
  $pname = $_POST['pcname'];
   $cname = stripslashes($name);
  $cid = stripslashes($id);
  $cexp = stripslashes($cexp);

  $queryn1 = "SELECT name FROM addcourse WHERE name='$cname' AND coursetype='$coursetype' ";
  $resultn1 = mysqli_query($conn,$queryn1);
if($resultn1->num_rows>0)
{
    echo"<script>alert('Course Name already exists')</script>";
}
    else{
        $alert=1;
    }

$queryn2 = "SELECT id FROM addcourse WHERE id='$cid' AND coursetype='$coursetype' ";
  $resultn2 = mysqli_query($conn,$queryn2);
if($resultn2->num_rows>0)
{
    echo "<script>alert('Course Id already exists')</script>";
}
    else
    {
        $a=1;
    }
if($alert=="1" && $a=="1")
{
$coursetype = $_POST['ctype'];

  $sem = $_POST['sem'];
  $name = $_POST['cname'];
  $id = $_POST['cid'];
  $capacity =$_POST['cap'];
  $cexp=$_POST['cexp'];
    $IT="IT";
    $Comps="Comps";
    $Etrx="ETRX";
    $Extc="EXTC";
    $Mech="Mech";
    $all="all";
    $femail= $_COOKIE["name"];



switch ($coursetype) {
        case 'Departmental-I':




    if($femail=="hodit@somaiya.edu")
    {

        $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,IT,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
        if($femail=="hodcomps@somaiya.edu")
    {
            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,Comps,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

        if($femail=="hodetrx@somaiya.edu")
    {
            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,ETRX,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

        if($femail=="hodextc@somaiya.edu")
    {
            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,EXTC,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
        if($femail=="hodmech@somaiya.edu")
    {
            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,Mech,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

            break;

        case 'Departmental-II':
     $branch= $_COOKIE["name"];

    if($femail=="hodit@somaiya.edu")
    {
            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,IT,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

        if($femail=="hodcomps@somaiya.edu")
    {
            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,Comps,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

        if($femail=="hodetrx@somaiya.edu")
    {
            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,ETRX,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

        if($femail=="hodextc@somaiya.edu")
    {
            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,EXTC,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

        if($femail=="hodmech@somaiya.edu")
    {
            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,Mech,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
            break;





        case 'Open Elective':

        $checkbox1=$_POST['branch'];
        $qstring = "";
        $vstring = "";
        foreach($checkbox1 as $selected){
            $qstring.=$selected.",";
            $vstring.="'1',";
        }

$sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,$qstring addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity',$vstring'$femail','$cexp')";
        //echo $sql;
        if($conn->query($sql) === TRUE)
   {
      echo'<script>alert("Inserted Successfully");</script>';
   }
else
   {
      echo"<script>alert('Failed To Insert');</script>";
   }

            break;

        case 'Open Management':

            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,IT,Comps,EXTC,ETRX,Mech,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','1','1','1','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
            break;
        case 'Exposure':

            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,IT,Comps,EXTC,ETRX,Mech,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','1','1','1','1','$femail','$cexp')";


            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
            break;
        case 'AOAC':

            $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,IT,Comps,EXTC,ETRX,Mech,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','1','1','1','1','$femail','$cexp')";

            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
            break;
        case 'AOCC':

             $sql="INSERT INTO addCourse(coursetype,sem,name,id,capacity,IT,Comps,EXTC,ETRX,Mech,addedby,experience) VALUES ('$coursetype','$sem','$name','$id','$capacity','1','1','1','1','1','$femail','$cexp')";


            if($conn->query($sql) === TRUE)
            {
               echo "<script>alert('Course info added Successfully');</script>";

      }
      else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
            break;
        default:

            break;
    }




}
}

}


//close the connection
mysqli_close($conn);
?>
</html>
