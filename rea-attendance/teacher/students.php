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
              <a class="nav-link js-scroll-trigger text-light" href="teachers.php">Преподаватели</a>
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
<div class="row justify-content-center">
  <div class="content">
    <h3>Список студентов</h3>
   <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
      <div class="form-group">
            <div class="col-sm-7">
                <input type="text" name="sr_batch"  class="form-control" id="input1" placeholder="15.11D" />  
            </div>
      </div>
      <input type="submit" class="btn btn-primary col-md-3 col-md-offset-7" value="Показать" name="sr_btn" /> 
   </form>
    <br>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Идентификационный номер</th>
          <th>ФИО</th>
          <th>Факультет</th>
          <th>Группа</th>
          <th>Семестр</th>
          <th>Личная почта</th>
        </tr>
      </thead>
   <?php

    if(isset($_POST['sr_btn'])){
     
     $srbatch = $_POST['sr_batch'];
     $i=0;
     $var = mysqli_connect('localhost','root','120968', 'attsystem');
     $all_query = mysqli_query($var,"select * from students where students.st_batch = '$srbatch' order by st_id asc ");
     
     while ($data = mysqli_fetch_array($all_query)) {
       $i++;
     
     ?>
  <tbody>
     <tr>
       <td><?php echo $data['st_id']; ?></td>
       <td><?php echo $data['st_name']; ?></td>
       <td><?php echo $data['st_dept']; ?></td>
       <td><?php echo $data['st_batch']; ?></td>
       <td><?php echo $data['st_sem']; ?></td>
       <td><?php echo $data['st_email']; ?></td>
     </tr>
  </tbody>

     <?php 
          } 
              }
      ?>
      
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
