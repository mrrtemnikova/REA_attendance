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


    <title>REA PLekhanov - Журнал посещений</title>

  
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
              <a class="nav-link js-scroll-trigger text-light" href="students.php">Список студентов</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger text-light" href="teachers.php">Факультеты</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger text-light" href="attendance.php">Посещение</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger text-light" href="report.php">Отчет</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger text-light" href="../logout.php">Выйти</a>
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
    <h3>Преподавательский состав</h3>  
    <table class="table table-striped table-hover">
        <thead>  
          <tr>
            <th>ID Преподавателя</th>
            <th>ФИО</th>
            <th>Кафедра</th>
            <th>Личная почта</th>
            <th>Дисциплина</th>
          </tr>
        </thead>

      <?php

        $i=0;
		$var = mysqli_connect('localhost','root','120968', 'attsystem');
        $tcr_query = mysqli_query($var,"select * from teachers order by tc_id asc");
        while($tcr_data = mysqli_fetch_array($tcr_query)){
          $i++;

        ?>
          <tbody>
              <tr>
                <td><?php echo $tcr_data['tc_id']; ?></td>
                <td><?php echo $tcr_data['tc_name']; ?></td>
                <td><?php echo $tcr_data['tc_dept']; ?></td>
                <td><?php echo $tcr_data['tc_email']; ?></td>
                <td><?php echo $tcr_data['tc_course']; ?></td>
              </tr>
          </tbody>

          <?php } ?>
          
    </table>

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
