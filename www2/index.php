<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">

<html>
  <head>
    <title> Job Listings Noticeboard  </title>
    <link rel="stylesheet" type="text/css" href="style.css">;
  </head>

  <body>
    <div class="header"> 
      <div class= "title"> Current Job Listings </div>
      <div class ="sub-title"> This shows all the jobs currently available</div> 
    </div> 

    <table border="1">
      <tr>
        <th> Name: </th>
        <th> Location: </th>
        <th> Date posted: </th>
        <th> Job title: </th>
        <th> Description: </th>
        <th> Phone Number: </th>
        <th> Email: </th>
      </tr>
      <?php
      	$db_host = '192.168.2.3';
        $db_user = 'dbuser';
        $db_passwd = 'joblisting20';
        $db_name = 'joblistingdb';
         $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
         
         try{
        	$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
        	$q = $pdo->query("SELECT * FROM JOB_LISTING;");
        	while($row = $q->fetch()){
      echo "<tr><td>".$row["full_name"]."</td><td>".$row["location"]."</td><td>".$row["date_posted"]."</td><td>".$row["job_title"]."</td><td>".$row["description"]."</td><td>".$row["phone_number"]."</td><td>".$row["email"]."</td></tr>\n"; 
      		}
        } catch(PDOException $error){
        	echo "Connection error" . $error->getMessage(); 
                      }
                      ?>
      
      </table>
  </body> 
</html> 
