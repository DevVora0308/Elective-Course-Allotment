
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

	s=document.getElementsByName("sem");
	if (s[0].checked == false && s[1].checked == false && s[2].checked == false && s[3].checked == false && s[4].checked == false)
		{
		alert ('Please choose a semester !');
		return false;
		}
	else {
		return true;
		}

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
      <li><a class="nav-item" href="addcourse.php">Add Courses</a></li>
      <li><a class="nav-item" href="viewcourse.php">View Courses</a></li>
      <li><a class="nav-item" href="formdetail.php">Form Details</a></li>
      <li><a  class="nav-item" href="allocate.php">Allocate</a></li>
      <li><a  class="nav-item" href="avail.php">Form Availability</a></li>
         <li><a class="nav-item" href="#">Welcome  <?php echo $_COOKIE["name"]. "<br />";?></a></li>
        <li><a  class="nav-item" href="logout.php" style='float:right'>Logout</a></li>
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
<?php }else{?>
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
  <td class="tab">Form Availability:</td>
  <td class="tab">
<input type="radio" name="avail" value="enable" checked> Enable&nbsp&nbsp
<input type="radio" name="avail" value="disable"> Disable
</td>
  </tr>
</table>
<center><button type="submit" name="avail" value="available" class="btn btn-primary">Submit</button></center>
</div>
<br><br><br>
</form>
</body>
</html>
