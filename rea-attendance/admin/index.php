<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{

  header('location: ../index.php');
}
?>

<?php

include('connect.php');

//data insertion
  try{

    //checking if the data comes from students form
    if(isset($_POST['std'])){

      //students data insertion to database table "students"
	    $var = mysqli_connect('localhost','root','120968', 'attsystem');
        $result = mysqli_query($var,"insert into students(st_id,st_name,st_dept,st_batch,st_sem,st_email) values('$_POST[st_id]','$_POST[st_name]','$_POST[st_dept]','$_POST[st_batch]','$_POST[st_sem]','$_POST[st_email]')");
        $success_msg = "Student added successfully.";

    }

        //checking if the data comes from teachers form
        if(isset($_POST['tcr'])){

          //teachers data insertion to the database table "teachers"
		  $var = mysqli_connect('localhost','root','120968', 'attsystem');
          $res = mysqli_query($var,"insert into teachers(tc_id,tc_name,tc_dept,tc_email,tc_course) values('$_POST[tc_id]','$_POST[tc_name]','$_POST[tc_dept]','$_POST[tc_email]','$_POST[tc_course]')");
          $success_msg = "Teacher added successfully.";
    }

  }
  catch(Execption $e){
    $error_msg =$e->getMessage();
  }

 ?>



<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>
	
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
              <a class="nav-link js-scroll-trigger text-light" href="signup.php">Создать пользователя</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger text-light" href="index.php">Обновить данные</a>
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
<!-- Error or Success Message printint started -->
<div class="message">
        <?php if(isset($success_msg)) echo $success_msg; if(isset($error_msg)) echo $error_msg; ?>
</div>
<!-- Error or Success Message printint ended -->

<!-- Content, Tables, Forms, Texts, Images started -->
<div class="content">

  <center>
  <br>
<br>
<br>
  <h3>Выберите:</h3>
  </center>

     <div class="col-md-8" >
<div class="row align-item-center justify-content-center">
			<div class="col-md-6 col-md-offset-3">
	<div class="row justify-content-center">
		<form method="post" class="form-horizontal col-md-12 col-md-offset-3">
		<h4>Обновить информацию студента</h4>
			<label for="input1" class="col-sm-3 control-label">Идентификационный номер</label>
          <div class="col-sm-7">
            <input type="text" name="st_id"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">ФИО</label>
          <div class="col-sm-7">
            <input type="text" name="st_name"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Факультет</label>
          <div class="col-sm-7">
            <input type="text" name="st_dept"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Группа</label>
          <div class="col-sm-7">
            <input type="text" name="st_batch"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Семестр</label>
          <div class="col-sm-7">
            <input type="text" name="st_sem"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Личная почта</label>
          <div class="col-sm-7">
            <input type="email" name="st_email"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>
 <input type="submit" class="btn btn-default btn-lg col-md-3" value="Обновить" name="std" /></form>

</div>
       <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
        <h4>Обновить информацию преподавателя</h4>
      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">ID Преподавателя</label>
          <div class="col-sm-7">
            <input type="text" name="tc_id"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">ФИО</label>
          <div class="col-sm-7">
            <input type="text" name="tc_name"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Кафедра</label>
          <div class="col-sm-7">
            <input type="text" name="tc_dept"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Личная почта</label>
          <div class="col-sm-7">
            <input type="email" name="tc_email"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Дисциплина</label>
          <div class="col-sm-7">
            <input type="text" name="tc_course"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <input type="submit" class="btn btn-default btn-lg col-md-3" value="Обновить" name="tcr" />
    </form>
</div>
</div>
</div><br>
<!-- Contents, Tables, Forms, Images ended -->

</center>
</body>
<!-- Body ended  -->
</html>
