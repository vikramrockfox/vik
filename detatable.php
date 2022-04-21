<?php
    session_start();
    include 'config.php' ;

   if (isset($_SESSION['user'])) {
  
}
else{
  header("location:admin.php?Invalid= Incorrect Username and Password");
}

if (isset($_POST['logout'])) {
 // session_start();
 // session_unset();
 session_destroy();
  header("Location:admin");
}


?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply Qck Loan</title>
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
        .logo_data{display:inline-flex;margin-left: 26%;}
       .logo_data form{margin-left:65px;}
        .date-info{    margin-left: -80%; margin-top: 30px; margin-bottom: 30px;
}
.date-info input{margin-left:20px;}
.date-info input{margin-right:20px;}
.logo_data form input{background: #0d3a71;color: #fff;font-size: 14px;font-weight: bold;padding: 10px;border-radius: 10px;}
.date-info form{font-size:18px; font-weight:bold;border: 1px solid #000;
    padding: 10px 20px;background: #36b7de;}
        .logo-image{margin-left:42%;margin-top:20px;margin-bottom:20px;}


    </style>
</head>

<body>
<div class="table_data"> 
<div class="container">
    <div class="row table-responsive">
        <div class="col-sm-12 col-md-12">
             <div class="fix_head">
                 	 <a href="index.php" class="navbar-brand"><img src="img/logo.jpg"></a>
                  <div class="logo_data">
				
             
	<!--<form action="" method="post" class="log_btn">
    <input type="submit" name="logout" value="LOGOUT">
    </form>-->
    <form action="export.php" method="post" class="export_btn">
      <input type="submit" name="today" value="Today" />	
    </form>
    <form action="export.php" method="post" class="export_btn">
      <input type="submit" name="last_3_days" value="Last 3 Days" />	
    </form>
    <form action="export.php" method="post" class="export_btn"> 
		<input type="hidden" name="offset" value="<?php echo $offset?>" />
		<input type="hidden" name="limit" value="<?php echo $limit?>" />
        <input type="submit" name="export" value="Export All" />
    </form>
    <form action="" method="post">
       <input type="submit" name="logout" value="LOGOUT" class="logout-cls">
    </form>
	
	<?php
      #GET TOTAL RECORDS
	  $totalSql     = "SELECT count(*) as totals FROM formdetail ORDER BY id DESC";
	  $totalResult  = mysqli_query($connection, $totalSql);
	  $totalRecords = mysqli_fetch_assoc($totalResult)['totals'];
	  $limit        = 200;
	  $pages        = ceil($totalRecords / $limit);
	  if (isset($_GET['page'])){
	  	$page = $_GET['page'];
	  } else {
	  	$page = 1;
	  }
	  $offset = ($page - 1)  * $limit;
	  $start  = $offset + 1;
	  $end    = min(($offset + $limit), $totalRecords);
	?>
    
	

	
	
	<div class="date-info">
	    <br><br>
	<form action="export.php" method="post" class="export_btn">
	  From Date: <input type="date" name="from_date" required>
	  To Date: <input type="date" name="to_date" required>
      <input type="submit" name="date_between" value="Download" />	
    </form>
</div>
 </div>
    </div>
 <table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
        <th>S No.</th>
        <th>ID</th>
        <th>Name</th>
        <!--<th>Email</th>-->
        <th>Number</th>
        <!--<th>City</th>
        <th>Service</th>-->
        <th>Date</th>
        <!--<th>Amount</th>-->
    </tr>
    </thead>
  <tbody>
    <?php
      //$query = "SELECT * FROM user ORDER BY id DESC";
      $query = "SELECT * FROM formdetail ORDER BY id DESC limit $offset,$limit";
      $result = mysqli_query($connection, $query);
      $ctr = 0;

      while ($row = mysqli_fetch_assoc($result)) {
        $ctr++;      
      ?>
    
        <tr>
            <td><?php echo  $ctr; ?></td>
            <td><?php echo  $row['id'] ?></td>
            <td><?php echo  $row['name'] ?></td>
            <!--<td><?php  echo $row['email'] ?></td>-->
            <td><?php  echo $row['mobile'] ?></td>
            <!--<td><?php  echo $row['city'] ?></td>
            <td><?php  echo $row['service'] ?></td>-->
            <td><?php  echo date("d-M-Y", strtotime($row['date'])) ?></td>
           <!-- <td><?php  echo $row['amount'] ?></td>-->
        </tr>
        <?php  }  ?>
      </tbody>
    </table>
    <nav>     
    <ul class="pagination table_pagination">
	    <li><a href="?page=1" data-ci-pagination-page="2" rel="next">First</a></li>
		<?php
			if ($pages <= 10){   
				for ($counter = 1; $counter <= $pages; $counter++){
			        if ($counter == $page) {
			            echo "<li class='active'><a>$counter</a></li>"; 
					}else{
					    echo "<li><a href='?page=$counter'>$counter</a></li>";
					}
				}
			}elseif($pages > 10){
				
				if($page <= 4) {
				    for ($counter = 1; $counter < 8; $counter++){ 
						if ($counter == $page) {
							echo "<li class='active'><a>$counter</a></li>"; 
						}else{
							echo "<li><a href='?page=$counter'>$counter</a></li>";
						}
					}
					echo "<li><a>...</a></li>";
					echo "<li><a href='?page=$offset'>$offset</a></li>";
					echo "<li><a href='?page=$pages'>$pages</a></li>";
					
				}elseif($page > 4 && $page < $pages - 4) { 
			   
					echo "<li><a href='?page=1'>1</a></li>";
					echo "<li><a href='?page=2'>2</a></li>";
					echo "<li><a>...</a></li>";
					for (
						 $counter = $page - 1;
						 $counter <= $page + 1;
						 $counter++
						 ) { 
						 if ($counter == $page) {
					 echo "<li class='active'><a>$counter</a></li>"; 
					 }else{
							echo "<li><a href='?page=$counter'>$counter</a></li>";
							  }                  
						   }
					echo "<li><a>...</a></li>";
					echo "<li><a href='?page=$offset'>$offset</a></li>";
					echo "<li><a href='?page=$pages'>$pages</a></li>";
					
				}else {
					
					echo "<li><a href='?page=1'>1</a></li>";
					echo "<li><a href='?page=2'>2</a></li>";
					echo "<li><a>...</a></li>";
					for (
						 $counter = $pages - 6;
						 $counter <= $pages;
						 $counter++
						 ) {
						 if ($counter == $page) {
						echo "<li class='active'><a>$counter</a></li>";	
						}else{
							echo "<li><a href='?page=$counter'>$counter</a></li>";
						}                   
					}
				}
			}
	   ?>
        <li><a href="?page=<?php echo $pages;?>" data-ci-pagination-page="2" rel="next">Last</a></li>
		<li><br/><br/> <?php echo '<div id="paging"><p>',' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $totalRecords, ' results ', ' </p></div>'; ?></li>
    </ul>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<ul class="pagination table_pagination">
		<li><a href="?page=1">First</a></li>
		 <li class="<?php if($page <= 1){ echo 'disabled'; } ?>"> 
			<a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
		</li>
		<li class="<?php if($page >= $pages){ echo 'disabled'; } ?>">
			<a href="<?php if($page >= $pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
		</li>
		<li><a href="?page=<?php echo $pages; ?>">Last</a></li>
		<li><br/><br/> <?php echo '<div id="paging"><p>',' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $totalRecords, ' results ', ' </p></div>'; ?></li>
	</ul> -->

</nav>
<button class="scroll-top tran3s" style="display: none;">
<i class="fa fa-angle-up" aria-hidden="true"></i>
</button>
</div>
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