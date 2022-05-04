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

input[type=file],[type=button]
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
      <a href="addcourse1.php">Upload excel</a>
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
<form method="post" enctype="multipart/form-data">
<div class="block">
<center>
<br><br>
   <label>Choose CSV File</label><br>
    <input type='file' name='file'><br><br>
    <input type="button" name="submit" value="import">
        <br/>
</div>
<br>
</form>
</body>
</center>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
   if (isset($_POST["submit"])) {
       
       if($_FILES['file']['name'])
       {
           $fileName = explode(".",$_FILES['file'] ['name']); 
           if ($fileName[1]=='csv')  
           {                                
           $handle=fopen($_FILES['file']['tmp_name'],"r");
            while($column=fgetcsv($handle))
            {
               $sqlInsert = "INSERT into addcourse (coursetype,sem,id,name,capacity,IT,Comps,EXTC,ETRX,Mech,c)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "','" . $column[10] . "')";
            $result = mysqli_query($conn, $sqlInsert);  
                
            }
               fclose($handle);
               print "done";
           
           }
       }
     
     
}
    }

//close the connection
mysqli_close($conn);
?>
</html>
