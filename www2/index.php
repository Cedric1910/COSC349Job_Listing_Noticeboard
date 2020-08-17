<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">

<html>
  <head>
    <title> Job Listings Noticeboard  </title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
    <h1> Job Listings:</h1>
    <p> This shows all the jobs currently available</p>
    <table border="1">
      <tr>
        <th> name: </th>
        <th> location: </th>
        <th> date posted: </th>
        <th> job title </th>
        <th> description </th>
      </tr>
      <?php
         $db_host = '192.168.2.2';
         $db_user = 'dbuser';
         $db_passwd = 'joblisting20'
         $db_name = 'joblistingdb';
         $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
         $q = $pdo->query("SELECT * FROM JOB_LISTING");

      while($row = $q->fetch()){
      echo "<tr><td>".$row["full_name"]."<tr><td>".$row["location"]."<tr><td>".$row["date_posted"]."<tr><td>".$row["job_title"]."<tr><td>".$row["description"]."</td></tr>\n"; 
                      }
                      ?>  
      </table>
  </body> 
</html> 
