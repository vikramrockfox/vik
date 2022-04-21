<?php
session_start();

	include 'config.php' ;

if (isset($_POST["login"])) {
    
    if (empty($_POST["username"]) && empty($_POST["password"])){
        header("location:admin.php?Empty= Enter Username and Password");
    }

    else
    {
        $username = mysqli_real_escape_string($connection, $_POST["username"]);
        $password = mysqli_real_escape_string($connection, $_POST["password"]);
        $password = md5($password);
        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result)>0) {

            $_SESSION['user'] = $username;
            header("location:datatable");
        }

        else
        {
            header("location:admin.php?Invalid= Incorrect Username and Password");
            
        }

    }

}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin: Apply Qck Loan</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="img/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        .logo-image{margin-left:42%;margin-top:20px;margin-bottom:20px;}
    </style>
</head>
		<body>
		
		<div class="login-page">
			<div class="container">
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-12 text-center logo-image">
						 <a href="index.php" class="navbar-brand"><img src="img/logo.jpg"></a>
					</div>
					<div class="col-lg-4"></div>
				</div>
				<div class="row mt-sm-3">
					<div class="col-lg-4"></div>
					<div class="col-md-4">
						<div class="card login-form" style="text-align:center">
							<div class="center-login" style="border: 2px solid;    margin-left: 34%;margin-right: 34%;padding-top: 40px;padding-bottom: 40px;">
								<div class="card-header">
								<div class="card-title text-center" style="    font-size: 30px;font-weight: bold;padding: 20px;">Admin Login </div>
							</div>
							 <?php if (@$_GET['Empty'] == true) { ?>

            <div class="alert-light text-danger text-center"><?php echo $_GET['Empty'] ; ?> </div>            
              
            <?php } ?>

            <?php if (@$_GET['Invalid'] == true) { ?>

            <div class="alert-light text-danger text-center"><?php echo $_GET['Invalid'] ; ?> </div>            
              
            <?php } ?>

            <?php if (@$_GET['Logout'] == true) { ?>

            <div class="alert-light text-danger text-center"><?php echo $_GET['Logout'] ; ?> </div>            
              
            <?php } ?>

						<div class="card-body">
							<div class="card-body">
							
							<form method="post" name="login" id="login" action="">
								<div class="row">
									<div class="col-md-12 col-lg-12">
										<div class="form-group" style="font-size: 20px;padding: 10px;">
											<label for="email2">User name</label>
											<input type="text" name="username" class="form-control" maxlength="80" placeholder="Enter user name." >
										</div>
										<div class="form-group" style="font-size: 20px;padding: 10px;">
											<label for="password">Password</label>
											<input type="password" class="form-control" name="password"  maxlength="16" placeholder="Password" >
										</div>
									</div>
								</div>
								<input type="submit" name="login" style="padding: 9px;border-radius: 6px;font-size: 20px; margin-top: 30px;background: #000;color: #fff;">
								
							</form>
							
							</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4"></div>
				</div>
			</div>
	    </div>

	    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
		