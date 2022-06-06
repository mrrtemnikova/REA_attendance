<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>

<?php
    include('connect.php');
    try{
      
    if(isset($_POST['att'])&&(is_array($_POST['att']))){

      $course = $_POST['whichcourse'];

      foreach ($_POST['st_status'] as $i => $st_status) {
        
        $stat_id = $_POST['stat_id'][$i];
        $dp = date('Y-m-d');
        $course = $_POST['whichcourse'];
        
		$var = mysqli_connect('localhost','root','120968', 'attsystem');
        $stat = mysqli_query($var,"insert into attendance(stat_id,course,st_status,stat_date) values('$stat_id','$course','$st_status','$dp')");
        
        $att_msg = "Attendance Recorded.";

      }



    }
  }
  catch(Execption $e){
    $error_msg = $e->$getMessage();
  }
 ?>

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
    <h3>Attendance of <?php echo date('Y-m-d'); ?></h3>
    <center><p><?php if(isset($att_msg)) echo $att_msg; if(isset($error_msg)) echo $error_msg; ?></p></center> 
    
    <form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">

     <div class="form-group">

               <!-- <label>Select Batch</label>
                
                <select name="whichbatch" id="input1">
                      <option name="eight" value="38">38</option>
                      <option name="seven" value="37">37</option>
                </select>-->


                <label>Enter Batch</label>
                <input type="text" name="whichbatch" id="input2" placeholder="15.11">
              </div>
     
     <input type="submit" class="btn btn-primary col-md-2 col-md-offset-5" value="Search" name="batch" />

    </form>

    <div class="content"></div>
    <form action="" method="post">

      <div class="form-group">

        <label >Select Subject</label>
              <select name="whichcourse" id="input1">
              <option  value="swe">Analysis of Algorithms</option>
         <option  value="algolab">Analysis of Algorithms Lab</option>
        <option  value="dbms">Database Management System</option>
        <option  value="dbmslab">Database Management System Lab</option>
        <option  value="weblab">Web Programming Lab</option>
        <option  value="os">Operating System</option>
        <option  value="oslab">Operating System Lab</option>
        <option  value="obm">Object Based Modeling</option>
        <option  value="softcomp">Soft Computing</option>
              </select>

      </div>

    <table class="table table-stripped">
      <thead>
        <tr>
          <th scope="col">Reg. No.</th>
          <th scope="col">Name</th>
          <th scope="col">Department</th>
          <th scope="col">Batch</th>
          <th scope="col">Semester</th>
          <th scope="col">Email</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
   <?php

    if(isset($_POST['batch'])){

     $i=0;
     $radio = 0;
     $batch = 38;
	 $var = mysqli_connect('localhost','root','120968', 'attsystem');
     $all_query = mysqli_query($var,"select * from students where st_batch='$batch' order by st_id asc");

     while ($data = mysqli_fetch_array($all_query)) {
       $i++;
     ?>
  <body>
     <tr>
       <td><?php echo $data['st_id']; ?> <input type="hidden" name="stat_id[]" value="<?php echo $data['st_id']; ?>"> </td>
       <td><?php echo $data['st_name']; ?></td>
       <td><?php echo $data['st_dept']; ?></td>
       <td><?php echo $data['st_batch']; ?></td>
       <td><?php echo $data['st_sem']; ?></td>
       <td><?php echo $data['st_email']; ?></td>
       <td>
         <label>Present</label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Present" >
         <label>Absent </label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Absent" checked>
       </td>
     </tr>
  </body>

     <?php

        $radio++;
      } 
}
      ?>
    </table>

    <center><br>
    <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Save!" name="att" />
  </center>

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
