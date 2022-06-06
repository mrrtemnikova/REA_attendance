<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">
		<img src="../assets/logo.png" alt="Logo" style="width:2em; margin: 0% 5%;">Home</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="students.php">Список студентов</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="report.php">Посещение</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="account.php">Редактиировать профиль</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../logout.php">Выйти</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
			  <div class="brand-heading">
				<div class="row">
					<div class="col-md-6">
						<img style="height: auto;width: 60%;" src="../assets/studentic.png">
					</div>
					<div class="col-md-6">
						<h1 style="font-size:0.8em; position: relative; top: 40%; transform: translateY(-50%);">Добро пожаловать!</h1>
					</div>
				</div>
			  </div>
              <p class="intro-text" style="font-size: 2em;">Будьте усердны, но не забывайте отдыхать!</p>
            </div>
          </div>
        </div>
      </div>
    </header>
	

    <!-- Footer -->
    <footer>
      <div class="container text-center">
         <p>Свяжитесь с нами: </p> 
      </div>
    </footer>

 	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic|Cabin:700" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../css/homepage.css" rel="stylesheet">

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
