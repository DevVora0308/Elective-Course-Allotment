<html>
<head>
<title>Admin Homepage</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="somaiya_symbol.PNG">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style1.css" rel="stylesheet">
<link href="color/default.css" rel="stylesheet">

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
.blue{
  background-color: #ccf5ff;
}
.row img{

  height: 90px;
  width:90px;
}
</style>
</head>
<body>
  <div class="navbar-wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <!-- Responsive navbar -->
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </a>
          <h1 class="brand" align="center"><a href="index.html"><img src="somaiya_symbol.PNG" height="50" width="50">  K J Somaiya College of Engineering</a></h1>

        </div>
      </div>
    </div>
  </div>
 <!-- <nav class="navbar navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin1.php">Admin</a>
    </div>
    <ul class="nav navbar-nav" >
      <li><a class="nav-item" href="addcourse.php">Add Courses</a></li>
      <li><a class="nav-item" href="viewcourse.php">View Courses</a></li>
      <li><a class="nav-item" href="formdetail.php">Form Details</a></li>
      <li><a  class="nav-item" href="allocate.php">Allocate</a></li>
	<li><a  class="nav-item" href="avail.php">Form Availability</a></li>
      <li style="float:right;"><a  class="nav-item" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav> -->

<section id="login" class="section blue">
<div style="text-align:right;"><a class="btn" href="#"><i class="fa fa-sign-out">Welcome  <?php echo $_COOKIE["name"]. "<br />";?></i></a></div>
<br>
  <div style="text-align:right;"><a class="btn" href="logout.php"><i class="fa fa-sign-out">Sign Out</i></a></div>
<br>
  <div class="container">
    <!-- Four columns -->
    <div class="row ">
      <div class="span2 animated-fast flyIn">
        <a href="addcourse.php"><div class="service-box">
          <img src="addcourse.png" alt="" />
          
          <h2>Add Courses</h2>
          <p>To manage and add new courses</p>
        
        </div>
        </a>
      </div>
      <div class="span2 animated-fast flyIn">
        <a href="viewcourse.php"><div class="service-box">
          <img src="viewcourse.png" alt="" />
         
          <h2>View Courses</h2>
          <p>To view all available courses</p>
        
        </div>
        </a>
      </div>
      <div class="span2 animated-fast flyIn">
        <a href="formdetail.php"><div class="service-box">
          <img src="formdetail.png" alt="" />
          
          <h2>Form Details</h2>
          <p>Get the details of forms filled by students</p>
        
        </div>
        </a>
      </div>
      <div class="span2 animated-fast flyIn">
        <a href="allocate.php"><div class="service-box">
          <img src="allocate.png" alt="" />
          
          <h2>Allocate</h2>
          <p>To manage and allocate courses to students</p>
        
        </div>
        </a>
      </div>
      <div class="span2 animated-fast flyIn">
        <a href="avail.php"><div class="service-box">
          <img src="avail.png" alt="" />
          
          <h2>Form Availability</h2>
          <p>To manage availability of forms to students</p>
       
        </div>
        </a>
      </div>
    </div>
  </div>
</section>
<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
<script src="js/jquery.js"></script>
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/jquery.localScroll.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/inview.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script src="contactform/contactform.js"></script>

</body>


</html>
