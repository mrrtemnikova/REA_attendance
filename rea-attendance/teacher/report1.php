<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>
<?php include('connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


    <title>REA PLekhanov - Attendance Log</title>

  
	<style>
	@media only screen and (max-width: 768px) {
		#navbar-logo{
			display: none !important;
		}
		
		#navbar-logo-mob{
			display: block !important;
		}
	}
	@media only screen and (min-width: 769px) {
		#navbar-logo-mob{
			display: none !important;
		}
	}
	</style>

</head>
<body>

<header>
   <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top " id="mainNav">
      <div class="container ">
        <a class="navbar-brand js-scroll-trigger text-light" href="index.php">
		<img src="../assets/logo.png" alt="Logo" style="width:2em; margin: 0% 10%;">Home</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		<li class="nav-item">
              <a class="nav-link js-scroll-trigger text-light" href="students.php">Students</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger text-light" href="teachers.php">Faculties</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger text-light" href="attendance.php">Attendance</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger text-light" href="report.php">Report</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger text-light" href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</header>

<center>

<br><br><br><br>
<div class="row">
  <div class="content">
    <h3>Individual Report</h3>

    <form method="post" action="">

    <label>Select Subject</label>
    <select name="whichcourse">
    <option  value="algo">Analysis of Algorithms</option>
         <option  value="algolab">Analysis of Algorithms Lab</option>
        <option  value="dbms">Database Management System</option>
        <option  value="dbmslab">Database Management System Lab</option>
        <option  value="weblab">Web Programming Lab</option>
        <option  value="os">Operating System</option>
        <option  value="oslab">Operating System Lab</option>
        <option  value="obm">Object Based Modeling</option>
        <option  value="softcomp">Soft Computing</option>
    </select>

      <p>  </p>
      <label>Student Reg. No.</label>
      <input type="text" name="sr_id">
      <input type="submit" name="sr_btn" value="Go!" >

    </form>
<br>
    <h3>Mass Report</h3>

    <form method="post" action="">

    <label>Select Subject</label>
    <select name="course">
    <option  value="algo">Analysis of Algorithms</option>
         <option  value="algolab">Analysis of Algorithms Lab</option>
        <option  value="dbms">Database Management System</option>
        <option  value="dbmslab">Database Management System Lab</option>
        <option  value="weblab">Web Programming Lab</option>
        <option  value="os">Operating System</option>
        <option  value="oslab">Operating System Lab</option>
        <option  value="obm">Object Based Modeling</option>
        <option  value="softcomp">Soft Computing</option>
    </select>
    <p>  </p>
      <label>Date (YYYY-MM-DD)</label>
      <input type="text" name="date">
      <input type="submit" name="sr_date" value="Start" >
    </form>

    <br>

    <br>

   <?php
$var = mysqli_connect('localhost','root','120968', 'attsystem');
    if(isset($_POST['sr_btn'])){

     $sr_id = $_POST['sr_id'];
     $course = $_POST['whichcourse'];

     $single = mysqli_query($var,"select stat_id,count(*) as countP from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course' and attendance.st_status='Present'");
     $singleT= mysqli_query($var,"select count(*) as countT from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course'");
    //  $count_tot = mysql_num_rows($singleT);
  } 

    if(isset($_POST['sr_date'])){

     $sdate = $_POST['date'];
     $course = $_POST['course'];

     $all_query = mysqli_query($var,"select * from attendance where stat_date='$sdate' and course = '$course'");

    }
    if(isset($_POST['sr_date'])){
      ?>

    <table class="table table-stripped">
      <thead>
        <tr>
          <th scope="col">Reg. No.</th>
          <th scope="col">Name</th>
          <th scope="col">Department</th>
          <th scope="col">Batch</th>
          <th scope="col">Date</th>
          <th scope="col">Attendance Status</th>
        </tr>
     </thead>


    <?php

     $i=0;
     while ($data = mysqli_fetch_array($all_query)) {
       $i++;

     ?>
        <tbody>
           <tr>
             <td><?php echo $data['st_id']; ?></td>
             <td><?php echo $data['st_name']; ?></td>
             <td><?php echo $data['st_dept']; ?></td>
             <td><?php echo $data['st_batch']; ?></td>
             <td><?php echo $data['stat_date']; ?></td>
             <td><?php echo $data['st_status']; ?></td>
           </tr>
        </tbody>

     <?php 
   } 
  }
     ?>
     
    </table>


    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
    <table class="table table-striped">

    <?php


    if(isset($_POST['sr_btn'])){

       $count_pre = 0;
       $i= 0;
       $count_tot;
       if ($row=mysqli_fetch_row($singleT))
       {
       $count_tot=$row[0];
       }
       while ($data = mysqli_fetch_array($single)) {
       $i++;
       
       if($i <= 1){
     ?>


     <tbody>
      <tr>
          <td>Student Reg. No: </td>
          <td><?php echo $data['stat_id']; ?></td>
      </tr>

           <?php
         //}
        
        // }

      ?>
      
      <tr>
        <td>Total Class (Days): </td>
        <td><?php echo $count_tot; ?> </td>
      </tr>

      <tr>
        <td>Present (Days): </td>
        <td><?php echo $data[1]; ?> </td>
      </tr>

      <tr>
        <td>Absent (Days): </td>
        <td><?php echo $count_tot -  $data[1]; ?> </td>
      </tr>

    </tbody>

   <?php

     }  
    }}
     ?>
    </table>
  </form>

  </div>

</div>

</center>
 	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.7/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic|Cabin:700" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- Plugin JavaScript -->
    <script src="../js/jquery.easing.min.js"></script>
	
    <!-- Custom scripts for this template -->
    <script src="../js/grayscale.min.js"></script>
	
	<script>
	
		
		$(window).scroll(function() {
		 var scroll = $(window).scrollTop();
		  if (scroll > 300) {
			 $("#navbar-logo").fadeIn("slow");
			 $("#mySelector").animate({ height: 0, opacity: 0 }, 'slow');
		  } else {
			 $("#navbar-logo").fadeOut("slow");
		  }
		});
	</script>
</body>
</html>
