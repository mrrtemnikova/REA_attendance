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
<div class="row">

  <div class="content">
    <h3>Индивидуальный отчет</h3>

    <form method="post" action="">

    <label>Выберете дисциплину</label>
    <select name="whichcourse">
    <option  value="algo">Анализ алгоритмов</option>
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
      <label>Идентификационный номер</label>
      <input type="text" name="sr_id">
      <input type="submit" name="sr_btn" value="Go!" >

    </form>
	<br>
    <h3>Массовый отчет</h3>

    <form method="post" action="">

    <label>Выберете дисциплину</label>
    <select name="whichcourse">
    <option  value="algo">Анализ алгоритмов</option>
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
      <label>Дата (YYYY-MM-DD)</label>
      <input type="text" name="date">
      <input type="submit" name="sr_date" value="Go!" >
    </form>

    <br>

    <br>

   <?php

    if(isset($_POST['sr_btn'])){

     $sr_id = $_POST['sr_id'];
     $course = $_POST['whichcourse'];

     $single = mysqli_query("select * from reports where reports.st_id='$sr_id' and reports.course = '$course'");

     $count_tot = mysqli_num_rows($single);
  } 

    if(isset($_POST['sr_date'])){

     $sdate = $_POST['date'];
     $course = $_POST['whichcourse'];
	 $var = mysqli_connect('localhost','root','120968', 'attsystem');
     $all_query = mysqli_query($var,"select * from reports where reports.stat_date='$sdate' and reports.course = '$course'");

    }
    if(isset($_POST['sr_date'])){

      ?>

    <table class="table table-stripped">
      <thead>
        <tr>
          <th scope="col">Идентификационный номер</th>
          <th scope="col">ФИО</th>
          <th scope="col">Факультет</th>
          <th scope="col">Группа</th>
          <th scope="col">Дата</th>
          <th scope="col">Посещение</th>
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
       while ($data = mysqli_fetch_array($single)) {
       $i++;
       if($data['st_status'] == "Present"){
          $count_pre++;
       }
       if($i <= 1){
     ?>


     <tbody>
      <tr>
          <td>Идентификационный номер: </td>
          <td><?php echo $data['st_id']; ?></td>
      </tr>

      <tr>
          <td>ФИО: </td>
          <td><?php echo $data['st_name']; ?></td>
      </tr>
      
      <tr>
          <td>Факультет: </td>
          <td><?php echo $data['st_dept']; ?></td>
      </tr>
      
      <tr>
          <td>Группа: </td>
          <td><?php echo $data['st_batch']; ?></td>
      </tr> 

           <?php
         }
        
        }

      ?>
      
      <tr>
        <td>Всего учился (дней): </td>
        <td><?php echo $count_tot; ?> </td>
      </tr>

      <tr>
        <td>Присутствовал (дней): </td>
        <td><?php echo $count_pre; ?> </td>
      </tr>

      <tr>
        <td>Отсутствовал (дней): </td>
        <td><?php echo $count_tot -  $count_pre; ?> </td>
      </tr>

    </tbody>

   <?php

     }  
   
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
