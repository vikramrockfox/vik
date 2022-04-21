<?php

session_start();
    include 'config.php' ;
if( isset($_POST['export'])){
	
	  
	  $offset = $_POST['offset'];
	  $limit  = $_POST['limit'];
	  
	  header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=bharatcreditzone.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Name', 'Email', 'number', 'City','Service','Date','Amount'));  
      $query = "SELECT name,email,mobile,city,service,date,amount FROM formdetail ORDER BY id DESC";  
      //$query = "SELECT name,email,mobile,city,service,date,amount FROM formdetail ORDER BY id DESC limit $offset,$limit";  
      $result = mysqli_query($connection, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output); 
}
#TODAY DATA EXPORT
if( isset($_POST['today'])){

	  header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=jlgdata.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Name', 'Email', 'number', 'City','Service','Date','Amount'));  
      $query = "SELECT name,email,mobile,city,service,date,amount FROM formdetail WHERE DATE_SUB(CURDATE(),INTERVAL 1 DAY) <= date ORDER BY id DESC";  
      $result = mysqli_query($connection, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);
}
// if( isset($_POST['today'])){

// 	  header('Content-Type: text/csv; charset=utf-8');  
//       header('Content-Disposition: attachment; filename=jlgdata.csv');  
//       $output = fopen("php://output", "w");  
//       fputcsv($output, array('Name', 'Email', 'number', 'City','Service','Date','Amount'));  
//       $query = "SELECT name,email,mobile,city,service,date,amount FROM formdetail WHERE DATE_SUB(INTERVAL 1 DAY) <= date ORDER BY id DESC";  
//       $result = mysqli_query($connection, $query);  
//       while($row = mysqli_fetch_assoc($result))  
//       {  
//           fputcsv($output, $row);  
//       }  
//       fclose($output);
// }
#LAST 3 DAYS DATA EXPORT
if( isset($_POST['last_3_days'])){
	
	  header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=jlgdata.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Name', 'Email', 'number', 'City','Service','Date','Amount'));   
      $query = "SELECT name,email,mobile,city,service,date,amount FROM formdetail WHERE DATE_SUB(CURDATE(),INTERVAL 3 DAY) <= date ORDER BY id DESC";  
      $result = mysqli_query($connection, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);
}
#EXPORT DATA BETWEEN TWO DATE
if( isset($_POST['date_between'])){
	
	  header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=jlgdata.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Name', 'Email', 'number', 'City','Service','Date','Amount'));   
      
	  $fromDate = $_POST['from_date'];
	  $toDate   = $_POST['to_date'];
	  
	  $query = "SELECT name,email,mobile,city,service,date,amount FROM formdetail WHERE date>='$fromDate' AND date<='$toDate' ORDER BY id DESC";  
      $result = mysqli_query($connection, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);
}
?>