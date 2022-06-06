<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{

  header('location: ../index.php');
}
?>


<?php

//establishing connection
include('connect.php');

  try{

    //validation of empty fields
      if(isset($_POST['signup'])){

        if(empty($_POST['email'])){
          throw new Exception("Email cann't be empty.");
        }

          if(empty($_POST['uname'])){
             throw new Exception("Username cann't be empty.");
          }

            if(empty($_POST['pass'])){
               throw new Exception("Password cann't be empty.");
            }
              
              if(empty($_POST['fname'])){
                 throw new Exception("Username cann't be empty.");
              }
                if(empty($_POST['phone'])){
                   throw new Exception("Username cann't be empty.");
                }
                  if(empty($_POST['type'])){
                     throw new Exception("Username cann't be empty.");
                  }

        //insertion of data to database table admininfo
		$var = mysqli_connect('localhost','root','120968', 'attsystem');
        $result = mysqli_query($var,"insert into admininfo(username,password,email,fname,phone,type) values('$_POST[uname]','$_POST[pass]','$_POST[email]','$_POST[fname]','$_POST[phone]','$_POST[type]')");
        $success_msg="Signup Successfully!";

  
  }
}
  catch(Exception $e){
    $error_msg =$e->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="en">

<!-- head started -->
<head>

	<title>Админ</title>
	
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
<!-- head ended -->

<!-- body started -->
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
<br>
<h1>Создать пользователя</h1>
<p>    <?php
    if(isset($success_msg)) echo $success_msg;
    if(isset($error_msg)) echo $error_msg;
     ?>
       
     </p>
<div class="content">

  <div class="row align-items-center justify-content-center">
   
    <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
	<h4>Добавить нового пользователя</h4>
      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Личная почта</label>
          <div class="col-sm-7">
            <input type="text" name="email"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Логин</label>
          <div class="col-sm-7">
            <input type="text" name="uname"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Пароль</label>
          <div class="col-sm-7">
            <input type="password" name="pass"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Полное имя</label>
          <div class="col-sm-7">
            <input type="text" name="fname"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Телефонный номер</label>
          <div class="col-sm-7">
            <input type="text" name="phone"  class="form-control" id="input1" placeholder="Enter" />
          </div>
      </div>


      <div class="form-group" class="radio">
      <div class="col-sm-7">
        <label>
          <input type="radio" name="type" id="optionsRadios1" value="student" checked> Студент
        </label>
            <label>
          <input type="radio" name="type" id="optionsRadios1" value="teacher"> Преподаватель
        </label>
        <label>
          <input type="radio" name="type" id="optionsRadios1" value="admin"> Админ
        </label>
      </div>
      </div>

      <input type="submit" class="btn btn-default btn-lg col-md-3" value="Создать" name="signup" />
    </form>
  </div>
    <br>

</div>

</center>

</body>
<!-- Body ended  -->

</html>
