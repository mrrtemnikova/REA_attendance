<?php

if(isset($_POST['login']))
{
	//start of try block

	try{

		//checking empty fields
		if(empty($_POST['username'])){
			throw new Exception("Username is required!");
			
		}
		if(empty($_POST['password'])){
			throw new Exception("Password is required!");
			
		}
		//establishing connection with db and things
		include ('connect.php');
		
		//checking login info into database
		$row=0;
		$_POST[type] = 'teacher';
		$var = mysqli_connect('localhost','root','120968', 'attsystem');
		$result=mysqli_query($var,"select * from admininfo where username='$_POST[username]' and password='$_POST[password]' and type='$_POST[type]'");

		$row=mysqli_num_rows($result);

		if($row>0 && $_POST["type"] == 'teacher'){
			session_start();
			$_SESSION['name']="oasis";
			header('location: teacher/index.php');
		}

		else{
			throw new Exception("Username or Password is wrong, try again!");
			
			header('location: login.php');
		}
	}

	//end of try block
	catch(Exception $e){
		$error_msg=$e->getMessage();
	}
	//end of try-catch
}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Teacher Log</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	 
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap-theme.min.css" >
	 
	<link rel="stylesheet" href="styles.css" >
	 
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/mystyle.css">
	<link rel="stylesheet" href="css/snackbar.css">
	<link rel="stylesheet" href="css/loginpage.css">

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
	
    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>
	

</head>

<body>

<br>

	<center>


<img src="assets/logo.png" height="150px" width="150px"><br>

<?php
//printing error message
if(isset($error_msg))
{
	echo $error_msg;
}
?>


<div class="row align-items-center justify-content-center">
			<div class="col-md-6 col-md-offset-3">
<div class="panel panel-login" style="padding: 3%">
					<div class="panel-body">
	<div class="row justify-content-center">

		<form method="post" class="form-horizontal col-md-12 col-md-offset-3">
		<h1>Teacher Log</h1>
			<div class="form-group">
			    <label for="input1" class="control-label ">Username:</label>
			    <div class="col-sm-7">
			      <input type="text" name="username"  class="form-control" style = "animation: fadeInCss 1s infinite alternate ;" id="input1" placeholder="Enter" />
			    
				</div>
			</div>

			<div class="form-group">
			    <div class="col-sm-7">
				<label for="input1" class="control-label">Password:</label>
			      <input type="password" name="password"  class="form-control" style = "animation: fadeInCss 1s infinite alternate ;" id="input1" placeholder="Enter" />
			    </div>
			</div >
			<input type="submit" class="btn btn-default btn-lg col-md-3" value="Log in" name="login"/><br>
			<a href="index.php"  class="btn btn-default btn-lg col-md-3" ><span class="network-name">&#8635; Back</span></a>
			</form>
	</div>
</div>
</div>
</div>
</div>

<br><br>
<p><strong>Have forgot your password? <a href="reset.php">Reset here</a></strong> </p>

</center>
</body>
</html>